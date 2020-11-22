<!-- page header -->
<div class="page-header">
    <h1>
        Supplier <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Supplier</small>
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
        <form class="form-horizontal" action="includes/actions/aksieditsupplier.php" role="form" method="post"id="formInput">

            <!-- id barang -->
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="id_supplier" id="" value="<?php echo $_GET['id_supplier'];?>" hidden>
                </div>
            </div>
        
            <!-- id barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">Nama Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_supplier" class="col-xs-5 col-sm-4" value="<?php echo $_GET['nama_supplier']?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Alamat Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_supplier" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['alamat_supplier'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Telp Supplier</label>
                <div class="col-sm-9">
                    <input type="number" name="telp_supplier" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['telp_supplier'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Kota Supplier</label>
                <div class="col-sm-9">
                    <input type="text" name="kota_supplier" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['kota_supplier'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
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