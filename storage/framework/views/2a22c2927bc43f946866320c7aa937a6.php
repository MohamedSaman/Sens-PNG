<?php $__env->startSection('title', 'Sens PNG — Connecting Global Brands with Papua New Guinea Businesses'); ?>

<?php $__env->startSection('content'); ?>
<!-- Cinematic Wholesale Hero — Sens PNG Limited Corporate Identity -->
<section class="relative w-full overflow-hidden bg-[#0A1320]">
    <div class="relative w-full min-h-[640px] sm:min-h-[720px] lg:min-h-[820px] flex flex-col justify-between">
        
        <!-- ========== BACKGROUND LAYER (Papua New Guinea Map & Ambient Depth) ========== -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden select-none">
            <!-- Deep Midnight Base Gradient -->
            <div class="absolute inset-0 bg-[#091322]"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#07111D] via-[#091524] to-[#0D1D2F]"></div>

            <!-- Soft Ambient Atmospheric Lighting Behind Map -->
            <div class="absolute top-1/3 right-[15%] w-[700px] h-[520px] bg-sky-500/[0.08] rounded-full blur-[140px] pointer-events-none"></div>
            <div class="absolute bottom-1/4 right-[35%] w-[450px] h-[450px] bg-cyan-400/[0.05] rounded-full blur-[110px] pointer-events-none"></div>
            <!-- Mobile glowing atmosphere directly behind map and headline -->
            <div class="absolute top-20 right-0 w-[320px] h-[320px] bg-sky-500/[0.14] rounded-full blur-[90px] pointer-events-none sm:hidden"></div>

            <!-- Papua New Guinea Vector Province Map (Full Scalable SVG) -->
            <div id="hero-ship-bg" class="absolute top-8 sm:top-0 inset-x-0 sm:inset-y-0 sm:left-auto sm:right-0 w-full sm:w-[92%] lg:w-[78%] xl:w-[73%] 2xl:w-[68%] flex items-start sm:items-center justify-end pointer-events-none hero-bg-cinematic translate-x-[34%] sm:translate-x-[6%] lg:translate-x-[3%]">
                <img src="<?php echo e(asset('images/png-map-hero.svg')); ?>" 
                     alt="Papua New Guinea Provincial Map" 
                     class="w-[165%] max-w-none sm:w-full h-auto max-h-[580px] sm:max-h-[92%] object-contain select-none opacity-95 sm:opacity-90 drop-shadow-[0_20px_60px_rgba(0,0,0,0.65)]">
            </div>

            <!-- Desktop left soft gradient: guarantees 100% crisp typography on the left -->
            <div class="hero-vignette absolute inset-y-0 left-0 hidden lg:block lg:w-[54%] bg-gradient-to-r from-[#07111D] via-[#07111D]/90 to-transparent pointer-events-none"></div>
            <!-- Mobile soft atmospheric fade: ensures map is visible behind text while keeping high contrast -->
            <div class="hero-vignette absolute inset-0 sm:hidden bg-gradient-to-b from-[#07111D]/40 via-transparent to-[#07111D]/90 pointer-events-none"></div>
            <!-- Bottom gradient fade into section 2 -->
            <div class="hero-vignette absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#07111D] to-transparent pointer-events-none"></div>
            <!-- Top subtle nav shadow -->
            <div class="hero-vignette absolute inset-x-0 top-0 h-16 bg-gradient-to-b from-[#07111D]/60 to-transparent pointer-events-none"></div>
        </div>

        <!-- ========== CONTENT LAYER ========== -->
        <div id="hero-content-layer" class="hero-content-layer relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5 sm:pt-7 pb-10 sm:pb-14 lg:pb-16 flex flex-col justify-between flex-1">

            <!-- ========== HERO TRANSPARENT NAVBAR ========== -->
            <nav class="slide-from-top delay-1 duration-med w-full flex items-center justify-between py-2 sm:py-3 mb-8 sm:mb-12 select-none">
                <!-- Brand Logo -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
                    <img src="<?php echo e(asset('images/brands/spl-emblem-white.png')); ?>?v=2" alt="Sens PNG" class="h-8 sm:h-9 w-auto object-contain transition duration-300 group-hover:scale-105">
                    <span class="text-xl sm:text-2xl font-black tracking-tight text-white font-['Outfit']">Sens PNG</span>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center gap-7 xl:gap-8 text-[13px] xl:text-sm font-medium text-slate-100/90">
                    <a href="<?php echo e(route('about')); ?>" class="hover:text-white transition duration-200">About Us</a>

                    <!-- Products & Brands Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="<?php echo e(route('products')); ?>" class="flex items-center gap-1 hover:text-white transition duration-200 py-1 cursor-pointer">
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
                             class="absolute left-0 mt-1 w-64 rounded-2xl bg-slate-950/95 backdrop-blur-xl border border-white/15 shadow-2xl py-2 z-50 text-xs text-left"
                             style="display: none;">
                            <div class="px-3.5 py-1 text-[10px] font-bold uppercase tracking-wider text-cyan-400">Core Divisions</div>
                            <a href="<?php echo e(route('products.category', 'fmcg')); ?>" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-200 hover:text-white hover:bg-white/10 transition">
                                <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                                FMCG Food Provisions
                            </a>
                            <a href="<?php echo e(route('products.category', 'automotive')); ?>" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-200 hover:text-white hover:bg-white/10 transition">
                                <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                                Commercial Automotive Tyres
                            </a>
                            <div class="px-3.5 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-cyan-400 border-t border-white/10 mt-1">Key Brands</div>
                            <a href="<?php echo e(route('brands.show', 'punjas')); ?>" class="block px-3.5 py-1.5 text-slate-300 hover:text-white hover:bg-white/10 transition">Punjas Pacific Flour &amp; Oils</a>
                            <a href="<?php echo e(route('brands.show', 'happy-mum')); ?>" class="block px-3.5 py-1.5 text-slate-300 hover:text-white hover:bg-white/10 transition">Happy Mum Canned Foods</a>
                            <a href="<?php echo e(route('brands.show', 'nachorittos')); ?>" class="block px-3.5 py-1.5 text-slate-300 hover:text-white hover:bg-white/10 transition">Nachorittos Tortilla Chips</a>
                            <a href="<?php echo e(route('brands.show', 'kapsen')); ?>" class="block px-3.5 py-1.5 text-slate-300 hover:text-white hover:bg-white/10 transition">Kapsen Commercial Tyres</a>
                            <a href="<?php echo e(route('brands.show', 'long-march')); ?>" class="block px-3.5 py-1.5 text-slate-300 hover:text-white hover:bg-white/10 transition">Long March Heavy Fleet TBR</a>
                        </div>
                    </div>

                    <a href="<?php echo e(route('distribution')); ?>" class="hover:text-white transition duration-200">Distribution</a>
                    <a href="<?php echo e(route('leadership')); ?>" class="hover:text-white transition duration-200">Leadership</a>
                    <a href="<?php echo e(route('downloads')); ?>" class="hover:text-white transition duration-200">Downloads</a>

                    <!-- Tracking Modal Trigger -->
                    <button type="button" @click="trackOpen = true" class="hover:text-amber-300 text-slate-100 transition duration-200 flex items-center gap-1.5 cursor-pointer">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Tracking</span>
                    </button>

                    <a href="<?php echo e(route('contact')); ?>" class="hover:text-white transition duration-200">Contact</a>
                </div>

                <!-- Mobile Hamburger Toggle -->
                <div class="flex items-center lg:hidden">
                    <button type="button" @click="mobileOpen = true" class="p-2 text-white hover:text-cyan-300 transition" aria-label="Open Navigation">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </nav>

            <!-- Hero Middle: 2-Column Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center my-auto">
                
                <!-- LEFT Column — Typography & Actions -->
                <div class="lg:col-span-6 space-y-5 lg:space-y-6">
                    <!-- Pill Badge -->
                    <div class="slide-from-left delay-2 duration-med inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900/60 backdrop-blur-md border border-white/10 text-[11px] sm:text-xs font-semibold text-slate-200 shadow-xl">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                        <span class="tracking-wide">Papua New Guinea Owned - Dedicated Wholesale Distributor</span>
                    </div>

                    <!-- Main Title: Exactly 4 Lines Matching Reference -->
                    <h1 class="slide-from-left delay-3 duration-slow text-[32px] xs:text-[38px] sm:text-5xl md:text-6xl xl:text-[70px] 2xl:text-[76px] font-black tracking-[-0.03em] leading-[0.94] uppercase font-['Outfit'] select-none">
                        <span class="block text-white drop-shadow-md">CONNECTING</span>
                        <span class="block text-white drop-shadow-md whitespace-nowrap sm:whitespace-normal">GLOBAL BRANDS</span>
                        <span class="block text-white drop-shadow-md">TO PNG</span>
                        <span class="block text-[#8EA5BA] drop-shadow-md">BUSINESSES</span>
                    </h1>

                    <!-- Subtitle Copy -->
                    <p class="slide-from-left delay-4 duration-med text-xs sm:text-sm text-slate-300 leading-relaxed font-normal max-w-lg drop-shadow-sm">
                        Papua New Guinea’s dedicated wholesale partner. Supplying independent supermarkets, regional trade stores, and commercial transport fleets with premier FMCG food provisions and heavy-duty tyres.
                    </p>

                    <!-- CTA Action Buttons -->
                    <div class="slide-from-left delay-5 duration-med flex flex-wrap items-center gap-3 pt-2">
                        <a href="<?php echo e(route('products')); ?>" 
                           class="group inline-flex items-center gap-3 pl-6 pr-2 py-2 rounded-full bg-[#006EAD] hover:bg-[#005A8F] border border-sky-400/30 text-white shadow-2xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            <span class="text-xs sm:text-sm font-bold tracking-wide">Explore Product Catalog</span>
                            <span class="w-8 h-8 rounded-full bg-white text-[#006EAD] flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </span>
                        </a>

                        <button @click="modalOpen = true" 
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-900/50 hover:bg-slate-900/70 backdrop-blur-md border border-white/15 text-white text-xs sm:text-sm font-bold transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            <i data-lucide="lock" class="w-3.5 h-3.5 text-amber-400"></i>
                            <span>Apply for Wholesale Account</span>
                        </button>
                    </div>
                </div>

                <!-- RIGHT Column — Corporate Wholesale Card -->
                <div class="lg:col-span-6 flex flex-col lg:items-end text-left space-y-4">
                    <div class="slide-from-right delay-3 duration-slow w-full max-w-[460px] lg:ml-auto rounded-3xl bg-[#0D1A2B]/80 backdrop-blur-xl border border-white/10 p-5 sm:p-6 shadow-2xl text-white space-y-4">
                        
                        <div class="flex items-center justify-between pb-3 border-b border-white/10">
                            <div class="flex items-center gap-3">
                                <img src="<?php echo e(asset('images/brands/spl-emblem-white.png')); ?>" alt="Sens PNG" class="h-7 w-auto">
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider text-slate-100 block font-['Outfit']">Sens PNG Limited</span>
                                    <span class="text-[11px] text-slate-400">Wholesale Distribution Network</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 text-[10px] font-bold uppercase tracking-wider">
                                POM &amp; Lae Hubs Active
                            </span>
                        </div>

                        <!-- Core Slogan Quote from Company Profile -->
                        <div class="p-3.5 rounded-2xl bg-white/[0.04] border border-white/10 text-xs italic text-slate-300 leading-relaxed">
                            &ldquo;Connecting global brands with local businesses through quality products, competitive pricing, and trusted partnerships.&rdquo;
                        </div>

                        <!-- Two Hubs Indicator -->
                        <div class="grid grid-cols-2 gap-2.5 text-left">
                            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/10">
                                <div class="flex items-center gap-1.5 text-amber-400 text-xs font-bold mb-0.5">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                                    <span>Port Moresby Hub</span>
                                </div>
                                <div class="text-[11px] text-slate-300">Unit G4 Wamco Haus, Hohola</div>
                            </div>
                            <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/10">
                                <div class="flex items-center gap-1.5 text-cyan-400 text-xs font-bold mb-0.5">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                                    <span>Lae Logistics Hub</span>
                                </div>
                                <div class="text-[11px] text-slate-300">Highlands Corridor Depot</div>
                            </div>
                        </div>

                        <!-- Key Brands Strip (Brand Logos Placed Here) -->
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-2.5">Authorized Wholesale Portfolios:</span>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-2.5">
                                
                                <!-- Punjas -->
                                <a href="<?php echo e(route('brands.show', 'punjas')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/punjas.png')); ?>" alt="Punjas" class="max-h-6 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Punjas</span>
                                </a>

                                <!-- Bakers Fresh -->
                                <a href="<?php echo e(route('brands.show', 'bakers-fresh')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/bakers-fresh-darkmode.png')); ?>" alt="Bakers Fresh" class="max-h-5 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Bakers Fresh</span>
                                </a>

                                <!-- Happy Mum -->
                                <a href="<?php echo e(route('brands.show', 'happy-mum')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/happy-mum-darkmode.png')); ?>" alt="Happy Mum" class="max-h-6 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Happy Mum</span>
                                </a>

                                <!-- Nachorittos -->
                                <a href="<?php echo e(route('brands.show', 'nachorittos')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/nachorittos-darkmode.png')); ?>" alt="Nachorittos" class="max-h-5 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Nachorittos</span>
                                </a>

                                <!-- Kapsen Tyres -->
                                <a href="<?php echo e(route('brands.show', 'kapsen')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/kapsen-darkmode.png')); ?>" alt="Kapsen Tyres" class="max-h-4.5 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Kapsen Tyres</span>
                                </a>

                                <!-- Long March -->
                                <a href="<?php echo e(route('brands.show', 'long-march')); ?>" 
                                   class="px-2.5 py-2.5 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] border border-white/12 hover:border-white/30 flex items-center gap-2 transition-all duration-200 group shadow-sm">
                                    <div class="h-6 w-9 flex items-center justify-center shrink-0">
                                        <img src="<?php echo e(asset('images/brands/long-march-darkmode.png')); ?>" alt="Long March" class="max-h-4 max-w-full object-contain filter drop-shadow-sm transition-transform duration-200 group-hover:scale-110">
                                    </div>
                                    <span class="text-[11px] font-semibold text-slate-100 group-hover:text-white transition truncate">Long March</span>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Bottom Stats — Founder Profile & 100% Wholesale Discipline -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 pt-10 lg:pt-14">
                
                <!-- Left Stat Block: Leadership Profile -->
                <div class="slide-from-bottom delay-6 duration-med flex items-center gap-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full overflow-hidden border-2 border-white/30 shadow-xl ring-2 ring-cyan-500/20 shrink-0 transform hover:scale-105 transition duration-300">
                        <img src="<?php echo e(asset('images/leadership/navin-raju.jpg')); ?>" alt="Navin Raju" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="text-xs sm:text-[13px] leading-snug">
                        <div class="text-white font-bold text-sm sm:text-base font-['Outfit']">Navin Raju — Founder &amp; MD</div>
                        <div class="text-slate-300 font-medium">20+ Years Executive Retail, FMCG &amp; Logistics Leadership in PNG</div>
                    </div>
                </div>

                <!-- Right Stat: Pure Wholesale Discipline -->
                <div class="slide-from-bottom delay-7 duration-med flex items-center gap-4">
                    <div class="text-left sm:text-right leading-tight">
                        <div class="flex items-center sm:justify-end gap-1.5 text-xs sm:text-sm font-bold text-white">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>100% Wholesale Discipline</span>
                        </div>
                        <div class="text-[11px] sm:text-xs text-slate-300 font-medium mt-0.5">
                            Zero Retail Stores · Protecting Independent Merchant Margins
                        </div>
                    </div>
                    <div class="p-2.5 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 text-amber-400 hidden sm:block">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                </div>

            </div>

        </div><!-- end hero-content-layer -->

    </div>
</section>

<!-- Section 2: WHOLESALE PORTFOLIOS FOR PAPUA NEW GUINEA COMMERCE -->
<section class="py-16 sm:py-24 bg-[#EDF4F9] text-center relative overflow-hidden reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-[1.08] font-['Outfit'] mb-4 sm:mb-6">
            <span class="text-[#0B131C]">WHOLESALE PORTFOLIOS </span>
            <span class="text-[#5D738A] font-extrabold">FOR</span><br class="hidden sm:inline">
            <span class="text-[#5D738A] font-extrabold">PAPUA NEW GUINEA COMMERCE.</span>
        </h2>
        <p class="max-w-3xl mx-auto text-xs sm:text-sm text-slate-600 leading-relaxed mb-12 sm:mb-16">
            Sens PNG sources trusted consumer and commercial brands directly from leading global manufacturers, delivering fair pricing and dependable supply to retailers and fleet operators nationwide.
        </p>

        <!-- 3 Core Wholesale Division Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-6xl mx-auto text-left reveal-stagger">
            
            <!-- Card 1: FMCG DISTRIBUTION -->
            <div class="group relative rounded-[28px] lg:rounded-[32px] overflow-hidden bg-[#0A1B2E] shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between aspect-[3/4] p-6 lg:p-8">
                <div class="relative z-10 text-center space-y-1">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-amber-400 block">Pantry &amp; Retail Groceries</span>
                    <h3 class="text-xl sm:text-2xl font-black tracking-wider uppercase text-white font-['Outfit']">FMCG PROVISIONS</h3>
                </div>
                <div class="absolute inset-0 overflow-hidden">
                    <img src="<?php echo e(asset('images/wholesale-fmcg.jpg')); ?>" alt="FMCG Provisions" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-slate-950/70"></div>
                </div>
                <div class="relative z-10 space-y-4 mt-auto">
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Punjas flours &amp; oils, Happy Mum sauces &amp; salt, and Nachorittos chips—trusted brands with strong consumer demand across PNG.
                    </p>
                    <div class="text-center">
                        <a href="<?php echo e(route('products.category', 'fmcg')); ?>" class="inline-block w-full py-2.5 rounded-full bg-white text-slate-900 font-bold text-xs sm:text-sm shadow-lg hover:bg-slate-100 transition transform hover:scale-102 text-center">
                            Browse FMCG Range
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: AUTOMOTIVE DISTRIBUTION -->
            <div class="group relative rounded-[28px] lg:rounded-[32px] overflow-hidden bg-[#0A1B2E] shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between aspect-[3/4] p-6 lg:p-8">
                <div class="relative z-10 text-center space-y-1">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-sky-400 block">Passenger &amp; Commercial Tyres</span>
                    <h3 class="text-xl sm:text-2xl font-black tracking-wider uppercase text-white font-['Outfit']">AUTOMOTIVE TYRES</h3>
                </div>
                <div class="absolute inset-0 overflow-hidden">
                    <img src="<?php echo e(asset('images/wholesale-tyres.jpg')); ?>" alt="Automotive Distribution" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-slate-950/70"></div>
                </div>
                <div class="relative z-10 space-y-4 mt-auto">
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Kapsen passenger &amp; SUV tyres plus Long March heavy truck and bus radials (TBR) engineered for demanding PNG roads and terrain.
                    </p>
                    <div class="text-center">
                        <a href="<?php echo e(route('products.category', 'automotive')); ?>" class="inline-block w-full py-2.5 rounded-full bg-white text-slate-900 font-bold text-xs sm:text-sm shadow-lg hover:bg-slate-100 transition transform hover:scale-102 text-center">
                            Browse Tyre Catalog
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: DUAL-HUB DISTRIBUTION -->
            <div class="group relative rounded-[28px] lg:rounded-[32px] overflow-hidden bg-[#0A1B2E] shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between aspect-[3/4] p-6 lg:p-8">
                <div class="relative z-10 text-center space-y-1">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-emerald-400 block">Port Moresby &amp; Lae Depots</span>
                    <h3 class="text-xl sm:text-2xl font-black tracking-wider uppercase text-white font-['Outfit']">DUAL-HUB SUPPLY</h3>
                </div>
                <div class="absolute inset-0 overflow-hidden">
                    <img src="<?php echo e(asset('images/service-road-freight.jpg')); ?>" alt="Dual-Hub Supply" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-slate-950/70"></div>
                </div>
                <div class="relative z-10 space-y-4 mt-auto">
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Warehouses in POM and Lae provide reliable stock availability, responsive customer support, and efficient dispatch to all 22 provinces.
                    </p>
                    <div class="text-center">
                        <a href="<?php echo e(route('distribution')); ?>" class="inline-block w-full py-2.5 rounded-full bg-white text-slate-900 font-bold text-xs sm:text-sm shadow-lg hover:bg-slate-100 transition transform hover:scale-102 text-center">
                            View Distribution Network
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section 3: FEATURED WHOLESALE PRODUCTS INVENTORY -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-200/80 reveal-on-scroll" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Ready Inventory Catalog</span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 font-['Outfit']">Featured Wholesale Stock</h2>
                <p class="text-xs sm:text-sm text-slate-500">Continuous buffer stock ready for immediate container or pallet dispatch across PNG.</p>
            </div>

            <!-- Tab Pills -->
            <div class="flex items-center gap-1.5 p-1.5 rounded-xl bg-slate-100 border border-slate-200 self-start shadow-inner">
                <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-white text-[#006EAD] font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-4 py-2 rounded-lg text-xs transition cursor-pointer">
                    All Products
                </button>
                <button @click="activeTab = 'fmcg'" :class="activeTab === 'fmcg' ? 'bg-white text-amber-700 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-4 py-2 rounded-lg text-xs transition cursor-pointer">
                    FMCG Food Staples
                </button>
                <button @click="activeTab = 'automotive'" :class="activeTab === 'automotive' ? 'bg-white text-[#006EAD] font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-4 py-2 rounded-lg text-xs transition cursor-pointer">
                    Commercial Tyres
                </button>
            </div>
        </div>

        <!-- Products Grid (2 columns on mobile, 2 on tablet, 4 on desktop) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-xl sm:rounded-2xl bg-white overflow-hidden border border-slate-200 hover:border-[#006EAD] hover:shadow-xl transition-all duration-300 flex flex-col group"
                     x-show="activeTab === 'all' || activeTab === '<?php echo e($product->category->slug); ?>'"
                     x-transition>
                    
                    <!-- Product Image Container -->
                    <div class="relative h-36 sm:h-52 bg-slate-50/70 overflow-hidden flex items-center justify-center p-2.5 sm:p-4 group-hover:bg-slate-50 transition">
                        <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="max-h-full max-w-full object-contain transition duration-300 group-hover:scale-105 filter drop-shadow-sm">
                        
                        <div class="absolute top-2 left-2 sm:top-3 sm:left-3">
                            <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded text-[8px] sm:text-[10px] font-bold uppercase tracking-wider <?php echo e($product->category->slug === 'fmcg' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-sky-100 text-[#006EAD] border border-sky-300'); ?>">
                                <?php echo e($product->brand->name); ?>

                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-3 sm:p-5 flex-1 flex flex-col justify-between space-y-2.5 sm:space-y-4">
                        <div>
                            <div class="text-[10px] sm:text-[11px] font-mono text-[#006EAD] font-semibold mb-0.5 sm:mb-1"><?php echo e($product->product_code); ?></div>
                            <h4 class="text-xs sm:text-base font-bold text-slate-900 group-hover:text-[#006EAD] transition line-clamp-2 leading-tight">
                                <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                            </h4>
                            <p class="text-[11px] sm:text-xs text-slate-500 mt-1 line-clamp-2 hidden sm:block"><?php echo e($product->short_description); ?></p>
                            
                            <div class="mt-2 sm:mt-3 py-1 sm:py-1.5 px-2 sm:px-2.5 rounded sm:rounded-lg bg-slate-50 border border-slate-200 text-[10px] sm:text-[11px] text-slate-600 flex items-center justify-between">
                                <span class="text-slate-400">Pack:</span>
                                <span class="font-semibold text-slate-800 truncate ml-1"><?php echo e($product->package_size); ?></span>
                            </div>
                        </div>

                        <div class="pt-2 sm:pt-3 border-t border-slate-100 flex items-center justify-between gap-1.5 sm:gap-2">
                            <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="text-[11px] sm:text-xs font-semibold text-slate-600 hover:text-[#006EAD] transition truncate">
                                <span class="hidden sm:inline">View Specs</span>
                                <span class="sm:hidden">Specs</span>
                            </a>
                            <button @click="modalOpen = true" class="px-2 sm:px-3.5 py-1 sm:py-1.5 rounded-lg bg-sky-50 hover:bg-[#006EAD] text-[#006EAD] hover:text-white text-[10px] sm:text-xs font-bold border border-sky-200 transition cursor-pointer shrink-0">
                                <span class="hidden sm:inline">Request Quote</span>
                                <span class="sm:hidden">Quote</span>
                            </button>
                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('products')); ?>" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider text-slate-800 bg-white hover:bg-slate-50 border border-slate-300 shadow-xs hover:border-[#006EAD] transition">
                <span>View Complete Wholesale Inventory (All Lines)</span>
                <i data-lucide="arrow-right" class="w-4 h-4 text-[#006EAD]"></i>
            </a>
        </div>

    </div>
</section>

<!-- Section 4: THE INDEPENDENT WHOLESALE ADVANTAGE (Bento Visual Feature) -->
<section class="py-16 sm:py-24 bg-[#F8FAFC] relative overflow-hidden reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Why Choose Sens PNG Limited</span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.05] font-['Outfit'] mt-1">
                    <span class="text-[#0B131C]">THE INDEPENDENT </span>
                    <span class="text-[#5D738A]">WHOLESALE</span><br>
                    <span class="text-[#5D738A]">ADVANTAGE</span>
                </h2>
            </div>
            <div class="max-w-md space-y-4">
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    In Papua New Guinea, many major supermarkets import and distribute their own products while operating retail stores. Sens PNG addresses this gap by operating as a dedicated wholesale partner for independent retailers, wholesalers, and businesses.
                </p>
                <div>
                    <a href="<?php echo e(route('about')); ?>" class="inline-block px-7 py-2.5 rounded-full border border-slate-400 text-xs sm:text-sm font-semibold text-slate-800 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition duration-300">
                        Read Our Full Story
                    </a>
                </div>
            </div>
        </div>

        <!-- Bento Visual Gallery featuring Real Sens PNG Team and Logistics -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch reveal-stagger">
            
            <!-- Left Column: Real Sens PNG Operations Team (Tall card) -->
            <div class="lg:col-span-5 rounded-[28px] lg:rounded-[32px] overflow-hidden bg-slate-900 shadow-xl relative min-h-[420px] lg:min-h-[540px] group">
                <img src="<?php echo e(asset('images/profile/image6.jpeg')); ?>" alt="Sens PNG Team & Leadership" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white space-y-2">
                    <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-amber-300 bg-amber-400/20 border border-amber-300/30 px-2.5 py-1 rounded-full inline-block">100% PNG-Owned &amp; Operated</span>
                    <div class="text-xl font-bold font-['Outfit']">Dedicated Teams in POM &amp; Lae</div>
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Founder &amp; MD Navin Raju alongside our local distribution staff, committed to helping independent retailers access fair pricing and consistent supply.
                    </p>
                </div>
            </div>

            <!-- Right Column: 2 Stacked Cards -->
            <div class="lg:col-span-7 flex flex-col gap-6 justify-between">
                
                <!-- Top card: Inter-Provincial Fleet & Highlands Corridor -->
                <div class="rounded-[28px] lg:rounded-[32px] overflow-hidden bg-slate-900 shadow-xl relative h-[250px] lg:h-[258px] group">
                    <img src="<?php echo e(asset('images/gallery-freight-truck.jpg')); ?>" alt="Inter-Provincial Transport" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent"></div>
                    <div class="absolute bottom-5 left-6 right-6 text-white space-y-1">
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-amber-300">Nationwide Distribution</span>
                        <div class="text-base font-bold font-['Outfit']">Direct Supply to Regional Supermarkets &amp; Trade Stores</div>
                        <p class="text-xs text-slate-300 leading-snug">Daily trucking dispatches across Morobe, Highlands, NCD, and coastal maritime sea-routes.</p>
                    </div>
                </div>

                <!-- Bottom card: Direct Global Manufacturer Partnerships -->
                <div class="rounded-[28px] lg:rounded-[32px] overflow-hidden bg-slate-900 shadow-xl relative h-[250px] lg:h-[258px] group">
                    <img src="<?php echo e(asset('images/gallery-port-loading.jpg')); ?>" alt="International Sourcing" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent"></div>
                    <div class="absolute bottom-5 left-6 right-6 text-white space-y-1">
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-cyan-300">Global Sourcing Capabilities</span>
                        <div class="text-base font-bold font-['Outfit']">Direct Sourcing from Leading Global Manufacturers</div>
                        <p class="text-xs text-slate-300 leading-snug">Strong international supplier relationships delivering quality products at competitive wholesale prices.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- Interactive Live Statistics Bar -->
<section class="border-y border-slate-200 bg-[#F0F7FD] py-10 relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center reveal-stagger">
            
            <div class="space-y-1">
                <div class="text-4xl sm:text-5xl font-black text-[#006EAD]" 
                     data-counter-target="20" data-counter-suffix="+">
                    20+
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-slate-700">Years Executive Leadership</div>
                <p class="text-[11px] text-slate-500">Proven track record in PNG &amp; Pacific</p>
            </div>

            <div class="space-y-1">
                <div class="text-4xl sm:text-5xl font-black text-amber-600"
                     data-counter-target="5" data-counter-suffix="+">
                    5+
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-slate-700">Premier Global Brands</div>
                <p class="text-[11px] text-slate-500">Punjas, Kapsen, Long March &amp; more</p>
            </div>

            <div class="space-y-1">
                <div class="text-4xl sm:text-5xl font-black text-slate-900"
                     data-counter-target="2" data-counter-suffix=" Hubs">
                    2 Hubs
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-slate-700">Warehouses in POM &amp; Lae</div>
                <p class="text-[11px] text-slate-500">Dedicated storage &amp; dispatch fleet</p>
            </div>

            <div class="space-y-1">
                <div class="text-4xl sm:text-5xl font-black text-emerald-600"
                     data-counter-target="22" data-counter-suffix=" Provinces">
                    22 Provinces
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-slate-700">Nationwide Coverage</div>
                <p class="text-[11px] text-slate-500">Maritime freight &amp; road corridors</p>
            </div>

        </div>
    </div>
</section>

<!-- Wholesale Mandate & Non-Compete Guarantee -->
<section class="py-16 bg-white relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-br from-[#F0F7FD] via-white to-sky-50/50 border border-sky-200 p-8 sm:p-12 relative overflow-hidden shadow-sm">
            <!-- Background Glow -->
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-sky-200/30 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-md bg-amber-100 text-amber-800 border border-amber-300 text-xs font-bold uppercase tracking-wider">
                        Pure Wholesale Guarantee
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900">
                        We Empower PNG Retailers. <br class="hidden sm:inline">We Do Not Compete With You.
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Unlike distributors that operate their own consumer supermarkets or commercial retail workshops, <strong class="text-slate-900">Sens PNG is strictly wholesale</strong>. Our entire operational model is designed to safeguard your margins, guarantee consistent inventory allocations, and deliver genuine volume discounts so your business prospers.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col gap-3">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 border border-amber-200">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-slate-900">Protected Trade Pricing</div>
                            <div class="text-xs text-slate-500">Confidential tiered wholesale rates</div>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#006EAD] flex items-center justify-center shrink-0 border border-sky-200">
                            <i data-lucide="trending-up" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-slate-900">Consistent Stock Supply</div>
                            <div class="text-xs text-slate-500">Buffer warehousing in POM &amp; Lae</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dual Core Business Divisions Showcase -->
<section class="py-20 bg-[#F8FAFC] relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <h2 class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Operational Divisions</h2>
            <p class="text-3xl sm:text-4xl font-black text-slate-900">Specialized Wholesale Solutions</p>
            <p class="text-slate-600 text-sm leading-relaxed">
                Whether you operate a supermarket chain, independent trade stores, commercial transport fleets, or mining machinery, Sens PNG maintains dedicated product specialists for each sector.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Division Card 1: FMCG Food Provisions -->
            <div class="rounded-3xl bg-white p-8 sm:p-10 border border-slate-200 hover:border-amber-400 shadow-md hover:shadow-xl transition-all duration-300 relative group overflow-hidden">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-200">
                        <i data-lucide="shopping-cart" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-mono font-bold text-amber-700 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                        DIVISION 01
                    </span>
                </div>

                <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 mb-3 font-['Outfit']">
                    FMCG Wholesale Distribution
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                    High-velocity pantry staples, baking flours, cooking oils, canned fish, and snack lines direct from globally certified manufacturers. Built for high retail turnover.
                </p>

                <!-- Core Brands Inside Division -->
                <div class="space-y-3 mb-8">
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-500">Featured Brands:</div>
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo e(route('brands.show', 'punjas')); ?>" class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800 hover:border-amber-400 hover:text-amber-700 transition flex items-center gap-2">
                            <img src="<?php echo e(asset('images/brands/punjas.png')); ?>" alt="Punjas" class="h-3.5 w-auto object-contain">
                            <span>Punjas Flour &amp; Oils</span>
                        </a>
                        <a href="<?php echo e(route('brands.show', 'happy-mum')); ?>" class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800 hover:border-amber-400 hover:text-amber-700 transition flex items-center gap-2">
                            <img src="<?php echo e(asset('images/brands/happy-mum.png')); ?>" alt="Happy Mum" class="h-3.5 w-auto object-contain">
                            <span>Happy Mum Mackerel &amp; Noodles</span>
                        </a>
                        <a href="<?php echo e(route('brands.show', 'nachorittos')); ?>" class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800 hover:border-amber-400 hover:text-amber-700 transition flex items-center gap-2">
                            <img src="<?php echo e(asset('images/brands/nachorittos.png')); ?>" alt="Nachorittos" class="h-3.5 w-auto object-contain">
                            <span>Nachorittos Tortilla Chips</span>
                        </a>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo e(route('products.category', 'fmcg')); ?>" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                        <span>Browse FMCG Catalogue</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button @click="modalOpen = true" class="text-xs font-semibold text-slate-600 hover:text-slate-900 underline">
                        Request FMCG Pricing
                    </button>
                </div>
            </div>

            <!-- Division Card 2: Automotive & Commercial Tyres -->
            <div class="rounded-3xl bg-white p-8 sm:p-10 border border-slate-200 hover:border-[#006EAD] shadow-md hover:shadow-xl transition-all duration-300 relative group overflow-hidden">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-sky-50 text-[#006EAD] flex items-center justify-center border border-sky-200">
                        <i data-lucide="truck" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-mono font-bold text-[#006EAD] bg-sky-50 px-3 py-1 rounded-full border border-sky-200">
                        DIVISION 02
                    </span>
                </div>

                <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 mb-3 font-['Outfit']">
                    Commercial Automotive Tyres
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                    Radials engineered to master PNG conditions. From passenger sedans and 4WDs to heavy-duty Truck and Bus Radials (TBR) tackling the rugged Highlands corridor.
                </p>

                <!-- Core Brands Inside Division -->
                <div class="space-y-3 mb-8">
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-500">Featured Brands:</div>
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo e(route('brands.show', 'kapsen')); ?>" class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800 hover:border-[#006EAD] hover:text-[#006EAD] transition flex items-center gap-2">
                            <img src="<?php echo e(asset('images/brands/kapsen.png')); ?>" alt="Kapsen" class="h-3.5 w-auto object-contain">
                            <span>Kapsen Passenger, SUV &amp; Van</span>
                        </a>
                        <a href="<?php echo e(route('brands.show', 'long-march')); ?>" class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800 hover:border-[#006EAD] hover:text-[#006EAD] transition flex items-center gap-2">
                            <img src="<?php echo e(asset('images/brands/long-march.png')); ?>" alt="Long March" class="h-3 w-auto object-contain">
                            <span>Long March Heavy TBR (Truck &amp; Bus)</span>
                        </a>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo e(route('products.category', 'automotive')); ?>" class="text-xs font-bold text-[#006EAD] hover:text-[#00598E] flex items-center gap-1">
                        <span>Browse Automotive Tyre Range</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button @click="modalOpen = true" class="text-xs font-semibold text-slate-600 hover:text-slate-900 underline">
                        Request Fleet Tyre Quote
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Interactive Quick Wholesale Quote Estimator -->
<section class="py-16 bg-white relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-[#F0F7FD] border border-sky-200 p-8 sm:p-12 shadow-sm"
             x-data="{
                 sector: 'retailer',
                 volume: 'medium',
                 category: 'both',
                 get tierName() {
                     if(this.volume === 'high') return 'Tier 1 Prime Distributor Rate';
                     if(this.volume === 'medium') return 'Tier 2 Commercial Bulk Rate';
                     return 'Tier 3 Trade Wholesale Rate';
                 },
                 get discountEst() {
                     if(this.volume === 'high') return '18% - 24% off standard retail baseline';
                     if(this.volume === 'medium') return '12% - 17% off standard retail baseline';
                     return '8% - 12% off standard retail baseline';
                 }
             }">
            
            <div class="max-w-2xl mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-[#006EAD]">Fast-Track Pricing Estimator</span>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">Estimate Your B2B Wholesale Tier</h3>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">
                    Select your operation type and anticipated monthly volume to view Sens PNG's commercial account tier structure.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                <!-- Selectors -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Your Business Type</label>
                        <select x-model="sector" class="w-full px-3.5 py-2.5 rounded-xl bg-white border border-slate-300 text-xs text-slate-800 shadow-xs focus:border-[#006EAD]">
                            <option value="retailer">Supermarket / Retail Trade Store</option>
                            <option value="fleet">Commercial Fleet / Bus Operator</option>
                            <option value="wholesaler">Regional Wholesaler / Sub-Distributor</option>
                            <option value="mining">Mining / Logging / Industrial</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Estimated Monthly Purchasing Volume</label>
                        <select x-model="volume" class="w-full px-3.5 py-2.5 rounded-xl bg-white border border-slate-300 text-xs text-slate-800 shadow-xs focus:border-[#006EAD]">
                            <option value="low">1 - 3 Pallets / Under 30 Tyres (Trade Rate)</option>
                            <option value="medium">4 - 10 Pallets / 30 - 80 Tyres (Commercial Bulk)</option>
                            <option value="high">10+ Pallets / Full Container (Prime Rate)</option>
                        </select>
                    </div>
                </div>

                <!-- Live Tier Calculation Display -->
                <div class="p-6 rounded-2xl bg-white border border-sky-300 shadow-sm text-center space-y-2">
                    <span class="text-[11px] font-mono text-[#006EAD] uppercase tracking-wider block font-bold">Recommended Account Tier</span>
                    <div class="text-xl sm:text-2xl font-black text-slate-900" x-text="tierName"></div>
                    <div class="inline-block px-3 py-1 rounded-full bg-sky-100 text-[#006EAD] text-xs font-bold border border-sky-200" x-text="discountEst"></div>
                    <p class="text-[11px] text-slate-500 pt-2">Includes dedicated warehouse dispatch from Port Moresby or Lae.</p>
                </div>

                <!-- Launch Button -->
                <div class="text-center lg:text-left space-y-3">
                    <p class="text-xs text-slate-600">
                        Lock in your commercial terms and receive an official written price schedule within 24 hours.
                    </p>
                    <button @click="modalOpen = true" class="w-full py-3.5 px-6 rounded-xl font-bold text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-lg shadow-[#006EAD]/25 transition">
                        Lock In This Wholesale Rate
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Distribution Network & Logistics Hubs Spotlight -->
<section class="py-20 bg-white relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Strategic Logistics</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900">Dual Supply Hubs: Port Moresby &amp; Lae</h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Sens PNG eliminated supply delays by positioning fully staffed logistics depots and warehouse facilities in Papua New Guinea’s two primary commercial gateways.
                </p>

                <div class="space-y-4">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-5 rounded-2xl bg-[#F8FAFC] border border-slate-200 shadow-xs space-y-2">
                            <div class="flex items-center justify-between">
                                <h4 class="text-base font-bold text-slate-900 flex items-center gap-2">
                                    <i data-lucide="building-2" class="w-4 h-4 text-[#006EAD]"></i>
                                    <?php echo e($loc->name); ?>

                                </h4>
                                <?php if($loc->is_primary): ?>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-sky-100 text-[#006EAD] border border-sky-200">Headquarters</span>
                                <?php else: ?>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800 border border-amber-200">Depot Hub</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-slate-600"><?php echo e($loc->address); ?></p>
                            <div class="pt-2 text-xs flex items-center justify-between text-slate-500 border-t border-slate-200">
                                <span><?php echo e($loc->phone); ?></span>
                                <span class="text-[#006EAD] font-semibold"><?php echo e($loc->email); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <a href="<?php echo e(route('distribution')); ?>" class="inline-flex items-center gap-2 text-xs font-bold text-[#006EAD] hover:text-[#00598E]">
                    <span>Learn About Our Nationwide Supply Corridors</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Interactive 3D Three.js Logistics Visualizer Container -->
            <div class="lg:col-span-7">
                <div class="rounded-3xl bg-[#001D38] border border-cyan-500/30 overflow-hidden shadow-2xl relative mb-6">
                    <!-- Top 3D Control Bar -->
                    <div class="absolute top-3 sm:top-4 left-3 sm:left-4 right-3 sm:right-4 z-20 flex items-center justify-between text-[11px] font-mono">
                        <div class="flex items-center gap-1.5 px-2.5 sm:px-3 py-1 rounded-full bg-slate-900/80 border border-cyan-500/30 text-cyan-300 backdrop-blur-md">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                            <span class="text-[10px] sm:text-xs">19 TRADE ROUTES &bull; PNG LIVE</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-slate-400 text-[10px] hidden md:inline">&bull; Drag to rotate &bull;</span>
                            <button onclick="window.focusGlobePNG && window.focusGlobePNG()" type="button" 
                                    class="px-2.5 py-1 rounded-full bg-slate-900/85 hover:bg-[#006EAD] border border-cyan-400/40 text-cyan-200 hover:text-white transition flex items-center gap-1 text-[10px] font-semibold backdrop-blur-md cursor-pointer shadow-xs"
                                    title="Center globe on Papua New Guinea">
                                <i data-lucide="crosshair" class="w-3 h-3 text-cyan-300"></i>
                                <span>Focus PNG</span>
                            </button>
                        </div>
                    </div>

                    <!-- 3D Canvas Mounting Point -->
                    <div id="three-globe-canvas" class="w-full h-[360px] sm:h-[400px] cursor-grab active:cursor-grabbing select-none" style="touch-action: none;"></div>

                    <!-- Bottom Logistics Indicators -->
                    <div class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4 right-3 sm:right-4 z-20 grid grid-cols-2 gap-2 text-[11px]">
                        <div class="p-2 sm:p-2.5 rounded-xl bg-slate-950/85 border border-cyan-500/30 backdrop-blur-md">
                            <div class="flex items-center gap-1 text-cyan-400 font-bold">
                                <i data-lucide="map-pin" class="w-3 sm:w-3.5 h-3 sm:h-3.5 shrink-0"></i>
                                <span class="text-[10px] sm:text-xs">PORT MORESBY</span>
                            </div>
                            <p class="text-[9px] sm:text-[10px] text-slate-300 truncate">Wamco Haus, Hohola Depot</p>
                        </div>
                        <div class="p-2 sm:p-2.5 rounded-xl bg-slate-950/85 border border-amber-500/30 backdrop-blur-md">
                            <div class="flex items-center gap-1 text-amber-400 font-bold">
                                <i data-lucide="map-pin" class="w-3 sm:w-3.5 h-3 sm:h-3.5 shrink-0"></i>
                                <span class="text-[10px] sm:text-xs">LAE LOGISTICS</span>
                            </div>
                            <p class="text-[9px] sm:text-[10px] text-slate-300 truncate">Highlands Highway Link</p>
                        </div>
                    </div>
                </div>

                <!-- Hubs Breakdown Box -->
                <div class="rounded-3xl bg-[#F0F7FD] border border-sky-200 p-6 shadow-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-xl bg-white border border-slate-200 shadow-xs space-y-1.5">
                            <div class="font-bold text-[#006EAD] flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-[#006EAD]"></span>
                                Southern &amp; Islands Region
                            </div>
                            <p class="text-[11px] text-slate-600 leading-relaxed">
                                Port Moresby Wamco Haus: serving NCD, Central, Milne Bay, Gulf, Western, Oro, and Bougainville.
                            </p>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-slate-200 shadow-xs space-y-1.5">
                            <div class="font-bold text-amber-700 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                Momase &amp; Highlands Highway
                            </div>
                            <p class="text-[11px] text-slate-600 leading-relaxed">
                                Lae Industrial Depot: dispatching along the Highlands Highway to Goroka, Mt Hagen, and Madang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Founder & Leadership Section -->
<?php if($leader): ?>
<section class="py-20 bg-[#F8FAFC] relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="rounded-3xl bg-white border border-slate-200 p-8 sm:p-12 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <div class="lg:col-span-4 flex justify-center">
                    <div class="relative w-64 sm:w-72 aspect-[4/4.5] rounded-2xl overflow-hidden border-2 border-sky-200 shadow-lg bg-slate-100">
                        <img src="<?php echo e(asset($leader->photo)); ?>" alt="<?php echo e($leader->name); ?>" class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="text-lg font-bold text-white"><?php echo e($leader->name); ?></div>
                            <div class="text-xs text-amber-300 font-semibold"><?php echo e($leader->role_title); ?></div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-5">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Leadership &amp; Governance</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-slate-900 font-['Outfit']">
                        Built On Decades of Commercial Leadership in PNG
                    </h2>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        <?php echo e($leader->bio); ?>

                    </p>

                    <blockquote class="p-4 rounded-xl bg-sky-50/70 border-l-4 border-[#006EAD] text-slate-700 text-xs sm:text-sm italic leading-relaxed">
                        "<?php echo e($leader->quote); ?>"
                    </blockquote>

                    <div class="pt-2 flex flex-wrap gap-6 text-xs text-slate-500">
                        <div class="flex items-center gap-2">
                            <i data-lucide="award" class="w-4 h-4 text-[#006EAD]"></i>
                            <span><?php echo e($leader->experience_summary); ?></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                            <span>100% PNG Registered &amp; Compliant</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<?php endif; ?>

<!-- Direct Wholesale Enquiry Section -->
<section id="enquiry" class="py-20 bg-white relative reveal-on-scroll">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center space-y-4 mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Partner With Us</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900">Open A Wholesale Account Today</h2>
            <p class="text-xs sm:text-sm text-slate-500 max-w-xl mx-auto">
                Fill in your company credentials to request official price schedules, trade credit applications, or container volume rates.
            </p>
        </div>

        <div class="rounded-3xl bg-slate-50/80 border border-slate-200 p-8 sm:p-10 shadow-lg">
            <form action="<?php echo e(route('enquiry.submit')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Business Name *</label>
                        <input type="text" name="business_name" required placeholder="e.g. Highlands Commercial Supermarket"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Contact Person *</label>
                        <input type="text" name="contact_name" required placeholder="e.g. Navin K. / Procurement Manager"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Email Address *</label>
                        <input type="email" name="email" required placeholder="procurement@business.com.pg"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Contact Phone *</label>
                        <input type="text" name="phone" required placeholder="+675 7XXXXXXX / 8XXXXXXX"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Your Operating Province *</label>
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
                            <option value="Autonomous Region of Bougainville">Autonomous Region of Bougainville</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Business Classification *</label>
                        <select name="business_type" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="Supermarket / Retail Chain">Supermarket / Retail Chain</option>
                            <option value="Independent Trade Store">Independent Trade Store</option>
                            <option value="Wholesaler / Sub-Distributor">Wholesaler / Sub-Distributor</option>
                            <option value="Commercial Transport / Bus Operator">Commercial Transport / Bus Operator</option>
                            <option value="Mining / Logging / Industrial Operation">Mining / Logging / Industrial Operation</option>
                            <option value="Bakery / Food Service Enterprise">Bakery / Food Service Enterprise</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Product Category of Interest *</label>
                        <select name="category_interest" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                            <option value="FMCG Food Provisions (Punjas, Happy Mum, Nachorittos)">FMCG Provisions (Flour, Oil, Fish, Snacks)</option>
                            <option value="Commercial Automotive Tyres (Kapsen, Long March)">Automotive &amp; Heavy Fleet Tyres</option>
                            <option value="Both FMCG and Automotive Lines">Both FMCG &amp; Automotive Lines</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Estimated Monthly Requirement</label>
                        <input type="text" name="estimated_volume" placeholder="e.g. 200 bags flour / 20 TBR tyres"
                               class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Enquiry Details &amp; Specifications *</label>
                    <textarea name="message" rows="4" required placeholder="Tell us your target delivery destination, brands of interest, or questions regarding account setup..."
                              class="w-full px-4 py-3 rounded-xl bg-white border border-slate-300 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] transition"></textarea>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs text-slate-500 flex items-center gap-2">
                        <i data-lucide="shield-check" class="w-5 h-5 text-emerald-600"></i>
                        <span>Strict wholesale privacy. Immediate lead dispatch to POM &amp; Lae teams.</span>
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-10 py-4 rounded-xl font-bold text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-xl shadow-[#006EAD]/25 transition duration-300">
                        Submit Wholesale Application
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/home.blade.php ENDPATH**/ ?>