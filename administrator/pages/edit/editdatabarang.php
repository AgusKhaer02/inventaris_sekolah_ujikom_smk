<!-- page header -->
<div class="page-header">
    <h1>
        Data Barang <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Data Barang</small>
    </h1>
</div>

<!-- form tambah data barang -->
<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" action="includes/actions/aksieditdatabarang.php" role="form" method="post"id="formInput">

            <input type="text" name="id_barang" value="<?php echo $_GET['id'];?>" hidden>
            <!-- nama barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Nama Barang</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_barang" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['namabarang'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- spesifikasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Spesifikasi</label>
                <div class="col-sm-9">
                    <input type="text" name="spesifikasi" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['spesifikasi'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- lokasi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" name="lokasi" id="" class="col-xs-5 col-sm-4" value="<?php echo $_GET['lokasi'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- kondisi -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Kondisi</label>
                <div class="col-sm-9">
                    <select name="kondisi" id="" class="col-xs-5 col-sm-2">
                        <option value="Baik">Baik</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rusak">Rusak</option>
                    </select>                     
                </div>
            </div>

            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Barang</label>
                <div class="col-sm-9">
                    <input type="number" name="jml_barang" id="" class="col-xs-5 col-sm-4" value="<?php echo $_GET['jmlbarang']; ?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Sumber Dana</label>
                <div class="col-sm-9">
                    <input type="text" name="sumber_dana" id="" class="col-xs-5 col-sm-4" value="<?php echo $_GET['sumberdana'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
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