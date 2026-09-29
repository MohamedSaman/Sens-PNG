<?php $__env->startSection('title', 'Wholesale Customer Enquiries'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6" x-data="{ activeEnquiry: null }">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white font-['Outfit']">Wholesale Enquiries Registry</h1>
            <p class="text-xs text-slate-400 mt-1">Manage B2B merchant leads, assign statuses, and log sales notes.</p>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="p-4 rounded-2xl glass-panel border border-slate-800 flex flex-wrap gap-4 items-center justify-between">
        <form action="<?php echo e(route('admin.enquiries')); ?>" method="GET" class="flex flex-wrap gap-3 items-center w-full sm:w-auto">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search ref, company, contact..."
                   class="px-3.5 py-2 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 w-64">
            
            <select name="status" onchange="this.form.submit()" class="px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                <option value="">All Statuses</option>
                <option value="new" <?php echo e(request('status') === 'new' ? 'selected' : ''); ?>>New</option>
                <option value="contacted" <?php echo e(request('status') === 'contacted' ? 'selected' : ''); ?>>Contacted</option>
                <option value="in_review" <?php echo e(request('status') === 'in_review' ? 'selected' : ''); ?>>In Review</option>
                <option value="closed" <?php echo e(request('status') === 'closed' ? 'selected' : ''); ?>>Closed / Approved</option>
            </select>

            <button type="submit" class="px-4 py-2 rounded-xl bg-cyan-500 text-slate-950 font-bold text-xs">Filter</button>
            <?php if(request('search') || request('status')): ?>
                <a href="<?php echo e(route('admin.enquiries')); ?>" class="text-xs text-slate-400 hover:text-white underline">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Enquiries Table -->
    <div class="rounded-3xl glass-panel border border-slate-800 overflow-hidden">
        <?php if($enquiries->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider text-[10px] bg-slate-950/40">
                            <th class="py-3.5 px-4">Ref No.</th>
                            <th class="py-3.5 px-4">Business / Trader</th>
                            <th class="py-3.5 px-4">Contact</th>
                            <th class="py-3.5 px-4">Province</th>
                            <th class="py-3.5 px-4">Division Interest</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-slate-800/30">
                                <td class="py-3.5 px-4 font-mono font-bold text-cyan-300"><?php echo e($enq->reference_no); ?></td>
                                <td class="py-3.5 px-4">
                                    <strong class="text-white block"><?php echo e($enq->business_name); ?></strong>
                                    <span class="text-[10px] text-slate-400"><?php echo e($enq->business_type); ?></span>
                                </td>
                                <td class="py-3.5 px-4 text-slate-300">
                                    <div><?php echo e($enq->contact_name); ?></div>
                                    <a href="tel:<?php echo e($enq->phone); ?>" class="text-cyan-400 hover:underline"><?php echo e($enq->phone); ?></a>
                                </td>
                                <td class="py-3.5 px-4 text-slate-400"><?php echo e($enq->province); ?></td>
                                <td class="py-3.5 px-4 text-slate-300 max-w-xs truncate"><?php echo e($enq->category_interest); ?></td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider
                                        <?php echo e($enq->status === 'new' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : ''); ?>

                                        <?php echo e($enq->status === 'contacted' ? 'bg-amber-500/20 text-amber-300 border border-amber-500/30' : ''); ?>

                                        <?php echo e($enq->status === 'in_review' ? 'bg-indigo-500/20 text-indigo-300 border border-indigo-500/30' : ''); ?>

                                        <?php echo e($enq->status === 'closed' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : ''); ?>

                                    ">
                                        <?php echo e($enq->status); ?>

                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <button @click="activeEnquiry = <?php echo e(json_encode($enq)); ?>" 
                                            class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-cyan-500 text-slate-200 hover:text-slate-950 font-semibold text-xs border border-slate-700 transition">
                                        Manage
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-800 flex justify-center">
                <?php echo e($enquiries->links()); ?>

            </div>
        <?php else: ?>
            <div class="py-16 text-center text-slate-400 text-xs">
                No wholesale enquiries matching your filter criteria.
            </div>
        <?php endif; ?>
    </div>

    <!-- Enquiry Detail & Status Update Modal -->
    <div x-show="activeEnquiry" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-md flex items-center justify-center p-4"
         style="display: none;">
        
        <template x-if="activeEnquiry">
            <div class="w-full max-w-2xl rounded-3xl glass-panel border border-cyan-500/40 p-6 sm:p-8 space-y-6 shadow-2xl"
                 @click.outside="activeEnquiry = null">
                
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <span class="text-xs font-mono text-cyan-300 font-bold" x-text="activeEnquiry?.reference_no"></span>
                        <h3 class="text-xl font-bold text-white font-['Outfit']" x-text="activeEnquiry?.business_name"></h3>
                    </div>
                    <button @click="activeEnquiry = null" class="text-slate-400 hover:text-white p-1">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Lead Details -->
                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-slate-500 block">Contact Person:</span>
                        <strong class="text-white" x-text="activeEnquiry?.contact_name"></strong>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-slate-500 block">Phone / WhatsApp:</span>
                        <a :href="'tel:' + activeEnquiry?.phone" class="text-cyan-400 font-semibold" x-text="activeEnquiry?.phone"></a>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-slate-500 block">Email Address:</span>
                        <a :href="'mailto:' + activeEnquiry?.email" class="text-cyan-400 font-semibold" x-text="activeEnquiry?.email"></a>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-slate-500 block">Location / Province:</span>
                        <strong class="text-white" x-text="activeEnquiry?.province"></strong>
                    </div>
                </div>

                <!-- Message / Products Requested -->
                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 text-xs space-y-2">
                    <span class="text-slate-400 font-semibold block">Customer Message &amp; Required Volume:</span>
                    <p class="text-slate-200 leading-relaxed italic" x-text="activeEnquiry?.message"></p>
                    <div class="text-[11px] text-amber-300 pt-1" x-show="activeEnquiry?.estimated_volume">
                        Est. Volume: <span x-text="activeEnquiry?.estimated_volume"></span>
                    </div>
                </div>

                <!-- Update Status & Notes Form -->
                <form :action="'/admin/enquiries/' + activeEnquiry?.id" method="POST" class="space-y-4 pt-2 border-t border-slate-800">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Update Status</label>
                            <select name="status" :value="activeEnquiry?.status" @change="if(activeEnquiry) activeEnquiry.status = $event.target.value" class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white">
                                <option value="new">New (Needs Action)</option>
                                <option value="contacted">Contacted (In Dialogue)</option>
                                <option value="in_review">In Review (Credit Check)</option>
                                <option value="closed">Closed / Approved Account</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Internal Sales Rep Notes</label>
                        <textarea name="admin_notes" :value="activeEnquiry?.admin_notes || ''" @input="if(activeEnquiry) activeEnquiry.admin_notes = $event.target.value" rows="3" placeholder="Log details of call with customer, price quote sent, credit terms..."
                                  class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-cyan-400"></textarea>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="activeEnquiry = null" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-cyan-500 text-slate-950 font-bold text-xs hover:bg-cyan-400 transition">
                            Save Changes
                        </button>
                    </div>
                </form>

            </div>
        </template>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/admin/Website/Sens-PNG/resources/views/admin/enquiries/index.blade.php ENDPATH**/ ?>