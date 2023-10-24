<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('View Categories')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="<?php echo e(route('category.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- Post Your ad start -->
                    <fieldset class="border border-gary p-4 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Add New Category</h2>
                            </div>
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold pt-4 pb-1">Name:</h6>
                                <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Enter Category">
                                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="<?php echo e(route('sub_category.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <!-- Post Your ad start -->
                        <fieldset class="border border-gary p-4 mb-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Add New Sub Category</h2>
                                </div>
                                <div class="col-lg-12">
                                    <h6 class="font-weight-bold pt-4 pb-1">Name:</h6>
                                    <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                        placeholder="Enter Sub Category">
                                    <h6 class="font-weight-bold pt-4 pb-1">Category:</h6>
                                    <select name="category_id" id="inputGroupSelect" class="w-100">
                                        <option selected="true" disabled="disabled">Select Category </option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <?php $__currentLoopData = $category2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <?php echo e($category->name); ?>

                        </h2>
                        <?php
                            $i = 1;
                        ?>
                        <table class="table">
                            <?php $__currentLoopData = $category->sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($sub_category->name); ?></td>
                                    <td>Edit Delete</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/dashboard.blade.php ENDPATH**/ ?>