<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_supplier = htmlentities($_POST['id_supplier']);
$nama_supplier = htmlentities($_POST['nama_supplier']);
$alamat_supplier = htmlentities($_POST['alamat_supplier']);
$telp_supplier = htmlentities($_POST['telp_supplier']);
$kota_supplier = htmlentities($_POST['kota_supplier']);

$q_edit_data = $conn->getConn()->prepare("UPDATE supplier SET nama_supplier=:val2,alamat_supplier=:val3,telp_supplier=:val4,kota_supplier=:val5 WHERE id_supplier=:val1");

$q_edit_data->bindParam(":val1",$id_supplier);
$q_edit_data->bindParam(":val2",$nama_supplier);
$q_edit_data->bindParam(":val3",$alamat_supplier);
$q_edit_data->bindParam(":val4",$telp_supplier);
$q_edit_data->bindParam(":val5",$kota_supplier);

$q_edit_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_edit_data){
    header("location:../../index.php?page=Supplier&alert=EditSuccess");
}
?>