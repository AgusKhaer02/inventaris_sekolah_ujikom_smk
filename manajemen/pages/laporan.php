<!-- page-header -->
<div class="page-header">
    <h1>
        Generate Laporan
    </h1>
</div>
<!-- page-header -->

<div class="col-xs-12 col-sm-5">
    <div class="widget-box widget-color-green" id="widget-box-2">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-print"></i> Laporan Peminjaman</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-8">


                <!-- lokasi -->
                    <form action="reports/lp_peminjaman.php" method="get">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="">ID Peminjam</label>
                            <select name="id_peminjam" id="">
                                <option value="">Pilih ID Peminjam</option>
                                <option value="">Semua Peminjam</option>
                                <?php
                                    include '../includes/koneksi.php';
                                    $conn = new PDOConnection;
                                    
                                    $q_user = $conn->getConn()->prepare("SELECT DISTINCT id_user,nama FROM user WHERE level='peminjam' ORDER BY nama ASC");
                                    $q_user->execute();
                                    $data = $q_user->fetchAll();
                                    foreach($data as $value){
                                ?>
                                <option value="<?php echo $value[0]?>"><?php echo $value[0]." = ".$value[1];?></option>
                                <?php }?>
                            </select>                        
                        </div>

                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-sm fa-print"></i> Generate</a>
                    
                    </form>


            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-5">
    <div class="widget-box widget-color-red" id="widget-box-2">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-print"></i> Laporan Data Barang</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-8">
                <form action="reports/lp_databarang.php" method="get">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Kategori</label>
                        <select name="kat" id="">
                            <option value="">Pilih Kategori</option>
                            <option value="">Semua kategori</option>
                            <?php
                                $q_kat = $conn->getConn()->prepare("SELECT DISTINCT kategori FROM barang ORDER BY kategori ASC");
                                $q_kat->execute();
                                $data = $q_kat->fetchAll();
                                foreach($data as $value){
                            ?>
                            <option value="<?php echo $value[0]?>"><?php echo $value[0];?></option>
                                <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-sm fa-print"></i> Generate</a>


                </form>            
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-5">
    <div class="widget-box widget-color-green2" id="widget-box-2">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-print"></i> Cetak Barang Masuk</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-8">
                <form action="reports/lp_barangmasuk.php" method="get">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Tahun Masuk</label>
                        <select name="thn_masuk" id="">
                            <option value="">Pilih Tahun</option>
                            <?php
                                $q_tgl_msk = $conn->getConn()->prepare("SELECT DISTINCT YEAR(tgl_masuk) FROM barang_masuk ORDER BY tgl_masuk ASC");
                                $q_tgl_msk->execute();
                                $data = $q_tgl_msk->fetchAll();
                                foreach($data as $value){
                            ?>
                            <option value="<?php echo $value[0]?>"><?php echo $value[0];?></option>
                                <?php }?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-sm fa-print"></i> Generate</button>        
                </form>



            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-5">
    <div class="widget-box widget-color-red2" id="widget-box-2">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-print"></i> Cetak Barang Keluar</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-8">
                <form action="reports/lp_barangkeluar.php" method="get">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Tahun Keluar</label>
                        <select name="thn_keluar" id="">
                            <option value="">Pilih Tahun</option>
                            <?php
                                $q_tgl_kel = $conn->getConn()->prepare("SELECT DISTINCT YEAR(tgl_keluar) FROM barang_keluar ORDER BY tgl_keluar ASC");
                                $q_tgl_kel->execute();
                                $data = $q_tgl_kel->fetchAll();
                                foreach($data as $value){
                            ?>
                            <option value="<?php echo $value[0]?>"><?php echo $value[0]?></option>
                            <?php }?>

                        </select>
                    </div>            

                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-sm fa-print"></i> Generate</button>
                </form>
            </div>
        </div>
    </div>
</div>
