<?php $__env->startSection('title', 'Downloads & Technical Catalogues — Sens PNG'); ?>
<?php $__env->startSection('meta_description', 'Download official Sens PNG brochures, wholesale master catalogues, tyre fitment guides, and B2B trade credit application forms.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header Banner -->
<section class="py-16 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Document Center</span>
        <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2">Catalogues, Brochures &amp; Forms</h1>
        <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed">
            Access official technical documentation, master product price lists, tyre application guides, and commercial trade account application forms.
        </p>
    </div>
</section>

<!-- Documents Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-3xl bg-white p-8 border border-slate-200 shadow-sm flex flex-col justify-between space-y-6 group hover:border-[#006EAD] hover:shadow-md transition duration-300">
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-sky-50 text-[#006EAD] border border-sky-200">
                                <?php echo e($doc->category); ?>

                            </span>
                            <span class="text-xs font-mono text-slate-500"><?php echo e($doc->file_format); ?> &bull; <?php echo e($doc->file_size); ?></span>
                        </div>

                        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-[#006EAD] flex items-center justify-center group-hover:bg-[#006EAD] group-hover:text-white transition duration-300">
                            <i data-lucide="file-down" class="w-6 h-6"></i>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#006EAD] transition font-['Outfit']"><?php echo e($doc->title); ?></h3>
                            <p class="text-xs text-slate-500 mt-2 leading-relaxed"><?php echo e($doc->description); ?></p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-[11px] text-slate-400">
                            <i data-lucide="download" class="w-3.5 h-3.5 inline mr-1 text-slate-400"></i>
                            <?php echo e(number_format($doc->download_count)); ?> downloads
                        </span>
                        <a href="<?php echo e(route('download.file', $doc->id)); ?>" class="px-4 py-2 rounded-xl bg-[#006EAD] hover:bg-[#00598E] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs">
                            <span>Download PDF</span>
                            <i data-lucide="arrow-down" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Wholesale Account Notice -->
        <div class="mt-16 rounded-3xl bg-[#F0F7FD] border border-sky-200 p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
            <div class="space-y-2 text-center md:text-left">
                <h4 class="text-xl font-bold text-slate-900 font-['Outfit']">Looking to Establish a 30-Day Commercial Trade Facility?</h4>
                <p class="text-xs sm:text-sm text-slate-600">
                    Download the Trade Credit Application form above, or complete our digital onboarding enquiry directly online.
                </p>
            </div>
            <button @click="modalOpen = true" class="px-8 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-[#006EAD] hover:bg-[#00598E] transition shrink-0 shadow-md">
                Register Account Online
            </button>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/downloads.blade.php ENDPATH**/ ?>