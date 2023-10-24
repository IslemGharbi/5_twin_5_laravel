<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <section class="user-profile section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="<?php echo e($user->profile_photo_url); ?>" alt="" class="">
                            </div>
                            <!-- User Name -->


                            <h5 class="text-center"style="color: #1E90FF;"><?php echo e($user->name); ?>

                                <?php if(Auth::user()): ?>
                                    <?php if($user->id === Auth::user()->id): ?>
                                    <br></br>
                                        <a href="<?php echo e(route('profile.show')); ?>">
                                            <i class="fa fa-pencil">Edit Profile
                                            </i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </h5>
                        </div>
                        <?php if($user->freelancer): ?>
                            <!-- Dashboard Links -->
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Professional Skills</h4>
                                    <?php if(Auth::user()): ?>
                                        <?php if($user->id === Auth::user()->id): ?>
                                            <a href="<?php echo e(route('skill.create', ['id' => $user->freelancer->id])); ?>">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php $__currentLoopData = $user->freelancer->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p style="margin: 0"><?php echo e($skill->name); ?></p>
    <?php if($skill->level === 'Professional'): ?>
        <?php
            $star = 5;
            $blank = 0;
        ?>
    <?php elseif($skill->level === 'Semi-Professional'): ?>
        <?php
            $star = 4;
            $blank = 1;
        ?>
    <?php elseif($skill->level === 'Advance'): ?>
        <?php
            $star = 3;
            $blank = 2;
        ?>
    <?php elseif($skill->level === 'Limited'): ?>
        <?php
            $star = 2;
            $blank = 3;
        ?>
    <?php else: ?>
        <?php
            $star = 1;
            $blank = 4;
        ?>
    <?php endif; ?>
    <ul class="list-inline">
        <?php for($i = 0; $i < $star; $i++): ?>
            <li class="list-inline-item">
                <i class="fa fa-star" style="color: #1E90FF;"></i>
            </li>
        <?php endfor; ?>
        <?php for($i = 0; $i < $blank; $i++): ?>
            <li class="list-inline-item">
                <i class="fa fa-star-o" style="color: #1E90FF;"></i>
            </li>
        <?php endfor; ?>
    </ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Languages</h4>
                                    <?php if(Auth::user()): ?>
                                        <?php if($user->id === Auth::user()->id): ?>
                                            <a href="<?php echo e(route('language.create', ['id' => $user->freelancer->id])); ?>">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php $__currentLoopData = $user->freelancer->language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p style="margin: 0"><?php echo e($language->name); ?></p>
                                    <?php if($language->level === 'Native'): ?>
                                        <?php
                                            $star = 5;
                                            $blank = 0;
                                        ?>
                                    <?php elseif($language->level === 'Professional'): ?>
                                        <?php
                                            $star = 4;
                                            $blank = 1;
                                        ?>
                                    <?php elseif($language->level === 'Advance'): ?>
                                        <?php
                                            $star = 3;
                                            $blank = 2;
                                        ?>
                                    <?php elseif($language->level === 'Limited'): ?>
                                        <?php
                                            $star = 2;
                                            $blank = 3;
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $star = 1;
                                            $blank = 4;
                                        ?>
                                    <?php endif; ?>
                                    <ul class="list-inline">
                                        <?php for($i = 0; $i < $star; $i++): ?>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"style="color: #1E90FF;"></i>
                                            </li>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < $blank; $i++): ?>
                                            <li class="list-inline-item"style="color: #1E90FF;">
                                                <i class="fa fa-star-o"style="color: #1E90FF;"></i>
                                            </li>
                                        <?php endfor; ?>

                                    </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Qualification</h4>
                                    <?php if(Auth::user()): ?>
                                        <?php if($user->id === Auth::user()->id): ?>
                                            <a
                                                href="<?php echo e(route('qualification.create', ['id' => $user->freelancer->id])); ?>">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php $__currentLoopData = $user->freelancer->qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h6 style="margin: 0"><?php echo e($qualification->degree); ?> in
                                        <?php echo e($qualification->subject); ?></h6>
                                    <p style="margin: 0"><?php echo e($qualification->start); ?>

                                        <?php if($qualification->end != null): ?>
                                            - <?php echo e($qualification->end); ?>

                                        <?php else: ?>
                                            - ongoing
                                        <?php endif; ?>
                                    </p>
                                    <p style="margin: 0" ><?php echo e($qualification->school); ?></p>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Employment History</h4>
                                    <?php if(Auth::user()): ?>
                                        <?php if($user->id === Auth::user()->id): ?>
                                            <a href="<?php echo e(route('employment.create', ['id' => $user->freelancer->id])); ?>">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php $__currentLoopData = $user->freelancer->employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h6 style="margin: 0"><?php echo e($employment->title); ?> as
                                        <?php echo e($employment->status); ?></h6>
                                    <p style="margin: 0"><?php echo e($employment->period); ?></p>
                                    <p style="margin: 0"><?php echo e($employment->company); ?></p>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                    <!-- Edit Profile Welcome Text -->
                    <div class="widget welcome-message">
                        <h2 style="color: #1E90FF;">About Me</h2>
                        <p>Gender: <?php echo e($user->gender); ?></p>
                        <p>Date of Birth: <?php echo e($user->dob); ?></p>

                    </div>

                    <?php if($user->freelancer): ?>
                        <div class="widget welcome-message">
                            <h1 style="color: #1E90FF;"><?php echo e($user->name); ?>'s Gigs</h1>
                            <br>
                            <?php $__currentLoopData = $user->freelancer->gig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($gig->option) != 0 && count($gig->thumbnail) != 0): ?>
                                    <div class="col-sm-12 col-lg-12">
                                        <!-- product card -->
                                        <div class="product-item bg-light">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <!-- <div class="price">$200</div> -->

                                                    <?php
                                                        $i = 0;
                                                    ?>
                                                    <a href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>">
                                                        <?php $__currentLoopData = $gig->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($i == 0): ?>

                                                                <img class="card-img-top img-fluid"
                                                                    src="<?php echo e($thumbnail->url); ?>"
                                                                    alt="images/products/products-1.jpg"
                                                                    alt="Card image cap">
                                                                <?php
                                                                    $i++;
                                                                ?>
                                                            <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div>

                                                        <h4 class="card-title"><a
                                                                href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>"><?php echo e($gig->title); ?></a>
                                                        </h4>
                                                        <ul class="list-inline product-meta">
                                                            <li class="list-inline-item">
                                                                <i class="fa fa-folder-open-o">
                                                                    <a href="single.html">
                                                                        <?php echo e($gig->category->name); ?></a>
                                                                    / <a
                                                                        href="single.html"><?php echo e($gig->sub_category->name); ?></a>
                                                                </i>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"><i
                                                                        class="fa fa-calendar"></i><?php echo e($gig->created_at); ?></a>
                                                            </li>
                                                        </ul>
                                                        <h2 class="card-text" style="text-align: center">

                                                            <?php $__currentLoopData = $gig->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($loop->first): ?>
                                                                    $<?php echo e($option->price); ?>

                                                                <?php elseif($loop->last): ?>
                                                                    - $<?php echo e($option->price); ?>

                                                                <?php endif; ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php if(Auth::user()): ?>
                                        <?php if($user->id === Auth::user()->id): ?>
                                            <div class="col-sm-12 col-lg-12">
                                                <!-- product card -->
                                                <div class="product-item bg-light">
                                                    <div class="card">
                                                        <div class="thumb-content">
                                                            <!-- <div class="price">$200</div> -->

                                                            <?php
                                                                $i = 0;
                                                            ?>
                                                            <a href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>">
                                                                <?php $__currentLoopData = $gig->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($i == 0): ?>

                                                                        <img class="card-img-top img-fluid"
                                                                            src="<?php echo e($thumbnail->url); ?>"
                                                                            alt="images/products/products-1.jpg"
                                                                            alt="Card image cap">
                                                                        <?php
                                                                            $i++;
                                                                        ?>
                                                                    <?php endif; ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div>

                                                                <h4 class="card-title"><a
                                                                        href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>"><?php echo e($gig->title); ?></a>
                                                                </h4>
                                                                <ul class="list-inline product-meta">
                                                                    <li class="list-inline-item">
                                                                        <i class="fa fa-folder-open-o">
                                                                            <a href="single.html">
                                                                                <?php echo e($gig->category->name); ?></a>
                                                                            / <a
                                                                                href="single.html"><?php echo e($gig->sub_category->name); ?></a>
                                                                        </i>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="#"><i
                                                                                class="fa fa-calendar"></i><?php echo e($gig->created_at); ?></a>
                                                                    </li>
                                                                </ul>
                                                                <h2 class="card-text" style="text-align: center">

                                                                    <?php $__currentLoopData = $gig->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($loop->first): ?>
                                                                            $<?php echo e($option->price); ?>

                                                                        <?php elseif($loop->last): ?>
                                                                            - $<?php echo e($option->price); ?>

                                                                        <?php endif; ?>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <?php if($user->id === Auth::user()->id): ?>

                            <form method="POST" action="<?php echo e(route('freelancer.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                <button class="btn btn-primary d-block mt-2" type="submit"style="background-color: #3498db; border-color: #3498db">Join As a
                                    Freelancer</button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/user/show.blade.php ENDPATH**/ ?>