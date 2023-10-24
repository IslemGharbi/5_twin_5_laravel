<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <form action="<?php echo e(route('freelancer.store')); ?> " method="POST">
        <?php echo csrf_field(); ?>

        Experience: <input type="text" name="experience"><br>
        Rating: <input type="number" name="rating"><br>
        Available: <input type="text" name="available"><br>
        User: <input type="number" name="user_id"><br>

        <input type="submit" value="Create">
    </form>


    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/freelancer/create.blade.php ENDPATH**/ ?>