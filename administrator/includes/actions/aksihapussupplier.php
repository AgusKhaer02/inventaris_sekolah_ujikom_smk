<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_supplier = htmlentities($_GET['id_supplier']);

$q_delete_data = $conn->getConn()->prepare("DELETE FROM supplier WHERE id_supplier=:val1");

$q_delete_data->bindParam(":val1",$id_supplier);

$q_delete_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_delete_data){
    header("location:../../index.php?page=Supplier&alert=DeleteSuccess");
}
?>