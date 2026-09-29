@extends('layouts.app')

@section('title', 'Distribution Network & Warehouses — Port Moresby & Lae | Sens PNG')
@section('meta_description', 'Sens PNG operates dual distribution centers in Port Moresby and Lae, ensuring dependable freight transport across all 22 provinces in Papua New Guinea.')

@section('content')
<!-- Header Banner -->
<section class="py-16 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Nationwide Logistics</span>
        <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2">Dual-Hub Supply Infrastructure</h1>
        <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed">
            By positioning core warehouse facilities at Papua New Guinea’s two primary commercial ports—Port Moresby and Lae—Sens PNG provides unmatched delivery velocity across road corridors and maritime sea-lanes.
        </p>
    </div>
</section>

<!-- Dual Logistics Hubs Breakdown -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
            
            <!-- Port Moresby Hub -->
            <div class="rounded-3xl bg-[#F0F7FD] p-8 sm:p-10 border border-sky-200 space-y-6 relative overflow-hidden shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-sky-100 text-[#006EAD] flex items-center justify-center border border-sky-200">
                        <i data-lucide="anchor" class="w-6 h-6"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-sky-100 text-[#006EAD] border border-sky-200">
                        Southern Gateway
                    </span>
                </div>

                <div>
                    <h3 class="text-2xl font-black text-slate-900 font-['Outfit']">Port Moresby Central Depot &amp; HQ</h3>
                    <p class="text-xs font-mono text-[#006EAD] font-semibold mt-1">Unit 04 Wamco Haus, Section 35 Lot 50, Kunai St, Hohola, NCD</p>
                </div>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Operating directly out of Wamco Haus in Hohola, our central facility coordinates container de-stuffing, buffer storage, and daily delivery dispatches to supermarkets, retail trade stores, and transport operators throughout the National Capital District and Southern coastal corridors.
                </p>

                <div class="space-y-2 text-xs text-slate-500 border-t border-sky-200 pt-4">
                    <div class="flex justify-between py-1">
                        <span>Covered Regions:</span>
                        <strong class="text-slate-900">NCD, Central, Gulf, Western, Milne Bay, Oro</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span>Direct Phone:</span>
                        <strong class="text-slate-900">+675 8387 5018</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span>Direct Email:</span>
                        <strong class="text-[#006EAD]">admin@senspng.com</strong>
                    </div>
                </div>
            </div>

            <!-- Lae Logistics Depot -->
            <div class="rounded-3xl bg-[#FFFBEB] p-8 sm:p-10 border border-amber-200 space-y-6 relative overflow-hidden shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center border border-amber-200">
                        <i data-lucide="navigation" class="w-6 h-6"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 text-amber-800 border border-amber-200">
                        Highlands &amp; Islands Hub
                    </span>
                </div>

                <div>
                    <h3 class="text-2xl font-black text-slate-900 font-['Outfit']">Lae Logistics &amp; Highlands Depot</h3>
                    <p class="text-xs font-mono text-amber-700 font-semibold mt-1">Milfordhaven Industrial Corridor, Sector 12, Lae, Morobe Province</p>
                </div>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Lae serves as the commercial industrial heartland of PNG. Our Lae operations team manages the crucial Highlands Highway artery, supplying trade stores, logging enterprises, mining contractors, and municipal retailers right into Goroka, Mt Hagen, and beyond.
                </p>

                <div class="space-y-2 text-xs text-slate-500 border-t border-amber-200 pt-4">
                    <div class="flex justify-between py-1">
                        <span>Covered Regions:</span>
                        <strong class="text-slate-900">Morobe, Eastern &amp; Western Highlands, Simbu, Enga, Madang</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span>Highlands Highway Dispatch:</span>
                        <strong class="text-slate-900">Daily Trucking Schedules</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span>Islands Sea-Freight:</span>
                        <strong class="text-amber-700">Weekly Scheduled Coastal Barging</strong>
                    </div>
                </div>
            </div>

        </div>

        <!-- Supply Chain Capabilities Grid -->
        <div class="rounded-3xl bg-[#F8FAFC] p-8 sm:p-12 border border-slate-200 shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-6 font-['Outfit'] text-center">Our Supply Chain Standards</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-xs">
                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-2">
                    <i data-lucide="package" class="w-5 h-5 text-[#006EAD]"></i>
                    <strong class="text-slate-900 block text-sm">Full Container (FCL) &amp; Pallet Handling</strong>
                    <p class="text-slate-500 leading-relaxed">Equipped with heavy forklift machinery and container loading docks for rapid turnaround.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-2">
                    <i data-lucide="thermometer" class="w-5 h-5 text-amber-600"></i>
                    <strong class="text-slate-900 block text-sm">Climate-Managed Dry Storage</strong>
                    <p class="text-slate-500 leading-relaxed">Weather-sealed warehouses preserving bakers flour moisture levels and food integrity.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-2">
                    <i data-lucide="refresh-cw" class="w-5 h-5 text-emerald-600"></i>
                    <strong class="text-slate-900 block text-sm">FIFO Stock Rotation</strong>
                    <p class="text-slate-500 leading-relaxed">Strict First-In First-Out inventory tracking guarantees maximum shelf-life for our retail partners.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-2">
                    <i data-lucide="shield" class="w-5 h-5 text-[#006EAD]"></i>
                    <strong class="text-slate-900 block text-sm">24/7 Monitored Security</strong>
                    <p class="text-slate-500 leading-relaxed">Secured compound perimeter, CCTV monitoring, and dedicated warehouse dispatch oversight.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
