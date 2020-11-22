<!-- page header -->
<div class="page-header">
    <h1>
        Data Barang <small><i class="ace-icon fa fa-angle-double-right"></i> Tambah Data Barang</small>
    </h1>
</div>

<!-- koneksi -->
<?php
    include '../includes/koneksi.php';
    $conn  = new PDOConnection;
?>


<!-- form tambah data barang -->
<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" action="includes/actions/aksitambahdatabarang.php" role="form" method="post"id="formInput">
        
            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">ID Barang</label>
                <div class="col-sm-9">
                    <?php
                        $q_id_brg = $conn->getConn()->prepare("SELECT MAX(id_barang) AS mxid FROM barang");
                        $q_id_brg->execute();
                        while($data = $q_id_brg->fetch(PDO::FETCH_ASSOC)){
                            $mxid = $data['mxid'];
                        }
                        $int_value = (int) substr($mxid,4,4);
                        // echo $int_value;
                        $int_value++;
                        $chr_value = "BRG-";
                        $id_brg = $chr_value. sprintf("%03s",$int_value);
                        ?>
                    <input type="text" class="col-xs-5 col-sm-2"name="id_barang" id="" value="<?php echo $id_brg;?>">
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Nama Barang</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_barang" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Spesifikasi</label>
                <div class="col-sm-9">
                    <input type="text" name="spesifikasi" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- lokasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" name="lokasi" id="" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
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

            <!-- kategori -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Kategori</label>
                <div class="col-sm-9">
                    <select name="kategori" id="" class="col-xs-5 col-sm-4">
                        <option value="Alat Belajar">Alat Belajar</option>
                        <option value="Alat Kebersihan">Alat Kebersihan</option>
                        <option value="Alat Informasi">Alat Informasi</option>
                        <option value="Perlengkapan Pramuka">Perlengkapan Pramuka</option>
                        <option value="Perlengkapan Lab Komputer">Perlengkapan Lab Komputer</option>
                    </select>                     
                </div>
            </div>

            
            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Barang</label>
                <div class="col-sm-9">
                    <input type="number" name="jml_barang" id="" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Sumber Dana</label>
                <div class="col-sm-9">
                    <input type="text" name="sumber_dana" id="" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
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