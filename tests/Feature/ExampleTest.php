<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Test all public pages return HTTP 200
     */
    public function test_public_pages_return_successful_response(): void
    {
        $this->get('/')->assertStatus(200);
        $this->get('/about')->assertStatus(200);
        $this->get('/products')->assertStatus(200);
        $this->get('/products/category/fmcg')->assertStatus(200);
        $this->get('/products/category/automotive')->assertStatus(200);
        $this->get('/brands/punjas')->assertStatus(200);
        $this->get('/brands/kapsen')->assertStatus(200);
        $this->get('/distribution')->assertStatus(200);
        $this->get('/leadership')->assertStatus(200);
        $this->get('/downloads')->assertStatus(200);
        $this->get('/contact')->assertStatus(200);
    }

    /**
     * Test submitting a B2B wholesale enquiry
     */
    public function test_can_submit_wholesale_enquiry(): void
    {
        $response = $this->post('/enquiry', [
            'business_name' => 'Highlands Retail Supermarket Ltd',
            'contact_name' => 'Samuel Toro',
            'email' => 'procurement@highlandsretail.com.pg',
            'phone' => '+675 72345678',
            'province' => 'Western Highlands (Mt Hagen)',
            'business_type' => 'Supermarket / Large Retailer',
            'category_interest' => 'Both FMCG and Automotive Lines',
            'estimated_volume' => '5 Pallets Flour, 20 Tyres monthly',
            'message' => 'Interested in establishing 30-day trade account and weekly pallet delivery to Mt Hagen.',
        ]);

        $response->assertSessionHas('enquiry_success');
        $this->assertDatabaseHas('enquiries', [
            'business_name' => 'Highlands Retail Supermarket Ltd',
            'email' => 'procurement@highlandsretail.com.pg',
        ]);
    }
}
