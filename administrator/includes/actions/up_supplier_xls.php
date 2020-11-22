<?php
include '../../../includes/koneksi.php';
include '../../../assets/plugins/excelReader/excel_reader2.php';

$conn = new PDOConnection;

// upload file .xls
$target = basename($_FILES['txt_file']['name']);
move_uploaded_file($_FILES['txt_file']['tmp_name'], $target);

// memberi hak akses agar file dapat dibaca
chmod($_FILES['txt_file']['name'],0777);

// mengambil isi file .xls
$data = new Spreadsheet_Excel_Reader($_FILES['txt_file']['name'], false);

// menghitung jumlah baris yang ada pada file
$jumlah_baris = $data->rowCount($sheet_index=0);

for($i=2;$i<=$jumlah_baris;$i++){

    // mengambil data dan memasukan ke dalam variabel sesuai dengan nama kolom masing-masing
    $nama_supplier = $data->val($i, 1);
    $alamat_supplier = $data->val($i, 2);
    $telp_supplier   = $data->val($i, 3);
    $kota_supplier      = $data->val($i, 4);

    $q_insert_data = $conn->getConn()->prepare("CALL ImportSupplier('$nama_supplier','$alamat_supplier','$telp_supplier','$kota_supplier')");

    $q_insert_data->execute();

}

// menghapus kembali file .xls yang diupload tadi
if(file_exists($_FILES['txt_file']['name'])){
    unlink($_FILES['txt_file']['name']);
}else{

}


header("location:../../index.php?page=Supplier&alert=ImportSuccess");
?>