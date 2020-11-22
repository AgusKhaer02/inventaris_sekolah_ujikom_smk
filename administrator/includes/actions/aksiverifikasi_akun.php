<?php
    if (isset($_GET['event'])){
        include '../../../includes/koneksi.php';
        $conn = new PDOConnection;

        $id_user = htmlentities($_GET['id']);
        $nama = htmlentities($_GET['nama']);
        $email = htmlentities($_GET['email']);
        
        if($_GET['event'] == "Setuju"){

            $q_getverifycode = $conn->getConn()->prepare("SELECT kode_verifikasi FROM user WHERE id_user=$id_user");
            $q_getverifycode->execute();
            $data_ver = $q_getverifycode->fetch(PDO::FETCH_ASSOC);
            $prm_nama = $nama;
            $prm_email = $email;
            $prm_subjek = "Verifikasi Akun";
            
            $prm_isi = "Klik disini untuk verifikasi akun<br/> <a href='#'>".$_SERVER['SERVER_NAME']."/Inventaris_BarangAgusKK/verify_account.php?code=".$data_ver['kode_verifikasi']."</a>";
            echo $prm_isi;
            include '../sc_email.php';
            $c_email = new smtpEmail;
            $c_email->send($prm_nama,$prm_email,$prm_subjek,$prm_isi);
            
            // header("location:../../index.php?page=Dashboard&alert=OkAccSuccess");
            
        }elseif($_GET['event'] == "Tolak"){
            $q_refuse = $conn->getConn()->prepare("DELETE FROM user WHERE id_user='$id_user' AND level='Peminjam'");
            $q_refuse->execute();

            $prm_nama = $nama;
            $prm_email = $email;
            $prm_subjek = "Verifikasi Akun";
            
            $prm_isi = "Maaf akun anda di tolak oleh admin, hubungi admin untuk informasi lebih lanjut";
            include '../sc_email.php';
            $c_email = new smtpEmail;
            $c_email->send($prm_nama,$prm_email,$prm_subjek,$prm_isi);
            header("location:../../index.php?page=Dashboard&alert=RefuseAccSuccess");

        }

    }
?>