<?php
    include 'db/db_config.php';
    extract($_POST);
    session_start();
    // error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php');
    }
    ob_start(); 
  
    require_once('tcpdf/tcpdf.php');

    class MYPDF extends TCPDF {

        public function Header() {
            if ($this->page == 1) {
            // Logo
            $image_file = K_PATH_IMAGES.'tcpdf_logo.jpg';
            $this->Image($image_file, 17, 4, 25, 25, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $html = '<strong><font size="18">TK ISLAM BHAKTI MULYA UTAMA</font></strong><br/><br/>
            Jl. Sukarela, RT.002/RW.005, Paninggilan, Kec. Ciledug, Kota Tangerang
            <br/>
            ';
            $this->writeHTMLCell(
                $w=0,
                $h=0,
                $x=45,
                $y=7,
                $html,
                $border=0,
                $ln=0,
                $fill=false,
                $reseth=true,
                $align='L'
            );

                $html = '
                <hr>
                <br>
                <table>
                <tr>
                <td align="center" style="font-size: 15px;">Laporan Data Penilaian</td>
                </tr>
                </table>
                <table>
                <tr>
                <td></td>
                </tr>
                </table>
            ';
            $this->writeHTMLCell(
                $w=0,
                $h=0,
                $x=15,
                $y=33,
                $html,
                $border=0,
                $ln=0,
                $fill=false,
                $reseth=true,
                $align=''
            );
        }
        }
    
        public function lastPage($resetmargins=false) {
            $this->setPage($this->getNumPages(), $resetmargins);
            $this->isLastPage = true;
        }
        
        // Page footer
        public function Footer() {

        //    if($this->isLastPage) { 
        //     $tgl = date("d F Y");
        //     // $this->SetY(-55);
        //     $html = '<font size="10">Jakarta, '.$tgl.' <br/><br/> <br/><br/>
        //     '.$_SESSION['nama'].'<font>
        //     <br/>';
        //     $this->writeHTMLCell(
        //         $w=0,
        //         $h=0,
        //         $x=0,
        //         $y=-40,
        //         $html,
        //         $border=0,
        //         $ln=0,
        //         $fill=false,
        //         $reseth=true,
        //         $align='R'
        //     ); 

        //     }
            // Position at 15 mm from bottom
            $this->SetY(-15);

            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// data header
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
 

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetFont('times','',10);
// add a page
$pdf->AddPage();
$date1=date_create($startdate);
$date2=date_create($enddate);
$htmlTable =
'
<p>Periode '.date_format($date1,"d-m-Y").' - '.date_format($date2,"d-m-Y").' </p></p>
<table border="1" cellpadding="4" >
<thead>
        <tr>
            <th>Nama</th>
            <th>Kriteria</th>
            <th>Sub Kriteria</th>
            <th>Nilai Target</th>
            <th>Nilai Karyawan</th>
            <th>Nilai GAP</th>
            <th>Nilai Bobot</th>
            <th>Tanggal Penilaian</th>
        </tr>
    </thead>
    <tbody>';
    $no=1; 
    foreach($db->select('*','hitung')->where('tanggal_lap BETWEEN '."'"."$startdate"."'".' AND '."'"."$enddate"."'".'')->get() as $data):
        $tanggalLaporan=date_create($data['tanggal_lap']);
        $htmlTable .='<tr>
        <td>'.$data['nama'].'</td>
        <td>'.$data['kriteria'].'</td>
        <td>'.$data['id_subkriteria'].'</td>
        <td>3</td>
        <td>'.$data['nilai_gap'].'</td>
        <td>'.$data['nilai_gap'].'</td>
        <td>'.$data['nilai_bobot'].'</td>
        <td>'.date_format($tanggalLaporan,"d-m-Y").'</td>
    </tr>';
    $no++; endforeach;
    $htmlTable .= '</tbody>
    </table>';

$pdf->writeHTML($htmlTable, true, false, true, false, '');
// $pdf->writeHTML($htmlTable, true, 0, true, 0);
// ---------------------------------------------------------
// ob_end_clean();
//Close and output PDF document
$pdf->Output('Lap_Nilai.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
