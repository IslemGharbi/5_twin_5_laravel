<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>

    <section class=" bg-gray py-5">
        <div class="container">
            <form action="<?php echo e(route('gig.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your Gig</h3>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Gig:</h6>
                            <input type="text" name="title" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Gig Title">
                            <input type="hidden" name="freelancer_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="<?php echo e(Auth::user()->id); ?>">
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your gig"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Gig Category:</h6>
                            <select name="category_id" id="inputGroupSelect" class="w-100">
                                <option selected="true" disabled="disabled">Select category</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <h6 class="font-weight-bold pt-4 pb-1">Select Gig Sub Category:</h6>
                            <select name="sub_category_id" id="inputGroupSelect" class="w-100 ignore select2 form-control"
                                style="height: 15px">
                                <option selected="true" disabled="disabled">Select category</option>
                                <?php $__currentLoopData = $sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sub_category->id); ?>"><?php echo e($sub_category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary d-block mt-2">Next</button>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('select:not(.ignore)').niceSelect();
            FastClick.attach(document.body);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/gig/create.blade.php ENDPATH**/ ?>