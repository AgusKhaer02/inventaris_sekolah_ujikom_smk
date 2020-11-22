<!-- page-header -->
<div class="page-header">
    <h1>
        Lokasi
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12 col-sm-5">
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th width="5">NO</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT lokasi FROM lokasi");
                    
                    $q->execute();
                    
                    $data = $q->fetchAll();
                    
                    $no=0;
                    foreach($data as $value){
                    $no++;
                ?>
                <tr>
                    <td width="5"><?php echo $no;?></td>
                    <td><?php echo $value[0];?></td>
                    <td><a href="?page=EditSumberDana&<?php echo "id_sumber_dana=".$value[0]?>" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a> <a href="includes/actions/aksihapuspeminjaman.php?id_pinjam=<?php echo $value[0];?>" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-eraser"></i></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->