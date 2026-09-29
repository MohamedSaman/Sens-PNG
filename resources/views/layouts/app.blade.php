<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sens PNG — Wholesale Distribution & Logistics | Papua New Guinea')</title>
    <meta name="description" content="@yield('meta_description', 'Sens PNG is Papua New Guinea’s premier wholesale distributor of FMCG food provisions and commercial automotive tyres with logistics hubs in Port Moresby and Lae.')">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/brands/spl-emblem.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col antialiased selection:bg-[#006EAD] selection:text-white"
      x-data="{ mobileOpen: false, modalOpen: false, trackOpen: false, selectedCategory: 'all' }">

    <!-- Main Navigation Header -->
    <header @if(request()->routeIs('home'))
                x-data="{ scrolled: false }"
                x-init="scrolled = window.scrollY > 480; window.addEventListener('scroll', () => { scrolled = window.scrollY > 480 }, { passive: true })"
                x-show="scrolled"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="-translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="-translate-y-full opacity-0"
                class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-md transition-all duration-300"
                style="display: none;"
            @else
                class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-sm transition-all duration-300"
            @endif>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3.5 sm:py-4 select-none">
                <!-- Brand Logo (Blue emblem + text, matching hero section menu layout exactly) -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
                    <img src="{{ asset('images/brands/spl-emblem.png') }}?v=2" alt="Sens PNG" class="h-8 sm:h-9 w-auto object-contain transition duration-300 group-hover:scale-105">
                    <span class="text-xl sm:text-2xl font-black tracking-tight text-slate-900 font-['Outfit']">Sens PNG</span>
                </a>

                <!-- Desktop Navigation Links (Same layout & typography as hero section menu) -->
                <nav class="hidden lg:flex items-center gap-7 xl:gap-8 text-[13px] xl:text-sm font-medium text-slate-700">
                    <a href="{{ route('about') }}" class="hover:text-[#006EAD] transition duration-200 {{ request()->routeIs('about') ? 'text-[#006EAD] font-bold' : '' }}">
                        About Us
                    </a>

                    <!-- Products & Brands Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('products') }}" class="flex items-center gap-1 hover:text-[#006EAD] transition duration-200 py-1 cursor-pointer {{ request()->is('products*') || request()->is('product/*') || request()->is('brands*') ? 'text-[#006EAD] font-bold' : '' }}">
                            <span>Products &amp; Brands</span>
                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180 opacity-80 shrink-0"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-150 transform"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100 transform"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute left-0 mt-1 w-64 rounded-2xl bg-white border border-slate-200 shadow-2xl py-2 z-50 text-xs text-left"
                             style="display: none;">
                            <div class="px-3.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100">Core Divisions</div>
                            <a href="{{ route('products.category', 'fmcg') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:text-[#006EAD] hover:bg-sky-50 transition">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                FMCG Food Provisions
                            </a>
                            <a href="{{ route('products.category', 'automotive') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:text-[#006EAD] hover:bg-sky-50 transition">
                                <span class="w-2 h-2 rounded-full bg-[#006EAD]"></span>
                                Commercial Automotive Tyres
                            </a>
                            <div class="px-3.5 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 border-t border-slate-100 mt-1">Featured Brands</div>
                            <a href="{{ route('brands.show', 'punjas') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Punjas Pacific Flour &amp; Oils</a>
                            <a href="{{ route('brands.show', 'bakers-fresh') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Bakers Fresh Specialty Ingredients</a>
                            <a href="{{ route('brands.show', 'happy-mum') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Happy Mum Canned Foods</a>
                            <a href="{{ route('brands.show', 'nachorittos') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Nachorittos Tortilla Chips</a>
                            <a href="{{ route('brands.show', 'kapsen') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Kapsen Commercial Tyres</a>
                            <a href="{{ route('brands.show', 'long-march') }}" class="block px-3.5 py-1.5 text-slate-600 hover:text-[#006EAD] hover:bg-sky-50 transition">Long March Heavy Fleet TBR</a>
                        </div>
                    </div>

                    <a href="{{ route('distribution') }}" class="hover:text-[#006EAD] transition duration-200 {{ request()->routeIs('distribution') ? 'text-[#006EAD] font-bold' : '' }}">
                        Distribution
                    </a>
                    <a href="{{ route('leadership') }}" class="hover:text-[#006EAD] transition duration-200 {{ request()->routeIs('leadership') ? 'text-[#006EAD] font-bold' : '' }}">
                        Leadership
                    </a>
                    <a href="{{ route('downloads') }}" class="hover:text-[#006EAD] transition duration-200 {{ request()->routeIs('downloads') ? 'text-[#006EAD] font-bold' : '' }}">
                        Downloads
                    </a>

                    <!-- Tracking Modal Trigger -->
                    <button type="button" @click="trackOpen = true" class="hover:text-amber-600 text-slate-700 transition duration-200 flex items-center gap-1.5 cursor-pointer">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        <span>Tracking</span>
                    </button>

                    <a href="{{ route('contact') }}" class="hover:text-[#006EAD] transition duration-200 {{ request()->routeIs('contact') ? 'text-[#006EAD] font-bold' : '' }}">
                        Contact
                    </a>
                </nav>

                <!-- Mobile Hamburger Button -->
                <div class="flex lg:hidden">
                    <button @click="mobileOpen = !mobileOpen" type="button" class="p-2 text-slate-700 hover:text-[#006EAD] transition" aria-label="Toggle navigation">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Global Mobile Drawer Navigation -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="fixed top-0 inset-x-0 z-[60] lg:hidden border-b border-slate-200 bg-white px-4 pt-4 pb-6 space-y-2 shadow-2xl max-h-[90vh] overflow-y-auto"
         style="display: none;"
         @click.outside="mobileOpen = false"
         @keydown.escape.window="mobileOpen = false">
        
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <a href="{{ route('home') }}" @click="mobileOpen = false" class="flex items-center">
                <img src="{{ asset('images/brands/spl-logo-official.png') }}" alt="Sens PNG Limited" class="h-10 w-auto object-contain">
            </a>
            <button @click="mobileOpen = false" class="p-2 text-slate-500 hover:text-slate-800 rounded-lg hover:bg-slate-100 transition">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <a href="{{ route('home') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('home') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">Home</a>
        <a href="{{ route('about') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('about') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">About Sens PNG Limited</a>
        <a href="{{ route('products') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->is('products*') || request()->is('product/*') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">All Products &amp; Brands</a>
        <div class="pl-4 space-y-1 border-l-2 border-sky-200 my-1 py-1">
            <a href="{{ route('products.category', 'fmcg') }}" @click="mobileOpen = false" class="block px-2.5 py-1.5 text-xs font-semibold text-amber-700 hover:bg-amber-50 rounded-lg">FMCG Food Provisions</a>
            <a href="{{ route('products.category', 'automotive') }}" @click="mobileOpen = false" class="block px-2.5 py-1.5 text-xs font-semibold text-[#006EAD] hover:bg-sky-50 rounded-lg">Commercial Tyres</a>
        </div>
        <a href="{{ route('distribution') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('distribution') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">Distribution Network</a>
        <a href="{{ route('leadership') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('leadership') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">Leadership &amp; Founder</a>
        <a href="{{ route('downloads') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('downloads') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">Catalogues &amp; Downloads</a>
        <a href="{{ route('contact') }}" @click="mobileOpen = false" class="block px-3 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('contact') ? 'text-[#006EAD] bg-sky-50' : 'text-slate-800 hover:text-[#006EAD] hover:bg-slate-50' }}">Contact &amp; Depots</a>
        
        <div class="pt-3 border-t border-slate-100 space-y-2">
            <button @click="mobileOpen = false; modalOpen = true" class="w-full py-3 rounded-xl font-bold text-center text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-md shadow-[#006EAD]/20 transition flex items-center justify-center gap-2">
                <i data-lucide="send" class="w-4 h-4"></i>
                <span>Request Wholesale Enquiry</span>
            </button>
            <button @click="mobileOpen = false; trackOpen = true" class="w-full py-2.5 rounded-xl font-semibold text-center text-xs text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200 transition flex items-center justify-center gap-2">
                <i data-lucide="search" class="w-3.5 h-3.5"></i>
                <span>Track Existing Enquiry</span>
            </button>
            <div class="flex items-center justify-center gap-4 text-xs text-slate-500 pt-2">
                <a href="tel:+67583875018" class="flex items-center gap-1 hover:text-[#006EAD]">
                    <i data-lucide="phone" class="w-3.5 h-3.5 text-[#006EAD]"></i>
                    <span>+675 8387 5018</span>
                </a>
                <span>&bull;</span>
                <a href="mailto:admin@senspng.com" class="flex items-center gap-1 hover:text-[#006EAD]">
                    <i data-lucide="mail" class="w-3.5 h-3.5 text-amber-600"></i>
                    <span>admin@senspng.com</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Global Notification Flash Messages -->
    @if(session('enquiry_success'))
        <div class="max-w-4xl mx-auto px-4 mt-6" x-data="{ show: true }" x-show="show">
            <div class="p-5 rounded-2xl bg-emerald-950/80 border-2 border-emerald-500/50 shadow-2xl flex items-start gap-4"
                 x-init="setTimeout(() => runConfetti(), 300)">
                <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/30">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-white">Enquiry Successfully Submitted!</h3>
                    <p class="text-sm text-emerald-200 mt-1">{{ session('enquiry_success')['message'] }}</p>
                    <div class="mt-2 inline-flex items-center gap-2 px-3 py-1 rounded-md bg-emerald-900/60 border border-emerald-500/40 text-xs font-mono text-emerald-300">
                        <span>Tracking Reference:</span>
                        <strong class="text-white">{{ session('enquiry_success')['reference_no'] }}</strong>
                    </div>
                </div>
                <button @click="show = false" class="text-emerald-400 hover:text-white p-1">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Universal B2B Wholesale Enquiry Modal -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-md flex items-center justify-center p-4 sm:p-6"
         style="display: none;"
         @keydown.escape.window="modalOpen = false">
        
        <div class="relative w-full max-w-2xl rounded-3xl bg-white border border-slate-200 p-5 sm:p-8 shadow-2xl max-h-[90vh] overflow-y-auto"
             @click.outside="modalOpen = false">
            
            <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#006EAD] flex items-center justify-center border border-sky-100">
                        <i data-lucide="building" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 font-['Outfit']">B2B Wholesale Business Enquiry</h3>
                        <p class="text-xs text-slate-500">Serving supermarkets, trade stores, fleet operators &amp; wholesalers in PNG.</p>
                    </div>
                </div>
                <button @click="modalOpen = false" class="p-2 text-slate-400 hover:text-slate-700 rounded-lg hover:bg-slate-100 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Registered Business Name *</label>
                        <input type="text" name="business_name" required placeholder="e.g. Pacific Retail Enterprises Ltd"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Contact Person &amp; Title *</label>
                        <input type="text" name="contact_name" required placeholder="e.g. John Kila (Procurement Director)"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Business Email Address *</label>
                        <input type="email" name="email" required placeholder="procurement@company.com.pg"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Phone / WhatsApp *</label>
                        <input type="text" name="phone" required placeholder="+675 7XXXXXXX"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Operating Province *</label>
                        <select name="province" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="">Select Province...</option>
                            <option value="National Capital District (POM)">National Capital District (POM)</option>
                            <option value="Morobe Province (Lae)">Morobe Province (Lae)</option>
                            <option value="Eastern Highlands">Eastern Highlands</option>
                            <option value="Western Highlands">Western Highlands</option>
                            <option value="Madang Province">Madang Province</option>
                            <option value="East Sepik">East Sepik</option>
                            <option value="West Sepik">West Sepik</option>
                            <option value="Southern Highlands">Southern Highlands</option>
                            <option value="Enga Province">Enga Province</option>
                            <option value="Simbu Province">Simbu Province</option>
                            <option value="Hela Province">Hela Province</option>
                            <option value="Jiwaka Province">Jiwaka Province</option>
                            <option value="Central Province">Central Province</option>
                            <option value="Milne Bay">Milne Bay</option>
                            <option value="Oro (Northern)">Oro (Northern)</option>
                            <option value="Gulf Province">Gulf Province</option>
                            <option value="Western Province">Western Province</option>
                            <option value="East New Britain">East New Britain</option>
                            <option value="West New Britain">West New Britain</option>
                            <option value="New Ireland">New Ireland</option>
                            <option value="Manus Province">Manus Province</option>
                            <option value="Autonomous Region of Bougainville">Bougainville</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Business Classification *</label>
                        <select name="business_type" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="Supermarket / Large Retailer">Supermarket / Large Retailer</option>
                            <option value="Independent Trade Store">Independent Trade Store</option>
                            <option value="Wholesale Distributor / Sub-Agent">Wholesale Distributor / Sub-Agent</option>
                            <option value="Commercial Fleet / Transport Operator">Commercial Fleet / Transport Operator</option>
                            <option value="Mining / Logging / Industrial Operation">Mining / Logging / Industrial Operation</option>
                            <option value="Food Service / Bakery / Hotel">Food Service / Bakery / Hotel</option>
                            <option value="Government / Institutional Purchaser">Government / Institutional Purchaser</option>
                            <option value="Other Commercial Enterprise">Other Commercial Enterprise</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Primary Category of Interest *</label>
                        <select name="category_interest" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="FMCG Food Provisions (Punjas, Happy Mum, Nachorittos)">FMCG Provisions (Punjas, Happy Mum, Nachorittos)</option>
                            <option value="Commercial Automotive Tyres (Kapsen, Long March)">Commercial Tyres (Kapsen, Long March)</option>
                            <option value="Both FMCG and Automotive Lines">Both FMCG and Automotive Lines</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Estimated Monthly Volume / Pallets</label>
                        <input type="text" name="estimated_volume" placeholder="e.g. 5-10 Pallets / 40 Tyres monthly"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Enquiry Details / Specific Product Lines *</label>
                    <textarea name="message" rows="3" required placeholder="Specify your desired product lines, target quantities, delivery location or required credit terms..."
                              class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition"></textarea>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
                    <p class="text-[11px] text-slate-500 flex items-center gap-1.5 order-2 sm:order-1 text-center sm:text-left">
                        <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Wholesale-only verification. Pure B2B pricing.</span>
                    </p>
                    <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl font-bold text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-md shadow-[#006EAD]/20 transition duration-200 order-1 sm:order-2">
                        Submit Wholesale Request
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Enquiry Tracker Modal -->
    <div x-show="trackOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto bg-black/70 backdrop-blur-md flex items-center justify-center p-4"
         style="display: none;"
         @keydown.escape.window="trackOpen = false">
        
        <div class="relative w-full max-w-md rounded-2xl bg-white border border-slate-200 p-6 shadow-2xl"
             @click.outside="trackOpen = false"
             x-data="{ ref: '', loading: false, result: null, error: '' }">
            
            <div class="flex items-center justify-between border-b border-slate-200 pb-3 mb-4">
                <div class="flex items-center gap-2 text-[#006EAD]">
                    <i data-lucide="search" class="w-5 h-5"></i>
                    <h4 class="font-bold text-base text-slate-900">Track Wholesale Enquiry</h4>
                </div>
                <button @click="trackOpen = false" class="text-slate-400 hover:text-slate-700">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <p class="text-xs text-slate-600 mb-4">Enter your 10-digit Sens PNG enquiry tracking reference (e.g. <span class="font-mono text-[#006EAD] font-semibold">SENS-2026-XXXXX</span>):</p>
            
            <form @submit.prevent="
                loading = true; error = ''; result = null;
                fetch('{{ route('enquiry.track') }}?reference_no=' + encodeURIComponent(ref), {
                    headers: { 'Accept': 'application/json' }
                })
                .then(res => res.json())
                .then(data => {
                    loading = false;
                    if(data.found) { result = data; }
                    else { error = data.message || 'Reference not found.'; }
                })
                .catch(err => { loading = false; error = 'Error looking up enquiry.'; });
            " class="space-y-3">
                <input type="text" x-model="ref" required placeholder="SENS-2026-..." 
                       class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 font-mono text-sm text-[#006EAD] placeholder-slate-400 focus:outline-none focus:border-[#006EAD]">
                <button type="submit" :disabled="loading" class="w-full py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider bg-[#006EAD] hover:bg-[#00598E] text-white transition">
                    <span x-show="!loading">Check Live Status</span>
                    <span x-show="loading" style="display: none;">Searching Registry...</span>
                </button>
            </form>

            <div x-show="error" class="mt-4 p-3 rounded-lg bg-red-50 border border-red-200 text-xs text-red-600" x-text="error" style="display: none;"></div>

            <div x-show="result" class="mt-4 p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-2 text-xs" style="display: none;">
                <div class="flex justify-between items-center pb-2 border-b border-slate-200">
                    <span class="text-slate-500">Reference:</span>
                    <span class="font-mono font-bold text-[#006EAD]" x-text="result?.reference_no"></span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-slate-200">
                    <span class="text-slate-500">Company:</span>
                    <span class="font-semibold text-slate-900" x-text="result?.business_name"></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-slate-500">Current Status:</span>
                    <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider"
                          :class="{
                              'bg-sky-100 text-[#006EAD] border border-sky-200': result?.status === 'new',
                              'bg-amber-100 text-amber-700 border border-amber-200': result?.status === 'contacted',
                              'bg-indigo-100 text-indigo-700 border border-indigo-200': result?.status === 'in_review',
                              'bg-emerald-100 text-emerald-700 border border-emerald-200': result?.status === 'closed'
                          }"
                          x-text="result?.status"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Corporate Footer -->
    <footer class="bg-[#050E1A] border-t border-slate-800 text-slate-400 text-sm mt-20">
        <!-- Top Footer Highlight -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                
                <!-- Col 1: Brand & Wholesale Mandate -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="h-14 flex items-center">
                        <img src="{{ asset('images/brands/spl-logo-white.png') }}" alt="Sens PNG Limited" class="h-12 w-auto object-contain">
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed pr-4">
                        Sens PNG Limited is a 100% Papua New Guinea-owned wholesale distribution company bridging premier international FMCG and commercial tyre manufacturers with local supermarkets, independent retail trade stores, and transport operators across PNG.
                    </p>
                    <div class="p-3.5 rounded-xl bg-slate-900/80 border border-[#2378B9]/30 text-xs space-y-1">
                        <div class="flex items-center gap-1.5 text-sky-400 font-semibold">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                            <span>Our Pure Wholesale Mandate</span>
                        </div>
                        <p class="text-[11px] text-slate-400">
                            We never operate retail outlets. We exist solely to supply, support, and protect the commercial margins of independent PNG businesses.
                        </p>
                    </div>

                    <!-- Social Media Links (Editable via Admin Console) -->
                    <div class="pt-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-2 font-mono">Connect With Sens PNG:</span>
                        <div class="flex items-center gap-2.5">
                            @if($fb = \App\Models\SiteSetting::get('social_facebook', 'https://facebook.com/senspnglimited'))
                                <a href="{{ $fb }}" target="_blank" rel="noopener noreferrer" 
                                   class="w-8 h-8 rounded-xl bg-white/5 hover:bg-[#1877F2]/20 border border-white/10 hover:border-[#1877F2]/40 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm group"
                                   title="Sens PNG on Facebook">
                                    <svg class="w-4 h-4 fill-current group-hover:scale-110 transition-transform" viewBox="0 0 320 512" aria-hidden="true">
                                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V137.9c0-26.4 12.9-52.2 54.4-52.2H297V2.6S254.3 0 213.9 0c-84.3 0-139.1 51.1-139.1 143.4v58.1H32v97.8h48z"/>
                                    </svg>
                                </a>
                            @endif

                            @if($li = \App\Models\SiteSetting::get('social_linkedin', 'https://linkedin.com/company/sens-png-limited'))
                                <a href="{{ $li }}" target="_blank" rel="noopener noreferrer" 
                                   class="w-8 h-8 rounded-xl bg-white/5 hover:bg-[#0A66C2]/20 border border-white/10 hover:border-[#0A66C2]/40 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm group"
                                   title="Sens PNG on LinkedIn">
                                    <svg class="w-4 h-4 fill-current group-hover:scale-110 transition-transform" viewBox="0 0 448 512" aria-hidden="true">
                                        <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                                    </svg>
                                </a>
                            @endif

                            @if($wa = \App\Models\SiteSetting::get('social_whatsapp', 'https://wa.me/67583875018'))
                                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" 
                                   class="w-8 h-8 rounded-xl bg-white/5 hover:bg-[#25D366]/20 border border-white/10 hover:border-[#25D366]/40 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm group"
                                   title="Chat on WhatsApp">
                                    <svg class="w-4 h-4 fill-current group-hover:scale-110 transition-transform" viewBox="0 0 448 512" aria-hidden="true">
                                        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                    </svg>
                                </a>
                            @endif

                            @if($ig = \App\Models\SiteSetting::get('social_instagram', 'https://instagram.com/senspnglimited'))
                                <a href="{{ $ig }}" target="_blank" rel="noopener noreferrer" 
                                   class="w-8 h-8 rounded-xl bg-white/5 hover:bg-[#E4405F]/20 border border-white/10 hover:border-[#E4405F]/40 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm group"
                                   title="Sens PNG on Instagram">
                                    <svg class="w-4 h-4 fill-current group-hover:scale-110 transition-transform" viewBox="0 0 448 512" aria-hidden="true">
                                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-200">Company &amp; Operations</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('about') }}" class="hover:text-cyan-400 transition">About Sens PNG</a></li>
                        <li><a href="{{ route('distribution') }}" class="hover:text-cyan-400 transition">Logistics &amp; Warehouses</a></li>
                        <li><a href="{{ route('leadership') }}" class="hover:text-cyan-400 transition">Leadership &amp; Founder</a></li>
                        <li><a href="{{ route('downloads') }}" class="hover:text-cyan-400 transition">Document &amp; Catalogue Center</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-cyan-400 transition">Contact &amp; Depots</a></li>
                        <li><a href="{{ route('admin.login') }}" class="text-slate-600 hover:text-slate-400 transition">Staff Portal</a></li>
                    </ul>
                </div>

                <!-- Col 3: Brand Portfolios -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-200">Featured Brands</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('brands.show', 'punjas') }}" class="hover:text-amber-400 transition flex items-center gap-1.5">Punjas Flour &amp; Oils</a></li>
                        <li><a href="{{ route('brands.show', 'bakers-fresh') }}" class="hover:text-amber-400 transition flex items-center gap-1.5">Bakers Fresh Specialty</a></li>
                        <li><a href="{{ route('brands.show', 'happy-mum') }}" class="hover:text-amber-400 transition flex items-center gap-1.5">Happy Mum Canned Foods</a></li>
                        <li><a href="{{ route('brands.show', 'nachorittos') }}" class="hover:text-amber-400 transition flex items-center gap-1.5">Nachorittos Tortilla Chips</a></li>
                        <li><a href="{{ route('brands.show', 'kapsen') }}" class="hover:text-cyan-400 transition flex items-center gap-1.5">Kapsen Passenger/SUV Tyres</a></li>
                        <li><a href="{{ route('brands.show', 'long-march') }}" class="hover:text-cyan-400 transition flex items-center gap-1.5">Long March Heavy Fleet TBR</a></li>
                    </ul>
                </div>

                <!-- Col 4: Warehouse Hubs -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-200">Warehouse Hubs</h4>
                    <div class="space-y-2.5 text-xs text-slate-400">
                        <div>
                            <strong class="text-white block font-medium">Port Moresby (HQ):</strong>
                            <span>Unit 04 Wamco Haus, Section 35 Lot 50, Kunai St, Hohola, NCD.</span>
                        </div>
                        <div>
                            <strong class="text-white block font-medium">Lae Logistics Depot:</strong>
                            <span>Milfordhaven Industrial Corridor, Sector 12, Lae, Morobe.</span>
                        </div>
                        <div class="pt-1">
                            <span class="text-cyan-400 block font-semibold">Wholesale Desk:</span>
                            <a href="tel:+67583875018" class="text-white hover:underline">+675 8387 5018</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright & Social Media Bar -->
        <div class="border-t border-slate-800/80 bg-[#030914] py-6 px-4">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} Sens PNG. All rights reserved. Wholesale Distribution across Papua New Guinea.</p>
                
                <!-- Developed by Credit -->
                <div class="flex items-center gap-1.5 text-xs text-slate-400">
                    <span>Developed by</span>
                    <a href="https://webxkey.com" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-cyan-400 font-medium transition inline-flex items-center gap-1" title="Webxkey Digital Agency">
                        <span class="font-semibold text-slate-200 hover:text-cyan-400">Webxkey</span>
                        <svg class="w-3 h-3 text-cyan-400/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <span>Serving 22 Provinces Nationwide</span>
                    <span>•</span>
                    <button @click="modalOpen = true" class="text-cyan-400 hover:underline cursor-pointer">New Account Registration</button>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
