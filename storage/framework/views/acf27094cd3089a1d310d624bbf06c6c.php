<?php $__env->startSection('title', 'Site Settings & Public Configurations'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-2xl font-bold text-white font-['Outfit']">Website Settings &amp; Contacts</h1>
        <p class="text-xs text-slate-400 mt-1">Configure published company contact info, banner announcements, and logistics notices.</p>
    </div>

    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-8 space-y-6">
        <?php echo csrf_field(); ?>
        
        <div class="space-y-4">
            <h3 class="text-sm font-bold text-cyan-400 uppercase tracking-wider pb-2 border-b border-slate-800">
                Core Corporate Information
            </h3>

            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">
                        <?php echo e($setting->description ?: $setting->key); ?>

                        <span class="text-[10px] font-mono text-slate-500 font-normal lowercase">(<?php echo e($setting->key); ?>)</span>
                    </label>
                    <?php if(strlen($setting->value) > 80): ?>
                        <textarea name="settings[<?php echo e($setting->key); ?>]" rows="2" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400"><?php echo e($setting->value); ?></textarea>
                    <?php else: ?>
                        <input type="text" name="settings[<?php echo e($setting->key); ?>]" value="<?php echo e($setting->value); ?>"
                               class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="pt-4 border-t border-slate-800 flex justify-end">
            <button type="submit" class="px-8 py-3 rounded-xl bg-cyan-500 text-slate-950 font-bold text-xs hover:bg-cyan-400 transition shadow-lg shadow-cyan-500/20">
                Save Settings
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>