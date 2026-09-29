@extends('layouts.app')

@section('title', 'Contact Sens PNG — Port Moresby & Lae Depots | Wholesale Enquiries')
@section('meta_description', 'Contact Sens PNG wholesale distribution hubs in Port Moresby (Wamco Haus, Hohola) and Lae. Call +675 8387 5018 or submit your commercial inquiry online.')

@section('content')
<!-- Header Banner -->
<section class="py-16 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Trading Desks &amp; Depots</span>
        <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2">Get in Touch With Sens PNG</h1>
        <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed">
            Our wholesale trading desks in Port Moresby and Lae are ready to assist you with price schedules, inventory reservations, trade credit, and logistics dispatch.
        </p>
    </div>
</section>

<!-- Locations Directory & Direct Contact Cards -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            @foreach($locations as $loc)
                <div class="rounded-3xl bg-[#F8FAFC] p-8 border border-slate-200 shadow-sm space-y-5">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-xl {{ $loc->is_primary ? 'bg-sky-100 text-[#006EAD]' : 'bg-amber-100 text-amber-700' }} flex items-center justify-center">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $loc->is_primary ? 'bg-sky-100 text-[#006EAD] border border-sky-200' : 'bg-amber-100 text-amber-800 border border-amber-200' }}">
                            {{ $loc->is_primary ? 'Headquarters & POM Hub' : 'Lae Logistics Center' }}
                        </span>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold text-slate-900 font-['Outfit']">{{ $loc->name }}</h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">{{ $loc->address }}</p>
                    </div>

                    <div class="space-y-2 text-xs border-t border-slate-200 pt-4 text-slate-600">
                        <div class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 text-[#006EAD]"></i>
                            <span>Phone: <strong class="text-slate-900">{{ $loc->phone }}</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-amber-600"></i>
                            <span>Email: <strong class="text-slate-900">{{ $loc->email }}</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4 text-emerald-600"></i>
                            <span>Hours: {{ $loc->operating_hours }}</span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $loc->phone) }}" target="_blank" class="w-full py-2.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-bold text-xs hover:bg-emerald-100 transition flex items-center justify-center gap-2">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Chat via WhatsApp Business</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- B2B Wholesale Contact Form -->
        <div class="max-w-4xl mx-auto rounded-3xl bg-slate-50 border border-slate-200 p-8 sm:p-12 shadow-md">
            <div class="text-center space-y-2 mb-8">
                <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Official B2B Inquiry</span>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 font-['Outfit']">Wholesale Supply Registration</h3>
                <p class="text-xs sm:text-sm text-slate-500">Please provide verified business details to expedite your price schedule.</p>
            </div>

            <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Registered Company Name *</label>
                        <input type="text" name="business_name" required placeholder="e.g. Madang Trading &amp; Retail Ltd"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Contact Person &amp; Title *</label>
                        <input type="text" name="contact_name" required placeholder="e.g. Samuel Toro / Store Manager"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Official Email Address *</label>
                        <input type="email" name="email" required placeholder="manager@business.com.pg"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Telephone / Mobile *</label>
                        <input type="text" name="phone" required placeholder="+675 7XXXXXXX"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Operating Province *</label>
                        <select name="province" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="">Select Province...</option>
                            <option value="National Capital District (POM)">National Capital District (POM)</option>
                            <option value="Morobe Province (Lae)">Morobe Province (Lae)</option>
                            <option value="Eastern Highlands (Goroka)">Eastern Highlands (Goroka)</option>
                            <option value="Western Highlands (Mt Hagen)">Western Highlands (Mt Hagen)</option>
                            <option value="Madang Province">Madang Province</option>
                            <option value="East Sepik (Wewak)">East Sepik (Wewak)</option>
                            <option value="West Sepik (Vanimo)">West Sepik (Vanimo)</option>
                            <option value="Southern Highlands (Mendi)">Southern Highlands (Mendi)</option>
                            <option value="Enga Province (Wabag)">Enga Province (Wabag)</option>
                            <option value="Simbu Province (Kundiawa)">Simbu Province (Kundiawa)</option>
                            <option value="Central Province">Central Province</option>
                            <option value="Milne Bay (Alotau)">Milne Bay (Alotau)</option>
                            <option value="East New Britain (Kokopo)">East New Britain (Kokopo)</option>
                            <option value="West New Britain (Kimbe)">West New Britain (Kimbe)</option>
                            <option value="New Ireland (Kavieng)">New Ireland (Kavieng)</option>
                            <option value="Autonomous Region of Bougainville">Bougainville</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Business Classification *</label>
                        <select name="business_type" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="Supermarket / Large Retailer">Supermarket / Large Retailer</option>
                            <option value="Independent Trade Store">Independent Trade Store</option>
                            <option value="Wholesale Distributor / Sub-Agent">Wholesale Distributor / Sub-Agent</option>
                            <option value="Commercial Fleet / Transport Operator">Commercial Fleet / Transport Operator</option>
                            <option value="Mining / Logging / Industrial Operation">Mining / Logging / Industrial Operation</option>
                            <option value="Bakery / Food Service Enterprise">Bakery / Food Service Enterprise</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Product Line of Interest *</label>
                        <select name="category_interest" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="FMCG Food Provisions (Punjas, Happy Mum, Nachorittos)">FMCG Provisions (Flour, Oil, Fish, Snacks)</option>
                            <option value="Commercial Automotive Tyres (Kapsen, Long March)">Automotive &amp; Heavy Fleet Tyres</option>
                            <option value="Both FMCG and Automotive Lines">Both FMCG &amp; Automotive Lines</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Estimated Order Quantity</label>
                        <input type="text" name="estimated_volume" placeholder="e.g. 5 pallets monthly or 40 tyres"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Requirement Details *</label>
                    <textarea name="message" rows="4" required placeholder="Specify your desired product lines, target delivery location, or required credit terms..."
                              class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition"></textarea>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-xs text-slate-500 flex items-center gap-1.5">
                        <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                        <span>Guaranteed wholesale rate protection. Non-compete policy.</span>
                    </span>
                    <button type="submit" class="w-full sm:w-auto px-10 py-4 rounded-xl font-bold text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-xl shadow-[#006EAD]/25 transition">
                        Submit Wholesale Enquiry
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
