<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <h1 class="text-center">Students</h1>

        <?php if(count($students) > 0): ?>
            <div class="mx-lg-5">

                <table class="table table-striped mx-auto my-3"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Birthday</th>
                            <th>Program & Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($student->id); ?></td>
                                <td><?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?></td>
                                <td><?php echo e($student->email); ?></td>
                                <td><?php echo e($student->sex); ?></td>
                                <td><?php echo e($student->birthday); ?></td>
                                <td><?php echo e($student->program->name); ?> <?php echo e($student->year_level); ?></td>
                                <td>
                                    <a href="<?php echo e(route('student.edit', $student->id)); ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No students yet.</p>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary">Add Student</a>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/student/index.blade.php ENDPATH**/ ?>