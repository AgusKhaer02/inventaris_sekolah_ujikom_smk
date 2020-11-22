<?php
include '../includes/koneksi.php';
$conn = new PDOConnection;

?>

<!-- page-header -->
<div class="page-header">
    <h1>
        Dashboard <small> Inventaris Barang</small>
    </h1>
</div>
<!-- page-header -->
<?php
include 'includes/alert.php';
?>
<!-- row -->
<div class="row">

    <div class="col-sm-5 infobox-container">

        <div class="infobox infobox-blue">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-truck"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">
                    <?php
                        $jml_supplier = $conn->getConn()->prepare("SELECT * FROM supplier");
                        $jml_supplier->execute();
                        echo $jml_supplier->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Supplier
                </div>
            </div>
        </div>

        <div class="infobox infobox-orange">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-exclamation"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">
                    <?php
                        $jml_ver_pinjam = $conn->getConn()->prepare("SELECT * FROM verifikasi_pinjam");
                        $jml_ver_pinjam->execute();
                        echo $jml_ver_pinjam->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Permintaan Pinjam
                </div>
            </div>
        </div>

        <div class="infobox infobox-purple">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-inbox"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">
                    <?php
                        $jml_pnjm = $conn->getConn()->prepare("SELECT * FROM pinjam_barang");
                        $jml_pnjm->execute();
                        echo $jml_pnjm->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Peminjaman
                </div>
            </div>
        </div>

        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-cubes"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">
                    <?php
                        $jml_brg_msk = $conn->getConn()->prepare("SELECT * FROM barang_masuk");
                        $jml_brg_msk->execute();
                        echo $jml_brg_msk->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Barang Masuk
                </div>
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-cubes"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">
                    <?php
                        $jml_brg_klr = $conn->getConn()->prepare("SELECT * FROM barang_keluar");
                        $jml_brg_klr->execute();
                        echo $jml_brg_klr->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Barang Keluar
                </div>
            </div>
        </div>

    </div>

</div>

<div class="row">

    <!-- verifikasi pinjam -->
    <div class="col-sm-6">
        <div class="widget-box widget-blue">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter"><i class="ace-icon fa fa-cubes orange"></i> Verifikasi Pinjam</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table id="verPinjam" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                // id_verifikasi,id_barang,nama_barang,nama_peminjam,id_peminjam,id_barang,tanggal_pinjam,email

                                $q_ver_pnjm = $conn->getConn()->prepare("SELECT verifikasi_pinjam.id_verifikasi, user.nama, barang.nama_barang, verifikasi_pinjam.jml_pinjam, verifikasi_pinjam.tgl_kembali, verifikasi_pinjam.id_peminjam, barang.id_barang, verifikasi_pinjam.tgl_pinjam, user.email FROM verifikasi_pinjam JOIN barang ON verifikasi_pinjam.id_barang = barang.id_barang JOIN user ON verifikasi_pinjam.id_peminjam = user.id_user WHERE user.level='Peminjam'");
                                
                                $q_ver_pnjm ->execute();
                                
                                $data = $q_ver_pnjm ->fetchAll();
                                
                                $no=0;
                                foreach($data as $value){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $value[1]?></td>
                                <td><?php echo $value[2]?></td>
                                <td><?php echo $value[3]?></td>
                                <td><?php echo $value[4]?></td>
                                <td>
                                    <a href="includes/actions/aksiverifikasi.php?event=Setuju&id_ver=<?php echo $value[0]."&id_pmnjm=".$value[5]."&id_brg=".$value[6]."&jml_pinjam=".$value[3]."&tgl_pinjam=".$value[7]."&tgl_kembali=".$value[4]."&email=".$value[8]."&nama=".$value[1]; ?>" class="btn btn-sm btn-success">
                                        <i class="fa fa-sm fa-check-square-o"></i>
                                    </a>
                                    <a href="includes/actions/aksiverifikasi.php?event=Tolak&id_ver=<?php echo $value[0]."&id_pmnjm=".$value[5]."&id_brg=".$value[6]."&jml_pinjam=".$value[3]."&tgl_pinjam=".$value[7]."&tgl_kembali=".$value[4]."&email=".$value[8]."&nama=".$value[1];?>" class="btn btn-sm btn-danger">
                                        <i class="ace-icon glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- verifikasi peminjam -->
    <div class="col-sm-5">
        <div class="widget-box widget-blue">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter"><i class="ace-icon fa fa-cubes orange"></i> Verifikasi Peminjam</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table id="ver_peminjam" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $q_ver_akun = $conn->getConn()->prepare("SELECT id_user,nama,email FROM user WHERE verifikasi='N' AND level='Peminjam' ");
                                
                                $q_ver_akun->execute();
                                
                                $data = $q_ver_akun->fetchAll();
                                
                                $no=0;
                                foreach($data as $value){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $value[1]?></td>
                                <td>
                                    <a href="includes/actions/aksiverifikasi_akun.php?event=Setuju&id=<?php echo $value[0]."&nama=".$value[1]."&email=".$value[2]?>" class="btn btn-sm btn-success">
                                        <i class="fa fa-sm fa-check-square-o"></i>
                                    </a>
                                    
                                    <a href="includes/actions/aksiverifikasi_akun.php?event=Tolak&id=<?php echo $value[0]?>" class="btn btn-sm btn-danger">
                                        <i class="ace-icon glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>