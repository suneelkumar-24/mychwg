<?php $__env->startSection('title','Roles'); ?>
<?php $__env->startSection('heading','Update Role'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-sm-12">
        <div class="card min-height-500">
            <div class="card-body">
                <h4 class="pb-1">Update Role</h4>

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="form form-horizontal roles-form" action="<?php echo e(route('admin.roles.update', $role->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="fname-icon" class="form-control" name="name" value="<?php echo e($role->name); ?>" placeholder="Role Name" autocomplete="off" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-zap"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="table-responsive border rounded px-1 ">
                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50"></i>Permission</h6>
                                    <ul class="list-group list-group-flush">

                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="checkbox" id="<?php echo e($permission->id); ?>" value="<?php echo e($permission->id); ?>" name="permissions[]" <?php if(in_array($permission->id, $role->permissions->pluck('id')->toArray())): ?> checked <?php endif; ?>>
                                            <label class="form-check-label text-capitalize float-right font-weight-bold" for="<?php echo e($permission->id); ?>"><?php echo e(str_replace('_', ' ', $permission->name)); ?></label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12 text-right mt-2">

                                <div class="btn-group">
                                    <button type="submit" class="btn btn-relief-primary">Submit</button>
                                    <a class="btn btn-relief-danger" href="<?php echo e(url()->previous()); ?>">Cancel</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/roles/edit_roles.blade.php ENDPATH**/ ?>