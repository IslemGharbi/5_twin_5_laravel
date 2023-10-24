<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container bg-gray py-5">
    <h1><?php echo e($gig->title); ?></h1>
    <hr>
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">
            <div class="product-slider">
                <?php $__currentLoopData = $gig->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-slider-item my-4" data-image="<?php echo e($thumbnail->url); ?>">
                        <img class="img-fluid w-100" src="<?php echo e($thumbnail->url); ?>" alt="product-img">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<div class="container bg-gray py-5">
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">
            <h2>Upload Image</h2>
            <form action="<?php echo e(route('thumbnail.store')); ?> " method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="gig_id" value="<?php echo e($gig->id); ?>">
                <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>
                <div class="flex-random">
                    <input type="submit" class="btn btn-primary d-block mt-2" value="Add">
                    <a href="<?php echo e(route('gig.show', ['id' => $gig->id])); ?>"
                        class="btn btn-primary d-block mt-2">Post</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
        document.getElementById("upload-label").innerHTML = fileName;
        console.log(fileName);
    }
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/thumbnail/create.blade.php ENDPATH**/ ?>