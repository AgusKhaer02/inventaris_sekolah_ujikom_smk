<?php
    if(isset($_GET['id_barang'])){
        $id = $_GET['id_barang'];
?>
<!-- page-header -->
<div class="page-header">
    <h1>
        Detail Peminjaman
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">

            <table id="dataTables" class="table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Pinjam</th>
                        <th>ID Peminjam</th>
                        <th>Nama Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include '../includes/koneksi.php';
                        $conn = new PDOConnection;
                        
                        $q = $conn->getConn()->prepare("SELECT id_pinjam,id_peminjam,peminjam,tgl_pinjam,id_barang,nama_barang,jml_pinjam,tgl_kembali,kondisi FROM pinjam_barang WHERE id_barang='$id'");
                        
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
                        <td><a href="?page=DetailUser&id_pem=<?php echo $value[1];?>"><?php echo $value[2];?></a></td>
                        <td><?php echo $value[3];?></td>
                        <td><?php echo $value[4];?></td>
                        <td><?php echo $value[5];?></td>
                        <td><?php echo $value[6];?></td>
                        <td><?php echo $value[7];?></td>
                        <td><?php echo $value[8];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
    </div>
</div>
<!-- row -->

<?php
}else{
    header("location:?page=Stok");
}
?>