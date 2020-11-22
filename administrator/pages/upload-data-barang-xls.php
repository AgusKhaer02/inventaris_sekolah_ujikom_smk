<!-- page header -->
<div class="page-header">
    <h1>
        Data Barang <small>Import XLS</small>
    </h1>
</div>

<!-- form tambah data barang -->
<div class="row">

    <div class="col-xs-12 col-sm-5">
        <div class="widget-box widget-color-blue" id="widget-box-2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-info-circle"></i> Langkah langkah import data Barang.xls</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-8">
                    <ol>
                        <li>Buka Microsoft Excel atau Libre Office.</li>
                        <li>Isi excel anda dengan format seperti pada gambar dibawah ini.</li>
                        <li>Kemudian, klik "save as" dan terserah anda mau taruh file dimana, lalu pilih file format .xls, lalu klik "save".</li>
                        <li>Kembali ke Web Inventaris Barang lagi, lalu klik "choose file".</li>
                        <li>Pilh file .xls yang barusan anda save.</li>
                        <li>Tunggu beberapa saat, dan selesai.</li>
                    </ol>     
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-5">
        <form action="includes/actions/up_data_barang_xls.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                    <input type="file" name="txt_file" id="" class="form-control" required>
                    <div class="input-group-btn">
                        <button class="btn btn-default no-longer btn-sm">
                            <i class="ace-icon fa fa-upload icon-on-right bigger-110"></i>
                        </button>
                    </div>
            </div>
        </form>
    </div>
    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-7" >
        <div class="widget-box widget-color-green" id="widget-box-2">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"><i class="fa fa-fw fa-info-circle"></i> Format pengetikan file .xls</h4>
            </div>

            <div class="widget-body" style="overflow:scroll;">
                <div class="widget-main padding-8">
                    <img src="../assets/images/contohDataBarangxls.png" alt="../assets/images/contohDataBarangxls.png">
                </div>
            </div>
        </div>
    </div>
</div>