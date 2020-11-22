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
                    Jumlah Supplier
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
                    Jumlah Peminjaman
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
                        $jml_pnjm = $conn->getConn()->prepare("SELECT * FROM barang_masuk");
                        $jml_pnjm->execute();
                        echo $jml_pnjm->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Jumlah Barang Masuk
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
                        $jml_pnjm = $conn->getConn()->prepare("SELECT * FROM barang_keluar");
                        $jml_pnjm->execute();
                        echo $jml_pnjm->rowCount();
                    ?>
                </span>
                <div class="infobox-content">
                    Jumlah Barang Keluar
                </div>
            </div>
        </div>
        <div class="space-6"></div>
        <div class="infobox infobox-green infobox-small infobox-dark">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-cubes"></i>
            </div>

            <div class="infobox-data">
                <div class="infobox-content">Peminjam</div>
                <div class="infobox-content">
                    <?php
                        $jml_pemnjm = $conn->getConn()->prepare("SELECT * FROM user WHERE level='Peminjam'");
                        $jml_pemnjm->execute();
                        echo $jml_pemnjm->rowCount();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>