<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?> — Sens PNG</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#07111D] text-slate-100 min-h-screen flex flex-col md:flex-row antialiased font-['Plus_Jakarta_Sans']">
    
    <!-- Admin Sidebar (Fixed Desktop, Collapsible Mobile) -->
    <aside class="w-full md:w-68 bg-[#091524] border-b md:border-b-0 md:border-r border-slate-800/80 p-5 flex flex-col justify-between shrink-0 shadow-2xl relative z-30">
        <div class="space-y-6">
            <!-- Brand & Console Title -->
            <div class="flex items-center gap-3 pb-5 border-b border-slate-800/70">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-2.5 group">
                    <img src="<?php echo e(asset('images/brands/spl-emblem-white.png')); ?>?v=2" alt="Sens PNG" class="h-9 w-auto object-contain transition group-hover:scale-105">
                    <div>
                        <span class="text-base font-black tracking-tight text-white font-['Outfit'] block leading-tight">Sens PNG</span>
                        <span class="text-[10px] font-mono uppercase tracking-wider text-cyan-400 font-bold block">Operations Console</span>
                    </div>
                </a>
            </div>

            <!-- Operations Hub Active Badge -->
            <div class="px-3 py-2 rounded-xl bg-slate-900/80 border border-slate-800 flex items-center justify-between text-[11px]">
                <div class="flex items-center gap-2 text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="font-medium">POM &amp; Lae Network</span>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400 font-mono">Live</span>
            </div>

            <!-- Navigation Sections -->
            <nav class="space-y-4">
                <!-- Group 1: Operations -->
                <div class="space-y-1">
                    <span class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1.5 font-mono">Operations</span>
                    
                    <a href="<?php echo e(route('admin.dashboard')); ?>" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-[#006EAD] text-white font-bold shadow-lg shadow-sky-900/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60'); ?>">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="layout-dashboard" class="w-4 h-4 <?php echo e(request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400'); ?>"></i>
                            <span>Dashboard Overview</span>
                        </div>
                    </a>

                    <?php
                        $pendingEnquiriesCount = \App\Models\Enquiry::where('status', 'new')->count();
                    ?>
                    <a href="<?php echo e(route('admin.enquiries')); ?>" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition <?php echo e(request()->routeIs('admin.enquiries*') ? 'bg-[#006EAD] text-white font-bold shadow-lg shadow-sky-900/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60'); ?>">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="inbox" class="w-4 h-4 <?php echo e(request()->routeIs('admin.enquiries*') ? 'text-white' : 'text-slate-400'); ?>"></i>
                            <span>Wholesale Enquiries</span>
                        </div>
                        <?php if($pendingEnquiriesCount > 0): ?>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-cyan-400 text-slate-950 font-mono">
                                <?php echo e($pendingEnquiriesCount); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Group 2: Catalog & Brands -->
                <div class="space-y-1 pt-2">
                    <span class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1.5 font-mono">Commercial Portfolios</span>

                    <a href="<?php echo e(route('admin.products')); ?>" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition <?php echo e(request()->routeIs('admin.products*') ? 'bg-[#006EAD] text-white font-bold shadow-lg shadow-sky-900/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60'); ?>">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="boxes" class="w-4 h-4 <?php echo e(request()->routeIs('admin.products*') ? 'text-white' : 'text-slate-400'); ?>"></i>
                            <span>Products &amp; SKUs</span>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400"><?php echo e(\App\Models\Product::count()); ?></span>
                    </a>

                    <a href="<?php echo e(route('admin.brands')); ?>" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition <?php echo e(request()->routeIs('admin.brands*') ? 'bg-[#006EAD] text-white font-bold shadow-lg shadow-sky-900/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60'); ?>">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="tag" class="w-4 h-4 <?php echo e(request()->routeIs('admin.brands*') ? 'text-white' : 'text-slate-400'); ?>"></i>
                            <span>Brand Partners</span>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400"><?php echo e(\App\Models\Brand::count()); ?></span>
                    </a>
                </div>

                <!-- Group 3: System Preferences -->
                <div class="space-y-1 pt-2">
                    <span class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1.5 font-mono">Configuration</span>

                    <a href="<?php echo e(route('admin.settings')); ?>" 
                       class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition <?php echo e(request()->routeIs('admin.settings*') ? 'bg-[#006EAD] text-white font-bold shadow-lg shadow-sky-900/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60'); ?>">
                        <i data-lucide="sliders-horizontal" class="w-4 h-4 <?php echo e(request()->routeIs('admin.settings*') ? 'text-white' : 'text-slate-400'); ?>"></i>
                        <span>Site Settings</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Footer: User Card & Actions -->
        <div class="pt-5 border-t border-slate-800/80 space-y-3">
            <div class="p-2.5 rounded-xl bg-slate-900/90 border border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-[#006EAD] text-white font-bold flex items-center justify-center text-xs font-mono">
                        SP
                    </div>
                    <div>
                        <span class="text-xs font-bold text-white block leading-tight">Admin User</span>
                        <span class="text-[10px] text-slate-400">Operations Lead</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between gap-2 pt-1 text-xs">
                <a href="<?php echo e(route('home')); ?>" target="_blank" class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 hover:text-cyan-400 transition border border-white/5 text-[11px] font-medium">
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    <span>Live Website</span>
                </a>
                
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="p-2 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition border border-red-500/20" title="Sign Out">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area with Top Bar -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen bg-[#07111D] overflow-y-auto">
        
        <!-- Executive Top Bar -->
        <header class="h-16 px-6 md:px-10 bg-[#091524]/90 backdrop-blur-md border-b border-slate-800/80 flex items-center justify-between shrink-0 sticky top-0 z-20">
            <div class="flex items-center gap-3">
                <span class="text-xs font-mono uppercase tracking-wider text-slate-400">Sens PNG Portal</span>
                <span class="text-slate-600">/</span>
                <span class="text-xs font-bold text-white"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></span>
            </div>

            <div class="flex items-center gap-4">
                <!-- Location & Time -->
                <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-800 text-[11px] text-slate-300 font-mono">
                    <i data-lucide="clock" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>Port Moresby Hub (GMT+10)</span>
                </div>

                <a href="<?php echo e(route('home')); ?>" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-[#006EAD] hover:bg-[#005A8F] text-white text-xs font-bold transition shadow-sm">
                    <i data-lucide="globe" class="w-3.5 h-3.5"></i>
                    <span>Sens PNG Live</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 md:p-10 space-y-8">
            <?php if(session('success')): ?>
                <div class="p-4 rounded-2xl bg-emerald-950/70 border border-emerald-500/40 text-xs text-emerald-300 flex items-center justify-between shadow-xl">
                    <div class="flex items-center gap-2.5">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                        <span class="font-medium"><?php echo e(session('success')); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
        
        <!-- Footer -->
        <footer class="px-6 md:px-10 py-4 border-t border-slate-800/60 text-[11px] text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div>&copy; <?php echo e(date('Y')); ?> Sens PNG Limited. All Rights Reserved. Port Moresby &amp; Lae Wholesale Network.</div>
            <div class="font-mono text-[10px]">CMS Operations v2.4</div>
        </footer>
    </div>

</body>
</html>
<?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/layouts/admin.blade.php ENDPATH**/ ?>