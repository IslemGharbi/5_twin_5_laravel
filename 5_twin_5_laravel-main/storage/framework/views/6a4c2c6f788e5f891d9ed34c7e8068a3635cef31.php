

<?php $__env->startSection('title', 'Create Certificate'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-light py-5">
    <div class="container">
        <h1 class="fw-bold">Create Certificate</h1>
        <form action="<?php echo e(route('certificates.store', [ $skill->id ])); ?>" method="POST" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description">
            </div>
            <div class="mb-3">
                <label for="pdf_file" class="form-label">Upload PDF:</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/certificates/create.blade.php ENDPATH**/ ?>