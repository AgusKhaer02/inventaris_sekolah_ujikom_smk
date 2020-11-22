<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_barang = htmlentities($_POST['id_barang']);
$nama_barang = htmlentities($_POST['nama_barang']);
$spesifikasi = htmlentities($_POST['spesifikasi']);
$lokasi = htmlentities($_POST['lokasi']);
$kondisi = htmlentities($_POST['kondisi']);
$kategori = htmlentities($_POST['kategori']);
$jml_barang = htmlentities($_POST['jml_barang']);
$sumber_dana = htmlentities($_POST['sumber_dana']);


$q_insert_data = $conn->getConn()->prepare("CALL TambahDataBarang(:val1,:val2,:val3,:val4,:val5,:val6,:val7,:val8)");

$q_insert_data->bindParam(":val1",$id_barang);
$q_insert_data->bindParam(":val2",$nama_barang);
$q_insert_data->bindParam(":val3",$spesifikasi);
$q_insert_data->bindParam(":val4",$lokasi);
$q_insert_data->bindParam(":val5",$kondisi);
$q_insert_data->bindParam(":val6",$kategori);
$q_insert_data->bindParam(":val7",$jml_barang);
$q_insert_data->bindParam(":val8",$sumber_dana);

$q_insert_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_insert_data){
    header("location:../../index.php?page=DataBarang&alert=InsertSuccess");
}
?>