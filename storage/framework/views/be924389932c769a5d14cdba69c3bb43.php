<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 60%; margin: 0 auto;">
                <div class="text-center">
                    <p class=""><strong> <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?></strong>
                        (<?php echo e($student->program->name); ?> <?php echo e($student->year_level); ?>)</p>
                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h2 class="text-center">Enrollment Records</h2>
                <?php if(count($enrollments) > 0): ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Schedule</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($enrollment->subject->name); ?></td>
                                    <td><?php echo e($enrollment->section); ?></td>
                                    <td><?php echo e($enrollment->schedule); ?></td>
                                    <td><?php echo e($enrollment->room); ?></td>
                                    <td>
                                        <form
                                            action="<?php echo e(route('enrollment.unenroll', ['studentId' => $student->id, 'offerId' => $enrollment->id])); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Unenroll</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No enrollments yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h2 class="text-center">Available Enrollments for <?php echo e($student->program->name); ?> <?php echo e($student->year_level); ?>

                </h2>
                <?php if(count($availableEnrollments) > 0): ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Teacher</th>
                                <th>Schedule</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $availableEnrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($enrollment->subject->code); ?></td>
                                    <td><?php echo e($enrollment->section); ?></td>
                                    </td>
                                    <td>
                                        <?php if($enrollment->teacher): ?>
                                            <?php echo e($enrollment->teacher->first_name); ?> <?php echo e($enrollment->teacher->last_name); ?>

                                        <?php else: ?>
                                            Unassigned yet
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($enrollment->schedule); ?></td>
                                    <td><?php echo e($enrollment->room); ?></td>
                                    <td>
                                        <form
                                            action="<?php echo e(route('enrollment.enroll', ['student_id' => $student->id, 'offer_id' => $enrollment->id])); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-primary">Enroll</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No available enrollments for the student's program and year level.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/enrollment/show.blade.php ENDPATH**/ ?>