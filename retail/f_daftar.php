
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title><link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/user/css/daftar_customer.css">


    <script src="../asset/user/js/jquery.js"></script>
    <script src="../asset/user/js/bootstrap.js"></script>

    <script src="../asset/user/js/popper.js"></script>

</head>

<body>
    <!-- header -->
  
        <div class="container justify-content-center">
  <section class="col pt-1 justify-content-center" >

                <form class="form-container " method="POST" action="s_daftar.php" enctype="multipart/form-data">
                    <h5 class="text-center font-weight-bold col-md-12"> Masukan Data Diri Anda </h5><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Daftar Sebagai</label>
                            <input type="text" class="form-control form-control-sm" name="typeuser" readonly value="penjual">
                                
                                

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" autocomplete="off" required>
                        </div>
                         <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Nama Katering</label>
                            <input type="text" class="form-control form-control-sm" name="nama_katering" autocomplete="off" required>
                        </div>

                         <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-sm" name="username" autocomplete="off" required>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm form-password" name="password" required>
                            <input type="checkbox" class="form-checkbox"> Show password
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                         <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" autocomplete="off" required placeholder="contoh@mail.com">
                        </div>
                          <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">No Hp</label>
                            <input type="number" class="form-control form-control-sm" name="no_hp" autocomplete="off" required>
                        </div>
                        <div class="col-6">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" autocomplete="off" required></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" name="tgl_lahir" autocomplete="off" required>
                        </div>
                         <div class="col-md-3">

                        <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="laki-laki" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="perempuan">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                         </div>
                        <div class="col-md-3">
                             <div class="card " style="width: 25rem;">
                            <div class="imgWrap">
                                <img src="../asset/user/assets/img/User1.jpg" id="imgView" class="img-fluid">
                            </div>
                            <!-- <div class="card-body">
                                <div class="custom-file">
                                    <input type="file" id="inputFile" class="form-control form-control-sm">
                                    <label class="custom-file-label" for="inputFile"></label>
                                </div>
                            </div> -->
                        </div>
                    </br>
                          <input type="file" id="inputFile" class="form-control form-control-sm" name="file">
                          <br>
                        </div>
                    
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-sm" name="daftar">Daftar</button>
                    <a href="f_daftar.php" class="btn btn-warning btn-sm">Reset</a>
                    <a href="../index.php" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Batalkan Pendaftaran?')">Kembali</a>
                    <div class="form-footer mt-2">
                        <p> Sudah punya akun? <a href="f_login.php">Login</a></p>
                    </div>
                </div>
                </form>
            </section>

        </div>

</body> <script src="js/jquery.js"></script>
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
    <script>
        $("#inputFile").change(function(event) {
            fadeInAdd();
            getURL(this);
        });

        $("#inputFile").on('click', function(event) {
            fadeInAdd();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputFile").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#imgView').attr('src', e.target.result);
                    $('#imgView').hide();
                    $('#imgView').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loadAnimate").hide();
        }

        function fadeInAdd() {
            fadeInAlert();
        }

        function fadeInAlert(text) {
            $(".alert").text(text).addClass("loadAnimate");
        }
    </script>
</html>