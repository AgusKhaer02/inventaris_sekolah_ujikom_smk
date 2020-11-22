<?php
require("../../includes/koneksi.php");
require("../../assets/plugins/fpdf/fpdf.php");
$conn = new PDOConnection;
if(isset($_GET['id_peminjam'])){
    $id_pmnjm = $_GET['id_peminjam'] !== "" ? $_GET['id_peminjam'] : '';

}

// CLASS
class PDF extends FPDF
{

    // Header---------------------------------
    function Header(){
        $this->image('../../assets/images/smk.png',10,10,25,30);
        $this->SetFont('Times','B',15);
        $this->Cell(0,0,"INVENTARIS BARANG",0,0,'C');
        $this->Ln();
        $this->Cell(0,14,"PEMERINTAH KOTA BANJAR",0,0,'C');
        $this->Ln();
        $this->Cell(0,0,"DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA",0,0,'C');
        $this->Ln();
        $this->Cell(0,14,"SEKOLAH MENGENGAH KEJURUAN NEGERI 3 BANJAR",0,0,'C');
        $this->Ln();
        $this->SetFont('Times','I',15);
        $this->Cell(0,0,"Jalan Julaeni Telp(0265) 2734141 Desa Langensari Kec. Langensari Kota Banjar 46341",0,0,'C');
        $this->Ln(5);
        $this->Line(10,$this->GetY(),315,$this->GetY());
        $this->Ln(10);
        $this->SetFont('Times','B',14);
        $this->Cell(0,0,'LAPORAN PEMINJAMAN',0,0,'C');
        $this->Ln(10);
    }

    function footer(){
        $this->SetFont('Times','I',14);
        $this->setY(-30);
        $this->Cell(0,0,' '.$this->PageNo(),0,0,'R');
    }
    function tandaTangan(){
        $this->Ln(10);
        $this->Cell(0,0,'Mengetahui,',0,0,'L');
        $this->Cell(0,0,'Banjar, 30 Maret 2019',0,0,'R');
        $this->Ln(5);
        $this->Cell(0,0,'Kepala SMK Negeri 3 Banjar,',0,0,'L');
        $this->Cell(0,0,'Waka Sarana Prasarana,',0,0,'R');
        $this->Ln(20);
        $this->Cell(0,0,'Drs.Maryuanda',0,0,'L');
        $this->Cell(0,0,'Juju Mulyadi, S.Pd',0,0,'R');
    }
}

$pdf = new PDF("L","mm",array(210,330));
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
// define standard font size

$fontSize = 14;

$pdf->SetFont('Times','B',12);

$pdf->Ln();
$pdf->Cell(30);
$pdf->SetFillColor(255,255,255);
$pdf->Ln();
$pdf->Cell(10,7,"NO",1,0,'C',true);
$pdf->Cell(30,7,"ID Pinjam",1,0,'C',true);
$pdf->Cell(50,7,"Nama Peminjam",1,0,'C',true);
$pdf->Cell(30,7,"Tanggal Pinjam",1,0,'C',true);
$pdf->Cell(30,7,"ID Barang",1,0,'C',true);
$pdf->Cell(70,7,"Nama Barang",1,0,'C',true);
$pdf->Cell(30,7,"Jumlah",1,0,'C',true);
$pdf->Cell(34,7,"Tanggal Kembali",1,0,'C',true);
$pdf->Cell(30,7,"Kondisi",1,0,'C',true);
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',12);
$no=0;
$batas = 10;
$q_pinjam = $conn->getConn()->prepare("SELECT id_pinjam,peminjam,tgl_pinjam,id_barang,nama_barang,jml_pinjam,tgl_kembali,kondisi FROM pinjam_barang WHERE id_peminjam LIKE '%$id_pmnjm%'");
$q_pinjam->execute();
if ($q_pinjam->rowCount()>0){
    while($r_pinjam = $q_pinjam->fetch(PDO::FETCH_ASSOC)){
        $no++;
        $arr = array(array($r_pinjam['id_pinjam'],$r_pinjam['peminjam'],$r_pinjam['tgl_pinjam'],$r_pinjam['id_barang'],$r_pinjam['nama_barang'],$r_pinjam['jml_pinjam'],$r_pinjam['tgl_kembali'],$r_pinjam['kondisi']));
        foreach($arr as $item){
            $pdf->Cell(10,7,$no,1,0,'C');
            $pdf->Cell(30,7,$item[0],1,0,'L');
            $pdf->Cell(50,7,$item[1],1,0,'L');
            $pdf->Cell(30,7,$item[2],1,0,'L');
            $pdf->Cell(30,7,$item[3],1,0,'L');
            $pdf->Cell(70,7,$item[4],1,0,'L');
            $pdf->Cell(30,7,$item[5],1,0,'L');
            $pdf->Cell(34,7,$item[6],1,0,'L');
            $pdf->Cell(30,7,$item[7],1,0,'L');
            $pdf->Ln();

            if($no == $batas){
                $pdf->AddPage();
            }
        }

    }
}else{
    $pdf->Cell(264,7,'Data Tidak Tersedia',1,0,'C');
}
$pdf->tandaTangan();
$pdf->Output();
?>