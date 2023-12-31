<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('heading','Dashboard'); ?>



<?php $__env->startSection('css'); ?>

<style>

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

    <div class="col-lg-6">

        

    <div class="row">

        <div class="col-sm-6">

            <div class="card">

                <div class="card-header d-flex align-items-start pb-0">

                    <div>

                        <h2 class="text-bold-700 mb-0 text-primary"><?php echo e(count(Auth::user()->events) ?? 0); ?></h2>

                        <p>Events</p>

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

                        <h2 class="text-bold-700 mb-0 text-success"><?php echo e(count(Auth::user()->userFollowers)??0); ?></h2>

                        <p>Connections requests</p>

                    </div>

                    <div class="avatar bg-primary-light-blue p-50 m-0">

                        <div class="avatar-content">

                            <i class="fas fa-hands-helping text-success font-medium-5"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        

    </div>



    

   









<?php echo $__env->make('components.ads_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>









    </div>

    <div class="col-lg-6">

        <div class="card">

           <div class="card-header mb-2">

                                <h4 class="card-title font-weight-bold text-success">My Service(s) Appointment</h4>

            </div>

                            

               <div class="card-content">

                                <div class="table-responsive">

                                    <table class="table table-hover appointment-table">

                                        <thead>

                                            <tr>

                                                <th>Booking ID</th>

                                                <th>Practitioner</th>

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

                                                    <td scope="row" style="white-space: nowrap;">

                                                        <div class="avatar float-left">

                                                            <!--<img src="<?php echo e(asset($item->HomeopathService->homeopath->avatar)); ?>" height="32" width="32">-->

                                                        </div>

                                                        <strong><?php echo e($item->HomeopathService->homeopath->name ?? ''); ?></strong>

                                                        <small class="d-block">

                                                            <a href="mailto:<?php echo e($item->HomeopathService->homeopath->email); ?>">

                                                                <?php echo e($item->HomeopathService->homeopath->email); ?>


                                                            </a>

                                                        </small>

                                                    </td>

                                                    <td style="white-space: nowrap;">

                                                        <strong><?php echo e($item->date); ?></strong>

                                                                            <?php

                                                                                $slot=json_decode($item->time_slot);

                                                                            ?>

                                                        <span class="text-primary font-weight-bold d-block"><?php echo $slot[0]; ?></span>

                                                    </td>

                                                    <td style="white-space: nowrap;"><?php echo e($item->created_at->format('Y-m-d')); ?></td>

                                                    <td class="text-danger font-weight-bold"><em><u>CAD <?php echo e($item->price); ?></u></em></td>

                                                    <td>

                                                        <?php if($item->status == 'active'): ?>

                                                            <span class="badge badge-success font-weight-bold text-uppercase"><?php echo e($item->status); ?></span>

                                                        <?php else: ?>

                                                            <span class="badge badge-dark text-uppercase font-weight-bold"><?php echo e($item->status); ?></span>

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





        <form method="post" action="<?php echo e(route('link.zoom')); ?>">

                            <?php echo csrf_field(); ?>

                            <div class="card">



                                <div class="card-body">

                                    <div class="media">

                                        <i class="fas fa-video zoom-icon"></i>

                                      <div class="media-body">

                                        <h3 class="mt-0 font-weight-bold">Zoom</h3>

                                        <h5 ><span class="text-muted">By</span> <a href="https://zoom.us/" target="_blank">Zoom.us</a></h5>

                                        <a href="https://zoom.us/" target="_blank" class="btn-learn-more btn-block mt-1">Visit to learn more</a>

                                      </div>

                                    </div>

                                    <div class="email">

                                        <div class="form-group">

                                            <label>You Can Replace Email</label>

                                            <input type="email" name="email" required="" autocomplete="off" class="form-control" 

                                            value="<?php echo e(Auth::user()->zoom_email ?? Auth::user()->email); ?>">

                                        </div>

                                    </div>

                                    <div class="permissions mt-2">

                                        <h5 class="h5-heading">Functionalities to get this attachement </h5>

                                        <ul>

                                            <li>Generate virtual appointments</li>

                                            <li>Generate seminars</li>

                                            <li>Get invitation link to forward members.</li>

                                            <li>Fully control at meetings.</li>

                                        </ul>

                                    </div>



                                    <?php if(Auth::user()->zoom_access_token == ""): ?>



                                        <div class="jumbotron py-1 mb-1">

                                            <h5 class="h5-heading">Why zoom attachment is important?</h5>

                                            <p>Zoom attachement is mandatory in order to start meetings for events. if you will not attach your account. you will not be able to start your event session.</p>

                                            <h6 class="bg-rgba-info p-1 m-0"><span class="text-warning">NOTE: </span> Only a one-time integration is required when connecting your Zoom account. Follow the steps in the confirmation email you receive from Zoom in order to verify the attachment. </h6>

                                        </div>



                                        <h6 class="h5-heading">By clicking on the "Attach my account" button you agree to the <a target="_blank" href="https://explore.zoom.us/en/terms/">terms and conditions</a> of Zoom.us</h6>

                                        <hr class="mt-0">

                                        <button type="submit" class=" btn float-right btn-attach">Attach my account</button>

                                        <small class="text-center text-muted " style="padding-top: 5px;">Zoom will send confirmation email at your email address to verify your attachement.</small>



                                    <?php else: ?>

                                        <div class="jumbotron bg-rgba-warning text-center">

                                            <i class="far fa-smile text-success fa-5x"></i>

                                            <h2 class="text-success mt-1 font-weight-bold">Your account is linked with Zoom at CHWG.</h2>

                                            <h5>You can generate meetings for events and start your session(s) with members.</h5>

                                            <small>For more info about linked accounts visit the <a href="">Zoom.us</a> now.</small>

                                        </div>

                                        Want to remove my zoom account attatchement? Click 

                                        <a href="<?php echo e(route('remove.zoom.account')); ?>" class="font-weight-bold" onclick="return confirm('Want to remove Zoom account. Click OK')">here</a>

                                    <?php endif; ?>





                                </div>

                            </div>

                        </form>                

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
<?php echo $__env->make('layouts.advocate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mychwg\resources\views/advocate/dashboard.blade.php ENDPATH**/ ?>