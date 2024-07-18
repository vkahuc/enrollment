<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <h1 class="text-center">Search Student</h1>
        <div style="margin-left: 10%; margin-right: 10%;">

            <form action="<?php echo e(route('enrollment.search')); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <div class="form-group p-2">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Search</button>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/enrollment/index.blade.php ENDPATH**/ ?>