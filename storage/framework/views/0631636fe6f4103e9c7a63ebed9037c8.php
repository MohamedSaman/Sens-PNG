<?php $__env->startSection('title', $brand->name . ' — Official Wholesale Distribution PNG | Sens PNG'); ?>
<?php $__env->startSection('meta_description', $brand->tagline); ?>

<?php $__env->startSection('content'); ?>
<!-- Brand Hero Banner -->
<section class="py-16 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-8 space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-sky-100 text-[#006EAD] border border-sky-200">
                        Official PNG Distributor
                    </span>
                    <?php if($brand->badge_text): ?>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 text-amber-800 border border-amber-200">
                            <?php echo e($brand->badge_text); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 font-['Outfit']"><?php echo e($brand->name); ?></h1>
                <p class="text-lg text-slate-700 font-medium"><?php echo e($brand->tagline); ?></p>
                <p class="text-sm text-slate-600 leading-relaxed max-w-2xl"><?php echo e($brand->description); ?></p>

                <div class="pt-2 flex items-center gap-4 text-xs text-slate-500">
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="globe" class="w-4 h-4 text-[#006EAD]"></i>
                        <span>Origin: <strong class="text-slate-900"><?php echo e($brand->country_of_origin); ?></strong></span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="package-check" class="w-4 h-4 text-emerald-600"></i>
                        <span>Stocked in POM &amp; Lae</span>
                    </div>
                </div>
            </div>

            <!-- Brand Logo Card -->
            <div class="lg:col-span-4 flex justify-center">
                <div class="w-full max-w-sm rounded-3xl bg-white p-6 sm:p-8 border border-slate-200 shadow-sm flex flex-col items-center justify-center space-y-5">
                    <div class="w-full h-28 rounded-2xl bg-slate-50/80 border border-slate-100 flex items-center justify-center p-3">
                        <img src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e($brand->name); ?>" class="max-h-20 max-w-full object-contain filter drop-shadow-sm transition-transform duration-300 hover:scale-105">
                    </div>
                    <button @click="modalOpen = true" class="w-full py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-[#006EAD] hover:bg-[#00598E] transition shadow-md cursor-pointer">
                        Enquire for <?php echo e($brand->name); ?>

                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Brand Products Showcase -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-10 pb-4 border-b border-slate-200">
            <div>
                <h3 class="text-2xl font-bold text-slate-900 font-['Outfit']"><?php echo e($brand->name); ?> Product Range in Papua New Guinea</h3>
                <p class="text-xs text-slate-500 mt-1">Showing <?php echo e($products->count()); ?> wholesale stock items available for immediate order.</p>
            </div>
            <a href="<?php echo e(route('products')); ?>" class="text-xs font-semibold text-[#006EAD] hover:underline flex items-center gap-1">
                <span>All Brands</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-8">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-xl sm:rounded-2xl bg-white overflow-hidden border border-slate-200 hover:border-[#006EAD] hover:shadow-lg transition flex flex-col group">
                    <div class="relative h-36 sm:h-52 bg-slate-50 flex items-center justify-center p-2.5 sm:p-4">
                        <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-3 sm:p-6 flex-1 flex flex-col justify-between space-y-2.5 sm:space-y-4">
                        <div>
                            <div class="text-[10px] sm:text-xs font-mono text-[#006EAD] font-bold mb-0.5 sm:mb-1"><?php echo e($product->product_code); ?></div>
                            <h4 class="text-xs sm:text-lg font-bold text-slate-900 group-hover:text-[#006EAD] transition line-clamp-2 leading-tight">
                                <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                            </h4>
                            <p class="text-[11px] sm:text-xs text-slate-500 mt-1 sm:mt-2 line-clamp-2 hidden sm:block"><?php echo e($product->short_description); ?></p>
                            <div class="mt-2 sm:mt-3 p-1.5 sm:p-2 rounded sm:rounded-lg bg-slate-50 border border-slate-200 text-[10px] sm:text-xs text-slate-600 flex items-center justify-between">
                                <span class="text-slate-400">Pack:</span>
                                <span class="font-bold text-slate-800 truncate ml-1"><?php echo e($product->package_size); ?></span>
                            </div>
                        </div>

                        <div class="pt-2 sm:pt-4 border-t border-slate-100 flex items-center justify-between gap-1.5 sm:gap-2">
                            <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="text-[11px] sm:text-xs font-semibold text-slate-600 hover:text-[#006EAD] transition truncate">
                                <span class="hidden sm:inline">View Technical Specs</span>
                                <span class="sm:hidden">Specs</span>
                            </a>
                            <button @click="modalOpen = true" class="px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded sm:rounded-lg bg-sky-50 text-[#006EAD] hover:bg-[#006EAD] hover:text-white font-bold text-[10px] sm:text-xs transition border border-sky-200 shrink-0">
                                Quote
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/brands/show.blade.php ENDPATH**/ ?>