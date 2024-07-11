<?php $__env->startSection('content'); ?>
<div class="container p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <div class="mb-md-0 mb-3">
                    <h3 class="font-weight-bold mb-0">
                        <?php if(auth()->guard()->check()): ?>
                            Hello, <?php echo e(Auth::user()->name); ?>

                        <?php endif; ?>
                    </h3>
                    <p class="mb-0">Apps you might like!</p>
                </div>
                <button type="button"
                    class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <span class="btn-inner--icon">
                        <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                            <span class="visually-hidden">New</span>
                        </span>
                    </span>
                    <span class="btn-inner--text">Messages</span>
                </button>
                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                    <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>
                    <span class="btn-inner--text">Sync</span>
                </button>
            </div>
        </div>
    </div>
    <hr class="my-0 my-3">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('members.create')); ?>" class="btn btn-primary mb-3">Add Member</a>
            <table class="table table-bordered" id="membersTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Telp</th>
                        <th>Member Number</th>
                        <th>Points</th>
                        <th>QR Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($member->name); ?></td>
                            <td><?php echo e($member->telp); ?></td>
                            <td><?php echo e($member->member_number); ?></td>
                            <td><?php echo e($member->points); ?></td>
                            <td>
                                <?php if($member->qr_code): ?>
                                    <img src="<?php echo e(asset($member->qr_code)); ?>" alt="QR Code" width="100">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-dark" href="<?php echo e(route('members.show', $member->member_number)); ?>"><i class="bi bi-eye"></i></a>
                                <a href="<?php echo e(route('members.edit', ['member' => $member->member_number])); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="<?php echo e(route('members.destroy', ['member' => $member->member_number])); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/index.blade.php ENDPATH**/ ?>