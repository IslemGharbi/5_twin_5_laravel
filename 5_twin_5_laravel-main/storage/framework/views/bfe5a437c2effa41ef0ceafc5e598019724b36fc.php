<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold"><?php echo e($freelancer->user->name); ?></h1>
            <a href="<?php echo e(route('user.show', ['id' => $freelancer->user->id])); ?>" class="btn btn-primary">Done</a>
        </div>
        <hr class="my-4">
    </div>

    <div class="container">
        <div class="border p-4 mb-5 bg-white">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="fw-bold mb-4">Current Qualifications</h4>
                    <?php $__currentLoopData = $freelancer->qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-1"><?php echo e($qualification->degree); ?> in <?php echo e($qualification->subject); ?></p>
                                    <p class="mb-1"><?php echo e($qualification->start); ?> - <?php echo e($qualification->end ? $qualification->end : 'Ongoing'); ?></p>
                                    <p class="mb-1"><?php echo e($qualification->school); ?></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="<?php echo e(route('qualification.destroy', ['id' => $qualification->id])); ?>" method="post" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this qualification?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-link text-danger" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-link text-info" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_<?php echo e($qualification->id); ?>')">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="editForm_<?php echo e($qualification->id); ?>" style="display: none;">
                                <form action="<?php echo e(route('qualification.update', ['id' => $qualification->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="mb-3">
                                        <label for="school" class="form-label">Institute:</label>
                                        <input type="text" name="school" class="form-control" value="<?php echo e($qualification->school); ?>" required>
                                        <?php $__errorArgs = ['school'];
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
                                        <label for="degree" class="form-label">Degree:</label>
                                        <input type="text" name="degree" class="form-control" value="<?php echo e($qualification->degree); ?>" required>
                                        <?php $__errorArgs = ['degree'];
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
                                        <label for="subject" class="form-label">Subject:</label>
                                        <input type="text" name="subject" class="form-control" value="<?php echo e($qualification->subject); ?>" required>
                                        <?php $__errorArgs = ['subject'];
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
                                        <label for="start" class="form-label">Start:</label>
                                        <input type="date" name="start" class="form-control" value="<?php echo e($qualification->start); ?>" required>
                                        <?php $__errorArgs = ['start'];
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
                                        <label for "end" class="form-label">End:</label>
                                        <input type="date" name="end" class="form-control" value="<?php echo e($qualification->end); ?>" required>
                                        <?php $__errorArgs = ['end'];
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
                                    <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_<?php echo e($qualification->id); ?>')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="<?php echo e(route('qualification.store')); ?>" method="POST" id="qualificationForm">
            <?php echo csrf_field(); ?>
            <fieldset class="border p-4 mb-5 bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="fw-bold mb-4">Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="school" class="form-label">Institute:</label>
                            <input type="text" name="school" id="school" class="form-control" placeholder="Enter Institute Name" required>
                            <?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree:</label>
                            <input type="text" name="degree" id="degree" class="form-control" placeholder="Enter Degree" required>
                            <?php $__errorArgs = ['degree'];
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
                            <label for="subject" class="form-label">Subject:</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject Name" required>
                            <?php $__errorArgs = ['subject'];
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
                            <label for="start" class="form-label">Start:</label>
                            <input type="date" name="start" id="start" class="form-control" placeholder="Enter Start Date" required>
                            <?php $__errorArgs = ['start'];
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
                            <label for="end" class="form-label">End:</label>
                            <input type="date" name="end" id="end" class="form-control" placeholder="Enter End Date (Leave Empty if ongoing)" required>
                            <?php $__errorArgs = ['end'];
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
                        <button type="submit" class="btn btn-success">Add Qualification</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<script>
    document.querySelector('form#qualificationForm').addEventListener('submit', function(event) {
        var schoolInput = document.querySelector('input[name="school"]');
        var degreeInput = document.querySelector('input[name="degree"]');
        var subjectInput = document.querySelector('input[name="subject"]');
        var startInput = document.querySelector('input[name="start"]');
        var endInput = document.querySelector('input[name="end"]');
        
        var schoolError = document.getElementById('schoolError');
        var degreeError = document.getElementById('degreeError');
        var subjectError = document.getElementById('subjectError');
        var startError = document.getElementById('startError');
        var endError = document.getElementById('endError');

        if (schoolInput.value.trim() === '') {
            schoolError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            schoolError.textContent = '';
        }

        if (degreeInput.value.trim() === '') {
            degreeError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            degreeError.textContent = '';
        }

        if (subjectInput.value.trim() === '') {
            subjectError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            subjectError.textContent = '';
        }

        if (startInput.value.trim() === '') {
            startError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            startError.textContent = '';
        }

        if (endInput.value.trim() === '') {
            endError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            endError.textContent = '';
        }
    });

    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/qualification/create.blade.php ENDPATH**/ ?>