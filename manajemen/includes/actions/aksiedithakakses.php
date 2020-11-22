<?php
if (isset($_POST['id_user'])){
    include '../../../includes/koneksi.php';
    $conn = new PDOConnection;

    $id = htmlentities($_POST['id_user']);
    $level = htmlentities($_POST['level']);

    $q_edit_lv = $conn->getConn()->prepare("UPDATE user SET level=:val2 WHERE id_user=:val1");
    echo $id.$level;
    $q_edit_lv->bindParam(":val1", $id);
    $q_edit_lv->bindParam(":val2", $level);

    $q_edit_lv->execute();


    if ($q_edit_lv){
        header("location:../../index.php?page=HakAkses&alert=EditSuccess");
    }


}
?>