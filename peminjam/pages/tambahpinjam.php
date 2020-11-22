<form class="form-horizontal" action="includes/actions/aksipinjam.php" role="form" method="post"id="formInput">

    <!-- id barang -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right"for="">Nama Barang</label>
        <div class="col-sm-9">
            <select name="id_barang" class="col-xs-5 col-sm-4" id="">
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

    <!-- tanggal pinjam -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="">Tanggal Pinjam</label>
        <div class="col-sm-9">
            <input type="date" name="tgl_pinjam" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
        </div>
    </div>

    <!-- jumlah pinjam -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Pinjam</label>
        <div class="col-sm-9">
            <input type="text" name="jml_pinjam" id=""class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
        </div>
    </div>

    <!-- tanggal kembali -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="">Tanggal Kembali</label>
        <div class="col-sm-9">
            <input type="date" name="tgl_kembali" class="col-xs-5 col-sm-4" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')" id="">
        </div>
    </div>

    <!-- tombol submit -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for=""></label>
        <div class="col-sm-9">
            <button class="btn btn-sm btn-success" type="submit" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')" id="submit"> Pinjam</button>       
        </div>
    </div>

</form>
<!-- #form -->