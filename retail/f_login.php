<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/user/font/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.min.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>

</head>

<body style="background-image: url('assets/bg/index.png');background-size: 100%;">
    <!-- header -->
  
	<div class=" container-fluid">
        <img src="" alt="">
        <div class="container pt-2 mb-5">

            <div class="container pt-5 mb-5">

            </div>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-transparent mb-0">
                                <?php
                                if (isset($_GET['pesan'])) {
                                    if ($_GET['pesan'] == "gagal") {
                                        echo "Login Gagal!, Username atau Password salah!";
                                    } else if ($_GET['pesan'] == "logout") {
                                        echo "Anda telah Logout";
                                    } else if ($_GET['pesan'] == "belumlogin") {
                                        echo "Silahkan Login terlebih dahulu!";
                                    }
                                }
                                ?>
                                <h5 class="text-center"><span class=" text-primary">LOGIN</span></h5>
                            </div>
                            <div class="card-body">
                                <form action="cek_login.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-password" placeholder="Password" required>
                                        <p class="pt-2" style="font-size: 12px"> <input type="checkbox" class="form-checkbox"> Tampilkan password</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="login" value="Login" class="btn btn-block" style="background-color:#00887A;color: white;">

                                        <p class="pt-2" style="font-size: 12px">Belum Memiliki Akun?<a href="f_daftar.php"> Daftar</a></p>
                                        <p style="font-size: 12px;padding-top:0px"><a href="index.php"> Kembali</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        });
    });
</script>
</html>