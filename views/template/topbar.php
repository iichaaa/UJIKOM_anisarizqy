<body>
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?= $halaman; ?></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><span>Page </span></li>
                                <li></li>
                                <li><span> / </span></li>
                                <li></li>
                                <li><span> <?= $halaman; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/img/undraw_profile.svg" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['data']['Username'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="../routers/r_login.php?aksi=logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>