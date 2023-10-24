<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>

    <section class=" bg-gray py-5">
        <div class="container">
            <div class="flex-random">
                <h1><?php echo e($gig->title); ?></h1>
                <a href="<?php echo e(route('thumbnail.create', ['id' => $gig->id])); ?>" class="btn btn-primary d-block mt-2">Next</a>
            </div>
            <hr>
            <div class="row">
                <?php $__currentLoopData = $gig->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                            <div class="package-content-heading border-bottom">
                                <i class="fa fa-paper-plane"></i>
                                <h2><?php echo e($option->name); ?></h2>
                                <h4 class="py-3"> <span>$<?php echo e($option->price); ?></span></h4>
                            </div>
                            <p><?php echo $option->description; ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr>
        </div>

        <div class="container">

            <form action="<?php echo e(route('option.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Add New</h2>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Option Title:</h6>
                            <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Option Title">
                            <input type="hidden" name="gig_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="<?php echo e($gig->id); ?>">
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your gig option"></textarea>
                            <h6 class="font-weight-bold pt-4 pb-1">Price:</h6>
                            <input type="text" name="price" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Option Price">
                        </div>

                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/option/create.blade.php ENDPATH**/ ?>