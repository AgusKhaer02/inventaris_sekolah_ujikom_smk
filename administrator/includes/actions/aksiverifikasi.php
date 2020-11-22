<?php
    if (isset($_GET['event']) && isset($_GET['id_ver']) && isset($_GET['id_pmnjm']) && isset($_GET['id_brg']) && isset($_GET['jml_pinjam']) && isset($_GET['tgl_pinjam']) && isset($_GET['tgl_kembali'])){

        include '../../../includes/koneksi.php';
        $conn = new PDOConnection;

        $id_ver = htmlentities($_GET['id_ver']);
        $id_peminjam = htmlentities($_GET['id_pmnjm']);
        $id_barang = htmlentities($_GET['id_brg']);
        $jml_pinjam = htmlentities($_GET['jml_pinjam']);
        $tgl_pinjam = htmlentities($_GET['tgl_pinjam']);
        $tgl_kembali = htmlentities($_GET['tgl_kembali']);

        
        if($_GET['event'] == "Setuju"){

            $q_id_pnjm = $conn->getConn()->prepare("SELECT MAX(id_pinjam) AS mxid FROM pinjam_barang");
            $q_id_pnjm->execute();

            while($data = $q_id_pnjm->fetch(PDO::FETCH_ASSOC)){
                $mxid = $data['mxid'];
            }
            $int_value = (int) substr($mxid,3,3);

            $int_value++;
            $chr_value = "P-";
            $id_pnjm = $chr_value. sprintf("%03s",$int_value);

            // insert kedalam data pinjam barang
            $q_ok = $conn->getConn()->prepare("INSERT INTO pinjam_barang SET id_pinjam=:val1,id_peminjam=:val2,peminjam=(SELECT nama FROM user WHERE id_user=:val2 AND level='Peminjam'),tgl_pinjam=:val5,id_barang=:val3,nama_barang=(SELECT nama_barang FROM barang WHERE id_barang=:val3),jml_pinjam=:val4,tgl_kembali=:val6,kondisi=(SELECT kondisi FROM barang WHERE id_barang=:val3)");

            $q_ok->bindParam(":val1",$id_pnjm);
            $q_ok->bindParam(":val2",$id_peminjam);
            $q_ok->bindParam(":val3",$id_barang);
            $q_ok->bindParam(":val4",$jml_pinjam);
            $q_ok->bindParam(":val5",$tgl_pinjam);
            $q_ok->bindParam(":val6",$tgl_kembali);

            $q_ok->execute();

            // menghapus isi verfikasi pinjam berdasarkan id_verifikasi
            $q_dt_verify = $conn->getConn()->prepare("DELETE FROM verifikasi_pinjam WHERE id_verifikasi=:id_ver");

            $q_dt_verify->bindParam(":id_ver",$id_ver);

            $q_dt_verify->execute();

            // mengambil nama barang di tabel barang
            $nama_barang = $conn->getConn()->prepare("SELECT nama_barang FROM barang WHERE id_barang='$id_barang'");
            $nama_barang->execute();
            $data2 = $nama_barang->fetch(PDO::FETCH_ASSOC);

            // menyiapkan bahan untuk kirim notifikasi lewat email
            $prm_nama = htmlentities($_GET['nama']);
            $prm_email = htmlentities($_GET['email']);
            
            $prm_subjek = "Verifikasi Pinjam";
            $prm_isi = "Peminjaman anda telah di verifikasi oleh admin <br/>ID Barang : $id_barang<br/>Nama Peminjam : $prm_nama <br/>Barang yang dipinjam : $data2[nama_barang] <br/>Tanggal Pinjam : $tgl_pinjam <br/>Tanggal kembali : $tgl_kembali<br/>";

            // kirim email
            include '../sc_email.php';
            $c_email = new smtpEmail;
            $c_email->send($prm_nama,$prm_email,$prm_subjek,$prm_isi);

            header("location:../../index.php?page=Dashboard&alert=OkPnjmSuccess");
            
        }elseif($_GET['event'] == "Tolak"){
            $q_refuse = $conn->getConn()->prepare("DELETE FROM verifikasi_pinjam WHERE id_verifikasi=$id_ver");

            $q_refuse->execute();

            // mengambil nama barang di tabel barang
            $nama_barang = $conn->getConn()->prepare("SELECT nama_barang FROM barang WHERE id_barang='$id_barang'");
            $nama_barang->execute();
            $data2 = $nama_barang->fetch(PDO::FETCH_ASSOC);
            
            // kirim notifikasi
            $prm_nama = htmlentities($_GET['nama']);
            $prm_email = htmlentities($_GET['email']);
            $prm_subjek = "Verifikasi Pinjam";
            $prm_isi = "Peminjaman anda ditolak oleh admin,silahkan hubungi admin untuk informasi lebih lanjut <br/>ID Barang : $id_barang<br/>Nama Peminjam : $prm_nama <br/>Barang yang dipinjam : $data2[nama_barang] <br/>Tanggal Pinjam : $tgl_pinjam <br/>Tanggal kembali : $tgl_kembali<br/>";

            include '../sc_email.php';
            $c_email = new smtpEmail;
            $c_email->send($prm_nama,$prm_email,$prm_subjek,$prm_isi);

            header("location:../../index.php?page=Dashboard&alert=RefusePnjmSuccess");

        }

    }
?>