<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <section id="content" class="container">
        <!-- Begin .page-heading -->
        <div class="page-heading">
            <div class="media clearfix">
                <div class="media-left pr30">
                    <a href="#">
                        <img class="media-object mw150"
                            src="<?php echo e(asset('storage/' . $freelancer->user->profile_photo_path)); ?>" alt="..."
                            class="rounded-circle" width="200" height="200">
                    </a>
                </div>
                <div class="media-body va-m">
                    <h2 class="media-heading"><?php echo e($freelancer->user->name); ?>

                        <small> - Profile</small>
                    </h2>
                    <p class="lead">
                        <span class="panel-icon">
                            <i class="fa fa-star"></i>
                        </span>
                        <span class="panel-title"> <?php echo e($freelancer->rating); ?> </span>
                    </p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-star"></i>
                        </span>
                        <span class="panel-title"> Languages</span>
                    </div>
                    <div class="panel-body pn">
                        <ul>
                            <?php $__currentLoopData = $freelancer->language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($language->name); ?> - <?php echo e($language->level); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-trophy"></i>
                        </span>
                        <span class="panel-title"> My Skills</span>
                    </div>
                    <div class="panel-body pb5">
                        <ul>
                            <?php $__currentLoopData = $freelancer->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($skill->name); ?> - <?php echo e($skill->level); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <span class="panel-title">Work Experience</span>
                    </div>
                    <div class="panel-body pb5">
                        <?php $__currentLoopData = $freelancer->employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <h4><?php echo e($employment->title); ?></h4>
                            <p class="text-muted"> <?php echo e($employment->company); ?>

                                <br> <?php echo e($employment->status); ?>, <?php echo e($employment->period); ?>

                            </p>

                            <hr class="short br-lighter">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <span class="panel-title">Educational Qualification</span>
                    </div>
                    <div class="panel-body pb5">
                        <?php $__currentLoopData = $freelancer->qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <h4><?php echo e($qualification->degree); ?>, <?php echo e($qualification->subject); ?></h4>
                            <p class="text-muted"> <?php echo e($qualification->school); ?>

                                <br> <?php echo e($qualification->start); ?>- <?php echo e($qualification->end); ?>

                            </p>

                            <hr class="short br-lighter">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="tab-block">
                    <div class="tab-content p30" style="height:auto;">
                        <?php $__currentLoopData = $freelancer->gig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3>
                                <a href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>">
                                    <?php echo e($gig->title); ?>

                                </a>
                            </h3>
                            <p>
                                <?php echo e($gig->description); ?>

                            </p>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/freelancer/show.blade.php ENDPATH**/ ?>