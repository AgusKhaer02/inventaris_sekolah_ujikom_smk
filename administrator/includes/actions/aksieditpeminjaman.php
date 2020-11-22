<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_pinjam = htmlentities($_POST['id_pinjam']);
$id_peminjam = htmlentities($_POST['id_peminjam']);
$tgl_pinjam = htmlentities($_POST['tgl_pinjam']);
$id_barang = htmlentities($_POST['id_barang']);
$jml_barang = htmlentities($_POST['jml_barang']);
$tgl_kembali = htmlentities($_POST['tgl_kembali']);
$kondisi = htmlentities($_POST['kondisi']);

$q_edit_data = $conn->getConn()->prepare("UPDATE pinjam_barang SET id_peminjam=:val2,peminjam=(SELECT nama FROM user WHERE id_user=:val2),tgl_pinjam=:val3,jml_pinjam=:val6,tgl_kembali=:val7,kondisi=:val8 WHERE id_pinjam=:val1");

$q_edit_data->bindParam(":val1",$id_pinjam);
$q_edit_data->bindParam(":val2",$id_peminjam);
$q_edit_data->bindParam(":val3",$tgl_pinjam);
$q_edit_data->bindParam(":val6",$jml_barang);
$q_edit_data->bindParam(":val7",$tgl_kembali);
$q_edit_data->bindParam(":val8",$kondisi);

$q_edit_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_edit_data){
    header("location:../../index.php?page=Peminjaman&alert=EditSuccess");
}
?>