<div class="row">
    

<nav id="sidebar">
    <div class="container1 sidebar">
        <div class="row ml-0">
            <div class=" leftside">
                <a href="<?php echo e(route('index')); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="<?php echo e(route('social.index')); ?>" style="padding: 11px 0px;"><img src="<?php echo e(asset('uploads/img/mflogo_short.png')); ?>" style="width: 24px;"> </a>
            </div>
            <div class="rightside">
                <i class="fa fa-times sidebarCollapse" aria-hidden="true"></i>
                
                <a href="#"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>" width="137"></a>
                <div class="container1 image_container">
                    <div class="row d-flex">
                        <div class="col-md-3 col-sm-3 col-3 p1-0">
                            <img src="<?php echo e(asset(Auth::user()->avatar)); ?>" width="40px" class="rounded" />
                        </div>
                        <div class="col-md-9 col-sm-9 col-9 image_name">
                            <h4><?php echo e(Auth::User()->name ?? 'Administrator'); ?></h4>
                            <p><?php echo e(Auth::User()->roles[0]->name ?? ''); ?></p>
                        </div>
                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.dashboard')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.dashboard')); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home</a>
                        </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.services.index')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.services.index')); ?>">
                        <i class="fa fa-server"></i>
                            Services</a>
                            
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.settings.index')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.settings.index')); ?>">
                        <i class="fa fa-gear"></i>
                                Settings</a>
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.link.account')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.link.account')); ?>">
                        <i class="fa fa-money"></i>
                            Link Account
                        </a>
                            
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.resources.index')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.resources.index')); ?>">
                        <i class="fa fa-book"></i>
                                Resources</a>
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.finance.index')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.finance.index')); ?>">
                        <i class="fa fa-usd"></i>
                                Finance</a>
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.documents.index')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.documents.index')); ?>">
                        <i class="fa fa-folder"></i>
                                Documents</a>
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.customers.index')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.customers.index')); ?>">
                        <i class="fa fa-users"></i>
                                Customers</a>
                    </li>

                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.index')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.appointments.index')); ?>">
                        <i class="fa fa-calendar-check"></i>
                                Appointments</a>
                    </li>

                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.calendar')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.appointments.calendar')); ?>">
                        <i class="fa fa-folder"></i>
                                Calendar</a>
                    </li>
                    <li class="list-group-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.schedule')): ?> show <?php endif; ?>">
                        <a href="<?php echo e(route('homeopath.appointments.schedule')); ?>">
                        <i class="fa fa-calendar-alt"></i>
                                My Schedule</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</div><?php /**PATH C:\xampp\htdocs\editorconfig\resources\views/homeopath/components/sidebar.blade.php ENDPATH**/ ?>