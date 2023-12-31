
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('heading','Dashboard'); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
       .zoom-icon
    {
        background-color: #2174FF;
        color: #fff;
        padding: 16px;
        font-size: 30px;
        margin-right: 20px;
    }
    .btn-learn-more
    {
        background-color: #F6F7F9;
        border: 2px solid #D6D7DB;
        text-align: center;
        padding: 5px;
        font-weight: bold;
        color: #000;
    }
    .h5-heading
    {
        color: #B1B3B9;
        font-weight: bold;
    }

    .btn-attach,
    .btn-attach:hover
    {
        background-color: #4267B2;
        color: #fff;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 3px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-md-4 col-12">
             <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0 text-primary"><?php echo e(count(Auth::user()->events) ?? 0); ?></h2>
                                <p>Total events</p>
                            </div>
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="fas fa-calendar-alt text-primary font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0 text-success"><?php echo e(Auth::user()->serviceBookings->count() ?? 0); ?></h2>
                                    <p>Services</p>
                                </div>
                                <div class="avatar bg-primary-light-blue p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fas fa-hands-helping text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <?php echo $__env->make('components.ads_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

            </div>
        </div>
                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header mb-2">
                                    <h4 class="card-title font-weight-bold text-success">My Service(s) Appointment</h4>
                                </div>

                                <div class="card-content">
                                    <div class="table-responsive w-100">
                                        <table class="table table-hover appointment-table">
                                            <thead>
                                                <tr>
                                                    <th>Booking ID</th>
                                                    <th class="w-50">Homeopath</th>
                                                    <th>Appt Date</th>
                                                    <th>Booking Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = Auth::user()->serviceBookings->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td>
                                                            <span class="badge badge-dark"><?php echo e($item->uuid ?? 'N/A'); ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="avatar float-left">
                                                                <img src="<?php echo e(asset($item->HomeopathService->homeopath->avatar)); ?>" height="32" width="32">
                                                            </div>
                                                            <strong><?php echo e($item->HomeopathService->homeopath->name ?? ''); ?></strong>
                                                            <small class="d-block">
                                                                <a style="" href="mailto:<?php echo e($item->HomeopathService->homeopath->email); ?>">
                                                                    <?php echo e($item->HomeopathService->homeopath->email); ?>

                                                                </a>
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <strong><?php echo e($item->date); ?></strong>
															<?php
																$slot=json_decode($item->time_slot)
															?>
                                                            <span class="text-primary font-weight-bold d-block"><?php echo e($slot[0]); ?></span>
                                                        </td>
                                                        <td><?php echo e($item->created_at->format('Y-m-d')); ?></td>
                                                        <td class="text-danger font-weight-bold"><em><u>CAD $<?php echo e(number_format($item->price, 2)); ?></u></em></td>
                                                        <td>
                                                            <?php if($item->status == 'active'): ?>
                                                                                <span class="badge badge-warning">ACTIVE</span>
                                                                                <?php elseif($item->status == 'pending'): ?>
                                                                                <span class="badge badge-primary">PENDING</span>
                                                                                <?php elseif($item->status == 'completed'): ?>
                                                                                <span class="badge text-dark-gray">COMPLETED</span>
                                                                                <?php elseif($item->status == 'cancelled'): ?>
                                                                                <span class="badge badge-danger text-uppercase"><?php echo e($item->status); ?></span>
                                                                                <?php else: ?>
                                                                                <span class="badge badge-secondary text-uppercase"><?php echo e($item->status); ?></span>
                                                                                
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <h3 class="alert alert-warning">No appontment(s) were found right now</h3>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                              <!-- ==============       =======================
                                                Orders show
                                ==============       ======================= -->

                                <div class="card">
                                    <div class="card-header mb-2">
                                        <h4 class="card-title font-weight-bold text-success">Orders</h4>
                                        
                                    </div>
                                    <div class="card-body">
                                        <?php echo $__env->make('front.shop.order.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                    </div>
                                    
                                </div>

                                <!-- ==============       =======================
                                                Orders show end
                                ==============       ======================= -->
                        </div>


</div>

  <!--=====================================================-->
                       <!-- order detail MODAL -->
        <!--=====================================================-->

            <div class="modal fade order_detail_modal pr-0" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header p-2">
                      <div class="modal-title">
                          <h5 class="m-0 p-0 font-weight-bold">Order Detail</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " id="order_detail_modal_body">
                    </div>
                  </div>
                </div>
              </div>

        <!--=====================================================-->
                       <!-- END order detail MODAL -->
        <!--=====================================================-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script type="">
        $(document).on('click','.detail_order_btn',function(e){
            e.preventDefault();
            var url=$(this).attr('href');
            
            $.ajax({
                method:'get',
                url:url,
                success:function(data)
                {
                    $('#order_detail_modal_body').html(data)
                    $('.order_detail_modal').modal('show');
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/user/dashboard.blade.php ENDPATH**/ ?>