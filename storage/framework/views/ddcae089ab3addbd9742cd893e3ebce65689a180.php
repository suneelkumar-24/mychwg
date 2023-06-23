<?php $__env->startSection('title','Subscriptions'); ?>

<?php $__env->startSection('heading','Subscriptions'); ?>

<?php $__env->startSection('css'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="row">



        <div class="col-sm-12">

            <div class="card">

                <div class="card">

                    <div class="card-content">

                        <div class="card-body pb-0">

                            <table class="table p-0">

                                <thead>

                                <tr>

                                    <th>Name</th>

                                    <th>Subscribers</th>

                                    <th>Revenue</th>

                                </tr>

                                </thead>

                                <tbody>

                                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td class="text-capitalize">
                                                <?php if(env('HOMEOPATH_YEARLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    HOMEOPATH YEARLY PLAN
                                                <?php elseif(env('HOMEOPATH_MONTHLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    HOMEOPATH MONTHLY PLAN
                                                <?php elseif(env('ADVOCATE_YEARLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    ADVOCATE YEARLY PLAN
                                                <?php elseif(env('ADVOCATE_MONTHLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    ADVOCATE MONTHLY PLAN
                                                <?php endif; ?>
                                                </td>

                                            <td><?php echo e($item->total); ?></td>

                                            <td>$<?php echo e($item->total_rev); ?> CAD</td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="col-sm-12">

            <div class="card">

                <div class="card">



                    <div class="card-content">

                        <div class="card-body card-dashboard">

                            <h3>Transaction History</h3>

                            <div class="table-responsive">



                                <table class="table datatable p-0 table-hover-animation">

                                    <thead>

                                    <tr>

                                        <th>Name & ID</th>

                                        <th>Subscription</th>

                                        <th>Transaction Amt</th>

                                        <th>Date</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>

                                                <th><?php echo e($item->user ? $item->user->name : ''); ?> (CHWGRN<?php echo e($item->user ? $item->user->id : ''); ?>)</th>

                                                <td>
                                                <?php if(env('HOMEOPATH_YEARLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    HOMEOPATH YEARLY PLAN
                                                <?php elseif(env('HOMEOPATH_MONTHLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    HOMEOPATH MONTHLY PLAN
                                                <?php elseif(env('ADVOCATE_YEARLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    ADVOCATE YEARLY PLAN
                                                <?php elseif(env('ADVOCATE_MONTHLY_PLAN_SQUARE') == $item->plan_id): ?>
                                                    ADVOCATE MONTHLY PLAN
                                                <?php endif; ?>
                                                </td>

                                                <td>$<?php echo e($item->payment); ?> CAD</td>

                                                <td><?php echo e($item->created_at->format('d/m/Y')); ?></td>

                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/subscriptions/index.blade.php ENDPATH**/ ?>