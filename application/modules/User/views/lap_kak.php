<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); // just ake sure they cant access this file directiy


global $header_content, $alamat_content, $footer_content;

class MYPDF extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header()
    {
        if ($this->page == 1) {
            // Logo
            global $header_content, $alamat_content;
            $image_file = K_PATH_IMAGES . 'logo_pyk_bnw.png';
            $this->Image($image_file, 94, 20, 20, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->Ln(1);
            $this->SetFont('helvetica', 'B', 16);
            $this->Cell(0, 90, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(30);
            $this->Cell(182, 20, 'PEMERINTAH DAERAH KOTA PAYAKUMBUH', 0, false, 'C', 0, '', 0, false, 'M', 'M');

            if(strlen($header_content)>54)
            {
                $this->Ln(6);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 0, substr($header_content,0,48), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                $this->Ln(5);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 0, substr($header_content,48), 0, false, 'C', 0, '', 0, false, 'M', 'M');
            }else{
                $this->Ln(6);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 0, $header_content, 0, false, 'C', 0, '', 0, false, 'M', 'M');
            }

            // $this->Ln(5);
            // $this->SetFont('helvetica', 'B', 9);
            // $this->Cell(0, 10, $alamat_content, 0, false, 'C', 0, '', 0, false, 'M', 'M');

            $this->Ln(3);
            $this->SetFont('helvetica', 'B', 8);
            $this->MultiCell(0, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
            $this->MultiCell(130, 10, $alamat_content, 0, 'C', 0, 0, '', '', true, 0, true, true, 10, 'M');
            // $this->SetFont('helvetica', 'B', 8);
            // $this->Cell(0, 10, 'Telp/Fax :                                Email: diskominfopyk@gmail.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(5);
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(0, 1, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            // $this->MultiCell(120, 10, $alamat_content, 0, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
        } else {

        }
    }

    // Page footer
    public function Footer()
    {
        global $footer_content;
        // Position at 15 mm from bottom
        $this->SetY(-30);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, $footer_content, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$this->mytcpdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$this->mytcpdf->SetCreator(PDF_CREATOR);
$this->mytcpdf->SetAuthor('Dinas Kominfo Kota Payakumbuh');
$this->mytcpdf->SetTitle('KAK');
$this->mytcpdf->SetSubject('');
$this->mytcpdf->SetKeywords('TCPDF, PDF, example, test, guide');
$idtab = $idtab;
// set default header data

$footer_content = base_url('User/lapkak/') . $idtab;

$this->mytcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


// set header and footer fonts
$this->mytcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$this->mytcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$this->mytcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$this->mytcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$this->mytcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$this->mytcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$this->mytcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $this->mytcpdf->SetAutoPageBreak(true, 0);

// set image scale factor
$this->mytcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$this->mytcpdf->SetFont('times', '', 12);


$this->mytcpdf->AddPage('P', 'F4');


$tbl = <<<EOD
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>            
EOD;
$this->mytcpdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
                <!-- /.box-header -->
                <div class="box-body">
                    <table >
                        <tr>
                            <th colspan="7" style="text-align: center;width:98%">
                                <b>KERANGKA ACUAN KERJA (K A K)</b>
                            </th>
                            
                        </tr>
                        <br>
                        <tr>
                            <th colspan="7" style="text-align: center;width:98%">
                                <b>SATUAN KERJA PERANGKAT DAERAH</b>
                            </th>
                            
                        </tr>
                    </table>
EOD;

$this->mytcpdf->writeHTML($tbl, true, false, false, false, '');

$this->mytcpdf->SetFont('times', '', 11.5);

// print a block of text using Write()

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

$barcode_content = base_url('User/lapkak/'). $idtab;
$this->mytcpdf->SetFont('times', '', 12);

$tbl = <<<EOD
                <div class="box-body" >
                    <table border="0" style="width:100%">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                        <tr>
                            <td width="20%" align="left">SKPD</td>
                            <td width="10%" align="right"></td>
                            <td width="5%" align="left">:</td>
                            <td width="65%" align="left">$nmopd </td>
                        </tr>
                        <br>

                        <tr>
                            <td width="20%" align="left">NAMA PPK</td>
                            <td width="10%" align="right"></td>
                            <td width="5%" align="left">:</td>
                            <td width="65%" align="left">$nama->nama</td>
                        </tr>
                        <br>    
                        
                        <tr>
                            <td width="20%" align="left">PROGRAM</td>
                            <td width="10%" align="right"></td>
                            <td width="5%" align="left">:</td>
                            <td width="65%" align="left">$list->program</td>
                        </tr>
                        <br>    
                        
                        <tr>
                            <td width="20%" align="left">KEGIATAN</td>
                            <td width="10%" align="right"></td>
                            <td width="5%" align="left">:</td>
                            <td width="65%" align="left">$list->kegiatan</td>
                        </tr>
                        <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                
                            <tr>
                            <th colspan="7" style="text-align: center;width:98%">
                                <b>TAHUN ANGGARAN $tahun</b>
                            </th>
                            
                        </tr>
                    
                        
                        
                    </table>
                    </div>
EOD;


$this->mytcpdf->writeHTML($tbl, true, false, false, false, '');


$this->mytcpdf->AddPage('P', 'F4');

$this->mytcpdf->SetFont('times', '', 12);


$tbl = <<<EOD
   <div class="box-body" >
                    <table border="0" style="width:100%">
                        <tr>
                            <th colspan="3" style="text-align: center;width:98%">
                                <b>KERANGKA ACUAN KERJA ( KAK )</b>
                            </th>
                        </tr>
                        <br>
                        <br>
                        <tr style="padding-bottom:10px;">
                            <td width="5%" align="center">I.</td>
                            <td width="35%" align="left"><b>PENDAHULUAN</b></td>
                        </tr>
                        <br>
                        <tr style="padding-bottom:45px;">
                            <td width="8%" align="right">A.</td>
                             <td width="1%" align="center"></td>
                            <td width="30%" align="left"><b>LATAR BELAKANG</b></td>
                             <td width="62%" align="justify">$list->i_a_ltrblk</td>
                        </tr>
                        <br>
                        <tr style="padding-bottom:45px;">
                            <td width="8%" align="right">B.</td>
                             <td width="1%" align="center"></td>
                            <td width="62%" align="left"><b>Tujuan dan Sasaran</b></td>
                        </tr>
                        <br>
                        <tr style="padding-bottom:50px;">
                            <td width="12%" align="right">1.</td>
                            <td width="27%" align="left"><b>Tujuan </b></td>
                            <td width="62%" align="justify">$list->i_b_1_tujuan</td>
                        </tr>
                        <tr style="padding-bottom:50px;">
                            <td width="12%" align="right">2.</td>
                            <td width="27%" align="left"><b>Sasaran</b></td>
                            <td width="62%" align="justify">$list->i_b_2_sasaran</td>
                        </tr>
                        <br>
                        <tr style="padding-bottom:45px;">
                            <td width="8%" align="right">C.</td>
                             <td width="1%" align="center"></td>
                            <td width="62%" align="left"><b>Indikator Kinerja</b></td>
                        </tr>
                        <br>
                         <tr style="padding-bottom:50px;">
                            <td width="12%" align="right">1.</td>
                            <td width="27%" align="left"><b>Input / Masukan </b></td>
                            <td width="62%" align="justify">$list->c_1_input</td>
                        </tr>
                        <tr style="padding-bottom:50px;">
                            <td width="12%" align="right">2.</td>
                            <td width="27%" align="left"><b>Output / Keluaran</b></td>
                            <td width="62%" align="justify">$list->c_2_output</td>
                        </tr>
                        <tr style="padding-bottom:50px;">
                            <td width="12%" align="right">3.</td>
                            <td width="27%" align="left"><b>Outcomes / Hasil</b></td>
                            <td width="62%" align="justify">$list->c_3_outcome</td>
                        </tr>
                        <br>
                    <tr style="padding-bottom:10px;">
                            <td width="5%" align="center">II.</td>
                            <td width="34%" align="left"><b>PROSES PELAKSANAAN KEGIATAN</b></td>
                            <td width="62%" align="justify">$list->iii_proses_pelaksana</td>
                        </tr>
                        <br>
                    <tr style="padding-bottom:10px;">
                            <td width="5%" align="center">III.</td>
                            <td width="34%" align="left"><b>PENUTUP</b></td>
                             <td width="62%" align="justify">$list->iii_penutup</td>
                        </tr>
                        <br>
                        

                    </table>
                    </div>
                    
EOD;

$this->mytcpdf->writeHTML($tbl, true, false, false, false, '');

$this->mytcpdf->SetXY(250, 150);
$tgl = bulanm(date('Y-m-d'));

$tbl = <<<EOF
                <div class="box-body" >
                    <table style="width:100%">
                    <br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <br><br><br>
                    
                        <tr>
                            <td width="6%" align="center"></td>
                            <td width="47%" align="left"></td>
                            <td width="23%" align="left"><b align="right">Payakumbuh,</b></td>
                            <td width="2%" align="left"></td>
                            <td width="22%" align="left"><b>$tgl $tahun</b></td>
                        </tr>

                        <tr>
                            <td width="6%" align="center"></td>
                            <td width="47%" align="left"></td>
                            <td width="47%" align="left"><br><b align="center"></b><br><b align="center">KEPALA $nmopd </b><br><br><br><br><br><br><!--<br><br><br><br>--><u align="center"><b>$ttd->nama</b></u><br><b align="center">NIP.$ttd->nip</b></td>
                        </tr>
                    </table>
                    </div>
EOF;




$this->mytcpdf->writeHTML($tbl, true, false, false, false, '');

$this->mytcpdf->SetXY(24, 250);
$this->mytcpdf->SetFont('times', 'I', 7);
$html = <<<EOF
                    <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokumen ini dinyatakan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sah secara administrasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;negara,silakan lakukan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;verifikasi dengan melakukan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;scan QR Code
                    
EOF;
$this->mytcpdf->writeHTML($html, true, false, true, false, '');
// QRCODE,Q : QR-CODE Better error correction
$this->mytcpdf->write2DBarcode($barcode_content, 'QRCODE,Q', 30, 250, 30, 30, $style, $html, 'N');


//Close and output PDF document
$this->mytcpdf->Output('sodap_' . '.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+

?>
