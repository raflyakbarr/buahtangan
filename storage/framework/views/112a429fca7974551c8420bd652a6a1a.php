<!-- resources/views/articles/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Articles</h1>
                <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-success mb-2">Create Article</a>
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
                                    <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                                    <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')"><i class="bi bi-trash3"></i></button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/articles/index.blade.php ENDPATH**/ ?>