<?php $__env->startSection('title', $product->name . ' — Wholesale Supply | Sens PNG'); ?>
<?php $__env->startSection('meta_description', $product->short_description); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumbs -->
<div class="bg-[#F8FAFC] border-b border-slate-200 py-3 text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2">
        <a href="<?php echo e(route('home')); ?>" class="hover:text-[#006EAD]">Home</a>
        <span>/</span>
        <a href="<?php echo e(route('products')); ?>" class="hover:text-[#006EAD]">Products</a>
        <span>/</span>
        <a href="<?php echo e(route('products.category', $product->category->slug)); ?>" class="hover:text-[#006EAD]"><?php echo e($product->category->name); ?></a>
        <span>/</span>
        <span class="text-slate-900 font-semibold truncate"><?php echo e($product->name); ?></span>
    </div>
</div>

<!-- Product Detail Hero -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: High-Res Image Display -->
            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden border border-slate-200 p-6 bg-slate-50 flex items-center justify-center relative shadow-sm">
                    <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-auto max-h-[420px] object-contain rounded-2xl">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider <?php echo e($product->category->slug === 'fmcg' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-sky-100 text-[#006EAD] border border-sky-300'); ?>">
                            <?php echo e($product->brand->name); ?>

                        </span>
                    </div>
                </div>

                <!-- Logistics Availability Badge -->
                <div class="mt-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                    <div class="text-xs">
                        <strong class="text-emerald-950 block">Stocked in POM &amp; Lae Warehouses</strong>
                        <span class="text-emerald-700">Available for pallet freight or 20ft container booking.</span>
                    </div>
                </div>
            </div>

            <!-- Right: Product Specifications & Commercial Actions -->
            <div class="lg:col-span-7 space-y-6">
                
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-xs font-mono text-[#006EAD] font-bold"><?php echo e($product->product_code); ?></span>
                        <span class="text-slate-400">&bull;</span>
                        <a href="<?php echo e(route('brands.show', $product->brand->slug)); ?>" class="text-xs text-amber-600 hover:underline font-semibold"><?php echo e($product->brand->name); ?></a>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 font-['Outfit']"><?php echo e($product->name); ?></h1>
                    <p class="text-sm text-slate-600 mt-3 leading-relaxed"><?php echo e($product->short_description); ?></p>
                </div>

                <!-- Packaging Metric Pill -->
                <div class="p-4 rounded-2xl bg-[#F0F7FD] border border-sky-200 flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-500 block">Packaging / Fitment Spec:</span>
                        <span class="text-base font-bold text-slate-900"><?php echo e($product->package_size); ?></span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-white text-[#006EAD] border border-sky-200 text-xs font-mono font-bold shadow-xs">Wholesale Only</span>
                </div>

                <!-- Description -->
                <?php if($product->description): ?>
                    <div class="space-y-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500">Product Overview</h4>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed"><?php echo e($product->description); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Technical Specifications Table -->
                <?php if($product->specifications && count($product->specifications) > 0): ?>
                    <div class="space-y-3">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500">Technical Specifications</h4>
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-white shadow-xs">
                            <table class="w-full text-left text-xs">
                                <tbody>
                                    <?php $__currentLoopData = $product->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="border-b border-slate-100 last:border-0 hover:bg-slate-50">
                                            <td class="py-3 px-4 text-slate-500 font-medium w-1/3"><?php echo e($label); ?></td>
                                            <td class="py-3 px-4 text-slate-900 font-semibold"><?php echo e($val); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Action CTAs -->
                <div class="pt-4 flex flex-col sm:flex-row items-center gap-4">
                    <button @click="modalOpen = true" class="w-full sm:w-auto px-8 py-3.5 rounded-xl font-bold text-sm text-white bg-[#006EAD] hover:bg-[#00598E] shadow-xl shadow-[#006EAD]/25 transition flex items-center justify-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>Request Wholesale Quotation</span>
                    </button>
                    <a href="<?php echo e(route('products')); ?>" class="w-full sm:w-auto px-6 py-3.5 rounded-xl font-semibold text-xs text-slate-700 hover:text-slate-900 bg-white border border-slate-300 hover:bg-slate-50 transition flex items-center justify-center gap-2 shadow-xs">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        <span>Back to Catalog</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- Related Products -->
<?php if($relatedProducts->count() > 0): ?>
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-xl font-bold text-slate-900 mb-8 font-['Outfit']">Related Products in <?php echo e($product->category->name); ?></h3>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-xl sm:rounded-2xl bg-white overflow-hidden border border-slate-200 hover:border-[#006EAD] hover:shadow-md transition flex flex-col group">
                    <div class="relative h-28 sm:h-40 bg-slate-50 flex items-center justify-center p-2 sm:p-3">
                        <img src="<?php echo e(asset($rel->image)); ?>" alt="<?php echo e($rel->name); ?>" class="h-full w-full object-cover">
                    </div>
                    <div class="p-3 sm:p-4 flex-1 flex flex-col justify-between space-y-2 sm:space-y-3">
                        <div>
                            <div class="text-[9px] sm:text-[10px] font-mono text-[#006EAD] font-semibold"><?php echo e($rel->product_code); ?></div>
                            <h5 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-[#006EAD] line-clamp-1">
                                <a href="<?php echo e(route('products.show', $rel->slug)); ?>"><?php echo e($rel->name); ?></a>
                            </h5>
                            <p class="text-[10px] sm:text-xs text-slate-500 line-clamp-1 mt-0.5 sm:mt-1"><?php echo e($rel->package_size); ?></p>
                        </div>
                        <a href="<?php echo e(route('products.show', $rel->slug)); ?>" class="text-[11px] sm:text-xs font-semibold text-[#006EAD] hover:underline">
                            View Specs &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/products/show.blade.php ENDPATH**/ ?>