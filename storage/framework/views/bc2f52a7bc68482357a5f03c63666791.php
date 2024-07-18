<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Assign Teacher to Offer</h1>
        <div style="margin-left: 10%; margin-right: 10%;">

            <form action="<?php echo e(route('offer.store_teacher_assignment')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="offer_id" value="<?php echo e($offer->id); ?>">
                <div class="form-group p-2">
                    <label for="teacher_id">Assign a Teacher</label>
                    <select class="form-control" id="teacher_id" name="teacher_id" required>
                        <option value="">Select</option>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($teacher->id); ?>" <?php echo e($offer->teacher_id == $teacher->id ? 'selected' : ''); ?>>
                                <?php echo e($teacher->first_name); ?> <?php echo e($teacher->last_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-lg-5">
                    <a href="<?php echo e(route('offer.index')); ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Assign Teacher</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/offer/assign_teacher.blade.php ENDPATH**/ ?>