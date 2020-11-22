<!-- page-header -->
<div class="page-header">
    <h1>
        Peminjaman
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <?php
        include_once 'includes/alert.php';
        ?>
            <a href="index.php?page=TambahPeminjaman" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>

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
                        <th>Aksi</th>
                        <th>Kembali</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include '../includes/koneksi.php';
                        $conn = new PDOConnection;
                        
                        $q = $conn->getConn()->prepare("SELECT id_pinjam,id_peminjam,peminjam,tgl_pinjam,id_barang,nama_barang,jml_pinjam,tgl_kembali,kondisi,kembali FROM pinjam_barang");
                        
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
                        <td><a href="?page=EditPeminjaman&<?php echo "id_pinjam=".$value[0]."&id_peminjam=".$value[1]."&peminjam=".$value[2]."&tgl_pinjam=".$value[3]."&id_barang=".$value[4]."&nama_barang=".$value[5]."&jml_pinjam=".$value[6]."&tgl_kembali=".$value[7]."&kondisi=".$value[8];?>" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a> <a href="includes/actions/aksihapuspeminjaman.php?id_pinjam=<?php echo $value[0];?>" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-eraser"></i></a></td>
                        <td>
                        <?php
                        if($value[9] == "N"){
                            echo "<a class='badge badge-success' href='includes/actions/aksikembali.php?id_pinjam=$value[0]&id_barang=$value[4]'>Kembali</a>";
                        }elseif($value[9] == "Y"){
                            echo "<a class='badge' href='#'>Sudah Kembali</a>";
                        }
                        
                        ?>
                        
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
    </div>
</div>
<!-- row -->

