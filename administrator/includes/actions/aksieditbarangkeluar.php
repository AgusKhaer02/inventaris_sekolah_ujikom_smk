<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_brg_keluar = htmlentities($_POST['id_brg_keluar']);
$id_barang = htmlentities($_POST['id_barang']);
$tgl_keluar = htmlentities($_POST['tgl_keluar']);
$jml_keluar = htmlentities($_POST['jml_keluar']);
$lokasi = htmlentities($_POST['lokasi']);
$penerima = htmlentities($_POST['penerima']);


$q_insert_data = $conn->getConn()->prepare("UPDATE barang_keluar SET id_barang=:val2,nama_barang=(SELECT nama_barang FROM barang WHERE id_barang=:val2),tgl_keluar=:val4,jml_keluar=:val5,lokasi=:val6,penerima=:val7 WHERE id_keluar_barang=:val1");

$q_insert_data->bindParam(":val1",$id_brg_keluar);
$q_insert_data->bindParam(":val2",$id_barang);
$q_insert_data->bindParam(":val4",$tgl_keluar);
$q_insert_data->bindParam(":val5",$jml_keluar);
$q_insert_data->bindParam(":val6",$lokasi);
$q_insert_data->bindParam(":val7",$penerima);

$q_insert_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_insert_data){
    header("location:../../index.php?page=BarangKeluar&alert=EditSuccess");
}
?>