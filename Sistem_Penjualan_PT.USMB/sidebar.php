<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Open</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                                aria-current="page" href="home"><i class="bi bi-house-door"></i>
                                Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'product') ? 'active link-light' : 'link-dark'; ?>"
                                href="product"><i class="bi bi-box2"></i> Produk</a>
                        </li>
                        <?php if($hasil['level']==1){ ?>
                            <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pembelian') ? 'active link-light' : 'link-dark'; ?>"
                                href="pembelian"><i class="bi bi-table"></i> Pembelian</a>
                        </li>
                        <?php } ?>
                       <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'penjualan') ? 'active link-light' : 'link-dark'; ?>"
                                href="penjualan"><i class="bi bi-bag"></i> Penjualan</a>
                        </li>
                        <?php if($hasil['level']==1 || $hasil ["level"]==3){ ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'stokgudang') ? 'active link-light' : 'link-dark'; ?>"
                                href="stokgudang"><i class="bi bi-card-checklist"></i> Stok
                                Gudang</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link link-dark dropdown-toggle ps-2" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-clipboard2-data"></i>
                                Laporan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporanpenjualan') ? 'active link-light' : 'link-dark'; ?>"
                                        href="laporanpenjualan">Laporan Penjualan</a></li>
                                        <?php if($hasil['level']==1){ ?>
                                <li><a class="dropdown-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporanpembelian') ? 'active link-light' : 'link-dark'; ?>"
                                        href="laporanpembelian">Laporan Pembelian</a></li>
                                <li><a class="dropdown-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporankeuntungan') ? 'active link-light' : 'link-dark'; ?>"
                                        href="laporankeuntungan">Laporan Keuntungan</a></li>
                                <li>
                                    <?php } ?>
                            </ul>
                            <?php if($hasil['level']==1){ ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark'; ?>"
                                href="user"><i class="bi bi-people"></i> User</a>
                        </li>
                           <?php }?>
                </div>
            </div>
        </div>
    </nav>
</div>