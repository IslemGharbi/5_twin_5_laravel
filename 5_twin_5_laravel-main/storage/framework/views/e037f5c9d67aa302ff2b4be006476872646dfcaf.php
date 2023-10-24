<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="<?php echo e(route('category.search')); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <select class="form-control wide" name="data" id="inputtext4">
                                        <option selected="true" disabled="disabled">Select category</option>
                                        <?php $__currentLoopData = $sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sub_category->id); ?>">
                                                <?php echo e($sub_category->name); ?>(<?php echo e($sub_category->category->name); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary" style="padding-bottom:10px;">Search
                                        Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <?php if($result): ?>
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h2>Results For "<?php echo e($results->sub_category->name); ?>"</h2>
                            <?php break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if($result->count() == 0): ?>
                            <h2>No Data Available</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            <?php if($result): ?>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-12 col-lg-4 col-md-6">
                                        <!-- product card -->
                                        <div class="product-item bg-light">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <!-- <div class="price">$200</div> -->
                                                    <a href="<?php echo e(route('gig.show', ['id' => $result->id])); ?>">
                                                        <?php $__currentLoopData = $result->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($loop->first): ?>
                                                                <img class="card-img-top img-fluid"
                                                                    src="<?php echo e($thumbnail->url); ?>"
                                                                    alt="images/products/products-1.jpg"
                                                                    alt="Card image cap">
                                                            <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title"><a
                                                            href="<?php echo e(route('gig.show', ['id' => $result->id])); ?>"><?php echo e($result->title); ?></a>
                                                    </h4>
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="single.html"><i
                                                                    class="fa fa-folder-open-o"></i><?php echo e($result->category->name); ?></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i
                                                                    class="fa fa-calendar"></i><?php echo e($result->created_at); ?></a>
                                                        </li>
                                                    </ul>
                                                    <h2 class="card-text" style="text-align: center">
                                                        <?php $__currentLoopData = $result->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/gig/browse.blade.php ENDPATH**/ ?>