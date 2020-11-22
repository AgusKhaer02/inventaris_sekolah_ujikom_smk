<!-- page header -->
<div class="page-header">
    <h1>
        Peminjaman <small><i class="ace-icon fa fa-angle-double-right"></i> Tambah Data Peminjaman</small>
    </h1>
</div>

<!-- koneksi -->
<?php
    include '../includes/koneksi.php';
    $conn  = new PDOConnection;
?>


<!-- form tambah data peminjaman -->
<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" action="includes/actions/aksitambahpeminjaman.php" role="form" method="post"id="formInput">
        
            <!-- id pinjam -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">ID Pinjam</label>
                <div class="col-sm-9">
                    <?php
                    $q_id_pnjm = $conn->getConn()->prepare("SELECT MAX(id_pinjam) AS mxid FROM pinjam_barang");
                    $q_id_pnjm->execute();
                    while($data = $q_id_pnjm->fetch(PDO::FETCH_ASSOC)){
                        $mxid = $data['mxid'];
                    }
                    $int_value = (int) substr($mxid,4,4);

                    $int_value++;
                    $chr_value = "P-";
                    $id_pnjm = $chr_value. sprintf("%03s",$int_value);
                    ?>
                    <input type="text" class="col-xs-5 col-sm-2"name="id_pinjam" id="" value="<?php echo $id_pnjm;?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>

            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Nama Peminjam</label>
                <div class="col-sm-9">
                    <select name="id_peminjam" id="">
                        <?php
                        $q_id_brg = $conn->getConn()->prepare("SELECT DISTINCT nama,id_user FROM user WHERE level='peminjam' ORDER BY nama ASC");
                        $q_id_brg->execute();
                        $data = $q_id_brg->fetchAll();
                            foreach($data as $value){
                        ?>
                        <option value="<?php echo $value[1]?>"><?php echo $value[0]." = ".$value[1];?></option>
                            <?php }?>
                    </select>
                </div>
            </div>

            <!-- tanggal pinjam -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Tgl Pinjam</label>
                <div class="col-sm-9">
                    <input type="date" name="tgl_pinjam" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Nama Barang</label>
                <div class="col-sm-9">
                    <select name="id_barang" id="">
                        <?php
                        $q_id_brg = $conn->getConn()->prepare("SELECT DISTINCT nama_barang,id_barang FROM barang ORDER BY nama_barang ASC");
                        $q_id_brg->execute();
                        $data = $q_id_brg->fetchAll();
                            foreach($data as $value){
                        ?>
                        <option value="<?php echo $value[1]?>"><?php echo $value[0]." = ".$value[1];?></option>
                            <?php }?>
                    </select>
                </div>
            </div>

            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Pinjam</label>
                <div class="col-sm-9">
                    <input type="number" name="jml_pinjam" id="" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">           
                </div>
            </div>

            <!-- tanggal kembali -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Tgl Kembali</label>
                <div class="col-sm-9">
                    <input type="date" name="tgl_kembali" id="" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- kondisi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Kondisi</label>
                <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input type="radio" name="kondisi" value="Baik" class="ace">
                                <span class="lbl">Baik</span>
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="kondisi" value="Kurang Baik" class="ace">
                                <span class="lbl">Kurang Baik</span>
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="kondisi" value="Rusak Berat" class="ace">
                                <span class="lbl">Rusak Berat</span>
                            </label>
                        </div>
                </div>
            </div>
            
            <!-- tombol submit -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""></label>
                <div class="col-sm-9">
                    <button class="btn btn-success" type="submit" id="submit"><i class="fa fa-fw fa-plus"></i> Tambah</button>       
                </div>
            </div>

        </form>
        <!-- #form -->
    </div>
</div>