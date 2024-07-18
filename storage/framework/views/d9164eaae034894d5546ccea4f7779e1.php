<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Student</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="<?php echo e(route('student.update', $student->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group p-2">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="<?php echo e($student->first_name); ?>" required>
                </div>
                <div class="form-group p-2">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="<?php echo e($student->last_name); ?>" required>
                </div>
                <div class="form-group p-2">
                    <label for="sex">Sex</label>
                    <select class="form-control" id="sex" name="sex" required>
                        <option value="male" <?php echo e($student->sex == 'male' ? 'selected' : ''); ?>>Male</option>
                        <option value="female" <?php echo e($student->sex == 'female' ? 'selected' : ''); ?>>Female</option>
                    </select>
                </div>

                <div class="form-group p-2">
                    <label for="birthday">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                        value="<?php echo e($student->birthday); ?>" required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id" class="form-label">Program</label>
                    <select class="form-select" id="program_id" name="program_id" required>
                        <option value="">Select Program</option>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($program->id); ?>"
                                <?php echo e($student->program_id == $program->id ? 'selected' : ''); ?>><?php echo e($program->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a program.
                    </div>
                </div>

                <div class="form-group p-2">
                    <label for="year_level" class="form-label">Year Level</label>
                    <input type="number" class="form-control" id="year_level" name="year_level" min="1"
                        max="4" value="<?php echo e($student->year_level); ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid year level (1-4).
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/student/edit.blade.php ENDPATH**/ ?>