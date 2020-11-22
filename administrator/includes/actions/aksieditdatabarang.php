<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_barang = htmlentities($_POST['id_barang']);
$nama_barang = htmlentities($_POST['nama_barang']);
$spesifikasi = htmlentities($_POST['spesifikasi']);
$lokasi = htmlentities($_POST['lokasi']);
$kondisi = htmlentities($_POST['kondisi']);
$jml_barang = htmlentities($_POST['jml_barang']);
$sumber_dana = htmlentities($_POST['sumber_dana']);

$q_edit_data = $conn->getConn()->prepare("UPDATE barang SET nama_barang=:val2,spesifikasi=:val3,lokasi=:val4,kondisi=:val5,jumlah_barang=:val6,sumber_dana=:val7 WHERE id_barang=:val1");

$q_edit_data->bindParam(":val1",$id_barang);
$q_edit_data->bindParam(":val2",$nama_barang);
$q_edit_data->bindParam(":val3",$spesifikasi);
$q_edit_data->bindParam(":val4",$lokasi);
$q_edit_data->bindParam(":val5",$kondisi);
$q_edit_data->bindParam(":val6",$jml_barang);
$q_edit_data->bindParam(":val7",$sumber_dana);

$q_edit_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_edit_data){
    header("location:../../index.php?page=DataBarang&alert=EditSuccess");
}
?>