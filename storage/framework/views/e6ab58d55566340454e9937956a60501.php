

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="container py-4 px-4">
        <!-- Heading Row-->
        <h1 class="text-center mb-5">Member</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5">
                <a class="card-link">
                    <div class="card h-100 shadow">
                        <?php if($member->qr_code): ?>
                            <img src="<?php echo e(asset($member->qr_code)); ?>" class="card-img-top" alt="QR Code">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo e($member->name); ?></h5>
                            <p class="card-text">Member Number: <?php echo e($member->member_number); ?></p>
                            <p class="card-text">Points: <?php echo e($member->points); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\member-list.blade.php ENDPATH**/ ?>