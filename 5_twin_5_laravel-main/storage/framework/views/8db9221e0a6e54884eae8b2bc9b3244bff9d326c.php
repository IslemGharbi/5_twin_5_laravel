<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>
    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user-dashboard-profile">
                            <!-- User Image -->
                            <div class="profile-thumb">
                                <img src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="" class="rounded-circle"
                                    style="object-fit: fill; height: 150px; width:150px;">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center"><?php echo e(Auth::user()->name); ?></h5>
                            <p>Joined <?php echo e(Auth::user()->created_at->format('jS F Y')); ?></p>
                            <a href="<?php echo e(route('user.show', ['id' => Auth::user()->id])); ?>" class="btn btn-main-sm">View
                                Profile</a>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                <?php if(Auth::user()->freelancer): ?>
                                    <li class="active"><a href="<?php echo e(route('order.list')); ?>"><i
                                                class="fa fa-user"></i>My
                                            Orders
                                            (Freelancer)<span><?php echo e(Auth::user()->freelancer->order->count()); ?></span></a>
                                    </li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('orders')); ?>"><i class="fa fa-shopping-cart"></i> My Purchases
                                        <span><?php echo e(Auth::user()->order->count()); ?></span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Recently Favorited -->
                    <div class="widget dashboard-container my-adslist">
                        <h3 class="widget-header">My Ads</h3>
                        <table class="table table-responsive product-dashboard-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = Auth::user()->freelancer->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $i++;
                                    ?>
                                    <tr>
                                        <td class="product-thumb">
                                            <?php
                                                $j = 0;
                                            ?>
                                            <?php $__currentLoopData = $order->gig->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($j == 0): ?>
                                                    <img width="80px" height="auto" src="<?php echo e($thumbnail->url); ?>"
                                                        alt="image description">
                                                    <?php
                                                        $j++;
                                                    ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="product-details">
                                            <h3 class="title"><?php echo e($order->gig->title); ?></h3>
                                            <span class="add-id"><strong>Ordered By:</strong>
                                                <a href="<?php echo e(route('user.show', ['id' => $order->user->id])); ?>">
                                                    <?php echo e($order->user->name); ?>

                                                </a>
                                            </span>
                                            <span class="add-id"><strong>Cost:</strong>
                                                $<?php echo e($order->option->price); ?></span>
                                            <span><strong>Posted on:
                                                </strong><time><?php echo e($order->gig->created_at->format('jS F Y')); ?></time>
                                            </span>
                                            <span><strong>Deadline:
                                                </strong><time><?php echo e($order->deadline->format('jS F Y')); ?></time>
                                            </span>
                                            <?php if($order->status == 'Completed'): ?>
                                                <span style="color: green"><strong>Status</strong>Completed</span>
                                            <?php elseif($order->status == 'Cancelled'): ?>
                                                <span style="color: red"><strong>Status</strong>Cancelled</span>
                                            <?php elseif($order->status == 'Declined'): ?>
                                                <span style="color: red"><strong>Status</strong>Declined</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-category"><span
                                                class="categories"><?php echo e($order->gig->category->name); ?></span></td>
                                        <td class="action" data-title="Action">
                                            <div class="">
                                                <?php if($order->status == 'Completed'): ?>
                                                    <a href="<?php echo e(route('order.show', ['id' => $order->id])); ?>">
                                                        <span style="color: green">Completed</span>
                                                    </a>
                                                <?php elseif($order->status == 'Cancelled'): ?>
                                                    <a href="<?php echo e(route('order.show', ['id' => $order->id])); ?>">
                                                        <span style="color: red">Cancelled</span>
                                                    </a>
                                                <?php elseif($order->status == 'Declined'): ?>
                                                    <a href="<?php echo e(route('order.show', ['id' => $order->id])); ?>">
                                                        <span style="color: red">Declined</span>
                                                    </a>
                                                <?php else: ?>
                                                    <ul class="list-inline justify-content-center">
                                                        <li class="list-inline-item">
                                                            <a data-toggle="tooltip" data-placement="top" title="view"
                                                                class="view"
                                                                href="<?php echo e(route('order.show', ['id' => $order->id])); ?>">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/order/index.blade.php ENDPATH**/ ?>