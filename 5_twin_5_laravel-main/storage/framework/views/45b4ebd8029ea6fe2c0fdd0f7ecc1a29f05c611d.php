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
                    <h4 class="fw-bold mb-4">Current Skills</h4>

                    <?php $__currentLoopData = $freelancer->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <p class="mb-1"><?php echo e($skill->name); ?></p>
                                    <ul class="list-inline mb-0">
                                        <?php
                                            $stars = ['Professional' => 5, 'Semi-Professional' => 4, 'Advance' => 3, 'Limited' => 2, 'Beginner' => 1];
                                        ?>
                                        <?php for($i = 0; $i < $stars[$skill->level]; $i++): ?>
                                            <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 5 - $stars[$skill->level]; $i++): ?>
                                            <li class="list-inline-item"><i class="fa fa-star-o text-muted"></i></li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                <form action="<?php echo e(route('skill.destroy', ['id' => $skill->id])); ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this skill?');">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn text-muted me-2" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
        <i class="fa fa-trash"></i>
    </button>
</form>

                                    <button class="btn text-muted" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_<?php echo e($skill->id); ?>')">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="editForm_<?php echo e($skill->id); ?>" style="display: none;">
                                <form action="<?php echo e(route('skill.update', ['id' => $skill->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Skill:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo e($skill->name); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Proficiency:</label>
                                        <select name="level" class="form-select">
                                            <option value="Beginner" <?php echo e($skill->level == 'Beginner' ? 'selected' : ''); ?>>Beginner(1)</option>
                                            <option value="Limited" <?php echo e($skill->level == 'Limited' ? 'selected' : ''); ?>>Limited(2)</option>
                                            <option value="Advance" <?php echo e($skill->level == 'Advance' ? 'selected' : ''); ?>>Advance(3)</option>
                                            <option value="Semi-Professional" <?php echo e($skill->level == 'Semi-Professional' ? 'selected' : ''); ?>>Semi-Professional(4)</option>
                                            <option value="Professional" <?php echo e($skill->level == 'Professional' ? 'selected' : ''); ?>>Professional(5)</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_<?php echo e($skill->id); ?>')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo e(route('skill.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <fieldset class="border p-4 mb-5 bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="fw-bold mb-4">Add New Skill</h2>
                    </div>
                    <div class="col-lg-12">
                    <div class="mb-3">
    <label for="name" class="form-label">Skill:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Skill">
    <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
    <div id="nameError" style="color: red;"></div>
</div>

<script>
    document.querySelector('form[action="<?php echo e(route('skill.store')); ?>"]').addEventListener('submit', function(event) {
        var nameInput = document.getElementById('name');
        var nameError = document.getElementById('nameError');

        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Please enter a skill .';
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
        <option value="Semi-Professional">Semi-Professional(4)</option>
        <option value="Professional">Professional(5)</option>
    </select>
    <div id="levelError" style="color: red;"></div>
</div>

<script>
    document.querySelector('form[action="<?php echo e(route('skill.store')); ?>"]').addEventListener('submit', function(event) {
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
                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
            </fieldset>
           
        </form>
        </div>
    <div class="container">
    <form action="<?php echo e(route('certificates.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <fieldset class="border p-4 mb-5 bg-white">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bold mb-4">Add New Certificate</h2>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="mb-3">
                        <label for="pdf_file" class="form-label">Upload PDF:</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="skill_id" class="form-label">Skill:</label>
                        <select name="skill_id" id="skill_id" class="form-select">
                            <?php $__currentLoopData = $freelancer->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- Bouton pour soumettre le formulaire de certificat -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>

    <div class="border p-4 mb-5 bg-white">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="fw-bold mb-4">Current Certificates</h2>
        </div>
        <?php $__currentLoopData = $freelancer->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-12 mb-3">
        <h2 class="fw-bold mb-4" style="color:rgb(30,144,255);"><?php echo e($skill->name); ?> Certificates</h2>
        <?php if($skill->certificates->isEmpty()): ?>
            <p>No certificates found</p>
        <?php else: ?>

        <?php $__currentLoopData = $skill->certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($certificate->description); ?></h5>
                    <p class="card-text">Uploaded PDF: <a href="<?php echo e(asset('storage/' . $certificate->pdf_file)); ?>" target="_blank"><?php echo e($certificate->pdf_file); ?></a></p>
                </div>
                <div class="card-footer">
                    <form action="<?php echo e(route('certificates.destroy', ['id' => $certificate->id])); ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn text-muted me-2" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <button class="btn text-muted" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_<?php echo e($certificate->id); ?>')">
                        <i class="fa fa-pencil"></i>
                    </button>
                </div>
            </div>
            <div class="card mb-3" id="editForm_<?php echo e($certificate->id); ?>" style="display: none;">
                <div class="card-body">
                    <form action="<?php echo e(route('certificates.update', ['id' => $certificate->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="text" name="description" class="form-control" value="<?php echo e($certificate->description); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pdf_file" class="form-label">Upload PDF:</label>
                            <input type="file" name="pdf_file" class="form-control">
                        </div>
                        <!-- Add other fields as needed -->
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_<?php echo e($certificate->id); ?>')">Cancel</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
</div>



   

    

</section>

<script>
    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/skill/create.blade.php ENDPATH**/ ?>