<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="<?php echo e(route('gig.list')); ?>">
                        <img src="<?php echo e(url('images/logo.png')); ?>" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo e(route('gig.list')); ?>">Home</a>
                            </li>

                            <?php if(Auth::user()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('orders')); ?>">Your Orders</a>
                                </li>

                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Freelancing <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <?php if(!Auth::user()->freelancer): ?>

                                            <form method="POST" action="<?php echo e(route('freelancer.store')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                <button class="dropdown-item" type="submit">Join As a
                                                    Freelancer</button>
                                            </form>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="<?php echo e(route('gig.create.view')); ?>">Add
                                                Gigs</a>
                                            <a class="dropdown-item" href="<?php echo e(route('order.list')); ?>">View
                                                Orders</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('about')); ?>">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            <li class="nav-item">
                                <?php if(!Auth::user()): ?>
                                    <a class="nav-link login-button" href="<?php echo e(route('login')); ?>">Login</a>
                                <?php else: ?>
                                    <a class="nav-link login-button"
                                        href="<?php echo e(route('user.show', ['id' => Auth::user()->id])); ?>"><?php echo e(Auth::user()->name); ?></a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if(Auth::user()): ?>
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="nav-link text-white add-button" type="submit"><i
                                                class="fa fa-sign-out"></i> Logout</button>
                                    </form>
                                <?php else: ?>
                                    <a class="nav-link login-button" href="<?php echo e(route('register')); ?>">Register</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/layouts/freelancer/nav.blade.php ENDPATH**/ ?>