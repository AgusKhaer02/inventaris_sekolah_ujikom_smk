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
    $nama_barang   = $data->val($i, 1);
    $spesifikasi = $data->val($i, 2);
    $lokasi   = $data->val($i, 3);
    $kondisi      = $data->val($i, 4);
    $kategori     = $data->val($i, 5);
    $jml_barang    = $data->val($i, 6);
    $sumber_dana     = $data->val($i, 7);

    $q_insert_data = $conn->getConn()->prepare("CALL ImportDataBarang('$nama_barang','$spesifikasi','$lokasi','$kondisi','$kategori','$jml_barang','$sumber_dana')");

    $q_insert_data->execute();

}

// menghapus kembali file .xls yang diupload tadi
unlink($_FILES['txt_file']['name']);

header("location:../../index.php?page=DataBarang&alert=ImportSuccess");
?>