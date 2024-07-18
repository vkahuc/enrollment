<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Subject Offer</h1>
        <div style="margin-left: 10%; margin-right: 10%;">
            <form action="<?php echo e(route('offer.update', $offer->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group p-2">
                    <label for="subject_id">Subject</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>" <?php echo e($subject->id == $offer->subject_id ? 'selected' : ''); ?>>
                                <?php echo e($subject->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" id="section" name="section" value="<?php echo e($offer->section); ?>">
                </div>
                <div class="form-group p-2">
                    <label for="schedule">Schedule</label>
                    <input type="text" class="form-control" id="schedule" name="schedule"
                        value="<?php echo e($offer->schedule); ?>">
                </div>
                <div class="form-group p-2">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" id="room" name="room" value="<?php echo e($offer->room); ?>">
                </div>
                <div class="form-group p-2">
                    <label for="capacity">Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo e($offer->capacity); ?>"
                        required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id">Program</label>
                    <select class="form-control" id="program_id" name="program_id" required>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($program->id); ?>" <?php echo e($program->id == $offer->program_id ? 'selected' : ''); ?>>
                                <?php echo e($program->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="year_level">Year Level</label>
                    <input type="text" class="form-control" id="year_level" name="year_level"
                        value="<?php echo e($offer->year_level); ?>" required>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-lg-5">
                    <a href="<?php echo e(route('offer.index')); ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Offer</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/offer/edit.blade.php ENDPATH**/ ?>