<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
    try{
    $id_brg_masuk = htmlentities($_POST['id_brg_masuk']);
    $id_barang = htmlentities($_POST['id_barang']);
    $tgl_masuk = htmlentities($_POST['tgl_masuk']);
    $jml_masuk = htmlentities($_POST['jml_masuk']);
    $id_supplier = htmlentities($_POST['id_supplier']);


    $q_insert_data = $conn->getConn()->prepare("INSERT INTO barang_masuk SET id_masuk_barang=:val1,id_barang=:val2,nama_barang=(SELECT nama_barang FROM barang WHERE id_barang=:val2),tgl_masuk=:val4,jml_masuk=:val5,id_supplier=:val6");

    $q_insert_data->bindParam(":val1",$id_brg_masuk);
    $q_insert_data->bindParam(":val2",$id_barang);
    $q_insert_data->bindParam(":val4",$tgl_masuk);
    $q_insert_data->bindParam(":val5",$jml_masuk);
    $q_insert_data->bindParam(":val6",$id_supplier);

    $q_insert_data->execute();

    }catch(PDOException $ex){
        die("Error : ".$ex->getMessage());
    }
if ($q_insert_data){
    header("location:../../index.php?page=BarangMasuk&alert=InsertSuccess");
}
?>