<!-- page header -->
<div class="page-header">
    <h1>
        Barang Masuk <small><i class="ace-icon fa fa-angle-double-right"></i> Tambah Barang Masuk</small>
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
        <form class="form-horizontal" action="includes/actions/aksitambahbarangmasuk.php" role="form" method="post"id="formInput">

            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">ID Barang Masuk</label>
                <div class="col-sm-9">
                    <?php
                    $q_id_brg_msk = $conn->getConn()->prepare("SELECT MAX(id_masuk_barang) AS mxid FROM barang_masuk");
                    $q_id_brg_msk->execute();
                    while($data = $q_id_brg_msk->fetch(PDO::FETCH_ASSOC)){
                        $mxid = $data['mxid'];
                    }
                    $int_value = (int) substr($mxid,4,4);
                    // echo $int_value;
                    $int_value++;
                    $chr_value = "MK-";
                    $id_brg_msk = $chr_value. sprintf("%03s",$int_value);
                    ?>
                    <input type="text" class="col-xs-5 col-sm-2"name="id_brg_masuk" id="" value="<?php echo $id_brg_msk;?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">
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
                <label class="col-sm-3 control-label no-padding-right" for="">Tanggal Masuk</label>
                <div class="col-sm-9">
                    <input type="date" name="tgl_masuk" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Masuk</label>
                <div class="col-sm-9">
                    <input type="text" name="jml_masuk" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- lokasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">ID Supplier</label>
                <div class="col-sm-9">
                    <select name="id_supplier" id="">
                        <?php
                            $q_id_sp = $conn->getConn()->prepare("SELECT DISTINCT id_supplier,nama_supplier FROM supplier ORDER BY nama_supplier ASC");
                            $q_id_sp->execute();
                            $data = $q_id_sp->fetchAll();
                            foreach($data as $value){
                        ?>
                        <option value="<?php echo $value[0];?>"><?php echo $value[1]." = ".$value[0];?></option>
                         <?php } ?>
                    </select>
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