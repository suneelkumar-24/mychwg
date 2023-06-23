<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <h3 class="m-auto"><?php echo $__env->yieldContent('heading'); ?></h3>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none bg-white"><span class="user-name text-bold-600"><?php echo e(Auth::User()->name ?? 'Administrator'); ?></span><span class="user-status text-success"><?php echo e(Auth::User()->roles[0]->name ?? ''); ?></span></div><span><img class="round" src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="feather icon-user"></i>Profile</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" ><i class="feather icon-power"></i><?php echo e(__('Logout')); ?></a>
                                              
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\mychwg\resources\views/admin/components/navbar.blade.php ENDPATH**/ ?>