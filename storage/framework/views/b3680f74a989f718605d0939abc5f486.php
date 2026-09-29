<?php $__env->startSection('title', 'Wholesale Product Inventory & Brands — Sens PNG'); ?>
<?php $__env->startSection('meta_description', 'Explore Sens PNG wholesale catalog including Punjas flour, Happy Mum provisions, Nachorittos snacks, Kapsen passenger radials, and Long March heavy fleet tyres.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header Banner -->
<section class="py-12 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Inventory Catalog</span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mt-1">Wholesale Products &amp; Brands</h1>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">Continuous buffer stock ready for immediate pallet and container dispatch.</p>
            </div>
            
            <button @click="modalOpen = true" class="px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-[#006EAD] hover:bg-[#00598E] transition self-start md:self-auto shadow-md">
                Request Master Price Schedule
            </button>
        </div>
    </div>
</section>

<!-- Filter & Search Bar -->
<section class="py-6 bg-[#F8FAFC] border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="<?php echo e(route('products')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            
            <!-- Keyword Search -->
            <div class="md:col-span-5 relative">
                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search products, tyre sizes (e.g. 295/80, 265/65), codes..."
                       class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white border border-slate-300 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#006EAD] focus:ring-1 focus:ring-[#006EAD] shadow-xs">
            </div>

            <!-- Category Filter -->
            <div class="md:col-span-3">
                <select name="category" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 rounded-xl bg-white border border-slate-300 text-xs text-slate-800 focus:outline-none focus:border-[#006EAD] shadow-xs">
                    <option value="">All Divisions</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->slug); ?>" <?php echo e((request('category') == $cat->slug || (isset($activeCategory) && $activeCategory && $activeCategory->id == $cat->id)) ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Brand Filter -->
            <div class="md:col-span-3">
                <select name="brand" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 rounded-xl bg-white border border-slate-300 text-xs text-slate-800 focus:outline-none focus:border-[#006EAD] shadow-xs">
                    <option value="">All Brands</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($b->slug); ?>" <?php echo e((request('brand') == $b->slug || (isset($activeBrand) && $activeBrand && $activeBrand->id == $b->id)) ? 'selected' : ''); ?>>
                            <?php echo e($b->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Submit Filter Button -->
            <div class="md:col-span-1">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-[#006EAD] hover:bg-[#00598E] text-white font-bold text-xs transition flex items-center justify-center shadow-xs">
                    <i data-lucide="filter" class="w-4 h-4"></i>
                </button>
            </div>

        </form>

        <!-- Active Filter Tags -->
        <?php if(request('q') || request('category') || request('brand') || isset($activeCategory)): ?>
            <div class="flex items-center gap-2 mt-4 text-xs">
                <span class="text-slate-500">Active filters:</span>
                <?php if(request('q')): ?>
                    <span class="px-2.5 py-1 rounded bg-sky-100 text-[#006EAD] font-mono text-[11px]">Keyword: "<?php echo e(request('q')); ?>"</span>
                <?php endif; ?>
                <?php if(request('category') || isset($activeCategory)): ?>
                    <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 font-mono text-[11px]">Division: <?php echo e($activeCategory ? $activeCategory->name : request('category')); ?></span>
                <?php endif; ?>
                <?php if(request('brand')): ?>
                    <span class="px-2.5 py-1 rounded bg-sky-100 text-[#006EAD] font-mono text-[11px]">Brand: <?php echo e(request('brand')); ?></span>
                <?php endif; ?>
                <a href="<?php echo e(route('products')); ?>" class="text-[#006EAD] hover:underline ml-2">Clear all</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Products Display Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if($products->count() > 0): ?>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl sm:rounded-2xl bg-white overflow-hidden border border-slate-200 hover:border-[#006EAD] hover:shadow-lg transition flex flex-col group">
                        
                        <!-- Image Container -->
                        <div class="relative h-36 sm:h-48 bg-slate-50 overflow-hidden flex items-center justify-center p-2.5 sm:p-4">
                            <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            
                            <div class="absolute top-2 left-2 sm:top-3 sm:left-3">
                                <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded text-[8px] sm:text-[10px] font-bold uppercase tracking-wider <?php echo e($product->category->slug === 'fmcg' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-sky-100 text-[#006EAD] border border-sky-200'); ?>">
                                    <?php echo e($product->brand->name); ?>

                                </span>
                            </div>
                        </div>

                        <!-- Content Details -->
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
                                    <span class="hidden sm:inline">View Full Specs</span>
                                    <span class="sm:hidden">Specs</span>
                                </a>
                                <button @click="modalOpen = true" class="px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg bg-sky-50 hover:bg-[#006EAD] text-[#006EAD] hover:text-white text-[10px] sm:text-xs font-bold border border-sky-200 transition shrink-0">
                                    <span class="hidden sm:inline">Request Quote</span>
                                    <span class="sm:hidden">Quote</span>
                                </button>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php echo e($products->links()); ?>

            </div>

        <?php else: ?>
            <div class="text-center py-20 rounded-3xl bg-slate-50 border border-slate-200 p-8">
                <i data-lucide="package-search" class="w-12 h-12 text-slate-400 mx-auto mb-3"></i>
                <h3 class="text-lg font-bold text-slate-900">No products found</h3>
                <p class="text-xs text-slate-500 mt-1">Try adjusting your search criteria or clear your current filters.</p>
                <a href="<?php echo e(route('products')); ?>" class="inline-block mt-4 px-5 py-2 rounded-xl bg-[#006EAD] text-white font-bold text-xs shadow-xs">
                    Reset Catalog Filters
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/products/index.blade.php ENDPATH**/ ?>