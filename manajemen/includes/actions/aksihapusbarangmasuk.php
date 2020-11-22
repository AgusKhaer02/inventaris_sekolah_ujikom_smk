<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_barang = htmlentities($_GET['id_barang']);

$q_delete_data = $conn->getConn()->prepare("DELETE FROM barang_masuk WHERE id_masuk_barang=:val1");

$q_delete_data->bindParam(":val1",$id_barang);

$q_delete_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_delete_data){
    header("location:../../index.php?page=BarangMasuk&alert=DeleteSuccess");
}
?>