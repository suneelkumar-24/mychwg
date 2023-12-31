<?php $__env->startSection('title', 'IHWG for Homeopath'); ?>



<?php $__env->startSection('css'); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery-ui.css')); ?>">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style type="">

  .appointment-banner {

    background-size: cover;

    border-radius: 20px;

    font-weight: bold;

    color: var(--apt-booking-color);

    margin: 0px 24px !important;

  }

</style>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<header>

    <div class="wrapper">

        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/vancouver.jpg) no-repeat 50% center;background-size: cover;">

            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>

</div>

</header>

<!--END HEADER-->

<!--MAIN CONTENT SECTION-->

<section class="content">



    <div class="container container-book-appointment mb-4">

      <div class="appointment-banner p-5" style="background-image:url('<?php echo e(asset($service->ServiceTheme->cover)); ?>')">

        <h2>Book an Appointment</h2>

        <p>Book an available time-slot for a selected service</p>

        <p>Thank you!</p>

      </div>

      <div class="row px-4">











        <?php $__currentLoopData = Auth::user()->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



          <div class="col-lg-6 mb-3">

            <div class="inputGroup disabled-radio">

              <input id="service__<?php echo e($loop->iteration); ?>" class="input_service" name="input_service" value="<?php echo e($service->id); ?>" type="radio" <?php if($item->id == $service->id): ?> checked="" <?php endif; ?> />

              <label for="service__<?php echo e($loop->iteration); ?>">

                <h5 class="mb-4"><?php echo e($item->title); ?></h5>

                <span><?php echo e($item->duration); ?> minutes</span>

              </label>

            </div>

          </div>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





      </div>

      <form id="payment-form" method="POST" action="<?php echo e(route('homeopath.services.appointment.create')); ?>">

        <?php echo csrf_field(); ?>

        <input type="hidden" name="service_id" value="<?php echo e(Crypt::encrypt($service->id)); ?>">

        <div class="row p-4">

          <div class="col-lg-12">

            <strong>Select Date & Time</strong>

          </div>

          <div class="col-lg-6 mt-2">

            <input type="hidden" name="date" class="input_date" required="">

            <!-- <input type="hidden" name="homeopath_id" class="homeopath_id" value="<?php echo e(Auth::id()); ?>"> -->

            <span type="text" id="datep" class="date-pick"></span>

          </div>

          <div class="col-lg-6 mt-2">

            <div class="card card-time">

              <div class="card-body">



                <div class="row booking-time-slot"></div>



                <div class="search-slot-loader d-none">

                     <i class="fas fa-circle-notch fa-spin fa-5x"></i>

                </div>



              </div>

            </div>



          </div>



          <div class="col-lg-12 mt-3 mb-3 pr-0">

            <!-- <strong>Select member for appointment</strong>

              <select class="form-control select2" name="user_id">

                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e(Crypt::encrypt($item->id)); ?>"><?php echo e($item->name); ?> | <?php echo e($item->email); ?> | <?php echo e($item->role); ?></option>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </select> -->





             <strong>Select Patient From Existing Customers</strong>

              <select class="form-control select2" name="user_id">

                <option value="" selected>Select Patient From Existing Customers</option>

                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e(Crypt::encrypt($item->id)); ?>"><?php echo e($item->name); ?> | <?php echo e($item->email); ?></option>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </select>

          </div>

          <div class="col-sm-12 text-center my-4 pt-1"><h5>OR</h5></div>

          <div class="col-md-4">

            <strong>Input Name of the Patient</strong>

            <input type="text" name="patient_name" placeholder="Enter Patient Name" class="form-control">

          </div>

          <div class="col-md-4">

            <strong>Input Email of the Patient</strong>

            <input type="text" name="patient_email" placeholder="Enter Patient Email" class="form-control">

          </div>



          <div class="col-md-4">

            <strong>Input Number for the Patient</strong>

            <input type="text" name="patient_phone" placeholder="Enter Patient Phone" class="form-control">

          </div>





          <div class="col-lg-12 text-right mt-4 btn-detail-next d-none">

            <div class="nav nav-tabs float-right">

                <button class="btn btn-primary" type="submit">Set Appointment</button>

            </div>

          </div>





        </div>



      </div>



  </form>



</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script type="text/javascript">

    $(document).ready(function() {

        $('.select2').select2();

    });





    $(function () {

    $('[data-toggle="tooltip"]').tooltip()

    })

    </script>

    <script>

    $(document).on('click', '#card-button', function(){



    var value = $('.required-entry:visible').filter(function () {

    return this.value === '';

    });

    if (value.length == 0)

    {

    if($('#payment_method').val() == 'paypal' || $('#payment_method').val() == 'pay-later')

    {

    $('#payment-form').submit();

    }



    }

    else if (value.length > 0)

    {

    toastr.warning("Please fill out booking form fields.");

    return false

    }





    })







    $(document).on('click', '.payments-tab .nav-link', function(){

    $('#payment_method').val($(this).data('method'));

    })

    </script>

    <script src="https://js.stripe.com/v3/"></script>









    <script>

    const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>', { locale: 'en' });

      const elements = stripe.elements(); // Create an instance of Elements.

            var style = {

                base: {

                    color: '#32325d',

                    fontFamily: '"proxima-nova", "Helvetica Neue", Helvetica, sans-serif',

                    fontSmoothing: 'antialiased',

                    fontSize: '16px',

                    '::placeholder': {

                    color: '#aab7c4'

                    }

                },

                invalid: {

                    color: '#fa755a',

                    iconColor: '#fa755a'

                }

            };



            const card = elements.create('card', {style: style, hidePostCode:true});

      const cardButton = document.getElementById('card-button');

        const clientSecret = cardButton.dataset.secret;

            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.

            card.on('change', function(event) {

                var displayError = document.getElementById('card-errors');

                if (event.error) {

                    displayError.textContent = event.error.message;

                } else {

                    displayError.textContent = '';

                }

            });



            // Handle form submission.

            var form = document.getElementById('payment-form');

            form.addEventListener('submit', function(event) {

                event.preventDefault();



                // Disable The submit button on click

                document.getElementById('card-button').disabled = true;



        stripe.createPaymentMethod({

          type: 'card',

          card: card,

          billing_details: {

            // Include any additional collected billing details.

            name: 'John Doe',

          },

          }).then(stripePaymentMethodHandler);

            });





  function stripePaymentMethodHandler(result) {

  if (result.error) {

    // Show error in payment form

    // toastr.error('Whoops! looks like issue in your card');

    document.getElementById('card-button').disabled = false;

  } else {

   // console.log(result.paymentMethod.id);

    // Otherwise send paymentMethod.id to your server (see Step 4)



    fetch('<?php echo e(route('intent')); ?>', {

      method: 'POST',

     headers: {

        "Content-Type": "application/json",

        "Accept": "application/json",

        "X-Requested-With": "XMLHttpRequest",

        "X-CSRF-Token": $('input[name="_token"]').val()

      },

    credentials: "same-origin",

      body: JSON.stringify({

        payment_method_id: result.paymentMethod.id,

        amount: <?php echo e($service->price); ?>,

        location:'<?php echo e($service->homeopath->HomeopathProfile->location); ?>',



      })

    }).then(function(result) {

      // Handle server response (see Step 4)

      result.json().then(function(json) {



    var  payment_intent_id = null;

        handleServerResponse(json, payment_intent_id);

      })

    });

  }

}







  function handleServerResponse(response , payment_intent_id) {

  if (response.error) {

    $('#modalStripe').modal('hide');

    if(response.error =='hotel price is update')

    {

      Swal.fire(

          'Hotel Booking',

          'Hotel Price has been updated',

          'warning'

        )

      setTimeout(function(){

      location.reload();

    }, 6000);



    }

    // Show error from server on payment form

  } else if (response.requires_source_action) {

    // Use Stripe.js to handle required card action



    stripe.handleCardAction(

      response.payment_intent_client_secret

    ).then(handleStripeJsResult);

  } else {



    stripe.createToken(card).then(function(respo) {

                if (respo.error) {

                    // Inform the user if there was an error.

                    var errorElement = document.getElementById('card-errors');

                    errorElement.textContent = respo.error.message;

                    // Enable The submit button

                    document.getElementById('card-button').disabled = false;

                } else {

                    // Send the token to your server.

                    stripeTokenHandler(payment_intent_id,respo.token.id);

                }

            });

  }

}



function handleStripeJsResult(result) {

  if (result.error) {











  } else {

    // The card action has been handled

    // The PaymentIntent can be confirmed again on the server

     var payment_intent_id=result.paymentIntent.id;

    fetch('<?php echo e(route('intent')); ?>', {

      method: 'POST',

     headers: {

        "Content-Type": "application/json",

        "Accept": "application/json",

        "X-Requested-With": "XMLHttpRequest",

        "X-CSRF-Token": $('input[name="_token"]').val()

      },

    credentials: "same-origin",

      body: JSON.stringify({

        payment_intent_id: result.paymentIntent.id,





      })

    }).then(function(result) {

      // Handle server response (see Step 4)

      result.json().then(function(json) {

     console.log(json);

     if(json.success==true)

     {



       handleServerResponse(json,payment_intent_id);

     }



      })

    });

  }

}







            // Submit the form with the token ID.

            function stripeTokenHandler(paymentIntent,token) {

                // Insert the token ID into the form so it gets submitted to the server

                var form = document.getElementById('payment-form');

                var hiddenInput = document.createElement('input');

                hiddenInput.setAttribute('type', 'hidden');

            hiddenInput.setAttribute('value', paymentIntent);

                form.appendChild(hiddenInput);



        var hideInput = document.createElement('input');

            hideInput.setAttribute('type', 'hidden');

            hideInput.setAttribute('value', token);

            form.appendChild(hideInput);

        // Submit the form

                form.submit();

            }

</script>













    <script>





        $("#datep").datepicker({

               minDate: 0,

               dateFormat:'yy-mm-dd',

               setDate: null,

            }).on('change',function(e){



                $('.search-slot-loader').toggleClass('d-none');

                $input_service = $("input[name='input_service']:checked").val();



                $('.input_date').val($(this).val());



                $.get("<?php echo e(route('get.service.slot')); ?>?service_id="+$input_service+'&date='+$(this).val(), function(response){



                  $('.booking-time-slot').html(response);

                  $('.btn-detail-next').removeClass('d-none');

                  $('.search-slot-loader').toggleClass('d-none');

                  checkSlideOneValidity();



                });



        });







        $("#datep").find(".ui-state-active").removeClass("ui-state-active");





        $(document).on('change', '.input__paying__type', function(){





            if($(this).val() == 'pay_later')

            {

                $('.payment-methods-btns').addClass('d-none');

                $('#pills-later-tab').click();

            }

            else

            {

                $('.payment-methods-btns').removeClass('d-none');

                $('#pills-home-tab').click();

            }



        })





    </script>



    <script>

      $(document).on('keyup', '.input-health-concern', function(){



          if($(this).val() != "")

          {

            $('.btn-payment-next').removeClass('d-none');

          }

          else

          {

            $('.btn-payment-next').addClass('d-none');

          }







      })

    </script>

    <script>

        function checkSlideOneValidity() {



            $next_btn = $('.btn-detail-next').addClass('d-none');



            // if ($(':radio[name=time_slot]', '.booking-time-slot').length)

            // {

            //     $disabled_length = $('.disabled-radio', '.booking-time-slot').length;

            //     $total_slots =  $('input', '.booking-time-slot').length;



            //     $disabled_length < $total_slots ? $next_btn.removeClass('d-none') : $next_btn.addClass('d-none');



            // }

            // else

            // {

            //     $next_btn.addClass('d-none');

            // }





        }



        $(document).on('click', ':radio[name=time_slot]', function(){



            if($(this).is(':checked'))

            {

                $('.btn-detail-next').removeClass('d-none');

            }

            else

            {

                $('.btn-detail-next').addClass('d-none');

            }



        })



    </script>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/services/homeopath/book_appointment.blade.php ENDPATH**/ ?>