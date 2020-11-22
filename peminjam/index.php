<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level']) && isset($_SESSION['email']) && isset($_SESSION['id_user'])):
	if($_SESSION['level'] == "Peminjam"):

	else:
		header("location:../login.php?Alert=isNotUser");
	endif;
else:
header("location:../login.php?Alert=ErrNoLogin");
endif;

$username = $_SESSION['username'];
$level = $_SESSION['level'];
$email = $_SESSION['email'];
$id_user = $_SESSION['id_user'];


include '../includes/koneksi.php';
$conn = new PDOConnection;

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

		<!-- sweet alert -->
		<script src="../assets/js/jquery-3.3.1.min.js"></script>


		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
	</head>

	<body class="no-skin">
		<!-- navigation bar -->
		<?php
		include 'includes/navbar.php';
		?>
		<!-- navigation bar -->

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">

						<div class="row">

							<div class="col-sm-10 col-sm-offset-1">
								<div class="widget-box transparent">
									<div class="widget-header widget-header-large">
										<h3 class="widget-title grey lighter">
											Selamat Datang, <?php echo $_SESSION['username']?>!
										</h3>
									</div>
									<div class="widget-body">
										<?php
										include 'includes/alert.php';
										
										?>

										<div class="widget-main padding-24">
											<div class="col-7 ">

												<!-- jumlah peminjaman user -->
												<div class="infobox infobox-blue">
													<div class="infobox-icon">
														<i class="ace-icon fa fa-cube"></i>
													</div>

													<div class="infobox-data">
														<span class="infobox-data-number">
														<?php
															$jml_pnjm = $conn->getConn()->prepare("SELECT * FROM pinjam_barang WHERE id_peminjam=$id_user");
															$jml_pnjm->execute();
															echo $jml_pnjm->rowCount();
														?>
														</span>
														<div class="infobox-content">
															Barang yang dipinjam
														</div>
													</div>
												</div>


												<!-- jumlah stok -->
												<div class="infobox infobox-green">
													<div class="infobox-icon">
														<i class="ace-icon fa fa-cubes"></i>
													</div>

													<div class="infobox-data">
													
														<span class="infobox-data-number">
															<?php
																$jml_brg = $conn->getConn()->prepare("SELECT * FROM barang");
																$jml_brg->execute();
																echo $jml_brg->rowCount();
															?>
														</span>

														<div class="infobox-content">
															Jumlah Barang
														</div>
													</div>
												</div>

											</div>
										</div>

										<!-- data pinjam barang -->
										<div class="col-sm-7">
											<button class="btn btn-sm btn-success" type="button"id="modal" data-target="#pinjam" data-toggle="modal"><i class="fa fa-sm fa-cube"></i> <span>Pinjam Barang</span>
											</button>
											<div class="widget-box widget-color-blue2" id="widget-box-2">
												<div class="widget-header">
													<h4 class="widget-title lighter smaller">
														<i class="fa fa-fw fa-cubes"></i> Peminjaman Anda
													</h4>
												</div>
												<div class="widget-body">
													<table id="dataTables"class="table table-striped table-bordered" style="width:100%">
														<thead>
															<tr>
																<th>NO</th>
																<th>ID Barang</th>
																<th>Nama Barang</th>
																<th>Jumlah Pinjam</th>
																<th>Tanggal Pinjam</th>
																<th>Tanggal Kembali</th>
															</tr>
														</thead>

														<tbody>
															<?php
																$q = $conn->getConn()->prepare("SELECT id_barang,nama_barang,jml_pinjam,tgl_pinjam,tgl_kembali FROM pinjam_barang WHERE id_peminjam=$id_user");
																
																$q->execute();
																
																$data = $q->fetchAll();
																
																$no=0;
																foreach($data as $value){
																$no++;
															?>
															<tr>
																<td><?php echo $no?></td>
																<td><?php echo $value[0]?></td>
																<td><?php echo $value[1]?></td>
																<td><?php echo $value[2]?></td>
																<td><?php echo $value[3]?></td>
																<td><?php echo $value[4]?></td>
															</tr>
															<?php
																}
															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>


										<!-- barang tersedia -->
										<div class="col-xs-12 col-sm-5">
											<div class="widget-box widget-color-green" id="widget-box-2">
												<div class="widget-header">
													<h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-cubes"></i> Barang Tersedia</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding">
														<table id="dataBarang"class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Nama Barang</th>
																	<th>Stok</th>
																	<th>Detail</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$q_barang = $conn->getConn()->prepare("SELECT barang.id_barang,barang.nama_barang,stok.total_barang FROM barang LEFT JOIN stok ON barang.id_barang = stok.id_barang");

																$q_barang->execute();
																
																$no = 0;
																$data = $q_barang->fetchAll();
																foreach($data as $value){
																$no++;
																?>
																<tr>
																	<td><?php echo $no?></td>
																	<td><?php echo $value[1]?></td>
																	<td><?php echo $value[2]?></td>
																	<td><a class="badge badge-yellow"href="pages/detailbarang.php?id=<?php echo $value[0]?>">Lihat Detail</a></td>
																</tr>
																<?php
																}
																?>
															</tbody>

														</table>
													</div>
												</div>
											</div>
										</div>



										<div class='modal fade' id='pinjam' role='dialog'>
											<div class='modal-dialog modal-lg'>

												<!-- Modal content-->
												<div class='modal-content'>
													<div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal'>&times;</button>
														<h4 class='modal-title'>Pinjam Barang</h4>
													</div>

													<div class='modal-body'>
														<?php include 'pages/tambahpinjam.php';?>
													</div>

													<div class='modal-footer'>
														<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
													</div>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>

						</div> <!-- /.row-->

						<!-- belum verifikasi pinjam -->
						<div class="row">
							
							<div class="col-sm-10 col-sm-offset-1">
								<div class="col-xs-12 col-sm-7">
									<div class="widget-box widget-color-red" id="widget-box-2">
										<div class="widget-header">
											<h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-cubes"></i> Peminjaman Belum di verifikasi</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<table id="dataVerifikasi"class="table table-bordered table-striped">

													<thead>
														<tr>
															<th>No</th>
															<th>ID barang</th>
															<th>Nama Barang</th>
															<th>Jumlah Pinjam</th>
															<th>Tanggal Pinjam</th>
															<th>Tanggal Kembali</th>
															<th>Aksi</th>
														</tr>
													</thead>

													<tbody>
														<?php
														$q_barang = $conn->getConn()->prepare("SELECT verifikasi_pinjam.id_barang,barang.nama_barang,verifikasi_pinjam.jml_pinjam,verifikasi_pinjam.tgl_pinjam,verifikasi_pinjam.tgl_pinjam FROM verifikasi_pinjam INNER JOIN barang ON verifikasi_pinjam.id_barang = barang.id_barang WHERE verifikasi_pinjam.id_peminjam=$id_user");

														$q_barang->execute();
														
														$no = 0;
														$data = $q_barang->fetchAll();
														foreach($data as $value){
														$no++;
														?>
														<tr>
															<td><?php echo $no?></td>
															<td><?php echo $value[0]?></td>
															<td><?php echo $value[1]?></td>
															<td><?php echo $value[2]?></td>
															<td><?php echo $value[3]?></td>
															<td><?php echo $value[4]?></td>
															<td><a class="badge badge-danger" href="">Batalkan</a></td>
														</tr>
														<?php
														}
														?>
													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>							
							<!-- rating -->
							<?php
							
							include 'rating.php';
							
							?>
							</div>



						</div><!-- /.row-->
					

					</div><!-- /.page-content -->
				</div>
			</div>
			<!--main-content-->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script src="../assets/js/jquery-2.1.4.min.js"></script>
        
		<script src="../assets/js/bootstrap.min.js"></script>
		
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

				$('#dataBarang').DataTable({
					pageLength : 5,
					"language" : {
					"url" : "../assets/includes/json/dataTablesIndonesia.json",
					"sEmptyTable" : "Tidads"
					}
				});
				$('#dataVerifikasi').DataTable({
					pageLength : 5,
					"language" : {
					"url" : "../assets/includes/json/dataTablesIndonesia.json",
					"sEmptyTable" : "Tidads"
					}
				});
				
				$('#menu-toggler').remove();

				$(document).ready( function () {
					$(".page-content").hide().load().fadeIn();
					return false;		
				});

				var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}

				$('.rating').raty({
					'cancel' : true,
					'half' : false,
					'starType' : 'i',			
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}
				})
				
				$('.rating').raty('destroy');
		</script>				

	</body>
</html>