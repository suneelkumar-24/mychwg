<?php $__env->startSection('title', 'Register Advocate'); ?>
<?php $__env->startSection('content'); ?>
<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/headerr/img/about-us.jpg) no-repeat 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--PAGE BANNER-->
            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="inner">
                        <h2 class="text-dark">Advocate Sign Up</h2>
                        <p>Register your Advocate Account</p>
                        <p class="cmp-button-row non-mobile-only">
                            <div class="right-box">
                                <div class="screenshot"></div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--END HEADER-->

                    <section class="content">
                        <div id="vendor_registration" class="container custom-extra-top-style pt-0">
                            <div class="row justify-content-center">

                                <div class="col-xs-12 col-sm-8 col-md-6">
                                    <div class="text-center my-3">
                                        <img src="<?php echo e(asset('front/mettria.png')); ?>" style="width:230px">
                                    </div>
                                    <form method="post" action="<?php echo e(route('register')); ?>" id="advocate-reg-form">
                                        <?php echo csrf_field(); ?>
                                        <div class="text-center">
                                            <h2>Register your Advocate Account</h2>
                                            <?php if($errors->any()): ?>
                                                <?php echo implode('', $errors->all('<div class="text-danger">:message</div>')); ?>

                                            <?php endif; ?>
                                        </div>
                                        <hr class="colorgraph">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="text" placeholder="First Name*" class="form-control" name="name">
                                                    <span class="fa fa-user form-control-feedback"></span>
                                                    <span class="invalid-feedback d-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="text" placeholder="Last Name*" class="form-control" value="" id="username" name="last_name">
                                                    <span class="fa fa-user form-control-feedback"></span>
                                                    <span class="invalid-feedback d-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="email" placeholder="Email Address" class="form-control" id="email" value="" name="email">
                                            <span class="fa fa-envelope form-control-feedback"></span>
                                            <span class="invalid-feedback d-block"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                                                    <span class="fa fa-lock form-control-feedback"></span>
                                                    <span class="invalid-feedback d-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="password" placeholder="Retype Password" class="form-control" id="confirm_password" name="confirm_password">
                                                    <span class="fa fa-lock form-control-feedback"></span>
                                                    <span class="invalid-feedback d-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group has-feedback">
                                            <input type="number" placeholder="Phone" class="form-control" id="phone" name="phone" value="" min="0">
                                            <span class="invalid-feedback d-block"></span>
                                        </div>
                                        
                                        <div class="row">
                                            
                                            
                                        </div>
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">

                                                    <select class="form-control input__country" required="" name="country">

                                                      <option value="">Select Country</option>

                                                      <?php $__currentLoopData = getCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                      <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>

                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="text" placeholder="State" class="form-control" value="" id="state" name="state">
                                                    <span class="fa fa-text-width form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group has-feedback">
                                                    <input type="text" placeholder="Zip / Postal Code" class="form-control zip_code" value="" id="zip_code" name="zip_code">
                                                    <span class="invalid-feedback d-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <span class="button-checkbox t-and-c-button-checkbox">
                                                    <input type="checkbox" name="t_and_c" id="t_and_c" class="shopist-iCheck" value="1"> &nbsp;
                                                    <a href="<?php echo e(route('terms')); ?>" target="_blank"> Terms and Conditions </a>
                                                    <span class="invalid-feedback d-block"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <hr class="colorgraph">
                                        
                                        <div class="form-group">

                                            <div class="row justify-content-center">

                                                <div class="col-sm-6 text-center">

                                                    <button type="submit" class="form-control btn btn-secondary">Register my account</button>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <div class="text-center">

                                                        <a href="<?php echo e(route('login')); ?>" tabindex="5" class="register-new-user">I already have an account</a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>


                        <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="t_and_c_m_l" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Terms and Conditions</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function() {
        $('#commoditySelect').change(function() {
          if ($('#commoditySelect').val() == 'Canada') {
            $('#commodityLabel').attr("placeholder", "Postal code*");
          } else {
            $('#commodityLabel').attr("placeholder", "Zip code*");
          }
        });
      });
</script>
<script>
    $(document).on('click','.register-adv-btn',function(e){
        e.preventDefault();
        $("#advocate-reg-form").submit();

    })
    $("#zip_code").change(function() {
        var city = $("#city");
            $.getJSON("http://www.geonames.org/postalCodeLookupJSON?&country=DE&callback=?", {postalcode: this.value }, function(response) {
                console.log(response);
                console.log(city.val(response.postalcodes[0].placeName));
                if (!city.val() && response && response.postalcodes.length && response.postalcodes[0].placeName) {
                    city.val(response.postalcodes[0].placeName);
                }
            })
    });


    $(document).ready(function() {
        // validate signup form on keyup and submit
        var validator = $("#advocate-reg-form").validate({
            rules: {
                name: "required",
                user_name: {
                    required: true,
                    minlength: 2,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                store_name:"required",
                phone:"required",
                address_line_1:"required",
                address_line_2:"required",
                city:"required",
                state:"required",
                country:"required",
                zip_code:"required",
                t_and_c:{
                    required : true
                }
            },
            messages: {
                name: "Enter your Display Name",
                user_name: {
                    required: "Enter a username",
                    minlength: jQuery.validator.format("Enter at least {0} characters"),
                    remote: jQuery.validator.format("{0} is already in use")
                },
                password: {
                    required: "Provide a password",
                    minlength: jQuery.validator.format("Enter at least {0} characters")
                },
                confirm_password: {
                    required: "Repeat your password",
                    minlength: jQuery.validator.format("Enter at least {0} characters"),
                    equalTo: "Enter the same password as above"
                },
                email: {
                    required: "Enter a valid email address",
                    minlength: "Enter a valid email address"
                },
                store_name: "Enter the Store Name",
                phone: "Enter your Phone Number",
                address_line_1: "Fill the Address Field",
                address_line_2: "Fill the Address Field",
                city: "Enter your City Name",
                state: "Enter your State Name",
                country: "Enter your Country Name",
                zip_code: "Enter your Zip Code",
                t_and_c: {
                    required : "Accept the terms and conditions"
                }
            },
            // the errorPlacement has to take the table layout into account
            errorPlacement: function(error, element) {
                 // $(element).addClass('error');
                 $(element).closest('.form-group').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
            },
            // set this class to error-labels to indicate valid fields
            success: function(label) {
                // set &nbsp; as text for IE
                label.html("&nbsp;").addClass("checked");
            },
            highlight: function(element, errorClass) {
                $(element).parent().next().find("." + errorClass).removeClass("checked");
            },
            unhighlight: function (element) {
                $(element).removeClass('error');
                $(element).closest('.form-group').find('.invalid-feedback').html('');
            }
        });

    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>