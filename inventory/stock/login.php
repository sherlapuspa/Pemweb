<?php
include 'dbconnect.php';
if (!empty($_SESSION["login"])) {
  header("Location: stock.php");
}
function login($username, $password)
{
  global $conn;


  $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($password == $row["password"]) {
      $username = $row["username"];
      return 1;
      // Login successful
    } else {
      return 10;
      // Wrong password
    }
  } else {
    return 100;
    // User not registered
  }
}
function idUser($username)
{
  return $username;
}


if (isset($_POST["login"])) {
  $result = login($_POST["username"], $_POST["password"]);

  if ($result == 1) {
    $_SESSION["login"] = true;
    $_SESSION["username"] = idUser($username);
    header("Location: stock.php");
  } elseif ($result == 10) {
    echo
      "<script> alert('Wrong Password'); </script>";
  } elseif ($result == 100) {
    echo
      "<script> alert('User Not Registered'); </script>";
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
<title>LOGIN</title>
<style>
  body {
    background-color: #f2f2f2;
  }
</style>
</head>

<body>
  <section class="h-100 mb-5">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

          <div class="card shadow-lg mt-5 rounded">
            <div class="card-body p-3">
              <div class="text-center my-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                  class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
              </div>
              <center>
                <h1 class="fs-4 card-title fw-bold mb-5">LOGIN</h1>
              </center>
              <form class="" action="" method="post" autocomplete="off">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="">Username : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" required value=""
                      placeholder="Type your username">
                  </div>
                  <br>
                  <label class="mb-2 text-muted" for="">Password : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" required value=""
                      placeholder="Type your password"> <br>
                  </div>
                  <br>
                  <center> <button class="btn btn-primary mb-3" name="login">LOGIN</></button>
                    <center>
                      <div class="mb-2 text-muted">Don't Have an Account? <a href="register.php">
                          <p>Create an Account
                        </a>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <br>
</body>

</html