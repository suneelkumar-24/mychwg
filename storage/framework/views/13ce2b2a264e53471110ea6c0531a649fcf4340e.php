<?php $__env->startSection('title','Appointment Calendar'); ?>

<?php $__env->startSection('heading','My Schedule'); ?>



<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

<style>

    .ui-datepicker

    {

        //width: 100% !important;

    }

    .ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled

    {

        opacity: 0 !important;

    }

</style>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="card mt-1">

        <h5 class="m-0"><span class="text-white bg-dark p-1 ">Schedule / Timetable</span></h5>

        <div class="card-content">

            <div class="card-body">

                <button class="border-0 font-weight-bold float-right mb-2" data-toggle="modal" data-target="#modalUpdateHolidaySchedule">Update my holiday schedule!</button>

                <div class="table-responsive table__appointment_schecule">

                    <table class="table table-hover">

                      <thead>

                        <tr>

                          <th>DAY</th>

                          <th>STATUS</th>

                          <th>TIMETABLE</th>

                          <th class="text-right">ACTION</th>

                        </tr>

                      </thead>

                      <tbody>



                        <?php $__currentLoopData = weekDays(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <th><?php echo e($item); ?></th>

                                    <td>

                                        <?php if(getAvailableStatus($item)): ?>

                                            <span class="badge-site bg-success">Available</span>

                                        <?php else: ?>

                                            <span class="badge-site bg-danger">Closed</span>

                                        <?php endif; ?>

                                    </td>

                                    <td>



                                        <?php $day_time_table = getWeekDayTimetable($item) ?>

                                        <?php if(isset($day_time_table)): ?>

                                            <?php $__currentLoopData = $day_time_table->daySlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($loop->first): ?>

                                                        <h6 class="font-weight-bold">Availability: <?php if($slot->slot_type == 0): ?> All <?php echo e($item); ?> <?php elseif($slot->slot_type == 1): ?> <?php echo e($slot->specific_day); ?> <?php endif; ?> </h6>

                                                        <h6 class="text-info font-weight-bold">Time:</h6>

                                                    <?php endif; ?>

                                                        <?php echo e(\Carbon\Carbon::parse($slot->from)->format('h:i a')); ?> - <?php echo e(\Carbon\Carbon::parse($slot->to)->subMinutes(15)->format('h:i a')); ?><br>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                        <?php else: ?>

                                            --------------------

                                        <?php endif; ?>





                                    </td>

                                    <td class="text-right" style="width:100px;">

                                        <div class="btn-group dropdown w-100">

                                            <button

                                                class="btn btn-info btn-update-heading font-weight-bold btn__update_specific_day"

                                                data-title="<?php echo e($item); ?>"

                                                data-type="0"

                                                <?php if($loop->iteration == 7): ?> data-day-number="0" <?php else: ?> data-day-number="<?php echo e($loop->iteration); ?>" <?php endif; ?>>

                                                <i class="fas fa-edit"></i> Update

                                            </button>

                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                <span class="sr-only">Toggle Dropdown</span>

                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right">



                                                <a

                                                    class="dropdown-item btn__update_all_day"

                                                    title="All <?php echo e($item); ?>"

                                                    data-title="<?php echo e($item); ?>"

                                                    data-type="0">

                                                        All <?php echo e($item); ?>


                                                </a>



                                                <a

                                                    class="dropdown-item btn__update_specific_day"

                                                    title="Specific <?php echo e($item); ?>"

                                                    data-title="<?php echo e($item); ?>"

                                                    data-type="2"

                                                    <?php if($loop->iteration == 7): ?> data-day-number="0" <?php else: ?> data-day-number="<?php echo e($loop->iteration); ?>" <?php endif; ?>>

                                                    Specific <?php echo e($item); ?>


                                                </a>



                                                <div class="dropdown-divider"></div>



                                                <a href="<?php echo e(route('homeopath.appointments.close.day')); ?>?day=<?php echo e($item); ?>" class="dropdown-item text-danger">Close <?php echo e($item); ?></a>



                                            </div>

                                        </div>

                                    </td>



                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







                        <tr>



                        </tr>



                      </tbody>

                    </table>

                </div>



            </div>

        </div>

    </div>

















<!-- =============================================================-->

                <!--MODAL UPDATE SPECIFIC DAY-->

<!-- =============================================================-->

<div class="modal fade" id="modalUpdateSpecificDay">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">Update <span class="modal_specific_day_span"></span> Timetable</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <h6 class="alert bg-rgba-warning text-center rounded-0">Select the specific date of <strong>"<span class="modal_specific_day_span"></span>"</strong> to set your timetable/schedule. Click below box to select date.</h6>



        <form method="POST" action="<?php echo e(route('homeopath.appointments.set.specific.day')); ?>">

            <?php echo csrf_field(); ?>

            <input type="hidden" name="day" class="modal_specific_day">

            <input type="text" name="date" class="form-control my_date" readonly="">



            <div class="modal_specific_date" style=" width: 100%;"></div>





        <div class="time__slots mb-5">

            <h6 class="mt-2 alert bg-rgba-info text-center rounded-0">Specify your time slots according to your schedule.</h6>

            <table class="table table-hover mb-0">

                <thead>

                    <tr>

                        <th class="w-50">Starting From  <span class="text-danger">*</span></th>

                        <th class="w-50">Ending To <span class="text-danger">*</span></th>

                        <th class="text-right">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>

                            <select class="w-100 slot_from" name="from[]" required="">

                                <option value="">----------------</option>

                                <?php for($i = 1; $i < 24; $i++): ?>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45</option>

                                <?php endfor; ?>

                            </select>

                        </td>

                        <td>

                            <select class="w-100 slot_to" name="to[]" required="">

                                <option value="">----------------</option>

                                <?php for($i = 1; $i < 24; $i++): ?>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45</option>

                                <?php endfor; ?>

                            </select>

                        </td>



                        <th class="text-right"><a title="remove" class="bg-danger btn-remove-slot text-white"><i class="fas fa-trash-alt"></i></a></th>

                    </tr>

                </tbody>

            </table>

            <hr>

            <a class="float-right btn-add-slot">I want to add new Slot</a>



        </div>

        <hr>

              <button type="submit" class="btn btn-dark float-right">Continue</button>



    </form>



      </div>

    </div>

  </div>

</div>









<!-- =============================================================-->

                <!--MODAL UPDATE ALL DAY-->

<!-- =============================================================-->

<div class="modal fade" id="modalUpdateAllDay">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="">Update All <span class="modal_all_day_span"></span> Timetable</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">



        <form method="POST" action="<?php echo e(route('homeopath.appointments.set.all.day')); ?>">

            <?php echo csrf_field(); ?>

            <input type="hidden" name="day" class="modal_all_day">



        <div class="time__slots mb-5">

            <h6 class="alert bg-rgba-info text-center rounded-0">Specify your time slots according to your schedule.</h6>

            <table class="table table-hover mb-0">

                <thead>

                    <tr>

                        <th class="w-50">Starting From  <span class="text-danger">*</span></th>

                        <th class="w-50">Ending To <span class="text-danger">*</span></th>

                        <th class="text-right">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>

                            <select class="w-100 slot_from" name="from[]" required="">

                                <option value="">----------------</option>

                                <?php for($i = 1; $i < 24; $i++): ?>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45</option>

                                <?php endfor; ?>

                            </select>

                        </td>

                        <td>

                            <select class="w-100 slot_to" name="to[]" required="">

                                <option value="">----------------</option>

                                <?php for($i = 1; $i < 24; $i++): ?>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:15</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30</option>

                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:45</option>

                                <?php endfor; ?>

                            </select>

                        </td>



                        <th class="text-right"><a title="remove" class="bg-danger btn-remove-slot text-white"><i class="fas fa-trash-alt"></i></a></th>

                    </tr>

                </tbody>

            </table>

            <hr>

            <a class="float-right btn-add-slot">I want to add new Slot</a>



        </div>

        <hr>

              <button type="submit" class="btn btn-dark float-right">Continue</button>



    </form>



      </div>

    </div>

  </div>

</div>



























<!--=======================================================-->

           <!--MODAL UPDATE HOLIDAY SCHEDULE-->

<!--=======================================================-->



<div class="modal fade" id="modalUpdateHolidaySchedule">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Update my holiday schedule</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>





      <form method="POST" action="<?php echo e(route('homeopath.appointments.update.holiday')); ?>">

          <?php echo csrf_field(); ?>

        <div class="modal-body">



            <table class="table table-sm">

              <thead>

                <tr>

                  <th class="py-0">Holiday Start</th>

                  <th></th>

                  <th class="py-0">Holiday End</th>

                  <th class="py-0">---</th>

                </tr>

              </thead>

              <tbody>

                <?php if(isset(Auth::user()->homeopathHoliday)): ?>

                    <?php $__currentLoopData = Auth::user()->homeopathHoliday->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                          <th class="py-0 text-success"><?php echo e(date('d, F Y', strtotime($item->holiday_from))); ?></th>

                          <th class="py-0 text-success">-</th>

                          <th class="py-0 text-success"><?php echo e(date('d, F Y', strtotime($item->holiday_to))); ?></th>

                          <td class="py-0">

                            <a title="Remove holiday" href="<?php echo e(route('homeopath.appointments.remove.holiday', Crypt::encrypt($item->id))); ?>" onclick="return confirm('do you really want to remove your holiday?')" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

              </tbody>

            </table>



            <hr>





            <label>Holiday Starting From <span class="text-danger">*</span></label>

            <input type="text" class="form-control datepicker font-weight-bold text-dark text-center" name="holiday_from" readonly required value="<?php echo e(now()->addDay()->format('Y-m-d')); ?>">



            <label>Holiday Ending to <span class="text-danger">*</span></label>

            <input type="text" class="form-control datepicker font-weight-bold text-dark text-center" name="holiday_to" readonly required value="<?php echo e(now()->addDay(2)->format('Y-m-d')); ?>">



          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-dark">Continue</button>

          </div>



      </form>

    </div>

  </div>

</div>











<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script type="text/javascript" src="<?php echo e(asset('front/assets')); ?>/jquery/jquery-ui-1.11.4.js"></script>

<script>

    $off_days = [0,1,2,3,4,5,6];



    $(document).on("click", '.btn__update_specific_day', function(){

        console.log('hello');

        console.log($(this).data("day-number"));

        $day        = $(this).data("title");

        $data_type  = $(this).data("type");

        $day_number = $(this).data("day-number");



        $new_off_days = $($off_days).not([$day_number]).get();



        $('.modal_specific_day_span').text($day);

        $('.modal_specific_day').val($day);

        $('.time__slots').addClass('d-none');



        $('.modal_specific_date').val("").addClass('datepicker');



        // disableDatePickerDates($new_off_days);



        $('#modalUpdateSpecificDay').modal('show');



    });





    $(document).on("click", '.btn__update_all_day', function(){



        $day        = $(this).data("title");

        $data_type  = $(this).data("type");





        $('.modal_all_day_span').text($day);

        $('.modal_all_day').val($day);

        $('#modalUpdateAllDay .time__slots').removeClass('d-none');



        $('#modalUpdateAllDay').modal('show');



    });







</script>







<script>



    // function disableDatePickerDates($data)

    // {



    //     $('.datepicker').datepicker('destroy');



    //     $('.datepicker').datepicker({

    //            startDate: new Date(),

    //            format: 'yyyy-mm-dd',

    //             daysOfWeekDisabled

    //  //         }).on('changeDate',function(e){

    //         });



    // }





    $(document).on('click', '.btn-add-slot', function() {

        $clone = $(this).closest('div').find('table tr:last').clone();

        $(this).closest('div').find('table tbody').append($clone);

    })



    $(document).on('click', '.btn-remove-slot', function() {

        $length = $(this).closest('tbody').find('tr').length;

        $length > 1 ? $(this).closest('tr').remove() : '';

    })



    $(document).on('change', '.slot_to', function() {

        $from_value = $(this).closest('tr').find('.slot_from').val();

        $to_value   = $(this).val();





        if($from_value == "")

        {

            toastr.error('Select Starting time first');

            $(this).val("");

        }





        if($from_value >= $to_value)

        {

            toastr.error('You cannot select time that less than starting time.');

            $(this).val("");

        }



    })



    $(document).on('change', '.slot_from', function() {

        $(this).closest('tr').find('.slot_to').val("");

    })





    $(".modal_specific_date").datepicker({

               minDate: 0,

               dateFormat:'yy-mm-dd',

            }).on('change',function(e){



                $('.my_date').val($(this).val());

                $('.time__slots').removeClass('d-none');



    });







</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/appointments/schedule.blade.php ENDPATH**/ ?>