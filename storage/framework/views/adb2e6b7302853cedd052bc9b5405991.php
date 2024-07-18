<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Add Subject Offer</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="<?php echo e(route('offer.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group p-2">
                    <label for="subject_id">Subject</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->code); ?>: <?php echo e($subject->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" id="section" name="section" required>
                </div>
                <div class="form-group p-2">
                    <label for="schedule">Schedule</label>
                    <input type="text" class="form-control" id="schedule" name="schedule" required>
                </div>
                <div class="form-group p-2">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" id="room" name="room" required>
                </div>
                <div class="form-group p-2">
                    <label for="capacity">Capacity</label>
                    <input type="number" value='40' class="form-control" id="capacity" name="capacity" required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id">Program</label>
                    <select class="form-control" id="program_id" name="program_id" required>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($program->id); ?>"><?php echo e($program->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="year_level">Year Level</label>
                    <input type="text" class="form-control" id="year_level" name="year_level" required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
            <?php if(isset($offer)): ?>
                <form action="<?php echo e(route('offer.assign_teacher')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="offer_id" value="<?php echo e($offer->id); ?>">
                    <div class="form-group">
                        <label for="teacher_id">Select Teacher</label>
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Assign Teacher</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/offer/add.blade.php ENDPATH**/ ?>