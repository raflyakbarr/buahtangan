

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="<?php echo e(route('members.index')); ?>" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Member, <?php echo e($member->name); ?>

                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Detail Member</h5>
                    <img src="<?php echo e(asset($member->qr_code)); ?>" class="card-img-top w-50 mb-3" alt="QR Code">
                    <p class="card-text"><strong>Nama Member: </strong><?php echo e($member->name); ?></p>
                    <p class="card-text"><strong>No. Telepon Member: </strong><?php echo e($member->telp); ?></p>
                    <p class="card-text"><strong>No. Member: </strong><?php echo e($member->member_number); ?></p>
                    <p class="card-text"><strong>Member Points: </strong><?php echo e($member->points); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Poin</h5>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Admin</th>
                                <th>Points</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $riwayatPoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $riwayatPoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + $riwayatPoints->firstItem()); ?></td>
                                <td><?php echo e($riwayatPoint->admin->name); ?></td>
                                <td><?php echo e($riwayatPoint->points); ?></td>
                                <td><?php echo e($riwayatPoint->created_at->format('d-m-Y H:i:s')); ?></td>
                                <td>
                                    <form action="<?php echo e(route('members.deleteRiwayatPoint', $member->member_number)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat point ini?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input type="hidden" name="id" value="<?php echo e($riwayatPoint->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($riwayatPoints->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/show.blade.php ENDPATH**/ ?>