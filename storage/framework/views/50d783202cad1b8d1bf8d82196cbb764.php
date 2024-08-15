

<?php $__env->startSection('content'); ?>
<style>
    .card{
    border-radius: 4px;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    cursor: pointer;
    }

    .card:hover{
     transform: scale(1.05);
     box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
     border-radius: 10px;
    }
    
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .autoplay-progress {
      position: relative;
      right: 16px;
      bottom: 16px;
      z-index: 10;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
      --progress: 0;
      position: absolute;
      left: 0;
      top: 0px;
      z-index: 10;
      width: 100%;
      height: 100%;
      stroke-width: 4px;
      stroke: var(--swiper-theme-color);
      fill: none;
      stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
      stroke-dasharray: 125.6;
      transform: rotate(-90deg);
    }
</style>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Semua Artikel</h1>
                <p class="lead fw-normal text-white-50 mb-3">Baca artikel yang anda suka</p>
                <form action="<?php echo e(route('article-list.search')); ?>" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari artikel..." aria-label="Cari artikel..." aria-describedby="button-search">
                        <button class="btn btn-outline-light" type="submit" id="button-search">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <?php if(!request('search')): ?>
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <!-- Swiper -->
                <div class="swiper gugugaga">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e(route('article', ['slug' => $article->slug])); ?>" class="card-link">
                                    <div class="card">
                                        <?php if($article->image): ?>
                                            <img src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo e($article->title); ?></h5>
                                            <p><?php echo e(Str::limit(html_entity_decode(strip_tags($article->content)), 100)); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="autoplay-progress">
                        <svg viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20"></circle>
                        </svg>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <h2 class="mb-4">Artikel Terbaru</h2>
                <div class="list-group list-group-flush">
                    <?php $__currentLoopData = $latestArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('article', ['slug' => $latestArticle->slug])); ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="<?php echo e(asset($latestArticle->image)); ?>" alt="<?php echo e($latestArticle->title); ?>" class="img-fluid rounded" style="width: 100px; height: 70px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1"><?php echo e(Str::limit($latestArticle->title, 50)); ?></h5>
                                    <small class="text-muted"><?php echo e($latestArticle->created_at->format('d M Y')); ?></small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <hr class="p-2">
        <?php endif; ?>
        <!-- Content Row-->
        <?php if($articles->isEmpty()): ?>
        <div class="text-center py-5">
            <h2>Artikel Tidak Ditemukan</h2>
            <a href="<?php echo e(route('article-list')); ?>">
                <button class="btn btn-dark">Kembali ke halaman Artikel</button>
            </a>
        </div>
        <?php else: ?>
            <div class="row gx-4 gx-lg-5 py-4">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-5">
                        <a href="<?php echo e(route('article', ['slug' => $article->slug])); ?>" class="card-link">
                            <div class="card h-100 shadow" >
                                <?php if($article->image): ?>
                                    <img src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($article->title); ?></h5>
                                    <p class="card-text" style="text-align: justify;" ><?php echo e(Str::limit(html_entity_decode(strip_tags($article->content)), 151)); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->startPush('scripts'); ?>
<script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".gugugaga", {
      spaceBetween: 10,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        autoplayTimeLeft(s, time, progress) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      }
    });
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\article-list.blade.php ENDPATH**/ ?>