
<?php $__env->startSection('title','Event Management'); ?>
<?php $__env->startSection('heading','Event Management'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('advocate.events.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row event-input-form">

    <div class="col-sm-12">
        <div class="card bg-success  pl-2 py-1">
                <h2 class="text-white mb-0 font-weight-bold">Save Event</h2>
                    <small class="text-white">Fill the form below to update the event detail and start organizing event at your desired venue, date, time.</small> 

                    <div class="text-danger">
                        <?php if($errors->any()): ?>
                            <?php echo implode('', $errors->all('<div class="font-weight-bold">:message</div>')); ?>

                        <?php endif; ?>
                    </div>

            </div>

        <div class="card">
                <div class="pl-2 py-1 mr-auto">
                    <h4 class="text-success font-weight-bold">Basic details <span class="text-danger">*</span></h4>
                    <h6>Write down the basic details of your event</h6>                  
                </div>
                <hr class="m-0">
                <div class="card-body">
                        
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>NAME OF EVENT</label>
                            <input type="text" class="form-control" name="title" required="">
                        </div>
                        <div class="col-lg-4 event-input-desctiption-side">
                            This event name will be displayed on the homepage and social medias.
                        </div>
                    </div>



                    <div class="row date-time-selecter">
                        
                        <div class="col-lg-8">
                        
                            <div class="append-date-time">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <label>Date</label>
                                        <input type="text" class="form-control datepicker date" name="date[]" required="" value="<?php echo e(now()->addDay()->format('Y-m-d')); ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Starts at</label>
                                        <select class="form-control" name="time[]">
                                        `
                                            <?php for($i = 1; $i < 24; $i++): ?>
                                               
                                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:00</option>
                                                    <option value="<?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30"><?php echo e($i < 10 ? '0' : ''); ?><?php echo e($i); ?>:30</option>
                                               
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right mt-2">
                                <a class="btn btn-danger btn-sm btn-remove-day-time text-white d-none">- REMOVE DAY/TIME</a>
                                <a class="btn btn-primary btn-sm btn-add-day-time text-white">+ MORE DAY/TIME</a>
                            </div>

                        </div>
    
                        <div class="col-lg-4 event-input-desctiption-side">
                            Date and time of the event to be handled. One time or recurring choice is yours.
                            If recurring append more date/time slots otherwise one day event will be there.
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>EVENT CATEGORY</label>
                            <input type="text" class="form-control" name="category" required="">
                        </div>
                        <div class="col-lg-4 event-input-desctiption-side">
                            Type a category that best match to your desired event.
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>UPLOAD PHOTO</label>
                            <input type="file" class="w-100 dropify" name="thumbnail" required="" style="height:100%;">
                        </div>
                        <div class="col-lg-4 event-input-desctiption-side">
                            This will be the main photo of your event.
                        </div>
                    </div>

                    



                </div>
            </div>
        
        <div class="card">
                <div class="pl-2 py-1 mr-auto">
                    <h4 class="text-success font-weight-bold">Description <span class="text-danger">*</span></h4>
                    <h6>Keep writing breif description of your event and other details users need to know</h6>                  
                </div>
                <hr class="m-0">
                <div class="card-body">
                        
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>DESCRIPTION OF EVENT</label>
                            <textarea class="form-control" name="description" required="" rows="9"></textarea>
                        </div>
                        <div class="col-lg-4 event-input-desctiption-side">
                            Brief description of your event as it will be displayed in the page.
                        </div>
                    </div>


                </div>
        </div>


        <div class="card">
                <div class="pl-2 py-1 mr-auto">
                    <h4 class="text-success font-weight-bold">Location</h4>
                    <h6>Keep writing exact venue, event type (virtual/in-person) with hosts etc.</h6>                  
                </div>
                <hr class="m-0">
                
                <div class="card-body">
                    
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>Event TYPE <span class="text-danger">*</span></label>
                            <select class="form-control event-type" name="type">
                                <option value="in-person">In-person</option>
                                <option value="virtual">Virtual</option>
                            </select>
                        </div>
                        <div class="col-lg-4 event-input-desctiption-side">
                            Choose event type whether virtual, in-person
                        </div>
                    </div>

                    <div class="in-person-fields">
                        
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label>VENUE</label>
                            <input type="text" class="form-control" name="venue">
                        </div>

                        <div class="col-lg-4">
                            <label>LOCATION (or NEAR BY)</label>
                            <input type="text" class="form-control" id="point" name="location" placeholder="">
                            <input type="hidden" id="latitude" name="latitude" >
                            <input type="hidden" id="longitude" name="longitude">
                        </div>
                        
                        <div class="col-lg-4 event-input-desctiption-side">
                            Venue & Location of the Event where to organize to get users in touch.
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>HOSTS</label>
                            <input type="text" class="form-control" name="hosts">
                        </div>

                        <div class="col-lg-4 event-input-desctiption-side">
                           Mention host(s) of event to be organized.  
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label>VENDORS</label>
                            <input type="text" class="form-control" name="vendors">
                        </div>

                        <div class="col-lg-4 event-input-desctiption-side">
                           Mention vendor(s) of event to be organized.  
                        </div>
                    </div>
                    </div>


                    <div class="row mt-3 mb-2">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-success btn-lg font-weight-bold">Submit my Event form</button>
                        </div>
                    </div>
                    
                    


                    


                </div>


        </div>

        

        

    </div>
</div>
</form>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<script>
        $('.date').datepicker({
            minDate: +1,
            dateFormat: 'yy-mm-dd'
        });
    $(document).on('click', '.btn-add-day-time', function() {

        $row = $('.append-date-time .row:first').clone();

        $('.append-date-time').append($row);
        checkCountDateRows();

        $('.append-date-time').find('.date').removeClass('datepicker').removeClass('hasDatepicker').attr('id', "");
        $('.date').datepicker({
            minDate: +1,
            dateFormat: 'yy-mm-dd'
        });

    })

    $(document).on('click', '.btn-remove-day-time', function() {
        $('.append-date-time .row:last').remove();
        checkCountDateRows();
    })
    
    function checkCountDateRows()
    {
        $length =  $('.append-date-time .row').length;

        if($length > 1)
        {
            $('.btn-remove-day-time').removeClass('d-none');
        }
        else
        {
            $('.btn-remove-day-time').addClass('d-none');
        }


    }

    $(document).on('change', '.event-type', function() {



        $(this).val() == 'virtual' ? $('.in-person-fields').addClass('d-none') : $('.in-person-fields').removeClass('d-none'); 
    
    })



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.advocate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/advocate/events/add.blade.php ENDPATH**/ ?>