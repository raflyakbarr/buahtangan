

<?php $__env->startSection('content'); ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php echo e($article->title); ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Di post pada  <?php echo e($article->created_at->format('M d Y')); ?>, oleh <?php echo e($article->user->name); ?></div>
                    </header>
                    <!-- Preview image figure-->
                    <?php if($article->image): ?>
                    <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->title); ?>" /></figure>
                    <?php endif; ?>
                    <!-- Post content-->
                    <section class="mb-5">
                        <div class="fs-5 mb-4 ql-editor" >
                            <?php echo $article->content; ?>

                        </div>
                    </section>
                </article>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4 border-0">
                    <div class="card-header">Share</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 d-flex justify-content-center align-items-center">
                            <li class="mx-2">
                                <a href="https://api.whatsapp.com/send?text=<?php echo e(urlencode($article->title . ' - Baca selengkapnya: ' . route('article', $article->slug))); ?>" 
                                    rel="nofollow" 
                                    data-action="share/whatsapp/share"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #25D366; color: white;">
                                    <i class="bi bi-whatsapp fs-5"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('article', $article->slug))); ?>" 
                                    rel="nofollow" 
                                    target="_blank"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #1877F2; color: white;">
                                    <i class="bi bi-facebook fs-5"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($article->title . ' - Baca selengkapnya: ' . route('article', $article->slug))); ?>" 
                                    rel="nofollow" 
                                    target="_blank"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #1DA1F2; color: white;">
                                    <i class="bi bi-twitter fs-5"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4 border-0">
                    <div class="card-header">Instagram</div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.instagram.com/reel/Cmbg5oRJ306/embed/captioned/?cr=1&amp;v=14&amp;wp=326&amp" allowtransparency="true" scrolling="no" style="max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; padding: 0px;"></iframe> 
                            <script src="//www.instagram.com/embed.js"></script>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0">
                    <div class="card-header">Baca Juga</div>
                    <div class="card-body">
                        <?php if($relatedArticles->isEmpty()): ?>
                            <p class="text-muted text-center">No related articles found.</p>
                        <?php else: ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item p-0 mb-3">
                                        <a href="<?php echo e(route('article', $relatedArticle->slug)); ?>" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <?php if($relatedArticle->image): ?>
                                                    <div class="flex-shrink-0">
                                                        <img src="<?php echo e(asset($relatedArticle->image)); ?>" 
                                                             alt="<?php echo e($relatedArticle->title); ?>" 
                                                             class="img-fluid rounded" 
                                                             style="width: 100px; height: 70px; object-fit: cover; margin-bottom:10px;">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-dark"><?php echo e(Str::limit($relatedArticle->title, 50)); ?></h6>
                                                    <small class="text-muted">
                                                        <?php echo e($relatedArticle->created_at->format('M d, Y')); ?>

                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Categories widget -->
                <div class="card mb-4 border-0">
                    <div class="card-header">Kategori Artikel</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="<?php echo e(route('category.articles', $category->slug)); ?>" class="text-decoration-none text-dark">
                                        <?php echo e($category->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/article.blade.php ENDPATH**/ ?>