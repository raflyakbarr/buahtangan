

<?php $__env->startSection('content'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <h3 class="font-weight-bold mb-0">
                            List Produk
                        </h3>
                        <div class="d-flex align-items-center gap-2 mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                            <a href="<?php echo e(route('products.exportExcel')); ?>" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> Export Excel
                            </a>
                            <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>">Buat Produk Baru</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3" >
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="pull-right">

                            </div>
                        </div>
                    </div>
					<table id="productsTable" class="table table-striped table-hover table-bordered" datatable>
						<thead class="table-dark">
							<tr class="text-center">
								<th>No</th>
								<th>Nama</th>
								<th>Deskripsi</th>
								<th style="width: 150px;">Harga</th>
								<th>Kategori</th>
								<th>Gambar</th>
								<th width="280px">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="text-center">
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($product->name); ?></td>
								<td><?php echo e(Str::limit(html_entity_decode(strip_tags($product->description)), 50)); ?></td>
								<td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
								<td><?php echo e(optional($product->category)->name); ?></td>
								<?php
                                    // Decode the images JSON string into an array
                                    $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                                ?>

                                <td>
                                    <?php if(is_array($images) && !empty($images)): ?>
                                        <img src="<?php echo e(asset($images[0])); ?>" alt="<?php echo e($product->name); ?>" width="100">
                                    <?php else: ?>
                                        <span>No image available</span>
                                    <?php endif; ?>
                                </td>

								<td>
									<form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST">
										<a class="btn btn-dark" href="<?php echo e(route('products.show', $product->id)); ?>"><i class="bi bi-eye"></i></a>
										<a class="btn btn-primary" href="<?php echo e(route('products.edit', $product->id)); ?>"><i class="bi bi-pencil-square"></i></a>
										<?php echo csrf_field(); ?>
										<?php echo method_field('DELETE'); ?>
										<button type="button" class="btn btn-danger btn-delete" data-id="<?php echo e($product->id); ?>" data-name="<?php echo e($product->name); ?>"><i class="bi bi-trash3"></i></button>
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
                $('#productsTable').DataTable({
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari produk...",
                        lengthMenu: "Tampilkan _MENU_ data",
                    },
                });

                $('.btn-delete').on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');
                    var productId = $(this).data('id');
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
            });
        </script>
        <script>
            function refreshPage() {
                window.location.reload();
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/products/index.blade.php ENDPATH**/ ?>