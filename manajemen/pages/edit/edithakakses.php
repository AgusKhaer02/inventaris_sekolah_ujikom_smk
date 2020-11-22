<!-- page header -->
<div class="page-header">
    <h1>
        Hak Akses <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Hak Akses</small>
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
        <form class="form-horizontal" action="includes/actions/aksiedithakakses.php" role="form" method="post"id="formInput">

            <!-- id user -->
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="id_user" id="" value="<?php echo $_GET['id_user'];?>" hidden>
                </div>
            </div>

            <!-- nama user -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Nama User</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_user" id=""class="col-xs-5 col-sm-4" value="<?php echo $_GET['nama'];?>" disabled> 
                </div>
            </div>

            <!-- level -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Level</label>
                <div class="col-sm-9">
                    <select name="level" class="col-xs-5 col-sm-4">
                        <option value="<?php echo $_GET['level']?>"><b><?php echo $_GET['level']?></b></option>
                        <option value="Administrator">Administrator</option>
                        <option value="Peminjam">Peminjam</option>
                    </select>
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