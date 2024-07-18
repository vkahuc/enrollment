<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <h1 class="text-center">Edit Program</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="<?php echo e(route('program.update', $program->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group p-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="<?php echo e($program->code); ?>"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($program->name); ?>"
                        required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/program/edit.blade.php ENDPATH**/ ?>