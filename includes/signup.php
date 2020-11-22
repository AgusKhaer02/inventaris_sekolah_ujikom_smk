<?php
if(isset($_POST['nama']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])){
    if($_POST['password'] == $_POST['repassword']){

        include '../includes/koneksi.php';
        $conn2 = new PDOConnection;

        function getID_User(){
            $conn = new PDOConnection;
            $q_id_user = $conn->getConn()->prepare("SELECT MAX(id_user) AS mxid FROM user");
            $q_id_user->execute();
            $data = $q_id_user->fetch(PDO::FETCH_ASSOC);
            $int_value = (int) $data['mxid'];
            $int_value++;

            return $int_value;
        }

        $id = (int) getID_User();

        $nama = htmlentities($_POST['nama']);
        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $pass = htmlentities(md5($_POST['password']));

        $q_signup = $conn2->getConn()->prepare("CALL TambahUser(:val1,:val2,:val3,:val4,:val5)");

        $q_signup->bindParam(":val1",$id);
        $q_signup->bindParam(":val2",$nama);
        $q_signup->bindParam(":val3",$username);
        $q_signup->bindParam(":val4",$email);
        $q_signup->bindParam(":val5",$pass);

        $q_signup->execute();

        header("location:../login.php");
    }
}

?>