    
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="../index.php"><img src="../assets/images/icon/cash.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                        <li>
                            <?php 
                            if ($_SESSION['data']['Role'] == 'admin') {
                            ?>
                            <a href="../views/home.php"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            <li><a href="../views/V_petugas.php"><i class="ti-receipt"></i> <span>Petugas Management</span></a></li>
                            <?php
                            }elseif ($_SESSION['data']['Role'] == 'kasir') {
                                ?>
                                <a href="../views/home_user.php"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                <?php
                            }
                            ?>
                            
                        </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Pengelolaan Produk
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="../views/V_list_produk.php">Produk</a></li>
                                    <li><a href="../views/V_stok.php">Stok</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i><span>Pengelolaan Penjualan
                                    </span></a>
                                <ul class="collapse">
                                <li><a href="../views/V_penjualan.php"><span>Penjualan</span></a></li>
                                <li><a href="../views/V_list_member.php"> <span>Member</span></a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            
                            
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        