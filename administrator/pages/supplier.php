<!-- page-header -->
<div class="page-header">
    <h1>
        Supplier
    </h1>
</div>
<!-- page-header -->

<!-- row -->
<div class="row">
    <div class="col-xs-12">
        <?php
        
        include_once 'includes/alert.php';

        ?>
        <div class="clear-fix">
            <div class="pull-right tableTools-container">
                <div class="dt-buttons btn-overlap btn-group">
                    <a href="?page=ImportSupplierXLS" class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title title>
                        <span>
                            <i class="fa fa-database bigger-110 green"></i>
                            
                            <span>Import .xls</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <a href="index.php?page=TambahSupplier" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
        <table id="dataTables" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Telp Supplier</th>
                    <th>Kota Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include '../includes/koneksi.php';
                    $conn = new PDOConnection;
                    
                    $q = $conn->getConn()->prepare("SELECT id_supplier,nama_supplier,alamat_supplier,telp_supplier,kota_supplier FROM supplier");
                    
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
                    <td><a href="?page=EditSupplier&<?php echo "id_supplier=".$value[0]."&nama_supplier=".$value[1]."&alamat_supplier=".$value[2]."&telp_supplier=".$value[3]."&kota_supplier=".$value[4];?>" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a> <a href="includes/actions/aksihapussupplier.php?id_supplier=<?php echo $value[0];?>" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-eraser"></i></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>


</div>
<!-- row -->