<?php
include 'koneksi.php';
$conn = new PDOConnection;

if(isset($_POST['username']) && isset($_POST['password'])){
	$username = htmlentities($_POST['username']);
	$pass = htmlentities(md5($_POST['password']));

	// mencegah serangan MYSQL INJECTION
	$username2 = preg_replace('/[^A-Za-z0-9\-_.@#]/','',$username);
	$pass2 = preg_replace('/[^A-Za-z0-9\-_.@#]/','',$pass);

	if (($username2 == $username) && ($pass2 == $pass)){

		$q_login = $conn->getConn()->prepare("SELECT id_user,username,level,email,verifikasi FROM user WHERE username=:user AND password=:pass");
	
		$q_login->bindParam(":user", $username);
		$q_login->bindParam(":pass", $pass);
	
		$q_login->execute();
	
		$data = $q_login->fetch(PDO::FETCH_ASSOC);
		if ($q_login->rowCount() > 0):
			session_start();
			if($data['level'] == "Administrator"):
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['level'] = $data['level'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['id_user'] = $data['id_user'];
				header("location:../administrator");
	
			elseif($data['level'] == "Manajemen"):
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['level'] = $data['level'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['id_user'] = $data['id_user'];
				header("location:../manajemen");
			elseif($data['level'] == "Peminjam"):

				if($data['verifikasi'] == "Y"):

					$_SESSION['nama'] = $data['nama'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['level'] = $data['level'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['id_user'] = $data['id_user'];
					header("location:../peminjam");

				elseif($data['verifikasi'] == "N"):

					header("location:../login.php?Alert=NoVerify");

				endif;

			else:
				header("location:../login.php?Alert=Invalid");
			endif;
		else:
				header("location:../login.php?Alert=Wrong");
		endif;

	}
}

?>