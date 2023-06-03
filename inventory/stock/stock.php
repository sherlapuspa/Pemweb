<?php
include 'dbconnect.php';

if (!empty($_SESSION['login'])) {

    if (isset($_POST['update'])) {
        $idx = $_POST['idbrg'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $lokasi = $_POST['lokasi'];

        $updatedata = mysqli_query($conn, "update sstock_brg set nama='$nama', jenis='$jenis', merk='$merk', ukuran='$ukuran', satuan='$satuan', lokasi='$lokasi' where idx='$idx'");

        //cek apakah berhasil
        if ($updatedata) {

            echo "<div class='container p-2'>
                    <div class='row no-gutters'>
                        <div class='col-lg-6 col-md-12 m-auto'>
                            <div class='alert alert-success fade show' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <center><h4 class='alert-heading'>Data Berhasil Diedit</h4><center>
                            </div>
                        </div>
                    </div>
                </div>
                ";
        } else {
            echo "<div class='container p-2'>
                <div class='row no-gutters'>
                    <div class='col-lg-6 col-md-12 m-auto'>
                        <div class='alert alert-success fade show' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <center><h4 class='alert-heading'>Data Berhasil Diedit</h4><center>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    }
    ;

    if (isset($_POST['hapus'])) {
        $idx = $_POST['idbrg'];

        $delete = mysqli_query($conn, "delete from sstock_brg where idx='$idx'");
        //hapus juga semua data barang ini di tabel keluar-masuk
        $deltabelkeluar = mysqli_query($conn, "delete from sbrg_keluar where id='$idx'");
        $deltabelmasuk = mysqli_query($conn, "delete from sbrg_masuk where id='$idx'");

        //cek apakah berhasil
        if ($delete && $deltabelkeluar && $deltabelmasuk) {

            echo "<div class='container p-2'>
                    <div class='row no-gutters'>
                        <div class='col-lg-6 col-md-12 m-auto'>
                            <div class='alert alert-success fade show' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <center><h4 class='alert-heading'>Data Berhasil Dihapus</h4><center>
                            </div>
                        </div>
                    </div>
                </div>
                ";
        } else {
            echo "<div class='container p-2'>
                <div class='row no-gutters'>
                    <div class='col-lg-6 col-md-12 m-auto'>
                        <div class='alert alert-success fade show' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <center><h4 class='alert-heading'>Data Berhasil Dihapus</h4><center>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    }
    ;
    ?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../favicon.png">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Logistics</title>
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
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
            media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

        <!-- others css -->
        <link rel="stylesheet" href="assets/css/typography.css">
        <link rel="stylesheet" href="assets/css/default-css.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>

        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <div class="sidebar-menu" style="background-color: ;">
                <div class="sidebar-header">
                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>
                            <ul class="metismenu" id="menu">
                                <li class="active">
                                    <a href="stock.php"><i class="ti-dashboard"></i><span>Stock Barang</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i
                                            class="ti-layout"></i><span>Transaksi Barang
                                        </span></a>
                                    <ul class="collapse">
                                        <li><a href="masuk.php">Barang Masuk / Kembali</a></li>
                                        <li><a href="keluar.php">Barang Keluar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="admin.php"><i class="ti-user"></i><span>Admin</span></a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="ti-power-off"></i><span>Logout</span></a>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- sidebar menu area end -->
            <!-- main content area start -->
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
                                </form>
                            </div>
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <li>
                                    <h3>
                                        <div class="date">
                                            <script type='text/javascript'>

                                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                var date = new Date();
                                                var day = date.getDate();
                                                var month = date.getMonth();
                                                var thisDay = date.getDay(),
                                                    thisDay = myDays[thisDay];
                                                var yy = date.getYear();
                                                var year = (yy < 1000) ? yy + 1900 : yy;
                                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                            </script></b>
                                        </div>
                                    </h3>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <?php

                $periksa_bahan = mysqli_query($conn, "select * from sstock_brg where stock <1");
                while ($p = mysqli_fetch_array($periksa_bahan)) {
                    if ($p['stock'] <= 1) {
                        ?>
                        <script>
                            $(document).ready(function () {
                                $('#pesan_sedia').css("color", "white");
                                $('#pesan_sedia').append("<i class='ti-flag'></i>");
                            });
                        </script>
                        <?php
                        echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>" . $p['nama'] . "</u> <u>" . ($p['merk']) . "</u> &nbsp <u>" . $p['ukuran'] . "</u></strong> yang tersisa sudah habis</div>";
                    }
                }
                ?>

                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Dashboard</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="guest.php">Home</a></li>
                                    <li><span>Daftar Barang</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                        </div>
                    </div>
                </div>
                <!-- page title area end -->
                <div class="main-content-inner">

                    <!-- market value area start -->
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <h2>Daftar Barang</h2>
                                        <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal"
                                            class="btn btn-info col-md-2">Tambah Barang</button>
                                    </div>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="display" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jenis</th>
                                                    <th>Merk</th>
                                                    <th>Ukuran</th>
                                                    <th>Stock</th>
                                                    <th>Satuan</th>
                                                    <th>Lokasi</th>

                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $brgs = mysqli_query($conn, "SELECT * from sstock_brg order by nama ASC");
                                                $no = 1;
                                                while ($p = mysqli_fetch_array($brgs)) {
                                                    $idb = $p['idx'];
                                                    ?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $no++ ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['nama'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['jenis'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['merk'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['ukuran'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['stock'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['satuan'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $p['lokasi'] ?>
                                                        </td>
                                                        <td><button data-toggle="modal" data-target="#edit<?= $idb; ?>"
                                                                class="btn btn-warning"><i class="ti-pencil-alt"></i>
                                                                Edit</button> <button data-toggle="modal"
                                                                data-target="#del<?= $idb; ?>" class="btn btn-danger"><i
                                                                    class="ti-trash"></i> Delete</button></td>
                                                    </tr>


                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="edit<?= $idb; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="post">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Barang
                                                                            <?php echo $p['nama'] ?> -
                                                                            <?php echo $p['jenis'] ?> -
                                                                            <?php echo $p['ukuran'] ?>
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">

                                                                        <label for="nama">Nama</label>
                                                                        <input type="text" id="nama" name="nama"
                                                                            class="form-control"
                                                                            value="<?php echo $p['nama'] ?>">

                                                                        <label for="jenis">Jenis</label>
                                                                        <input type="text" id="jenis" name="jenis"
                                                                            class="form-control"
                                                                            value="<?php echo $p['jenis'] ?>">

                                                                        <label for="merk">Merk</label>
                                                                        <input type="text" id="merk" name="merk"
                                                                            class="form-control"
                                                                            value="<?php echo $p['merk'] ?>">

                                                                        <label for="ukuran">Ukuran</label>
                                                                        <input type="text" id="ukuran" name="ukuran"
                                                                            class="form-control"
                                                                            value="<?php echo $p['ukuran'] ?>">

                                                                        <label for="stock">Stock</label>
                                                                        <input type="text" id="stock" name="stock"
                                                                            class="form-control"
                                                                            value="<?php echo $p['stock'] ?>" disabled>

                                                                        <label for="satuan">Satuan</label>
                                                                        <input type="text" id="satuan" name="satuan"
                                                                            class="form-control"
                                                                            value="<?php echo $p['satuan'] ?>">

                                                                        <label for="lokasi">Lokasi</label>
                                                                        <input type="text" id="lokasi" name="lokasi"
                                                                            class="form-control" value="<?php echo $p['lokasi'] ?>">
                                                                            <input type="hidden" name="idbrg" value="<?= $idb; ?>">
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" name="update">Save</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                </div>
                                                            </div>
                                                               <!-- The Modal -->
                                                            <div class="modal fade" id="del<?= $idb; ?>">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <form method="post">
                                                                                            <!-- Modal Header -->
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">Hapus Barang
                                                                                                    <?php echo $p['nama'] ?> -
                                                                                                    <?php echo $p['jenis'] ?> -
                                                                                                    <?php echo $p['ukuran'] ?>
                                                                                                </h4>
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            </div>
                                                                    
                                                                                            <!-- Modal body -->
                                                                                            <div class="modal-body">
                                                                                                Apakah Anda yakin ingin menghapus barang ini dari daftar stock?
                                                                                                <input type="hidden" name="idbrg" value="<?= $idb; ?>">
                                                                                            </div>
                                                                    
                                                                                            <!-- Modal footer -->
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                                <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    
                                                                    
                                                                            <?php
                                                    }
                                                    ?>
                                                                        </tbody>
                                                                        </table>
                                                                        </div>
                                                                        <a href="exportstkbhn.php" target="_blank" class="btn btn-info"><i class="ti-printer"></i> Export Data</a>
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                    
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        <!-- page container area end -->
                                                                    
                                                                        <!-- modal input -->
                                                                        <div id="myModal" class="modal fade">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Masukkan Stok Baru</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="tmb_brg_act.php" method="post" autocomplete="off">
                                                                                            <div class="form-group">
                                                                                                <label>Nama</label>
                                                                                                <input name="nama" type="text" class="form-control" placeholder="Nama Barang" required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Jenis</label>
                                                                                                <input name="jenis" type="text" class="form-control" placeholder="Jenis / Kategori Barang">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Merk</label>
                                                                                                <input name="merk" type="text" class="form-control" placeholder="Merk Barang">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Isi</label>
                                                                                                <input name="ukuran" type="text" class="form-control" placeholder="Isi">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Stock</label>
                                                                                                <input name="stock" type="number" min="0" class="form-control" placeholder="Qty">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Satuan</label>
                                                                                                <select name="satuan" class="custom-select form-control">
                                                                                                    <option selected>Pilih satuan</option>
                                                                                                    <option value="Buah">Buah</option>
                                                                                                    <option value="Unit">Unit</option>
                                                                                                    <option value="Dus">Dus</option>
                                                                                                    <option value="Pack">Pack</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Lokasi</label>
                                                                                                <input name="lokasi" type="text" class="form-control" placeholder="Lokasi barang">
                                                                                            </div>
                                                                    
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                $('input').on('keydown', function (event) {
                                                                                    if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
                                                                                        var $t = $(this);
                                                                                        event.preventDefault();
                                                                                        var char = String.fromCharCode(event.keyCode);
                                                                                        $t.val(char + $t.val().slice(this.selectionEnd));
                                                                                        this.setSelectionRange(1, 1);
                                                                                    }
                                                                                });
                                                                            });

                                                                            $(document).ready(function () {
                                                                                $('#dataTable3').DataTable({
                                                                                    dom: 'Bfrtip',
                                                                                    buttons: [
                                                                                        'print'
                                                                                    ]
                                                                                });
                                                                            });
                                                                        </script>
                                                                    
                                                                        <!-- jquery latest version -->
                                                                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                                                                        <!-- bootstrap 4 js -->
                                                                        <script src="assets/js/popper.min.js"></script>
                                                                        <script src="assets/js/bootstrap.min.js"></script>
                                                                        <script src="assets/js/owl.carousel.min.js"></script>
                                                                        <script src="assets/js/metisMenu.min.js"></script>
                                                                        <script src="assets/js/jquery.slimscroll.min.js"></script>
                                                                        <script src="assets/js/jquery.slicknav.min.js"></script>
                                                                        <!-- Start datatable js -->
                                                                        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
                                                                        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
                                                                        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
                                                                        <!-- start chart js -->
                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                                                                        <!-- start highcharts js -->
                                                                        <script src="https://code.highcharts.com/highcharts.js"></script>
                                                                        <!-- start zingchart js -->
                                                                        <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
                                                                        <script>
                                                                            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
                                                                            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
                                                                        </script>
                                                                        <!-- all line chart activation -->
                                                                        <script src="assets/js/line-chart.js"></script>
                                                                        <!-- all pie chart -->
                                                                        <script src="assets/js/pie-chart.js"></script>
                                                                        <!-- others plugins -->
                                                                        <script src="assets/js/plugins.js"></script>
                                                                        <script src="assets/js/scripts.js"></script>
                                                                        </body>
                                                                    
                                                                        </html>
                                                                        <?php
} else {
    ?>
                                                                        <div class="container">
                                                                            <?php
                                                                            header("Location: login.php");
                                                                            ?>
                                                                            <?php
}