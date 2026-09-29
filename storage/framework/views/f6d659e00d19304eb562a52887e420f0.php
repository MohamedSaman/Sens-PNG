<?php $__env->startSection('title', 'Operations & CMS Overview'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    
    <!-- Top Welcome Banner & Overview -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-2">
        <div>
            <div class="flex items-center gap-2.5 mb-1">
                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-mono">Sens PNG Limited</span>
                <span class="text-slate-500 text-xs">•</span>
                <span class="text-xs text-slate-400">Central Operations Dashboard</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white font-['Outfit'] tracking-tight">Wholesale Operations Command Center</h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">Live customer inquiry pipeline, active commercial SKU inventories, and national distribution status.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.enquiries')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-xs transition shadow-lg shadow-cyan-500/20 cursor-pointer">
                <i data-lucide="inbox" class="w-4 h-4"></i>
                <span>Review Inquiries</span>
                <?php if($newEnquiries > 0): ?>
                    <span class="ml-1 px-1.5 py-0.2 rounded-full bg-slate-950 text-cyan-300 text-[10px] font-mono"><?php echo e($newEnquiries); ?></span>
                <?php endif; ?>
            </a>

            <a href="<?php echo e(route('admin.products')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white font-semibold text-xs border border-slate-700 transition cursor-pointer">
                <i data-lucide="boxes" class="w-4 h-4 text-amber-400"></i>
                <span>Manage SKUs</span>
            </a>
        </div>
    </div>

    <!-- 4 High-Contrast Executive Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Card 1: New Inquiries -->
        <div class="p-6 rounded-2xl bg-[#0B1A2D] border border-cyan-500/30 hover:border-cyan-400/60 shadow-xl transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-cyan-500 to-sky-400"></div>
            
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-wider font-mono">New Inquiries</span>
                <div class="w-9 h-9 rounded-xl bg-cyan-500/10 border border-cyan-500/25 flex items-center justify-center text-cyan-400">
                    <i data-lucide="inbox" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="text-3xl sm:text-4xl font-black text-cyan-400 font-['Outfit'] tracking-tight mb-1"><?php echo e($newEnquiries); ?></div>
            <p class="text-[11px] text-slate-400 mb-4">Awaiting account rep response</p>

            <a href="<?php echo e(route('admin.enquiries', ['status' => 'new'])); ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-cyan-400 hover:text-cyan-300 transition group-hover:translate-x-0.5">
                <span>View pending queue</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <!-- Card 2: Total B2B Leads -->
        <div class="p-6 rounded-2xl bg-[#0B1A2D] border border-slate-800 hover:border-slate-700 shadow-xl transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-blue-600 to-indigo-500"></div>

            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-wider font-mono">Total B2B Leads</span>
                <div class="w-9 h-9 rounded-xl bg-blue-500/10 border border-blue-500/25 flex items-center justify-center text-blue-400">
                    <i data-lucide="building-2" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="text-3xl sm:text-4xl font-black text-white font-['Outfit'] tracking-tight mb-1"><?php echo e($totalEnquiries); ?></div>
            <p class="text-[11px] text-slate-400 mb-4">Retailers, traders &amp; fleets logged</p>

            <a href="<?php echo e(route('admin.enquiries')); ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-400 hover:text-blue-300 transition group-hover:translate-x-0.5">
                <span>Merchant registry</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <!-- Card 3: Active Products -->
        <div class="p-6 rounded-2xl bg-[#0B1A2D] border border-slate-800 hover:border-slate-700 shadow-xl transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500 to-amber-300"></div>

            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-wider font-mono">Active Products</span>
                <div class="w-9 h-9 rounded-xl bg-amber-500/10 border border-amber-500/25 flex items-center justify-center text-amber-400">
                    <i data-lucide="boxes" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="text-3xl sm:text-4xl font-black text-amber-400 font-['Outfit'] tracking-tight mb-1"><?php echo e($totalProducts); ?></div>
            <p class="text-[11px] text-slate-400 mb-4">FMCG &amp; Commercial Tyre SKUs</p>

            <a href="<?php echo e(route('admin.products')); ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-400 hover:text-amber-300 transition group-hover:translate-x-0.5">
                <span>Explore full inventory</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <!-- Card 4: Brochures Downloaded -->
        <div class="p-6 rounded-2xl bg-[#0B1A2D] border border-slate-800 hover:border-slate-700 shadow-xl transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>

            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-wider font-mono">Trade Downloads</span>
                <div class="w-9 h-9 rounded-xl bg-emerald-500/10 border border-emerald-500/25 flex items-center justify-center text-emerald-400">
                    <i data-lucide="file-down" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="text-3xl sm:text-4xl font-black text-emerald-400 font-['Outfit'] tracking-tight mb-1"><?php echo e(number_format($totalDownloads)); ?></div>
            <p class="text-[11px] text-slate-400 mb-4">Account forms &amp; technical specs</p>

            <a href="<?php echo e(route('downloads')); ?>" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition group-hover:translate-x-0.5">
                <span>View public documents</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

    </div>

    <!-- Dual Hub Operations Readiness Banner -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <!-- Port Moresby Hub -->
        <div class="p-4 rounded-2xl bg-[#091524] border border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                    <i data-lucide="map-pin" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-white font-['Outfit']">Port Moresby Hub</span>
                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Active</span>
                    </div>
                    <p class="text-[11px] text-slate-400">Unit G4 Wamco Haus, Hohola — FMCG &amp; Automotive Logistics</p>
                </div>
            </div>
            <span class="text-[11px] font-mono text-slate-400 hidden sm:block">Southern Region</span>
        </div>

        <!-- Lae Logistics Hub -->
        <div class="p-4 rounded-2xl bg-[#091524] border border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-sky-500/10 border border-sky-500/20 flex items-center justify-center text-sky-400 shrink-0">
                    <i data-lucide="map-pin" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-white font-['Outfit']">Lae Logistics Hub</span>
                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Active</span>
                    </div>
                    <p class="text-[11px] text-slate-400">Highlands Highway Freight Depot — Fleet TBR Tyre Buffer</p>
                </div>
            </div>
            <span class="text-[11px] font-mono text-slate-400 hidden sm:block">Momase &amp; Highlands</span>
        </div>

    </div>

    <!-- Core Grid: Recent Inquiries (7 cols) + Commercial Status (5 cols) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- LEFT: Recent Inquiries Table / State (7 cols) -->
        <div class="lg:col-span-7 space-y-4">
            <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-6 sm:p-7">
                <div class="flex items-center justify-between pb-4 border-b border-slate-800/80 mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-white font-['Outfit'] flex items-center gap-2">
                            <span>Recent Wholesale Inquiries</span>
                            <?php if($totalEnquiries > 0): ?>
                                <span class="text-xs font-mono px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 font-normal"><?php echo e($totalEnquiries); ?></span>
                            <?php endif; ?>
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">Online customer quote and account applications.</p>
                    </div>
                    <a href="<?php echo e(route('admin.enquiries')); ?>" class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 transition flex items-center gap-1">
                        <span>View All</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <?php if($recentEnquiries->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider text-[10px]">
                                    <th class="py-3 px-3">Reference</th>
                                    <th class="py-3 px-3">Business</th>
                                    <th class="py-3 px-3">Contact</th>
                                    <th class="py-3 px-3">Province</th>
                                    <th class="py-3 px-3">Status</th>
                                    <th class="py-3 px-3 text-right">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60">
                                <?php $__currentLoopData = $recentEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-slate-800/40 transition">
                                        <td class="py-3.5 px-3 font-mono font-bold text-cyan-400">
                                            <a href="<?php echo e(route('admin.enquiries')); ?>" class="hover:underline"><?php echo e($enq->reference_no); ?></a>
                                        </td>
                                        <td class="py-3.5 px-3 font-semibold text-white"><?php echo e($enq->business_name); ?></td>
                                        <td class="py-3.5 px-3 text-slate-300"><?php echo e($enq->contact_name); ?></td>
                                        <td class="py-3.5 px-3 text-slate-400"><?php echo e($enq->province); ?></td>
                                        <td class="py-3.5 px-3">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider
                                                <?php echo e($enq->status === 'new' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : ''); ?>

                                                <?php echo e($enq->status === 'contacted' ? 'bg-amber-500/20 text-amber-300 border border-amber-500/30' : ''); ?>

                                                <?php echo e($enq->status === 'in_review' ? 'bg-indigo-500/20 text-indigo-300 border border-indigo-500/30' : ''); ?>

                                                <?php echo e($enq->status === 'closed' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : ''); ?>

                                            ">
                                                <?php echo e($enq->status); ?>

                                            </span>
                                        </td>
                                        <td class="py-3.5 px-3 text-right text-slate-400 font-mono"><?php echo e($enq->created_at->format('M d')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- Clean, Informative Empty State -->
                    <div class="py-12 px-4 text-center space-y-3">
                        <div class="w-14 h-14 rounded-2xl bg-slate-900 border border-slate-800 text-slate-500 mx-auto flex items-center justify-center">
                            <i data-lucide="inbox" class="w-7 h-7 text-cyan-400/60"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white font-['Outfit']">No Pending Customer Inquiries</h4>
                            <p class="text-xs text-slate-400 max-w-sm mx-auto mt-1">
                                When independent supermarkets, trade stores, or commercial fleets apply for wholesale accounts or request quotes on the website, they will appear here in real-time.
                            </p>
                        </div>
                        <div class="pt-2">
                            <a href="<?php echo e(route('contact')); ?>" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold border border-slate-700 transition">
                                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                <span>Preview Live Wholesale Application Form</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT: Brand Portfolios & Quick SKU Overview (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Brand Partners Widget -->
            <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-6">
                <div class="flex items-center justify-between pb-3 border-b border-slate-800/80 mb-4">
                    <div>
                        <h3 class="text-base font-bold text-white font-['Outfit']">Authorized Brand Portfolios</h3>
                        <p class="text-xs text-slate-400">Represented global manufacturers</p>
                    </div>
                    <a href="<?php echo e(route('admin.brands')); ?>" class="text-xs font-semibold text-cyan-400 hover:underline">
                        Manage &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('admin.products', ['brand' => $brand->slug])); ?>" 
                           class="p-2.5 rounded-xl bg-slate-900/80 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 flex flex-col items-center justify-center text-center transition group">
                            <div class="h-8 flex items-center justify-center mb-1">
                                <img src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e($brand->name); ?>" class="max-h-7 max-w-full object-contain filter drop-shadow-sm group-hover:scale-105 transition">
                            </div>
                            <span class="text-[11px] font-semibold text-slate-200 group-hover:text-white truncate w-full"><?php echo e($brand->name); ?></span>
                            <span class="text-[9px] font-mono text-cyan-400"><?php echo e($brand->products_count); ?> SKUs</span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Recent Catalog SKUs Widget -->
            <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-6">
                <div class="flex items-center justify-between pb-3 border-b border-slate-800/80 mb-3">
                    <div>
                        <h3 class="text-base font-bold text-white font-['Outfit']">Featured Wholesale Inventory</h3>
                        <p class="text-xs text-slate-400">Live products across FMCG &amp; Tyres</p>
                    </div>
                    <a href="<?php echo e(route('admin.products')); ?>" class="text-xs font-semibold text-cyan-400 hover:underline">
                        All SKUs &rarr;
                    </a>
                </div>

                <div class="space-y-2.5">
                    <?php $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-2.5 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center p-1 shrink-0">
                                    <img src="<?php echo e(asset($prod->image)); ?>" alt="<?php echo e($prod->name); ?>" class="max-h-full max-w-full object-contain">
                                </div>
                                <div class="min-w-0">
                                    <div class="text-xs font-bold text-white truncate"><?php echo e($prod->name); ?></div>
                                    <div class="text-[10px] font-mono text-slate-400"><?php echo e($prod->product_code); ?> • <?php echo e($prod->package_size); ?></div>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase shrink-0 <?php echo e($prod->category->slug === 'fmcg' ? 'bg-amber-500/15 text-amber-300 border border-amber-500/30' : 'bg-sky-500/15 text-sky-300 border border-sky-500/30'); ?>">
                                <?php echo e($prod->brand->name); ?>

                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>