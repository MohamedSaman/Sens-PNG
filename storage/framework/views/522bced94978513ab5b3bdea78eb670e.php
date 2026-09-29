<?php $__env->startSection('title', 'Corporate Leadership & Governance — Sens PNG'); ?>
<?php $__env->startSection('meta_description', 'Meet the executive leadership of Sens PNG, led by Founder & Managing Director Navin Raju, bringing over two decades of commercial logistics leadership across PNG.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header Banner -->
<section class="py-16 bg-radial-hero border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Executive Leadership</span>
        <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2">Steering Commercial Excellence</h1>
        <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed">
            Grounded in decades of hands-on supply chain, logistics, retail, and commercial operations across Papua New Guinea, Australia, and New Zealand.
        </p>
    </div>
</section>

<!-- Executive Profile Detail -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php $__currentLoopData = $leadership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded-3xl bg-[#F8FAFC] border border-slate-200 p-8 sm:p-14 shadow-sm mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Portrait -->
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="relative w-72 sm:w-84 aspect-[4/4.5] rounded-3xl overflow-hidden border-2 border-sky-200 shadow-xl bg-slate-100">
                            <img src="<?php echo e(asset($leader->photo)); ?>" alt="<?php echo e($leader->name); ?>" class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="text-2xl font-black text-white"><?php echo e($leader->name); ?></div>
                                <div class="text-xs font-bold text-amber-300 uppercase tracking-wider mt-0.5"><?php echo e($leader->role_title); ?></div>
                                <div class="text-[11px] text-sky-200 mt-1">Sens PNG Wholesale Distribution</div>
                            </div>
                        </div>
                    </div>

                    <!-- Executive Bio & Milestones -->
                    <div class="lg:col-span-7 space-y-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Founder &amp; Managing Director</span>
                            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 font-['Outfit'] mt-1"><?php echo e($leader->name); ?></h2>
                            <p class="text-xs font-semibold text-slate-500 mt-1"><?php echo e($leader->experience_summary); ?></p>
                        </div>

                        <div class="space-y-4 text-sm text-slate-600 leading-relaxed">
                            <p><?php echo e($leader->bio); ?></p>
                            <p>
                                With extensive operational leadership spanning large-scale fast-moving consumer goods, aviation logistics, and nationwide transport networks, Navin established Sens PNG with the objective of eliminating unnecessary overhead for local merchants and delivering dependable international procurement directly to PNG’s commercial doorsteps.
                            </p>
                        </div>

                        <!-- Quote Callout -->
                        <div class="p-6 rounded-2xl bg-sky-50 border-l-4 border-[#006EAD] text-slate-700 italic text-sm leading-relaxed">
                            "<?php echo e($leader->quote); ?>"
                        </div>

                        <!-- Core Competency Badges -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-xs">
                            <div class="p-3 rounded-xl bg-white border border-slate-200 text-center shadow-xs">
                                <strong class="text-[#006EAD] block font-bold">Logistics &amp; Supply</strong>
                                <span class="text-[11px] text-slate-500">Multi-Modal Freight</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-slate-200 text-center shadow-xs">
                                <strong class="text-amber-700 block font-bold">Commercial Retail</strong>
                                <span class="text-[11px] text-slate-500">Wholesale Strategy</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-slate-200 text-center shadow-xs">
                                <strong class="text-emerald-700 block font-bold">Aviation &amp; Ports</strong>
                                <span class="text-[11px] text-slate-500">Cargo Management</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Our Commitment & Corporate Pillars (From Company Profile) -->
        <div class="rounded-3xl bg-[#F0F7FD] border border-sky-200 p-6 sm:p-12 shadow-sm mt-8 sm:mt-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                <div class="lg:col-span-5 rounded-2xl p-8 bg-white border border-sky-200 shadow-sm flex flex-col items-center text-center">
                    <img src="<?php echo e(asset('images/brands/spl-logo-official.png')); ?>" alt="Sens PNG Limited Official" class="h-20 sm:h-24 w-auto object-contain mb-4">
                    <div class="w-12 h-1 bg-[#006EAD] rounded-full mb-4"></div>
                    <h4 class="text-base font-bold text-slate-900">Sens PNG Limited</h4>
                    <p class="text-xs text-slate-500 mt-1">100% Papua New Guinea Registered Enterprise</p>
                    <div class="mt-6 grid grid-cols-2 gap-3 w-full text-left">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">Port Moresby</span>
                            <span class="text-xs font-bold text-slate-800">Wamco Haus Hub</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">Lae Depot</span>
                            <span class="text-xs font-bold text-slate-800">Highlands Link</span>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-7 space-y-5">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#006EAD]">Corporate Dedication</span>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 font-['Outfit']">Our Commitment</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        At Sens PNG Limited, we believe successful retailers are essential to a strong economy. Through strategic sourcing, trusted brand partnerships, and dependable distribution, we help businesses across Papua New Guinea access the products they need to grow and succeed.
                    </p>
                    <div class="p-5 rounded-2xl bg-white border-l-4 border-[#006EAD] text-slate-800 font-semibold italic text-sm leading-relaxed shadow-xs">
                        &ldquo;Connecting global brands with local businesses through quality products, competitive pricing, and trusted partnerships.&rdquo;
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2 text-xs text-slate-700">
                            <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                            <span>Pure wholesale (No consumer retail stores)</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-700">
                            <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                            <span>Direct factory authorization</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/website/leadership.blade.php ENDPATH**/ ?>