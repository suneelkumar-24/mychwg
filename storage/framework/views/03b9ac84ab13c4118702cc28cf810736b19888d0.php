<?php $__env->startSection('title','Email Setting'); ?>

<?php $__env->startSection('heading','Verify Email'); ?>

<?php $__env->startSection('css'); ?>

<style>

.bg-orange{

    background-color: orange;

}

</style>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <?php

        $setting=$setting['verify_email']??'';

        $setting=json_decode($setting);



    ?>



    <section>

        <div class="row">

            <div class="col-sm-12">

                <form method="post" action="<?php echo e(route('admin.email.save')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" value="verify_email" name="email_type">



                    <div class="row">

                        <div class="col-md-6">

                            <div class="card">



                                <div class="card-header card-header-primary">

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="text-info">Caption of Email:</strong>

                                            <div class="form-group">

                                                <input type="text" value="<?php echo e($setting->hello ??''); ?>" name="hello" class="form-control w-auto">

                                            </div>

                                        </div>

                                        <div class="col-md-12 mb-2">

                                            <strong class="text-info">Subject of Email:</strong>

                                            <textarea type="text" name="subject" class="form-control small-summernote" placeholder="write subject..."><?php echo e($setting->subject??''); ?></textarea>

                                        </div>

                                        <div class="col-md-12">

                                            <strong class="text-info">Body Content of Email:</strong>

                                            <textarea type="text" name="desc" rows="5" class="form-control small-summernote">

                                                <?php echo e($setting->desc??''); ?>


                                            </textarea>

                                        </div>



                                        <div class="col-md-6 mt-2">

                                            <strong class="text-info">Signature of Email:</strong>

                                            <input type="hidden" name="set_img" value="<?php echo e($setting->image??''); ?>">

                                            <input type="file" name="image" class="form-control dropify"  data-default-file="<?php echo e(asset($setting->image??'')); ?>">

                                        </div>

                                        <div class="col-md-6"></div>



                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="card">

                                <div class="card-title bg-orange1 p-1">

                                    <h1 class="text-center text-white"><img src="<?php echo e(asset(\App\Models\Setting::where('key','logo')->first()->value ?? '')); ?>" style="width: 120px;" alt=""></h1>
                                </div>

                                <div class="card-body">

                                    <h4 id="hello"><?php echo e($setting->hello??''); ?></h4>

                                    <br>

                                    <h3 id=subject><?php echo $setting->subject??''; ?></h3>

                                    <p><span id="desc"><?php echo $setting->desc??''; ?> </span></p>

                                    <h5 id="name"><?php echo e($setting->name??'Name'); ?>: Dummy Name</h5>

                                    <h5 id="email"><?php echo e($setting->email??'Email'); ?>: dummyemail@gmail.com</h5>

                                     <?php if($setting->image??''): ?>

                                    <img src="<?php echo e(asset($setting->image??'')); ?>" alt="no image"></img>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="mb-4 text-left">

                        <button type="submit" class="btn btn-primary">Save</button>



                    </div>

                </form>

            </div>

        </div>

    </section>





<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

    <script>

        $(document).on('keyup','.form-control',function (){

            var name=$(this).attr('name')

            var val=$(this).val()

            if (name=='hello')

            {

                $('#hello').text(val)

            }

            if (name=='desc')

            {

                $('#desc').text(val)

            }

            if (name=='name')

            {

                $('#name').text(val)

            }

            if (name=='email')

            {

                $('#email').text(val)

            }

            if (name=='subject')

            {

                $('#subject').text(val)

            }

        })

    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/email_setting/admin/verifyEmail.blade.php ENDPATH**/ ?>