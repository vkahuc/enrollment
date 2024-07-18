<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <h1 class="text-center">Teachers</h1>

        <?php if(count($teachers) > 0): ?>
            <div class="mx-lg-5">
                <table class="table table-striped mx-auto my-3"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Birthday</th>
                            <th>Program Assigned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($teacher->id); ?></td>
                                <td><?php echo e($teacher->first_name); ?> <?php echo e($teacher->last_name); ?></td>
                                <td><?php echo e($teacher->email); ?></td>
                                <td><?php echo e($teacher->sex); ?></td>
                                <td><?php echo e($teacher->birthday); ?></td>
                                <td><?php echo e($teacher->program->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('teacher.edit', $teacher->id)); ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        <form action="<?php echo e(route('teacher.destroy', $teacher->id)); ?>" method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No teachers yet.</p>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <a href="<?php echo e(route('teacher.create')); ?>" class="btn btn-primary">Add teacher</a>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/teacher/index.blade.php ENDPATH**/ ?>