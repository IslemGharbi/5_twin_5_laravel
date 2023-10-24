<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title"><?php echo e($gig->title); ?></h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a
                                        href="<?php echo e(route('user.show', ['id' => $gig->freelancer->user->id])); ?>"><?php echo e($gig->freelancer->user->name); ?></a>
                                </li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                                        href="#"><?php echo e($gig->category->name); ?> </a>/ <a href="#">
                                        <?php echo e($gig->sub_category->name); ?></a></li>
                                <li class="list-inline-item"><i
                                        class="fa fa-calendar"></i><?php echo e($gig->created_at->format('jS F Y')); ?></li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="product-slider">
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $gig->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-slider-item my-4" data-image="<?php echo e($thumbnail->url); ?>">
                                    <img class="img-fluid w-100 sizefit" src="<?php echo e($thumbnail->url); ?>" alt="product-img">
                                </div>
                                <?php
                                    $i++;
                                ?>
                                <?php if($loop->last): ?>
                                    <?php while($i < 5): ?>
                                        <?php
                                            $i++;
                                        ?>
                                        <div class="product-slider-item my-4" data-image="<?php echo e($thumbnail->url); ?>">
                                            <img class="img-fluid w-100 sizefit" src="<?php echo e($thumbnail->url); ?>"
                                                alt="product-img">
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Purchase</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                        href="#pills-contact" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Gig Description</h3>
                                    <p><?php echo $gig->description; ?></p>
                                    <br>
                                    <hr>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <?php $__currentLoopData = $gig->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-12" style="margin-bottom: 10px">
                                                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                                                    <div class="package-content-heading border-bottom">
                                                        <h2><?php echo e($option->name); ?></h2>
                                                        <h4 class="py-3"> <span>$<?php echo e($option->price); ?></span>
                                                        </h4>
                                                    </div>

                                                    <p><?php echo $option->description; ?></p>
                                                    <?php
                                                        $h = 0;
                                                    ?>

                                                    <?php if(Auth::user()): ?>
                                                        <?php if(Auth::user()->id != $option->gig->freelancer_id): ?>

                                                            <?php $__currentLoopData = $option->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($order->user_id === Auth::user()->id && $order->status != 'Cancelled' && $order->status != 'Completed'): ?>
                                                                    <?php
                                                                        $h = 1;
                                                                    ?>
                                                                    <a href="<?php echo e(route('order.show', ['id' => $order->id])); ?>"
                                                                        class="btn btn-warning">Show Order</a>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($h == 0): ?>
                                                                <a href="<?php echo e(route('checkout.new', ['id' => $option->id, 'amount' => $option->price])); ?>"
                                                                    class="btn btn-primary">Buy Now</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <h3 class="tab-title">Product Review</h3>
                                    <div class="product-review">
                                        <?php $__currentLoopData = $gig->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="media">
                                                <!-- Avater -->
                                                <img alt="<?php echo e(url('images/user/user-thumb.jpg')); ?>"
                                                    src="<?php echo e($comment->user->profile_photo_url); ?>">
                                                <div class="media-body">
                                                    <div class="name">
                                                        <h5><?php echo e($comment->user->name); ?></h5>
                                                    </div>
                                                    <div class="date">
                                                        <p><?php echo e($comment->created_at); ?></p>
                                                    </div>
                                                    <div class="review-comment">
                                                        <p>
                                                            <?php echo e($comment->text); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="review-submission">
                                            <h3 class="tab-title">Submit your review</h3>
                                            <!-- Rate -->
                                            <?php if(Auth::user()): ?>
                                                <div class="review-submit">
                                                    <form action="<?php echo e(route('comment.store')); ?>" class="row"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="col-lg-12">
                                                            <input type="hidden" name="user_id" id="name"
                                                                class="form-control" placeholder="Name"
                                                                value="<?php echo e(Auth::user()->id); ?>">
                                                            <input type="hidden" name="gig_id" id="name"
                                                                class="form-control" placeholder="Name"
                                                                value="<?php echo e($gig->id); ?>">
                                                            <strong><?php echo e(Auth::user()->name); ?></strong>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea name="text" id="review" rows="10"
                                                                class="form-control" placeholder="Message"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-main">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>


                                            <?php else: ?>

                                                <p><a href="">Login To Comment</a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Seller</h4>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5"
                                src="<?php echo e($gig->freelancer->user->profile_photo_url); ?>" alt="">
                            <h4><a
                                    href="<?php echo e(route('user.show', ['id' => $gig->freelancer->user->id])); ?>"><?php echo e($gig->freelancer->user->name); ?></a>
                            </h4>
                            <p class="member-time">Member Since <?php echo e($gig->freelancer->created_at); ?></p>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a
                                        href="<?php echo e(route('user.show', ['id' => $gig->freelancer->user->id])); ?>"
                                        class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">See all
                                        gigs</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Map Widget -->

                        <!-- Rate Widget -->
                        <div class="widget rate">
                            <!-- Heading -->
                            <h5 class="widget-header text-center">What would you rate
                                <br>
                                this product
                            </h5>
                            <!-- Rate -->
                            <div class="starrr"></div>
                        </div>
                        <!-- Safety tips widget -->
                        <div class="widget disclaimer">
                            <h5 class="widget-header">Safety Tips</h5>
                            <ul>
                                <li>Meet seller at a public place</li>
                                <li>Check the item before you buy</li>
                                <li>Pay only after collecting the item</li>
                                <li>Pay only after collecting the item</li>
                            </ul>
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <?php if(Auth::user()): ?>
                                <?php if(Auth::user()->freelancer): ?>
                                    <p>Wanna add a gig too? Add your own gig Now!
                                    </p>
                                    <!-- Submii button -->
                                    <a href="<?php echo e(route('gig.create.view')); ?>" class="btn btn-transparent-white">Add
                                        Gig</a>
                                <?php else: ?>
                                    <p>Wanna be a seller too? Join as a Freelancer Now!
                                    </p>
                                    <!-- Submii button -->
                                    <form method="POST" action="<?php echo e(route('freelancer.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                        <button class="btn btn-success" type="submit">Join As a
                                            Freelancer</button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-transparent-white">Login</a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>


<?php $__env->stopSection(); ?>














<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/gig/show.blade.php ENDPATH**/ ?>