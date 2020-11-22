<!-- page header -->
<div class="page-header">
    <h1>
        Barang keluar <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Barang Keluar</small>
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
        <form class="form-horizontal" action="includes/actions/aksieditbarangkeluar.php" role="form" method="post"id="formInput">

            <!-- id barang -->
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="id_brg_keluar" id="" value="<?php echo $_GET['id_brg_keluar'];?>" hidden>
                </div>
            </div>
        
            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">Nama Barang</label>
                <div class="col-sm-9">
                    <select name="id_barang" class="col-xs-5 col-sm-2" id="">
                        <?php
                            $q_id_brg = $conn->getConn()->prepare("SELECT DISTINCT id_barang,nama_barang FROM barang ORDER BY nama_barang ASC");
                            $q_id_brg->execute();
                            $data = $q_id_brg->fetchAll();
                            foreach($data as $value){
                        ?>
                        <option value="<?php echo $value[0];?>"><?php echo $value[1]." = ".$value[0];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Tanggal keluar</label>
                <div class="col-sm-9">
                    <input type="date" name="tgl_keluar" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['tgl_keluar'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah keluar</label>
                <div class="col-sm-9">
                    <input type="text" name="jml_keluar" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['jml_keluar'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" name="lokasi" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['lokasi'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Penerima</label>
                <div class="col-sm-9">
                    <input type="text" name="penerima" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['penerima'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- tombol submit -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""></label>
                <div class="col-sm-9">
                    <button class="btn btn-warning" type="submit" id="submit"><i class="fa fa-fw fa-edit"></i> Edit</button>       
                </div>
            </div>

        </form>
        <!-- #form -->
    </div>
</div>