<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin Login View
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Admin Authentication
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Admin Dashboard Overview
     */
    public function dashboard()
    {
        $totalEnquiries = Enquiry::count();
        $newEnquiries = Enquiry::where('status', 'new')->count();
        $totalProducts = Product::count();
        $totalBrands = Brand::count();
        $totalDownloads = Download::sum('download_count');

        $recentEnquiries = Enquiry::latest()->take(6)->get();
        $recentProducts = Product::with(['brand', 'category'])->latest()->take(6)->get();
        $brands = Brand::withCount('products')->orderBy('sort_order')->get();

        return view('admin.dashboard', compact(
            'totalEnquiries',
            'newEnquiries',
            'totalProducts',
            'totalBrands',
            'totalDownloads',
            'recentEnquiries',
            'recentProducts',
            'brands'
        ));
    }

    /**
     * Enquiry Management Center
     */
    public function enquiries(Request $request)
    {
        $query = Enquiry::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = '%'.$request->search.'%';
            $query->where(function ($q) use ($search) {
                $q->where('reference_no', 'like', $search)
                    ->orWhere('business_name', 'like', $search)
                    ->orWhere('contact_name', 'like', $search)
                    ->orWhere('email', 'like', $search);
            });
        }

        $enquiries = $query->paginate(15)->withQueryString();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    /**
     * Update Enquiry Status & Admin Notes
     */
    public function updateEnquiry(Request $request, int $id)
    {
        $enquiry = Enquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,in_review,closed',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $enquiry->update($validated);

        return redirect()->back()->with('success', "Enquiry {$enquiry->reference_no} updated successfully.");
    }

    /**
     * Products List View
     */
    public function products()
    {
        $products = Product::with(['category', 'brand'])->orderBy('sort_order')->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Brands List View
     */
    public function brands()
    {
        $brands = Brand::with('category')->orderBy('sort_order')->get();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Site Settings View
     */
    public function settings()
    {
        $settings = SiteSetting::all();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update Site Setting
     */
    public function updateSetting(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }

    /**
     * Admin Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
