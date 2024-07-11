<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="mb-4">Detail Member</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Nama: <?php echo e($member->name); ?></h5>
            <p class="card-text">No. Telfon: <?php echo e($member->telp); ?></p>
            <p class="card-text"><strong>Member Number: </strong><?php echo e($member->member_number); ?></p>
            <img src="<?php echo e(asset($member->qr_code)); ?>" class="card-img-top w-50" alt="QR Code">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/show.blade.php ENDPATH**/ ?>