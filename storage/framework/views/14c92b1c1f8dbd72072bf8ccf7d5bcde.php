<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Subjects</h1>

        <?php if(count($subjects) > 0): ?>
            <div class="mx-lg-5">
                <table class="table table-striped mx-auto my-3"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Credits</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($subject->id); ?></td>
                                <td><?php echo e($subject->code); ?></td>
                                <td><?php echo e($subject->name); ?></td>
                                <td><?php echo e($subject->description); ?></td>
                                <td><?php echo e($subject->credits); ?></td>
                                <td>
                                    <a href="<?php echo e(route('subject.edit', $subject->id)); ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        <form action="<?php echo e(route('subject.destroy', $subject->id)); ?>" method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No subjects yet.</p>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <a href="<?php echo e(route('subject.create')); ?>" class="btn btn-primary">Add subject</a>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/subject/index.blade.php ENDPATH**/ ?>