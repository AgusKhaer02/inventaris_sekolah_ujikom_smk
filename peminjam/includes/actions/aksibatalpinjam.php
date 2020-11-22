<?php
if(isset($_GET['id_ver'])){
    $id_ver = htmlentities($_GET['id_ver']);
    $q_batal = $conn->getConn()->prepare("DELETE FROM verifikasi_pinjam WHERE id_verifikasi=");
    $q_batal->bindParam(":id",$id_ver);
    $q_batal->execute();
    header("location:../../index.php?alert=SBatalPinjam");
}

?>