<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_supplier = htmlentities($_POST['id_supplier']);
$nama_supplier = htmlentities($_POST['nama_supplier']);
$alamat_supplier = htmlentities($_POST['alamat_supplier']);
$telp_supplier = htmlentities($_POST['telp_supplier']);
$kota_supplier = htmlentities($_POST['kota_supplier']);

$q_insert_data = $conn->getConn()->prepare("INSERT INTO supplier (id_supplier,nama_supplier,alamat_supplier,telp_supplier,kota_supplier) VALUES (:val1,:val2,:val3,:val4,:val5)");

$q_insert_data->bindParam(":val1",$id_supplier);
$q_insert_data->bindParam(":val2",$nama_supplier);
$q_insert_data->bindParam(":val3",$alamat_supplier);
$q_insert_data->bindParam(":val4",$telp_supplier);
$q_insert_data->bindParam(":val5",$kota_supplier);

$q_insert_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_insert_data){
    header("location:../../index.php?page=Supplier&alert=InsertSuccess");
}
?>