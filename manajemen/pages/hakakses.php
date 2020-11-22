<!-- page-header -->
<div class="page-header">
    <h1>
        Hak Akses
    </h1>
</div>
<!-- page-header -->


<?php
if(isset($_GET['alert'])){
        switch($_GET['alert']){
            case'EditSuccess':
?>
            <div class="alert alert-warning">

                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <strong>
                    <i class="ace-icon glyphicon glyphicon-edit"></i> Success! 
                </strong>
                Data berhasil diubah

            </div>
<?php
            break;
            
            default:
            break;
        }
}else{
    // no code
}
?>


<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <a href="index.php?page=TambahPembayaran" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include '../includes/koneksi.php';
                $conn = new PDOConnection;
                $q_level = $conn->getConn()->prepare("SELECT id_user,nama,level FROM user WHERE level='Administrator' OR level='Peminjam'");
                $q_level->execute();
                $no = 0;
                foreach($data = $q_level->fetchAll() as $value){
                $no++;
                ?>
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $value[0]?></td>
                        <td><?php echo $value[1]?></td>
                        <td><?php echo $value[2]?></td>
                        <td><a href="?page=EditHakAkses&id_user=<?php echo $value[0]."&nama=".$value[1]."&level=".$value[2];?>" class="btn btn-sm btn-warning">Edit</a></td>
                    </tr>

                <?php }?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->