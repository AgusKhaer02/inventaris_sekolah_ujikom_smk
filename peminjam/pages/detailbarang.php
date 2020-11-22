<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level']) && isset($_SESSION['email']) && isset($_SESSION['id_user'])):

    if (isset($_GET['id'])):
        $id_barang = $_GET['id'];

        include '../../includes/koneksi.php';
        $conn = new PDOConnection;

        $q_show_user = $conn->getConn()->prepare("SELECT * FROM barang WHERE id_barang='$id_barang'");
        $q_show_user->execute();
        $data = $q_show_user->fetch(PDO::FETCH_ASSOC);
    else:
        echo "
        <script>
            alert('404 Error');
            document.location.href = '../index.php';
        </script>
        ";
    endif;

else:
header("location:../../login.php?Alert=ErrNoLogin");
endif;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Inventaris Barang</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


		<!-- datatables -->
		<link rel="stylesheet" href="../../assets/vendor/DataTables-1.10.18/css/jquery.dataTables.min.css">
		<!-- page specific plugin styles -->

		<!-- sweet alert -->
		<script src="../../assets/js/jquery-3.3.1.min.js"></script>


		<!-- text fonts -->
		<link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="../../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />
	</head>

	<body class="no-skin">


		<!-- navigation bar -->
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="index.html" class="navbar-brand">
                        <small>
                            <i class="fa fa-cube"></i>
                            Web Inventaris Barang
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="../../assets/images/avatars/avatar4.png" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>(Peminjam)</small>
                                    <?php echo $_SESSION['username']?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                                <li>
                                    <a href="includes/actions/logout.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>
		<!-- navigation bar -->



        <div class="main-content">
            <div class="main-content-inner">

                <div class="page-content">

                    <div class="row">

                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="widget-box transparent">
                                <!-- page-header -->
                                <div class="page-header">
                                    <h1>
                                        Detail Barang
                                    </h1>
                                </div>
                                <!-- page-header -->

                                <!-- row -->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 center">
                                        <span class="profile-picture">
                                            <img class="editable img-responsive" alt="Package" id="avatar2" src="../../assets/images/avatars/box.jpg" />
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <div class="space space-12"></div>
                                            <?php
                                            switch($data['kondisi']){
                                                case 'Baik':
                                                    echo "
                                                    <span class='btn btn-app btn-sm btn-success no-hover'>
                                                        <i class='ace-icon glyphicon glyphicon-ok'></i>
                                                        <span class='line-height-1 smaller-90'>Baik</span>
                                                    </span>                                                
                                                    ";
                                                break;

                                                case 'Kurang Baik':
                                                echo "
                                                <span class='btn btn-app btn-sm btn-warning no-hover'>
                                                    <i class='ace-icon glyphicon glyphicon-info-sign'></i>
                                                    <span class='line-height-1 smaller-90'>Kurang Baik</span>
                                                </span>                                                
                                                ";
                                                break;

                                                case 'Rusak Berat':
                                                echo "
                                                <span class='btn btn-app btn-sm btn-danger no-hover'>
                                                    <i class='ace-icon glyphicon glyphicon-alert'></i>
                                                    <span class='line-height-1 smaller-90'>Rusak Berat</span>
                                                </span>                                                
                                                ";
                                                break;


                                                default:
                                                break;
                                            }
                                            ?>


                                            <div class="profile-user-info profile-user-info-striped">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> ID Peminjam </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['id_barang'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Nama Barang </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['nama_barang'] ?></span>

                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Spesifikasi </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['spesifikasi'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Lokasi </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['lokasi'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Kategori </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['kategori'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Jumlah Barang </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['jumlah_barang'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Sumber Dana </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $data['sumber_dana'] ?></span>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div> 
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../assets/js/jquery-2.1.4.min.js"></script>
        
		<script src="../../assets/js/bootstrap.min.js"></script>

		<script src="../../assets/js/jquery-ui.custom.min.js"></script>
		
		<script src="../../assets/js/jquery.sparkline.index.min.js"></script>
		
		<script src="../../assets/js/jquery.flot.min.js"></script>
		
		<script src="../../assets/js/jquery.flot.pie.min.js"></script>
		
		<script src="../../assets/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="../../assets/js/ace-elements.min.js"></script>
		
		<script src="../../assets/js/ace.min.js"></script>

		<script src="../../assets/plugins/jquery.table2excel/jquery.table2excel.js"></script>

		<!-- datatables -->
		<script src="../../assets/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    </body>
</html>