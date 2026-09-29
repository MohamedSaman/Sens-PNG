<?php $__env->startSection('title', 'Products Inventory Catalog'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white font-['Outfit']">Wholesale Products &amp; SKUs</h1>
            <p class="text-xs text-slate-400 mt-1">Catalog items currently active in public database.</p>
        </div>
    </div>

    <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider text-[10px] bg-slate-950/40">
                        <th class="py-3.5 px-4">Product Code</th>
                        <th class="py-3.5 px-4">Product Name</th>
                        <th class="py-3.5 px-4">Brand</th>
                        <th class="py-3.5 px-4">Division</th>
                        <th class="py-3.5 px-4">Packaging Spec</th>
                        <th class="py-3.5 px-4">Featured</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-800/30">
                            <td class="py-3.5 px-4 font-mono font-bold text-cyan-300"><?php echo e($p->product_code); ?></td>
                            <td class="py-3.5 px-4 font-bold text-white"><?php echo e($p->name); ?></td>
                            <td class="py-3.5 px-4 text-amber-400 font-semibold"><?php echo e($p->brand->name); ?></td>
                            <td class="py-3.5 px-4 text-slate-300"><?php echo e($p->category->name); ?></td>
                            <td class="py-3.5 px-4 text-slate-300"><?php echo e($p->package_size); ?></td>
                            <td class="py-3.5 px-4">
                                <?php if($p->is_featured): ?>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Featured</span>
                                <?php else: ?>
                                    <span class="text-slate-500 text-[10px]">Standard</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-800 flex justify-center">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/admin/products/index.blade.php ENDPATH**/ ?>