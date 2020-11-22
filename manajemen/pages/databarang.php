<!-- page-header -->
<div class="page-header">
    <h1>
        Data Barang
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <?php
        
        include_once 'includes/alert.php';

        ?>
        <a href="index.php?page=TambahDataBarang" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Spesifikasi </th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Kategori</th>
                    <th>Jumlah Barang</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok</th>
                    <th>Sumber Dana</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT barang.id_barang,barang.nama_barang,barang.spesifikasi,barang.lokasi,barang.kondisi,barang.kategori,barang.jumlah_barang,stok.jml_masuk,stok.jml_keluar,stok.total_barang,barang.sumber_dana FROM barang LEFT JOIN stok ON stok.id_barang = barang.id_barang GROUP BY (barang.id_barang)");
                    
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
                        <td><?php echo $value[7];?></td>
                        <td><?php echo $value[8];?></td>
                        <td><?php echo $value[9];?></td>
                        <td><?php echo $value[10];?></td>
                        <td><a href="?page=EditDataBarang&<?php echo "id=".$value[0]."&namabarang=".$value[1]."&spesifikasi=".$value[2]."&lokasi=".$value[3]."&kondisi=".$value[4]."&jmlbarang=".$value[5]."&sumberdana=".$value[10];?>" class="btn btn-sm btn-warning">Edit</a> <a onclick="return confirm('Anda ingin menghapus data barang ini? semua transaksi anda akan hilang jika anda menghapusnya')" href="includes/actions/aksihapusdatabarang.php?id_barang=<?php echo $value[0]?>"id="hapus" class="btn btn-sm btn-danger">Hapus</a></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>


        <a href="?page=Stok">Lihat stok barang</a>
    </div>
</div>
<!-- row -->