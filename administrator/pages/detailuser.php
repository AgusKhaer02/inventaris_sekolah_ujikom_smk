<?php
if (isset($_GET['id_pem'])){
    $id_user = $_GET['id_pem'];

    include '../includes/koneksi.php';
    $conn = new PDOConnection;

    $q_show_user = $conn->getConn()->prepare("SELECT id_user,nama,username,email FROM user WHERE id_user=$id_user AND level='Peminjam'");
    $q_show_user->execute();
    $data = $q_show_user->fetch(PDO::FETCH_ASSOC);
}else{
    echo "
    <script>
        alert('404 Error');
        document.location.href = 'index.php?page=Peminjaman';
    </script>
    ";
}



?>


<!-- page-header -->
<div class="page-header">
    <h1>
        Detail Peminjam
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12 col-sm-4 center">
        <span class="profile-picture">
            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="../assets/images/avatars/profile-pic.jpg" />
        </span>

        <div class="space space-4"></div>

        <div class="profile-user-info">
            <div class="profile-info-row">
                <div class="profile-info-name"> ID Peminjam </div>

                <div class="profile-info-value">
                    <span><?php echo $data['id_user'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Nama </div>

                <div class="profile-info-value">
                    <span><?php echo $data['nama'] ?></span>

                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Username </div>

                <div class="profile-info-value">
                    <span><?php echo $data['username'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Email </div>

                <div class="profile-info-value">
                    <span><?php echo $data['email'] ?></span>
                </div>
            </div>
        </div>
    </div><!-- /.col -->

    <div class="col-xs-12 col-sm-8">

        <div class="hr hr-8 dotted"></div>

        <div class="profile-user-info">
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jumlah Barang</th>
                        <th>Tgl Kembali</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                        
                        $q = $conn->getConn()->prepare("SELECT nama_barang,tgl_pinjam,jml_pinjam,tgl_kembali FROM pinjam_barang WHERE id_peminjam=$id_user");
                        
                        $q->execute();
                        
                        $data = $q->fetchAll();
                        
                        $no=0;
                        foreach($data as $value){
                        $no++;
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $value[0];?></td>
                        <td><?php echo $value[1];?></td>
                        <td><?php echo $value[2];?></td>
                        <td><?php echo $value[3];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->