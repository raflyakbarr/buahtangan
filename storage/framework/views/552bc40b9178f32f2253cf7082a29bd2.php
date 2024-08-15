<!-- resources/views/articles/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mx-2">
                    <h3 class="font-weight-bold mb-0">
                        List Artikel
                    </h3>
                    <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-success mb-2">Buat Artikel</a>
                <table class="table table-bordered text-center" id="articlesTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Halaman Artikel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($article->title); ?></td>
                                <td><?php echo e($article->user->name); ?></td>
                                <td><a href="<?php echo e(route('article', ['slug' => $article->slug])); ?>" class="btn btn-dark">Pergi ke halaman</a></td>
                                <td>
                                    <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-delete" data-slug="<?php echo e($article->slug); ?>"><i class="bi bi-trash3"></i></button>
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
            $('#articlesTable').DataTable();
    
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var title = $(this).closest('tr').find('td:first').text(); 
    
                Swal.fire({
                    title: 'Anda yakin ingin menghapus artikel\n"' + title + '"?',
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
    
        function refreshPage() {
            window.location.reload();
        }
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\articles\index.blade.php ENDPATH**/ ?>