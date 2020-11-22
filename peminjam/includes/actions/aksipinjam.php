<?php
session_start();
$peminjam = $_SESSION['id_user'];

include '../../../includes/koneksi.php';
$conn = new PDOConnection;

$id_barang = htmlentities($_POST['id_barang']);
$tgl_pinjam = htmlentities($_POST['tgl_pinjam']);
$jml_pinjam = htmlentities($_POST['jml_pinjam']);
$tgl_kembali = htmlentities($_POST['tgl_kembali']);

$q_id_ver = $conn->getConn()->prepare("SELECT MAX(id_verifikasi) AS id_max FROM verifikasi_pinjam");
$q_id_ver->execute();

$data = $q_id_ver->fetch(PDO::FETCH_ASSOC);

$int_value = (int) $data['id_max'];
$int_value++;
$id_ver = $data['id_max'] !=0 ? $int_value : 10001;

$q_pinjam = $conn->getConn()->prepare("INSERT INTO verifikasi_pinjam SET id_verifikasi=:val1,id_peminjam=:val2,id_barang=:val3,tgl_pinjam=:val4,jml_pinjam=:val5,tgl_kembali=:val6");


$q_pinjam->bindParam(":val1",$id_ver);
$q_pinjam->bindParam(":val2",$peminjam);
$q_pinjam->bindParam(":val3",$id_barang);
$q_pinjam->bindParam(":val4",$tgl_pinjam);
$q_pinjam->bindParam(":val5",$jml_pinjam);
$q_pinjam->bindParam(":val6",$tgl_kembali);

$q_pinjam->execute();
header("location:../../index.php?alert=PinjamBerhasil");

?>