<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\Leadership;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Homepage with Hero, 3D Globe, Dual Divisions, Brands, Why Us, and Fast-Track CTA
     */
    public function home()
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('sort_order')->get();
        $brands = Brand::where('is_active', true)->orderBy('sort_order')->get();
        $featuredProducts = Product::with(['category', 'brand'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->take(12)
            ->get();
        $locations = Location::orderBy('sort_order')->get();
        $leader = Leadership::where('is_active', true)->first();
        $settings = SiteSetting::pluck('value', 'key');

        return view('website.home', compact(
            'categories',
            'brands',
            'featuredProducts',
            'locations',
            'leader',
            'settings'
        ));
    }

    /**
     * About Sens PNG - Corporate Story, Wholesale Mandate, Vision & Mission
     */
    public function about()
    {
        $locations = Location::orderBy('sort_order')->get();
        $leader = Leadership::where('is_active', true)->first();
        $settings = SiteSetting::pluck('value', 'key');

        return view('website.about', compact('locations', 'leader', 'settings'));
    }

    /**
     * Product Catalog with filtering by category, brand, and search
     */
    public function products(Request $request, ?string $categorySlug = null)
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('sort_order')->get();
        $brands = Brand::where('is_active', true)->orderBy('sort_order')->get();

        $query = Product::with(['category', 'brand'])->where('is_active', true);

        // Filter by category slug if provided in URL or query param
        $activeCategory = null;
        if ($categorySlug) {
            $activeCategory = ProductCategory::where('slug', $categorySlug)->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        } elseif ($request->filled('category')) {
            $activeCategory = ProductCategory::where('slug', $request->query('category'))->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        }

        // Filter by brand
        $activeBrand = null;
        if ($request->filled('brand')) {
            $activeBrand = Brand::where('slug', $request->query('brand'))->first();
            if ($activeBrand) {
                $query->where('brand_id', $activeBrand->id);
            }
        }

        // Search query
        if ($request->filled('q')) {
            $searchTerm = '%'.$request->query('q').'%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('short_description', 'like', $searchTerm)
                    ->orWhere('product_code', 'like', $searchTerm)
                    ->orWhere('package_size', 'like', $searchTerm);
            });
        }

        $products = $query->orderBy('sort_order')->paginate(12)->withQueryString();

        return view('website.products.index', compact(
            'products',
            'categories',
            'brands',
            'activeCategory',
            'activeBrand'
        ));
    }

    /**
     * Detailed Product Page with specifications and wholesale inquiry CTA
     */
    public function productDetail(string $slug)
    {
        $product = Product::with(['category', 'brand'])->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('website.products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Brand Microsite Showcase (Punjas, Kapsen, Long March, etc.)
     */
    public function brandDetail(string $slug)
    {
        $brand = Brand::with('category')->where('slug', $slug)->firstOrFail();
        $products = Product::where('brand_id', $brand->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('website.brands.show', compact('brand', 'products'));
    }

    /**
     * Distribution Network & Dual Logistics Hubs (Port Moresby & Lae)
     */
    public function distribution()
    {
        $locations = Location::orderBy('sort_order')->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('website.distribution', compact('locations', 'settings'));
    }

    /**
     * Leadership & Corporate Governance (Navin Raju)
     */
    public function leadership()
    {
        $leadership = Leadership::where('is_active', true)->orderBy('sort_order')->get();

        return view('website.leadership', compact('leadership'));
    }

    /**
     * Downloads Center - Corporate profile, catalogues, spec sheets
     */
    public function downloads()
    {
        $downloads = Download::where('is_active', true)->orderBy('sort_order')->get();

        return view('website.downloads', compact('downloads'));
    }

    /**
     * Handle Download file count increment
     */
    public function downloadFile(int $id)
    {
        $doc = Download::findOrFail($id);
        $doc->increment('download_count');

        $fullPath = public_path($doc->file_path);
        if (file_exists($fullPath)) {
            return response()->download($fullPath, $doc->title.'.'.strtolower($doc->file_format));
        }

        return redirect()->back()->with('error', 'Document file is currently being updated.');
    }

    /**
     * Contact Page with Location Directory & Wholesale Form
     */
    public function contact()
    {
        $locations = Location::orderBy('sort_order')->get();
        $brands = Brand::where('is_active', true)->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('website.contact', compact('locations', 'brands', 'settings'));
    }

    /**
     * Submit B2B Wholesale Enquiry
     */
    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'province' => 'required|string|max:100',
            'city' => 'nullable|string|max:100',
            'business_type' => 'required|string|max:100',
            'category_interest' => 'required|string|max:100',
            'brands_interested' => 'nullable|array',
            'estimated_volume' => 'nullable|string|max:100',
            'message' => 'required|string|max:3000',
        ]);

        $enquiry = new Enquiry($validated);
        $enquiry->reference_no = Enquiry::generateReferenceNo();
        $enquiry->status = 'new';
        $enquiry->ip_address = $request->ip();
        $enquiry->save();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'reference_no' => $enquiry->reference_no,
                'message' => "Enquiry received! Your reference number is {$enquiry->reference_no}. A Sens PNG wholesale manager will review your requirement promptly.",
            ]);
        }

        return redirect()->back()->with('enquiry_success', [
            'reference_no' => $enquiry->reference_no,
            'message' => "Thank you! Your business enquiry {$enquiry->reference_no} has been recorded. Our team will contact {$validated['contact_name']} shortly.",
        ]);
    }

    /**
     * Track Enquiry Status
     */
    public function trackEnquiry(Request $request)
    {
        $referenceNo = $request->query('reference_no');
        $enquiry = null;

        if ($referenceNo) {
            $enquiry = Enquiry::where('reference_no', strtoupper(trim($referenceNo)))->first();
        }

        if ($request->wantsJson()) {
            if (! $enquiry) {
                return response()->json([
                    'found' => false,
                    'message' => 'No enquiry found matching reference: '.($referenceNo ?: 'unspecified'),
                ], 404);
            }

            return response()->json([
                'found' => true,
                'reference_no' => $enquiry->reference_no,
                'business_name' => $enquiry->business_name,
                'status' => $enquiry->status,
                'created_at' => $enquiry->created_at->format('M d, Y'),
            ]);
        }

        return view('website.enquiry-status', compact('enquiry', 'referenceNo'));
    }
}
