<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level']) && isset($_SESSION['email']) && isset($_SESSION['id_user'])):
	if($_SESSION['level'] == "Manajemen"):

	else:
		header("location:../login.php?Alert=isNotManagement");
	endif;
else:
header("location:../login.php?Alert=ErrNoLogin");
endif;

$username = $_SESSION['username'];
$level = $_SESSION['level'];
$email = $_SESSION['email'];
$id_user = $_SESSION['id_user'];

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
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


		<!-- datatables -->
		<link rel="stylesheet" href="../assets/vendor/DataTables-1.10.18/css/jquery.dataTables.min.css">
		<!-- page specific plugin styles -->

		<script src="../assets/js/jquery-3.3.1.min.js"></script>


		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<script></script>
	</head>

	<body class="no-skin">
		<!-- navigation bar -->
		<?php
		include 'includes/navbar.php';
		?>
		<!-- navigation bar -->

		<!-- sidebar -->
		<?php
		include 'includes/sidebar.php';
		?>
		<!-- sidebar -->

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active"><?php echo isset($_GET['page']) ? $_GET['page'] : 'Dashboard';?></li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search" action="" method="post">
								<span class="input-icon">
									<input type="text" name="search" placeholder="Cari Halaman ..." class="nav-search-input" id="nav-search-input" autocomplete="on" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">

					<?php

					// aski cari halaman
					$search = isset($_POST['search']) ? $_POST['search'] : '';
					if ($search){
						if ($search !== null){
							$ucfrst = str_replace(' ','',ucwords(strtolower($search)));
							echo "<script>
								document.location.href = 'index.php?page=$ucfrst';
							</script>";
						}
					}

					
					if (isset($_GET['page'])){
						
						$page = $_GET['page'];
						switch ($page){
						// --- dashboard
						case 'Dashboard':
						include '../pages/dashboard.php';
						break;
						// ---
						
						// --- data barang
						case 'DataBarang':
						include 'pages/databarang.php';
						break;
						case 'TambahDataBarang':
						include 'pages/tambah/tambahdatabarang.php';
						break;
						case 'EditDataBarang':
						include 'pages/edit/editdatabarang.php';
						break;
						// ---

						// --- barang masuk
						case 'BarangMasuk':
						include 'pages/barangmasuk.php';
						break;
						case 'TambahBarangMasuk':
						include 'pages/tambah/tambahbarangmasuk.php';
						break;
						case 'EditBarangMasuk':
						include 'pages/edit/editbarangmasuk.php';
						break;
						// ---

						// --- barang keluar
						case 'BarangKeluar':
						include 'pages/barangkeluar.php';
						break;
						case 'TambahBarangKeluar':
						include 'pages/tambah/tambahbarangkeluar.php';
						break;
						case 'EditBarangKeluar':
						include 'pages/edit/editbarangkeluar.php';
						break;
						// ---
						
						// --- stok
						case 'Stok':
						include 'pages/stok.php';
						break;
						// ---

						// --- hak akses
						case 'HakAkses':
						include 'pages/hakakses.php';
						break;
						case 'EditHakAkses':
						include 'pages/edit/edithakakses.php';
						break;
						// ---

						// --- laporan
						case 'Laporan':
						include 'pages/laporan.php';
						break;
						// ---

						default:
						echo "
						<div class='page-header'>
							<h1>
								Halaman Tidak Ditemukan
							</h1>
						</div>
						";
						echo "Maaf halaman yang anda tuju tidak ditemukan , <a href='index.php'>Kembali ke menu awal</a>";
						break;	
						}


					}else{
					include 'pages/dashboard.php';
					}
					?>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script src="../assets/js/jquery-2.1.4.min.js"></script>
        
		<script src="../assets/js/bootstrap.min.js"></script>

		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		
		<script src="../assets/js/jquery.flot.min.js"></script>
		
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		
		<script src="../assets/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		
		<script src="../assets/js/ace.min.js"></script>

		<script src="../assets/plugins/jquery.table2excel/jquery.table2excel.js"></script>

		<!-- datatables -->
		<script src="../assets/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

				// ---dataTables function
				$('#dataTables').DataTable({
				pageLength : 5,
				lengthMenu: [[5, 10, 20], [5, 10, 20]],
				"scrollY" : true,
				"scrollX" : true,
				"language" : {
					"url" : "../assets/includes/json/dataTablesIndonesia.json",
					"sEmptyTable" : "Tidads"
				}
				});
				
				$('#detailBarangKonfimasi').modal('show');
				$(document).ready( function () {
					$(".page-content").hide().load().fadeIn();
					return false;		
				});
		</script>				

	</body>
</html>