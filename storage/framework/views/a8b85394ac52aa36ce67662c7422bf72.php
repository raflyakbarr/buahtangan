

<?php $__env->startSection('content'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <h3 class="font-weight-bold mb-0">
                            List Admin
                        </h3>
                        <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="pull-right">
                                <a class="btn btn-success" href="<?php echo e(route('admins.create')); ?>"> Buat Admin</a>
                            </div>
                        </div>
                    </div>
					<table id="adminsTable" class="table table-bordered" datatable>
						<thead>
							<tr class="text-center">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="text-center">
								<td><?php echo e($admin->name); ?></td>
                                <td><?php echo e($admin->email); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admins.edit', $admin->id)); ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?php echo e(route('admins.destroy', $admin->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-delete" data-name="<?php echo e($admin->name); ?>">Delete</button>
                                    </form>
                                </td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </main>
    <?php $__env->startPush('scripts'); ?>
        <script type="module">
            $(document).ready(function() {
                $('#adminsTable').DataTable();

                $('.btn-delete').on('click', function(e) {
                    e.preventDefault(); // Menghentikan aksi bawaan form submit

                    const name = $(this).data('name'); // Ambil nilai data-name dari tombol yang diklik

                    // Tampilkan SweetAlert konfirmasi
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
                            // Lanjutkan dengan mengirimkan form jika dikonfirmasi
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