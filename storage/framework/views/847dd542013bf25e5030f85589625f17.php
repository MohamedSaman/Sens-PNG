<?php $__env->startSection('title', 'Brands Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white font-['Outfit']">Partner Brands Portfolio</h1>
            <p class="text-xs text-slate-400 mt-1">Officially represented global FMCG and Automotive manufacturers.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-6 rounded-3xl bg-[#0B1A2D] border border-slate-800 hover:border-slate-700 shadow-xl transition space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="h-16 bg-slate-950/80 rounded-2xl p-3 flex items-center justify-center border border-slate-800">
                        <img src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e($brand->name); ?>" class="h-10 w-auto object-contain">
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-white font-['Outfit']"><?php echo e($brand->name); ?></h3>
                            <span class="text-[10px] font-mono text-cyan-400 uppercase"><?php echo e($brand->country_of_origin); ?></span>
                        </div>
                        <p class="text-xs text-slate-300 mt-1"><?php echo e($brand->tagline); ?></p>
                    </div>

                    <div class="p-3 rounded-xl bg-slate-900 border border-slate-800 text-xs flex justify-between items-center">
                        <span class="text-slate-400">Total Products:</span>
                        <strong class="text-white"><?php echo e($brand->products()->count()); ?> SKUs</strong>
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-800 flex justify-between items-center text-xs">
                    <a href="<?php echo e(route('brands.show', $brand->slug)); ?>" target="_blank" class="text-cyan-400 hover:underline flex items-center gap-1">
                        <span>View Brand Page</span>
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    </a>
                    <span class="text-slate-500 font-mono text-[10px]">Sort: <?php echo e($brand->sort_order); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/admin/brands/index.blade.php ENDPATH**/ ?>