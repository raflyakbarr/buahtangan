

<?php $__env->startSection('content'); ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <h3 class="font-weight-bold mb-0">
                        List Member
                    </h3>
                    <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-0 my-3">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(route('members.create')); ?>" class="btn btn-success mb-1">Add Member</a>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="membersTable" datatable>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Telp</th>
                                <th>Member Number</th>
                                <th>Points</th>
                                <th>QR Code</th>
                                <th>Tambah Points</th>
                                <th>Aksi</th>
                                <th>Reset Point</th>
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
                                        <div class="input-group">
                                            <input type="number" class="form-control point-input" min="0" placeholder="Points">
                                            <button class="btn btn-success btn-add-points" data-member="<?php echo e($member->member_number); ?>">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-dark" href="<?php echo e(route('members.show', $member->member_number)); ?>"><i class="bi bi-eye"></i></a>
                                        <a href="<?php echo e(route('members.edit', ['member' => $member->member_number])); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="<?php echo e(route('members.destroy', ['member' => $member->member_number])); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-delete" data-name="<?php echo e($member->name); ?>"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('members.resetPoints', ['member' => $member->member_number])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('POST'); ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <button type="submit" class="btn btn-danger btn-reset" data-name="<?php echo e($member->name); ?>">Reset Point</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->startPush('scripts'); ?>
<script type="module">
    $(document).ready(function() {
        $('#membersTable').DataTable();

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var name = $(this).data("name");

            Swal.fire({
                title: 'Anda yakin ingin menghapus\n' + name + '?' ,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        $(document).ready(function() {
            $('.btn-add-points').on('click', function() {
                var memberNumber = $(this).data('member');
                var pointsToAdd = $(this).closest('td').find('.point-input').val();

                if (pointsToAdd && !isNaN(pointsToAdd) && pointsToAdd > 0) {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: `Tambahkan ${pointsToAdd} poin?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, tambahkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?php echo e(route("members.addPoints")); ?>',
                                method: 'POST',
                                data: {
                                    _token: '<?php echo e(csrf_token()); ?>',
                                    member_number: memberNumber,
                                    points: pointsToAdd
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Berhasil!',
                                        'Poin berhasil ditambahkan.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function() {
                                    Swal.fire(
                                        'Error!',
                                        'Gagal menambahkan poin.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        'Masukkan jumlah poin yang valid.',
                        'error'
                    );
                }
            });
        });
        $('#membersTable').DataTable();
        $('.btn-reset').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var name = $(this).data("name");

            Swal.fire({
                title: 'Reset Point',
                text: "Point akan menjadi 0 \n dan Riwayat point " + name + " juga akan di reset",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<script>
    function refreshPage() {
        window.location.reload();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/index.blade.php ENDPATH**/ ?>