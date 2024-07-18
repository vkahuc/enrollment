<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <h1 class="text-center">Offers</h1>

        <?php if(count($offers) > 0): ?>
            <div class="mx-lg-5">

                <table class="table table-striped mx-auto my-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Schedule</th>
                            <th>Room</th>
                            <th>Capacity</th>
                            <th>Program & Year Level</th>
                            <th>Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($offer->id); ?></td>
                                <td><?php echo e($offer->subject->code); ?></td>
                                <td><?php echo e($offer->subject->name); ?></td>
                                <td><?php echo e($offer->section); ?></td>
                                <td><?php echo e($offer->schedule); ?></td>
                                <td><?php echo e($offer->room); ?></td>
                                <td><?php echo e($offer->capacity); ?></td>
                                <td><?php echo e($offer->program->name); ?> <?php echo e($offer->year_level); ?></td>
                                <td>
                                    <?php if($offer->teacher_id): ?>
                                        <a href="<?php echo e(route('offer.assign_teacher', $offer->id)); ?>"><?php echo e($offer->teacher->first_name); ?>

                                            <?php echo e($offer->teacher->last_name); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('offer.assign_teacher', $offer->id)); ?>">Assign</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('offer.edit', $offer->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="<?php echo e(route('offer.destroy', $offer->id)); ?>" method="POST" style="display:inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">No offers yet.</p>
        <?php endif; ?>

        <div class="d-flex justify-content-center">
            <a href="<?php echo e(route('offer.create')); ?>" class="btn btn-primary">Add Offer</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/offer/index.blade.php ENDPATH**/ ?>