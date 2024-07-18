<?php $__env->startSection('content'); ?>
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Subject</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="<?php echo e(route('subject.update', $subject->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group p-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="<?php echo e($subject->code); ?>"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($subject->name); ?>"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo e($subject->description); ?>" required>
                </div>
                <div class="form-group p-2">
                    <label for="credits">Credits</label>
                    <input type="text" class="form-control" id="credits" name="credits" value="<?php echo e($subject->credits); ?>"
                        required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/subject/edit.blade.php ENDPATH**/ ?>