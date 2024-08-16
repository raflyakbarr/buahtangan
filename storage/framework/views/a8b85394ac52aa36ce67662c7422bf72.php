

<?php $__env->startSection('content'); ?>
    <div class="container py-4 px-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="font-weight-bold">List Admin</h3>
            </div>
            <div class="col-md-6 text-md-end">
                <button onclick="refreshPage()" class="btn btn-dark">
                    <i class="bi bi-arrow-clockwise"></i> Refresh
                </button>
                <a class="btn btn-success ms-2" href="<?php echo e(route('admins.create')); ?>"><i class="fa-solid fa-user-plus"></i> Daftarkan Admin</a>
            </div>
        </div>
        <hr>
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table id="adminsTable" class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center align-middle">
                            <td><?php echo e($admin->name); ?></td>
                            <td>
                                <?php if($admin->role == 'content_writer'): ?>
                                    Content Writer
                                <?php elseif($admin->role == 'admin'): ?>
                                    Admin
                                <?php else: ?>
                                    <?php echo e(ucfirst($admin->role)); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($admin->email); ?></td>
                            <td>
                                <a href="<?php echo e(route('admins.edit', $admin->id)); ?>" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="<?php echo e(route('admins.destroy', $admin->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete" data-name="<?php echo e($admin->name); ?>">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script type="module">
    $(document).ready(function() {
        $('#adminsTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari admin...",
                lengthMenu: "Tampilkan _MENU_ data",
            },
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault(); // Stop default form submission

            const name = $(this).data('name'); // Get the admin's name

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Anda yakin?',
                text: `Menghapus admin ${name}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with form submission if confirmed
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>
<script>
    function refreshPage() {
        window.location.reload();
    }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/admins/index.blade.php ENDPATH**/ ?>