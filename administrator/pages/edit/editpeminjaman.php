<!-- page header -->
<div class="page-header">
    <h1>
        Peminjaman <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Peminjaman</small>
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
        <form class="form-horizontal" action="includes/actions/aksieditpeminjaman.php" role="form" method="post"id="formInput">

            <!-- id pinjam -->
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="id_pinjam" id="" value="<?php echo $_GET['id_pinjam'];?>" hidden>
                </div>
            </div>

            <!-- id pinjam -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"for="">Nama Peminjam</label>
                <div class="col-sm-9">
                    
                    <select name="id_peminjam" value="<?php echo $_GET['id_peminjam'];?>" class="col-xs-5 col-sm-4"><option value="<?php echo $_GET['id_peminjam']?>"><?php echo $_GET['id_peminjam']?></option>
                    <?php
                            $q_user = $conn->getConn()->prepare("SELECT DISTINCT id_user,nama FROM user WHERE level='peminjam' ORDER BY nama ASC");
                            $q_user->execute();
                            $data = $q_user->fetchAll();
                            foreach($data as $value){
                        ?>

                        <option value="<?php echo $value[0];?>"><?php echo $value[0]." = ".$value[1];?></option>
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
                    <input type="date" name="tgl_pinjam" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['tgl_pinjam'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')"> 
                </div>
            </div>

            <!-- jumlah barang -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Jumlah Pinjam</label>
                <div class="col-sm-9">
                    <input type="text" name="jml_barang" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['jml_pinjam'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
                </div>
            </div>

            <!-- tanggal kembali -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Tanggal Kembali</label>
                <div class="col-sm-9">
                    <input type="date" name="tgl_kembali" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['tgl_kembali'];?>" required oninvalid="this.setCustomValidity('Textbox ini tidak boleh kosong')" oninput="setCustomValidity('')">  
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
                    <button class="btn btn-warning" type="submit" id="submit"><i class="fa fa-fw fa-edit"></i> Edit</button>       
                </div>
            </div>

        </form>
        <!-- #form -->
    </div>
</div>