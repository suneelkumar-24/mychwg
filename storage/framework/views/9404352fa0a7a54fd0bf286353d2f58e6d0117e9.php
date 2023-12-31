
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(env('APP_NAME')); ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset($setting['favicon'] ?? '')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/toastr.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/vendors.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/tether-theme-arrows.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/tether.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/themes/semi-dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/dropify/css/dropify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ijaboCrop/ijaboCropTool.min.css')); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/menu/menu-types/horizontal-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/custom.css')); ?>">
    <!-- END: Page CSS-->
    <style>
        .btn
        {
            border-radius: 0 !important;
        }
        .custom-toast
        {
                background-color: #ffffff;
                color: #000;
                border: none;
                box-shadow: 0 0.25rem 0.75rem rgb(34 41 47 / 15%);
        }

    </style>
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">


        <!-- toaster -->


    <!-- BEGIN: Navbar-->
    <?php echo $__env->make('advocate.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--End: Navbar-->

    <!-- BEGIN: Sidebar-->
    <!--  -->
    <!-- END: Sidebar-->



    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </div>
<?php

$last = url()->current();
$split = explode("/", $last);

$text_name=$split[count($split)-1];

$text=$setting[$text_name.'-toast']??'';



?>
    <!-- toaster -->

<?php if($text): ?>
    <div class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="70000" style="position: fixed; z-index:999999 ; top: 1rem; margin: 3% auto;left: 0;right: 0;">
        <div class="toast-body" style="font-size: 14px;">
        <div style="display: flex; padding: 5px 8px;">
            <i class="fa fa-info-circle" aria-hidden="true" style="background-color:#ffffff; color: black;font-size: 26px; margin-top: 1px;">
            </i>
             <span style="padding: 0px 15px;" class="toast-text">
                <?php echo e($text); ?>

             </span>
        </div>
        </div>
    </div>
<?php endif; ?>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <a href="<?php echo e(route('get.more.badges')); ?>" class="report-float bg-dark" title="Learn How to Get More Badges?">
        <i class="fas fa-award"></i>
    </a>


    <script src="<?php echo e(asset('admin/vendors/js/vendors.min.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('ijaboCrop/ijaboCropTool.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.checkboxes.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/dropify/js/dropify.min.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo e(asset('admin/vendors/js/extensions/tether.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/core/app.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/scripts/components.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/scripts/ui/data-list-view.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/map_autocomplete.js')); ?>"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>

    $(document).ready(function(){
        var deleteID = document.querySelectorAll(".alert-confirm");
        deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("href");
                swal({
                    title: 'Are you sure?',
                    text: 'You want be to do this?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = $url;
                    }

                    });
            });
            });
        });
    </script>
    <script>
       	<?php if(session('message')): ?>
            toastr.success("<?php echo e(session('message')); ?>");
        <?php elseif(session('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
        $('.dropify').dropify();
    </script>
    <script>
  $( function() {
    $( ".datepicker" ).datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd'
    });
  } );
  </script>
<script type="text/javascript">
        function showToastMessage()
        {

            var url =window.location.href;
             var parts = url.split("/");
            var last_part = parts[parts.length-1];
            last_part=last_part+'-toast';


            // $('.toast-text').text('');
            // var text="<?php echo e($setting['dashboard-toast']??''); ?>"
            // $('.toast-text').text(text);
            $('.toast').toast('show');
        }
        $(document).ready(function(){

            showToastMessage()
        });
</script>

    <?php echo $__env->yieldContent('js'); ?>

</body>
<!-- END: Body-->

</html>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/layouts/advocate.blade.php ENDPATH**/ ?>