<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_pinjam = htmlentities($_GET['id_pinjam']);

$q_delete_data = $conn->getConn()->prepare("DELETE FROM pinjam_barang WHERE id_pinjam=:val1");

$q_delete_data->bindParam(":val1",$id_pinjam);

$q_delete_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
if ($q_delete_data){
    header("location:../../index.php?page=Peminjaman&alert=DeleteSuccess");
}
?>