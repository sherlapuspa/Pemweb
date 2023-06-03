<?php
// Koneksi ke database
include 'dbconnect.php';

// Fungsi untuk melakukan registrasi
function registration($username, $password, $name, $email)
{
  global $conn;

  // Periksa apakah username sudah ada dalam tabel
  $duplicate = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
  if (mysqli_num_rows($duplicate) > 0) {
    return 10; // Username sudah digunakan
  } else {
    // Insert data ke tabel
    $query = "INSERT INTO admin (username, password, name, email) VALUES ('$username', '$password', '$name', '$email')";
    if (mysqli_query($conn, $query)) {
      return 1; // Registrasi berhasil
    } else {
      return 0; // Registrasi gagal
    }
  }
}

// Memproses form saat tombol "Daftar" diklik
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $email = $_POST["email"];

  $result = registration($username, $password, $name, $email);

  if ($result == 1) {
    echo "<script>alert('Registrasi berhasil');</script>";
  } elseif ($result == 10) {
    echo "<script>alert('Username sudah digunakan');</script>";
  } else {
    echo "<script>alert('Registrasi gagal');</script>";
  }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../favicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-144808195-1');
  </script>
  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- Start datatable css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

  <!-- others css -->
  <link rel="stylesheet" href="assets/css/typography.css">
  <link rel="stylesheet" href="assets/css/default-css.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- modernizr css -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<title>REGISTER FORM</title>
<style>
  body {
    background-color: #f2f2f2;
  }
</style>
</head>

<body>
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

          <div class="card shadow-lg mt-5">
            <div class="card-body p-5">

              <center>
                <h1 class="fs-4 card-title fw-bold mb-2">REGISTER FORM</h1>
                <div class="mb-5">Already Have an Account? <a href="login.php">LOG IN</a>
                </div>
              </center>
              <form class="" action="" method="post" autocomplete="off">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="">Nama : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" required value="" placeholder="Type your name">
                  </div><br>
                  <label class="mb-2 text-muted" for="">Email : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-email"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" required value=""
                      placeholder="Type your email">
                  </div><br>
                  <label class="mb-2 text-muted" for="">Username : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-key"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" required value=""
                      placeholder="Type your username">
                  </div><br>
                  <label for="">Password : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-lock"></i></span>
                    </div>
                    <input type="text" class="form-control" name="password" required value=""
                      placeholder="Type your password">
                  </div><br>

                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary ms-auto" name="submit">SIGN UP</button>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
  </section>
</body>

</html>