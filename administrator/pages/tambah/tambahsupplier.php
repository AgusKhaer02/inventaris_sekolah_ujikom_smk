<!-- page header -->
<div class="page-header">
    <h1>
        Supplier <small><i class="ace-icon fa fa-angle-double-right"></i> Tambah Supplier</small>
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
        <form class="form-horizontal" action="includes/actions/aksitambahsupplier.php" role="form" method="post"id="formInput">

            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">ID Supplier</label>
                <div class="col-sm-9">
                    <?php
                        $q_id_sp = $conn->getConn()->prepare("SELECT MAX(id_supplier) AS mxid FROM supplier");
                        $q_id_sp->execute();
                        while($data = $q_id_sp->fetch(PDO::FETCH_ASSOC)){
                            $mxid = $data['mxid'];
                        }
                        $int_value = (int) substr($mxid,4,4);
                        // echo $int_value;
                        $int_value++;
                        $chr_value = "SP-";
                        $id_supplier = $chr_value. sprintf("%03s",$int_value);
                    ?>
                    <input type="text" class="col-xs-5 col-sm-2"name="id_supplier" id="" value="<?php echo $id_supplier;?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>
        
            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">Nama Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_supplier" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Alamat Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_supplier" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Telp Supplier</label>
                <div class="col-sm-9">
                    <input type="number" name="telp_supplier" id=""class="col-xs-5 col-sm-3" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Kota Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="kota_supplier" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
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