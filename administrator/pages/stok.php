<!-- page-header -->
<div class="page-header">
    <h1>
        Stok
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>Jumlah keluar</th>
                    <th>Total Barang</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT stok.id_barang,stok.nama_barang,stok.jml_masuk,stok.jml_keluar,stok.total_barang,SUM(pinjam_barang.jml_pinjam) FROM stok LEFT JOIN pinjam_barang ON stok.id_barang = pinjam_barang.id_barang GROUP BY (stok.id_barang)");
                    
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
                    <td><?php echo $value[4];
                    if($value[5] > 0){
                        echo "<a href='?page=DetailPeminjaman&id_barang=".$value[0]."' class='badge badge-success'>  ".$value[5]." Barang dipinjam"."</a>";
                    }else{

                    }
                    ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->