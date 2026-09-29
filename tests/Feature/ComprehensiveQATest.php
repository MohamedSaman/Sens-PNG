<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComprehensiveQATest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * 1. Test All Public Web Pages Return HTTP 200
     */
    public function test_all_public_web_pages_load_successfully(): void
    {
        $pages = [
            '/',
            '/about',
            '/products',
            '/products/category/fmcg',
            '/products/category/automotive',
            '/distribution',
            '/leadership',
            '/downloads',
            '/contact',
            '/track-enquiry',
            '/admin/login',
        ];

        foreach ($pages as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    /**
     * 2. Test All 5 Brand Microsite Showcase Pages
     */
    public function test_all_brand_showcases_load_successfully(): void
    {
        $brands = ['punjas', 'happy-mum', 'nachorittos', 'kapsen', 'long-march'];

        foreach ($brands as $slug) {
            $response = $this->get("/brands/{$slug}");
            $response->assertStatus(200);
            $response->assertSee(Brand::where('slug', $slug)->first()->name);
        }
    }

    /**
     * 3. Test Individual Product Detail Pages
     */
    public function test_product_detail_pages_load_successfully(): void
    {
        $products = Product::take(5)->get();

        foreach ($products as $p) {
            $response = $this->get("/product/{$p->slug}");
            $response->assertStatus(200);
            $response->assertSee($p->name);
            $response->assertSee($p->product_code);
        }
    }

    /**
     * 4. Test Product Search and Filter
     */
    public function test_product_search_and_filters(): void
    {
        // Search by keyword
        $response = $this->get('/products?q=Flour');
        $response->assertStatus(200);
        $response->assertSee('Punjas Premium Enriched Bakers Flour');

        // Filter by brand
        $response = $this->get('/products?brand=kapsen');
        $response->assertStatus(200);
        $response->assertSee('Kapsen');
        $response->assertDontSee('Punjas Premium Enriched Bakers Flour');
    }

    /**
     * 5. Test Document Center File Download
     */
    public function test_downloads_center_and_file_download(): void
    {
        $doc = Download::first();
        $oldCount = $doc->download_count;

        $response = $this->get("/download/{$doc->id}");
        $response->assertStatus(200);

        $doc->refresh();
        $this->assertEquals($oldCount + 1, $doc->download_count);
    }

    /**
     * 6. Test Wholesale Enquiry Submission (Valid & Invalid)
     */
    public function test_wholesale_enquiry_validation_and_submission(): void
    {
        // Validation failure on empty payload
        $failResponse = $this->post('/enquiry', []);
        $failResponse->assertSessionHasErrors(['business_name', 'contact_name', 'email', 'phone', 'province', 'business_type', 'category_interest', 'message']);

        // Successful Form Submission
        $successResponse = $this->post('/enquiry', [
            'business_name' => 'Koki Fresh Produce Retailers Ltd',
            'contact_name' => 'Grace Kila',
            'email' => 'grace@kokifresh.com.pg',
            'phone' => '+675 73456789',
            'province' => 'National Capital District (POM)',
            'business_type' => 'Supermarket / Retail Chain',
            'category_interest' => 'FMCG Food Provisions (Punjas, Happy Mum, Nachorittos)',
            'estimated_volume' => '10 Pallets monthly',
            'message' => 'Please provide direct warehouse pricing for Bakers flour and Canola oil.',
        ]);

        $successResponse->assertSessionHas('enquiry_success');

        $this->assertDatabaseHas('enquiries', [
            'business_name' => 'Koki Fresh Produce Retailers Ltd',
            'email' => 'grace@kokifresh.com.pg',
            'status' => 'new',
        ]);
    }

    /**
     * 7. Test AJAX / JSON Wholesale Enquiry Submission
     */
    public function test_wholesale_enquiry_ajax_json_submission(): void
    {
        $response = $this->postJson('/enquiry', [
            'business_name' => 'Morobe Trucking & Heavy Haulage Ltd',
            'contact_name' => 'David Wani',
            'email' => 'fleet@morobetrucking.com.pg',
            'phone' => '+675 79876543',
            'province' => 'Morobe Province (Lae)',
            'business_type' => 'Commercial Fleet / Transport Operator',
            'category_interest' => 'Commercial Automotive Tyres (Kapsen, Long March)',
            'estimated_volume' => '50 TBR Tyres monthly',
            'message' => 'Need pricing for Long March 295/80R22.5 steer and trailer tyres.',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['success', 'reference_no', 'message']);
    }

    /**
     * 8. Test Enquiry Status Tracking
     */
    public function test_enquiry_tracking_functionality(): void
    {
        $enquiry = Enquiry::create([
            'reference_no' => 'SENS-2026-TEST1',
            'business_name' => 'Papua Highlands Trade Store',
            'contact_name' => 'Lucas Philip',
            'email' => 'lucas@highlandstrade.pg',
            'phone' => '+675 71112222',
            'province' => 'Western Highlands (Mt Hagen)',
            'business_type' => 'Independent Trade Store',
            'category_interest' => 'Both FMCG and Automotive Lines',
            'message' => 'Wholesale inquiry for Mt Hagen store.',
            'status' => 'contacted',
        ]);

        // Web view tracking
        $webResponse = $this->get('/track-enquiry?reference_no=SENS-2026-TEST1');
        $webResponse->assertStatus(200);
        $webResponse->assertSee('Papua Highlands Trade Store');
        $webResponse->assertSee('Contacted');

        // JSON API tracking
        $jsonResponse = $this->getJson('/track-enquiry?reference_no=SENS-2026-TEST1');
        $jsonResponse->assertStatus(200);
        $jsonResponse->assertJson([
            'found' => true,
            'reference_no' => 'SENS-2026-TEST1',
            'status' => 'contacted',
        ]);

        // Non-existent tracking code JSON
        $notFoundResponse = $this->getJson('/track-enquiry?reference_no=SENS-2026-NONEXIST');
        $notFoundResponse->assertStatus(404);
        $notFoundResponse->assertJson(['found' => false]);
    }

    /**
     * 9. Test Admin Route Protection
     */
    public function test_admin_routes_require_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/enquiries')->assertRedirect('/admin/login');
        $this->get('/admin/products')->assertRedirect('/admin/login');
        $this->get('/admin/brands')->assertRedirect('/admin/login');
        $this->get('/admin/settings')->assertRedirect('/admin/login');
    }

    /**
     * 10. Test Admin Login with Valid & Invalid Credentials
     */
    public function test_admin_authentication_flow(): void
    {
        // Invalid password
        $fail = $this->post('/admin/login', [
            'email' => 'admin@senspng.com',
            'password' => 'WrongPassword!',
        ]);
        $fail->assertSessionHasErrors('email');
        $this->assertGuest();

        // Valid credentials
        $success = $this->post('/admin/login', [
            'email' => 'admin@senspng.com',
            'password' => 'SensAdmin2026!',
        ]);
        $success->assertRedirect('/admin');
        $this->assertAuthenticated();
    }

    /**
     * 11. Test Admin Enquiry Management & Settings Update
     */
    public function test_admin_can_manage_enquiries_and_settings(): void
    {
        $admin = User::where('email', 'admin@senspng.com')->first();
        $this->actingAs($admin);

        // Access dashboard
        $this->get('/admin')->assertStatus(200);

        // Create sample enquiry
        $enquiry = Enquiry::create([
            'reference_no' => 'SENS-2026-MNG01',
            'business_name' => 'Wabag Wholesale Traders',
            'contact_name' => 'Simon Paul',
            'email' => 'simon@wabagwholesalers.com.pg',
            'phone' => '+675 75556666',
            'province' => 'Enga Province (Wabag)',
            'business_type' => 'Wholesaler / Sub-Distributor',
            'category_interest' => 'FMCG Food Provisions',
            'message' => 'Looking for container flour pricing.',
            'status' => 'new',
        ]);

        // Update status and add notes
        $updateResponse = $this->patch("/admin/enquiries/{$enquiry->id}", [
            'status' => 'in_review',
            'admin_notes' => 'Spoke with Simon, sent 2026 FMCG price list. Awaiting credit check.',
        ]);
        $updateResponse->assertSessionHas('success');

        $enquiry->refresh();
        $this->assertEquals('in_review', $enquiry->status);
        $this->assertStringContainsString('Spoke with Simon', $enquiry->admin_notes);

        // Update site settings including social media links
        $settingsResponse = $this->post('/admin/settings', [
            'settings' => [
                'contact_phone' => '+675 8387 5018',
                'announcement_bar' => 'Testing updated QA announcement',
                'social_facebook' => 'https://facebook.com/senspnglimited-qa',
                'social_linkedin' => 'https://linkedin.com/company/senspng-qa',
                'social_whatsapp' => 'https://wa.me/67583875018',
                'social_instagram' => 'https://instagram.com/senspnglimited-qa',
            ],
        ]);
        $settingsResponse->assertSessionHas('success');

        $this->assertEquals('+675 8387 5018', SiteSetting::get('contact_phone'));
        $this->assertEquals('Testing updated QA announcement', SiteSetting::get('announcement_bar'));
        $this->assertEquals('https://facebook.com/senspnglimited-qa', SiteSetting::get('social_facebook'));
        $this->assertEquals('https://linkedin.com/company/senspng-qa', SiteSetting::get('social_linkedin'));

        // Verify public website footer displays updated social media links
        $publicHome = $this->get('/');
        $publicHome->assertStatus(200);
        $publicHome->assertSee('https://facebook.com/senspnglimited-qa');
        $publicHome->assertSee('https://linkedin.com/company/senspng-qa');

        // Logout
        $logout = $this->post('/admin/logout');
        $logout->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}
