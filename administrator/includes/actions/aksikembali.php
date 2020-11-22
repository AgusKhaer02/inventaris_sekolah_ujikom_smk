<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_pinjam = htmlentities($_GET['id_pinjam']);
$id_barang = htmlentities($_GET['id_barang']);

$q_edit_stok_data = $conn->getConn()->prepare("UPDATE stok SET total_barang=total_barang+(SELECT jml_pinjam FROM pinjam_barang WHERE id_pinjam=:val1) WHERE id_barang=:val2");

$q_edit_stok_data->bindParam(":val1",$id_pinjam);
$q_edit_stok_data->bindParam(":val2",$id_barang);

$q_edit_stok_data->execute();

$q_edit_pnjm_data = $conn->getConn()->prepare("UPDATE pinjam_barang SET kembali='Y' WHERE id_pinjam=:val1");

$q_edit_pnjm_data->bindParam(":val1",$id_pinjam);

$q_edit_pnjm_data->execute();

}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
    header("location:../../index.php?page=Peminjaman&alert=ReturnSuccess");
?>