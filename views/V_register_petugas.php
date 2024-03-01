<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Kasir - Login</title>

    <!-- Custom fonts for this template-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>
<body>
    <div class="login-area">
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
        <div class="container">
            <div class="login-box ptb--100">
            <form action="../routers/R_petugas.php?aksi=register" method="POST" class="user">
                    <div class="login-form-head">
                        <h4>Register</h4>
                        <p>Register Petugas Baru</p>
                    </div>
                    <input type="text" class="form-control form-control-user" placeholder="Id" name="id" hidden>
                    <div class="login-form-body">
                        <div class="form-gp">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama">
                                    <i class="ti-flickr"></i>
                            <div class="text-danger"></div>
                                </div>
                        <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" id="email" name="email">
                                    <i class="ti-email"></i>
                            <div class="text-danger"></div>
                                </div>
                        <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password" pattern=".{3,}" required oninvalid="this.setCustomValidity('Masukkan setidaknya 8 karakter')">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                                </div>                            <div class="text-danger"></div>
                                <div class="form-group">
                        <label class="col-form-label">Role yang diberikan</label>
                                    <select class="col-form-label" id="email" name="role">
                                        <option value="kasir">Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                            <div class="text-danger"></div>
                                </div>
                        <div class="submit-btn-area">
                                    <button type="submit" id="form_submit" value="Login" id="" name="login"> Register 
                                    <i class="ti-arrow-right"></i> </button>
                                </div></div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Sudah punya akun? <a href="register.php">Ayo Login!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
