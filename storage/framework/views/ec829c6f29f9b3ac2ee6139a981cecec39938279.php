<?php $__env->startSection('title','Resources Management'); ?>

<?php $__env->startSection('heading','Resources Management'); ?>



<?php $__env->startSection('content'); ?>

<div class="row mt-1">





    <!--Resources RECORD DATA-->

    <div class="col-sm-12 mb-4">

        <div class="card">

        <h6 class="m-0"><span class="text-white bg-dark p-1">Resource Management</span></h6>

                <div class="p-1">

                    <div class="row w-100">

                        <div class="col-md-12 pr-0 text-right">

                            <button class="border-0 bg-white btn-add-resource" title="Add Resource" data-action="<?php echo e(route('homeopath.resources.create')); ?>"><i class="fas fa-plus fa-2x text-secondary"></i></button>

                        </div>

                    </div>

                </div>

                <div class="card-content">

                    <div class="card-body pt-0">

                        <div class="table-responsive">

                            <table class="table datatable p-0">

                                <thead>

                                    <tr>

                                        <th>Sr #</th>

                                        <th>Title</th>

                                        <th>Author</th>

                                        <th>Description</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                   <?php $__currentLoopData = Auth::user()->HomeopathResources->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <th><?php echo e($loop->iteration); ?></th>

                                            <th><?php echo e($item->title); ?></th>

                                            <td><?php echo e($item->author ?? ''); ?></td>

                                            <td><?php echo $item->description ?? 'N/A'; ?></td>

                                            <th class="text-right">

                                                <button 

                                                    data-action="<?php echo e(route('homeopath.resources.update')); ?>"

                                                    data-id="<?php echo e(Crypt::encrypt($item->id)); ?>"

                                                    data-title="<?php echo e($item->title); ?>"

                                                    data-author="<?php echo e($item->author); ?>"

                                                    data-description="<?php echo e($item->description); ?>"

                                                    data-image="<?php echo e(asset($item->image)); ?>"

                                                    data-file="<?php echo e(asset($item->attachment)); ?>"

                                                    class="btn btn-sm btn-info btn-update-resource" 

                                                    title="Edit">

                                                    <i class="fa fa-edit"></i>

                                                </button>

                                                <a 

                                                    href="<?php echo e(route('homeopath.resources.delete', Crypt::encrypt($item->id))); ?>" 

                                                    class="btn btn-sm btn-danger" 

                                                    title="Trash" 

                                                    onclick="return confirm('Do you confirm to remove this? Yes! Press OK...')">

                                                    <i class="fa fa-trash"></i>

                                                </a>

                                            </th>

                                        </tr>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </table>

                        </div>

                    </div>

                </div> 

            </div>

    </div>











</div>



































<!--==================================================================-->

                        <!--MODAL SECTIONS-->

<!--==================================================================-->

<!-- Button trigger modal -->



<!-- Modal for ADD/UPDATE category -->

<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Resource</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" id="resource_id">







                    <div class="row">



                        <div class="col-sm-6">

                            <div class="input-group mb-2 ">

                                <label>Resource Title</label>

                                <input type="text" class="form-control w-100" id="title" name="title" placeholder="e.g. Understanding Nutrition" required="">

                            </div>

                            

                        </div>

                        <div class="col-sm-6">

                            <div class="input-group mb-2 ">

                                <label>Resource Author</label>

                                <input type="text" class="form-control w-100" id="author" name="author" value="<?php echo e(Auth::user()->name); ?>" required="">

                            </div>

                            

                        </div>

                        

                        <div class="col-sm-12">

                    <div class=" mb-2">

                        <label>Resource Description</label>

                        <textarea id="descriptions" class="form-control w-100" id="" rows="3" name="description"></textarea>

                    </div>

                                <label>Avatar (Recommended 370 x 560 px)</label>

                        </div>

                        <div class="col-sm-8">

                            <div class="input-group mb-2 ">

                                <input type="file" name="image" class="form-control dropify" accept="image/*" data-default-file="">

                            </div>

                        </div>

                        <div class="col-sm-4">                        

                            <img src="" id="image" class="w-100">

                        </div>

                    </div>



                    

                     <label>Attachment</label>

                        <div class="input-group mb-2 ">

                           

                            

                            <input id="attachment" type="file" name="attachment" class="form-control " data-default-file="">

                        </div>

                        <a target="_blank" href="" id="view_attachment" class="d-none text-primary font-weight-bold">View Attachment</a>



                    <div class=" text-right">

                            <button type="submit" class="btn btn-dark">Save</button>

                        </div>



                </form>

            </div>

        </div>

    </div>

</div>























<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script>

    $(document).on('click', '.btn-add-resource', function(){

        $modal = $('#modalAddCategory');

        $modal.find('form').attr('action', $(this).data('action'));

        $('#title').val('');

        

        $('#resource_id').val('');

        $('#image').attr('src',' ');

        $('#view_attachment').addClass('d-none');

        // $('.ck .ck-content').text(' ');



        $modal.modal('show');

    })



    $(document).on('click', '.btn-update-resource', function(){

        $modal = $('#modalAddCategory');

        $modal.find('form').attr('action', $(this).data('action'));

        $('#resource_id').val($(this).data('id'));

        $('#title').val($(this).data('title'));

        $('#author').val($(this).data('author'));

        $('#descriptions').text($(this).data('description'));

        $('#image').attr('src', $(this).data('image'));

        $('#view_attachment').attr('href', $(this).data('file'));

        $('#view_attachment').removeClass('d-none');

            

        // ClassicEditor.create(document.querySelector('#description'))

        //     .then(editor => {

        //         descriptionEditor = editor;

        //     });





        //   $(".ck-editor").last().remove();



        $modal.modal('show');

    })





        

    

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/resources/index.blade.php ENDPATH**/ ?>