<?php
include '../../../includes/koneksi.php';
$conn = new PDOConnection;
try{
$id_pnjm = htmlentities($_POST['id_pinjam']);
$id_peminjam = htmlentities($_POST['id_peminjam']);
$tgl_pinjam = htmlentities($_POST['tgl_pinjam']);
$id_barang = htmlentities($_POST['id_barang']);
$jml_pinjam = htmlentities($_POST['jml_pinjam']);
$tgl_kembali = htmlentities($_POST['tgl_kembali']);
$kondisi = htmlentities($_POST['kondisi']);

$q_cek_stok = $conn->getConn()->prepare("SELECT total_barang FROM stok WHERE id_barang='$id_barang'");
$q_cek_stok->execute();
$rows = (int)$q_cek_stok->fetch(PDO::FETCH_ASSOC);
    if($rows['total_barang'] >= 0){
        if($rows['total_barang'] <= $jml_pinjam){
            $q_insert_data = $conn->getConn()->prepare("INSERT INTO pinjam_barang SET id_pinjam=:val1,id_peminjam=:val2,peminjam=(SELECT nama FROM user WHERE id_user=:val2 AND level='Peminjam'),tgl_pinjam=:val4,id_barang=:val5,nama_barang=(SELECT nama_barang FROM barang WHERE id_barang=:val5),jml_pinjam=:val7,tgl_kembali=:val8,kondisi=:val9");
    
            $q_insert_data->bindParam(":val1",$id_pnjm);
            $q_insert_data->bindParam(":val2",$id_peminjam);
            $q_insert_data->bindParam(":val4",$tgl_pinjam);
            $q_insert_data->bindParam(":val5",$id_barang);
            $q_insert_data->bindParam(":val7",$jml_pinjam);
            $q_insert_data->bindParam(":val8",$tgl_kembali);
            $q_insert_data->bindParam(":val9",$kondisi);
    
            $q_insert_data->execute();
            header("location:../../index.php?page=Peminjaman&alert=InsertSuccess");
        }else{
            echo "<script>
            alert('Jumlah peminjaman tidak boleh melebihi jumlah stok');
            document.location.href = '../../index.php?page=Peminjaman';
            </script>
            ";
        }
    }else{
        echo "<script>
        alert('Stok habis');
        </script>
        ";
    }



}catch(PDOException $ex){
    die("Error : ".$ex->getMessage());
}
?>