<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login | Inventaris Barang</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- jquery -->

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<!-- row -->
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="grey" id="id-text2"><i class="fa fa-sw fa-cubes"></i> 
									Sarana Prasarana</span>
								</h1>
								<h2 class="blue" id="id-company-text">SMK Negeri 3 Banjar</h2>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<!-- login box -->
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											
											<?php
											if(isset($_GET['Alert'])){
												if($_GET['Alert'] == "ErrNoLogin"){
													echo"
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda Harus Login Terlebih Dahulu
														</strong>
													</div>";
												}
												elseif($_GET['Alert'] == "Invalid"){
													echo "
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Data Anda Tidak Valid
														</strong>
													</div>";			
												}
												elseif($_GET['Alert'] == "isNotManagement"){
													echo "
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda bukan manajemen,silahkan coba lagi
														</strong>
													</div>";			
												}
												elseif($_GET['Alert'] == "isNotAdmin"){
													echo "
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda bukan admin,silahkan coba lagi
														</strong>
													</div>";			
												}
												elseif($_GET['Alert'] == "isNotUser"){
													echo "
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda bukan peminjam,silahkan coba lagi
														</strong>
													</div>";			
												}
												elseif($_GET['Alert'] == "NoVerify"){
													echo "
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda belum terverifikasi oleh admin</br>
														Silahkan hubungi admin
														</strong>
													</div>";			
												}
												elseif($_GET['Alert'] == "Wrong"){
													echo"
													<div class='alert alert-danger'>
														<button class='close' type='button' data-dismiss='alert'>
															<i class='ace-icon fa fa-times'></i>
														</button>
														<strong>
														<i class='ace-icon fa fa-times'></i>
														Anda Salah Memasukan Password dan Username
														</strong>
													</div>";
												}
											}
											?>

											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-edit"></i>
												Silahkan login
											</h4>

											<div class="space-6"></div>

											<form action="includes/login.php" method="post" class="formid">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"/>
															<i class="ace-icon fa fa-lock"></i>
															  <div class="capslockdiv" style="display: none; color: red;">Caps Lock Aktif!</div>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

														<button type="submit" value="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										
										<div class="toolbar clearfix">
											<div>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Daftar
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								
								</div><!-- /.login-box -->

								<!-- pendaftaran member baru -->
								<div id="signup-box" class="signup-box widget-box no-border">

									<!-- widget body -->
									<div class="widget-body">
										
										<!-- widget main -->
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Pendaftaran member baru
											</h4>

											<div class="space-6"></div>
											<p> Masukan Form Dibawah ini: </p>

											<form action="includes/signup.php" method="post" class="formid">

												<!-- nama lengkap -->
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<!-- username -->
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="username"  class="form-control" placeholder="Username" required />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<!-- email -->
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="email"  class="form-control" placeholder="Email" required />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<!-- password -->
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" class="form-control" placeholder="Password" required />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<!-- repassword -->
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="repassword" class="form-control" placeholder="Masukan Password Lagi" required />
														<i class="ace-icon fa fa-lock"></i>
														<div class="capslockdiv" style="display: none; color: red;">Caps Lock Aktif!</div>
													</span>
												</label>

												<div class="space-24"></div>

												<div class="clearfix">

													<!-- btn daftar -->
													<button type="submit" class="btn btn-success btn-block">
														<span class="bigger-110">Daftar</span>

														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
													</button>
													<!-- ------------- -->
													
												</div>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Kembali ke login
											</a>
										</div>


									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->

								<!-- pendaftaran member baru -->
							
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script>
		$(".close").click(function(){
			$(".alert").remove();
		});

		$(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
			$('.widget-box.visible').removeClass('visible');//menyembunyikan yang lainnya
			$(target).addClass('visible');
			// menampilkan target
		});

		$(document).ready(
		function () {
			check_capslock_form($('.formid')); //menerapkan proses cek capslock
		}
		);

		document.onkeydown = function (e) { //mengecek tombol Capslock ketika ditekan di seluruh window
		e = e || event;
		if (typeof (window.lastpress) === 'undefined') { window.lastpress = e.timeStamp; }
		if (typeof (window.capsLockEnabled) !== 'undefined') {
			if (e.keyCode == 20 && e.timeStamp > window.lastpress + 50) {
			window.capsLockEnabled = !window.capsLockEnabled;
			$('.capslockdiv').toggle();
			}
			window.lastpress = e.timeStamp;
			// kadang kadang function memanggil dua kali ketika kita menekan capslock sekali, jadi kita gunakan timeStamp untuk memperbaiki masalah
		}

		};

		function check_capslock(e) { //untuk mengecek tombol yang barusan di tekan
		var s = String.fromCharCode(e.keyCode);
		if (s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey) {
			window.capsLockEnabled = true;
			$('.capslockdiv').show();
		}
		else {
			window.capsLockEnabled = false;
			$('.capslockdiv').hide();
		}
		}

		function check_capslock_form(where) {
		if (!where) { where = $(document); }
		where.find('input,select').each(function () {
			if (this.type != "hidden") {
			$(this).keypress(check_capslock);
			}
		});
		}
	</script>
		
	</body>
</html>