<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gray py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><?php echo e($freelancer->user->name); ?></h1>
            <a href="<?php echo e(route('user.show', ['id' => $freelancer->user->id])); ?>" class="btn btn-primary">Done</a>
        </div>
        <hr class="my-4">
    </div>

    <div class="container">
        <fieldset class="border border-gray p-4 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Employment History</h3>
                    <?php $__currentLoopData = $freelancer->employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h6 style="margin: 0"><?php echo e($employment->title); ?> as <?php echo e($employment->status); ?></h6>
                        <p style="margin: 0"><?php echo e($employment->period); ?></p>
                        <p style="margin: 0"><?php echo e($employment->company); ?></p>
                        <form action="<?php echo e(route('employment.destroy', ['id' => $employment->id])); ?>" method="post" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this employment?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-link text-danger" onmouseover="this.style.color='red'"
                                onmouseout="this.style.color=''">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <button class="btn btn-link text-info" onmouseover="this.style.color='red'"
                            onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_<?php echo e($employment->id); ?>')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <div id="editForm_<?php echo e($employment->id); ?>" style="display: none;">
                            <form action="<?php echo e(route('employment.update', ['id' => $employment->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company:</label>
                                    <input type="text" name="company" class="form-control"
                                        value="<?php echo e($employment->company); ?>" required>
                                    <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title" class="form-control"
                                        value="<?php echo e($employment->title); ?>" required>
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="period" class="form-label">Period:</label>
                                    <input type="text" name="period" class="form-control"
                                        value="<?php echo e($employment->period); ?>" required >
                                    <?php $__errorArgs = ['period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <input type="text" name="status" class="form-control"
                                        value="<?php echo e($employment->status); ?>" required>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="toggleEditForm('editForm_<?php echo e($employment->id); ?>')">Cancel</button>
                            </form>
                        </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </fieldset>
    </div>

    <div class="container">
        <form action="<?php echo e(route('employment.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <fieldset class="border border-gray p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="company" class="form-label">Company:</label>
                            <input type="text" name="company" class="form-control" placeholder="Enter Company Name"
                                required>
                            <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="period" class="form-label">Period:</label>
                            <input type="text" name="period" class="form-control" placeholder="Enter work period in years"
                                required>
                            <?php $__errorArgs = ['period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <input type="text" name="status" class="form-control" placeholder="Enter Status" required>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
                        <button type="submit" class="btn btn-success">Add Employment</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<script>
    document.querySelector('form#qualificationForm').addEventListener('submit', function(event) {
        var companyInput = document.querySelector('input[name="company"]');
        var titleInput = document.querySelector('input[name="title"]');
        var periodInput = document.querySelector('input[name="period"]');
        var statusInput = document.querySelector('input[name="status"]');

        var companyError = document.getElementById('companyError');
        var titleError = document.getElementById('titleError');
        var periodError = document.getElementById('periodError');
        var statusError = document.getElementById('statusError');

        if (companyInput.value.trim() === '') {
            companyError.textContent = 'Company field is required.';
            event.preventDefault();
        } else {
            companyError.textContent = '';
        }

        if (titleInput.value.trim() === '') {
            titleError.textContent = 'Title field is required.';
            event.preventDefault();
        } else {
            titleError.textContent = '';
        }

        if (periodInput.value.trim() === '') {
            periodError.textContent = 'Period field is required.';
            event.preventDefault();
        } else {
            periodError.textContent = '';
        }

        if (statusInput.value.trim() === '') {
            statusError.textContent = 'Status field is required.';
            event.preventDefault();
        } else {
            statusError.textContent = '';
        }
    });

    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/employment/create.blade.php ENDPATH**/ ?>