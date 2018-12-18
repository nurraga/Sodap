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
            $this->Image($image_file, 12, 20, 18, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->Ln(1);
            $this->SetFont('helvetica', 'B', 18);
            $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(5);
            $this->Cell(182, 20, 'Time Schedule', 0, false, 'C', 0, '', 0, false, 'M', 'M');

            if(strlen($header_content)>54)
            {
                $this->Ln(6);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 30, substr($header_content,0,48), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                $this->Ln(5);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 30, substr($header_content,48), 0, false, 'C', 0, '', 0, false, 'M', 'M');
            }else{
                $this->Ln(6);
                $this->SetFont('helvetica', 'B', 12);
                $this->Cell(0, 30, $header_content, 0, false, 'C', 0, '', 0, false, 'M', 'M');
            }

            // $this->Ln(5);
            // $this->SetFont('helvetica', 'B', 9);
            // $this->Cell(0, 10, $alamat_content, 0, false, 'C', 0, '', 0, false, 'M', 'M');

            $this->Ln(3);
            $this->SetFont('helvetica', 'B', 8);
            $this->MultiCell(30, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
            $this->MultiCell(130, 10, $alamat_content, 0, 'C', 0, 0, '', '', true, 0, true, true, 10, 'M');
            // $this->SetFont('helvetica', 'B', 8);
            // $this->Cell(0, 10, 'Telp/Fax :                                Email: diskominfopyk@gmail.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(5);
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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

$footer_content = base_url('User/lapschedule/'). $idtab;;

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

// ---------------------------------------------------------

// set font
$this->mytcpdf->SetFont('times', '', 12);

// add a page
$this->mytcpdf->AddPage('L', 'F4');

// set some text to print

// set some text to print
// print a block of text using Write()
// $opd = strtoupper($opd_pelaksana);
// $tbl = <<<EOD
//                     <table border="" style="width:100%">
//                         <tr>
//                             <td style="width:20%" ><img src="<php echo base_url(images/logo_pyk.png)" border="0" height="41" width="41" /></td>
//                             <td style="width:70%" align="center" ><b style="font-size: 23px">PEMERINTAH KOTA PAYAKUMBUH</b><br>
//                             <center style="font-size: 22px"><b>$opd</b><br><b style="font-size: 15px">Jl.Soekarno Hatta Telp.(0752) 92601, 92957 Fax. (0752) 93279</b><br><b style="font-size: 15px">PAYAKUMBUH 26226</b>
//                             </td>
//                             <td style="width:10%"></td>
//                         </tr>
//                     </table>
//                     <hr size="20%"/>

// EOD;
// $this->mytcpdf->writeHTML($tbl, true, false, false, false, '');
$tes= 'tes';

$x=0;



foreach ($schedule as $key) {

    
    $dtr = '<tr>'.
    '<td>'.$x++.'</td>'.
    '<td>'.$key->uraian_keg.'</td>';
    $bulan = array(
                                $key->jan,
                                $key->feb,
                                $key->mar,
                                $key->apr,
                                $key->mei,
                                $key->jun,
                                $key->jul,
                                $key->ags,
                                $key->sep,
                                $key->okt,
                                $key->nov,
                                $key->des
                          );
                          foreach ($bulan as $key ) {
                            $arrblnke= array();

                            $isi = str_split($key);
                              foreach ($isi as $dataisi) {
                              $arrblnke[$dataisi]=$dataisi;
                            }
                            for($i=0;$i<4;$i++){
                            
                            if(array_key_exists($i+1, $arrblnke))
                                   $td= "<td style='min-width:2px; font-size: 10px'><p hidden=''></p></td>";
                                else 
                                $td= "<td style='min-width:2px; font-size: 10px'><p hidden=''></p></td>";
                              
                              
                            }
                          }
                   
    
}
$datarow = $dtr.$key.'</tr>';
// print a block of text using Write()
$tbl = <<<EOD
    <br>
    <br>
    <br>
    <br>
    
                <div class="box-body" >
                
                   <table border="1" style="width: 100%">
            
              <tr>

                <th rowspan="2" style="vertical-align : middle;text-align:center;">#</th>
                <th rowspan="2" class='text-center' style="vertical-align : middle;width: 20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;Uraian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th colspan="4" class='text-center ' style="width: 6%">Januari</th>
                <th colspan="4" class='text-center 'style="width: 4%">Februari</th>
                <th colspan="4" class='text-center' style="width: 6%">Maret</th>
                <th colspan="4" class='text-center' style="width: 6%">April</th>
                <th colspan="4" class='text-center ' style="width: 6%">Mei</th>
                <th colspan="4" class='text-center ' style="width: 6%">Juni</th>
                <th colspan="4" class='text-center ' style="width: 6%">Juli</th>
                <th colspan="4" class='text-center ' style="width: 7%">Agustus</th>
                <th colspan="4" class='text-center ' style="width: 8%">September</th>
                <th colspan="4" class='text-center ' style="width: 7%">Oktober</th>
                <th colspan="4" class='text-center ' style="width: 7%">November</th>
                <th colspan="4" class='text-center ' style="width: 7%">Desember</th>

              </tr>
              <tr>

                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>
                <th style="min-width:2px; font-size: 10px">1</th>
                <th style="min-width:2px; font-size: 10px">2</th>
                <th style="min-width:2px; font-size: 10px">3</th>
                <th style="min-width:2px; font-size: 10px">4</th>

              </tr>
              $datarow
                
                    </table>
                    </div>
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
$barcode_content = base_url('User/lapschedule/'). $idtab;
$this->mytcpdf->SetFont('times', '', 12);
$this->mytcpdf->SetXY(24, 250);
$tbl = <<<EOD
                <div class="box-body" >
                    <table border="0" style="width:100%">
                        
                        
                    </table>
                    </div>
EOD;


// $this->mytcpdf->write1DBarcode($barcode_content, 'C128', '', '', '', 18, 0.4, $style, 'N');
// $this->mytcpdf->Ln();



$this->mytcpdf->SetXY(24, 150);
$this->mytcpdf->SetFont('times', 'I', 7);
$html = <<<EOF
                    <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokumen ini dinyatakan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sah secara administrasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;negara,silakan lakukan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;verifikasi dengan melakukan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;scan QR Code
                    
EOF;
$this->mytcpdf->writeHTML($html, true, false, true, false, '');
// QRCODE,Q : QR-CODE Better error correction
$this->mytcpdf->write2DBarcode($barcode_content, 'QRCODE,Q', 30, 150, 30, 30, $style, $html, 'N');


//Close and output PDF document
$this->mytcpdf->Output('sodap_' . '.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+

?>
