<!-- page-header -->
<div class="page-header">
    <h1>
        Barang Keluar
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <?php
        
        include_once 'includes/alert.php';

        ?>
        <a href="index.php?page=TambahBarangKeluar" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Keluar Barang</th>
                    <th>ID Barang</th>
                    <th>Nama barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Lokasi</th>
                    <th>Penerima</th>
                    <th>Tanggal Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT id_keluar_barang,id_barang,nama_barang,jml_keluar,lokasi,penerima,tgl_keluar FROM barang_keluar");
                    
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
                    <td><a href="?page=EditBarangKeluar&<?php echo "id_brg_keluar=".$value[0]."&id_brg=".$value[1]."&nama_barang=".$value[2]."&jml_keluar=".$value[3]."&lokasi=".$value[4]."&penerima=".$value[5]."&tgl_keluar=".$value[6];?>" class="btn btn-sm btn-warning">Edit</a> <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="includes/actions/aksihapusbarangkeluar.php?id_keluar_barang=<?php echo $value[0]?>" class="btn btn-sm btn-danger">Hapus</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->