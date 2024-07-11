<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Member</h1>
            <form action="<?php echo e(route('members.update', ['member' => $member->member_number])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($member->name); ?>">
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo e($member->telp); ?>">
                </div>
                <div class="form-group">
                    <label for="points">Points</label>
                    <input type="number" name="points" class="form-control" value="<?php echo e($member->points); ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="<?php echo e(route('members.index')); ?>" class="btn btn-secondary mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/edit.blade.php ENDPATH**/ ?>