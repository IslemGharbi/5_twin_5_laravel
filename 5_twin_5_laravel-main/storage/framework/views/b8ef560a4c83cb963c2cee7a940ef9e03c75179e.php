

<?php $__env->startSection('title', 'Home'); ?>



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Freelancer Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('freelancer.update', ['id' => $freelancer->id])); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            
                            <div class="form-group">
                                <label for="experience" class="col-md-4 control-label">Experience</label>
                                <div class="col-md-6">
                                    <input id="experience" type="text" class="form-control" name="experience" value="<?php echo e($freelancer->experience); ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rating" class="col-md-4 control-label">Rating</label>
                                <div class="col-md-6">
                                    <input id="rating" type="text" class="form-control" name="rating" value="<?php echo e($freelancer->rating); ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="available" class="col-md-4 control-label">Availability</label>
                                <div class="col-md-6">
                                    <input id="available" type="text" class="form-control" name="available" value="<?php echo e($freelancer->available); ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/freelancer/edit.blade.php ENDPATH**/ ?>