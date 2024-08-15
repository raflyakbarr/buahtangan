<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bold mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body bg-white border-end-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control ps-0" placeholder="Search">
                </div>
            </div>
            <div class="mb-0 font-weight-bold breadcrumb-text text-white">
                <button class="btn btn-dark mb-0 me-1" onclick="window.location.href='<?php echo e(route('products.index')); ?>'">Tambah Produk</button>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item ps-2 d-flex align-items-center">
                    <div class="dropdown ms-md-auto my-2">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi-person-circle"></i>
                            <?php if(auth()->guard()->check()): ?>
                                <?php echo e(Auth::user()->name); ?>

                            <?php endif; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="toggleSidebar" class="btn btn-outline-dark ms-3">
                        <span class="bi bi-list"></span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('hidden');
        document.getElementById('content').classList.toggle('content-shift');
    });
</script>
<?php /**PATH D:\laragon\www\buahtangan\resources\views\layouts\gajadi-nav.blade.php ENDPATH**/ ?>