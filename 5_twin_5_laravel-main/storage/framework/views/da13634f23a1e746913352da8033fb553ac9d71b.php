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
                    <h4 class="fw-bold mb-4">Current Languages</h4>

                    <?php $__currentLoopData = $freelancer->language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <p class="mb-1"><?php echo e($language->name); ?></p>
                                    <ul class="list-inline mb-0">
                                        <?php
                                            $stars = ['Native' => 5, 'Professional' => 4, 'Advance' => 3, 'Limited' => 2, 'Beginner' => 1];
                                        ?>
                                        <?php for($i = 0; $i < $stars[$language->level]; $i++): ?>
                                            <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 5 - $stars[$language->level]; $i++): ?>
                                            <li class="list-inline-item"><i class="fa fa-star-o text-muted"></i></li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                    <form action="<?php echo e(route('language.destroy', ['id' => $language->id])); ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this language?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn text-muted me-2" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    <button class="btn text-muted" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_<?php echo e($language->id); ?>')">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="editForm_<?php echo e($language->id); ?>" style="display: none;">
                                <form action="<?php echo e(route('language.update', ['id' => $language->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Language:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo e($language->name); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Proficiency:</label>
                                        <select name="level" class="form-select">
                                            <option value="Beginner" <?php echo e($language->level == 'Beginner' ? 'selected' : ''); ?>>Beginner(1)</option>
                                            <option value="Limited" <?php echo e($language->level == 'Limited' ? 'selected' : ''); ?>>Limited(2)</option>
                                            <option value="Advance" <?php echo e($language->level == 'Advance' ? 'selected' : ''); ?>>Advance(3)</option>
                                            <option value="Professional" <?php echo e($language->level == 'Professional' ? 'selected' : ''); ?>>Professional(4)</option>
                                            <option value="Native" <?php echo e($language->level == 'Native' ? 'selected' : ''); ?>>Native(5)</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_<?php echo e($language->id); ?>')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="<?php echo e(route('language.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <fieldset class="border p-4 mb-5 bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="fw-bold mb-4">Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Language:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Language">
                            <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
                            <div id="nameError" style="color: red;"></div>
                        </div>

                        <script>
                            document.querySelector('form[action="<?php echo e(route('language.store')); ?>"]').addEventListener('submit', function(event) {
                                var nameInput = document.getElementById('name');
                                var nameError = document.getElementById('nameError');

                                if (nameInput.value.trim() === '') {
                                    nameError.textContent = 'Please enter a language .';
                                    event.preventDefault(); // Prevent the form from submitting
                                } else {
                                    nameError.textContent = ''; // Clear the error message
                                }
                            });
                        </script>

                        <div class="mb-3">
                            <label for="level" class="form-label">Proficiency:</label>
                            <select name="level" id="level" class="form-select">
                                <option selected disabled>Select Proficiency</option>
                                <option value="Beginner">Beginner(1)</option>
                                <option value="Limited">Limited(2)</option>
                                <option value="Advance">Advance(3)</option>
                                <option value="Professional">Professional(4)</option>
                                <option value="Native">Native(5)</option>
                            </select>
                            <div id="levelError" style="color: red;"></div>
                        </div>

                        <script>
                            document.querySelector('form[action="<?php echo e(route('language.store')); ?>"]').addEventListener('submit', function(event) {
                                var levelSelect = document.getElementById('level');
                                var levelError = document.getElementById('levelError');

                                if (levelSelect.value === 'Select Proficiency') {
                                    levelError.textContent = 'Please select a proficiency level.';
                                    event.preventDefault(); // Prevent the form from submitting
                                } else {
                                    levelError.textContent = ''; // Clear the error message
                                }
                            });
                        </script>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
        </form>
    </div>

</section>

<script>
    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/language/create.blade.php ENDPATH**/ ?>