<?php
include 'includes/koneksi.php';
$conn = new PDOConnection;

$code = $_GET['code'];
$q_cek_code = $conn->getConn()->prepare("SELECT * FROM user WHERE kode_verifikasi='$code'");
$q_cek_code->execute();
if($q_cek_code->rowCount() > 0){
    $change_ver = $conn->getCOnn()->prepare("UPDATE user SET verifikasi='Y' WHERE kode_verifikasi='$code'");
    $change_ver->execute();
    $message = "Success";
}else{
    $message = "Failed";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun</title>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- datatables -->
    <link rel="stylesheet" href="assets/vendor/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <!-- page specific plugin styles -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>


    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
</head>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">

                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="fa fa-cube"></i>
                            Web Inventaris Barang
                        </small>
                    </a>
                </div>
            </div><!-- /.navbar-container -->
        </div>
        
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="page-header">
                    <?php
                        if($message == "Success"){
                            echo "
                            <h1>
                                Selamat! akun anda telah di verifikasi 
                            </h1>                            
                            ";
                        }elseif($message == "Failed"){
                            echo "
                            <h1 style='color:red;'>
                                Kode verifikasi anda tidak valid, mohon hubungi admin untuk informasi lebih lanjut
                            </h1>
                            ";
                        }
                    ?>
                    </div>
                    <a href="login.php">Klik disini untuk kembali ke login</a>
                </div>                 
            </div>
        </div>

    </body>
</html>