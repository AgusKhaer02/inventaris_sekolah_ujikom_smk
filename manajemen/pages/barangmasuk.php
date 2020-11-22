<!-- page-header -->
<div class="page-header">
    <h1>
        Barang Masuk
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <?php
        
        include_once 'includes/alert.php';

        ?>
        <a href="index.php?page=TambahBarangMasuk" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Barang Masuk</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk </th>
                    <th>Jumlah Masuk</th>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT barang_masuk.id_masuk_barang,barang_masuk.id_barang,barang_masuk.nama_barang,barang_masuk.tgl_masuk,barang_masuk.jml_masuk,barang_masuk.id_supplier,supplier.nama_supplier FROM barang_masuk LEFT JOIN supplier ON barang_masuk.id_supplier = supplier.id_supplier");
                    
                    $q->execute();
                    
                    $data = $q->fetchAll();
                    
                    $no=0;
                    foreach($data as $value){
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value[0];?></td>
                    <td><?php echo $value[1];?></td>
                    <td><?php echo $value[2];?></td>
                    <td><?php echo $value[3];?></td>
                    <td><?php echo $value[4];?></td>
                    <td><?php echo $value[5];?></td>
                    <td><?php echo $value[6];?></td>
                    <td><a href="?page=EditBarangMasuk<?php echo "&id_brg_masuk=".$value[0]."&id_barang=".$value[1]."&nama_barang=".$value[2]."&tgl_masuk=".$value[3]."&jml_masuk=".$value[4]."&id_supplier=".$value[5];?>" class="btn btn-sm btn-warning">Edit</a> <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="includes/actions/aksihapusbarangmasuk.php?id_barang=<?php echo $value[0];?>" class="btn btn-sm btn-danger">Hapus</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->