<?php
 // Extend the TCPDF class to create custom Header and Footer
 class MYPDF extends TCPDF {
  //Page header
  public function Header() {
 	 $this->RoundedRect(05, 05, 200, 290, 0, '1000');
  }
  // Page footer
  public function Footer() {
 	 // Position at 15 mm from bottom
 	 $this->SetY(-15);
 	 $this->SetFont('helvetica', 'I', 8);
 	 // Page number
 	 $this->Cell(10, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
 	 // Set font
 	 $this->SetFont('helvetica', 'I', 12);
 	 $this->Cell(295, 15, ' Signature.................. ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
  }
}

// create new PDF document
 $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 // set document information
 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor(' ');
 $pdf->SetTitle('Islamic_Will');
 $pdf->SetSubject(' ');
 $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 // set default header data
 $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
 // set header and footer fonts
 $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
 $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 // set default monospaced font
 $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 // set margins
 $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
 $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
 $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 // set auto page breaks
 $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 // set image scale factor
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 // set some language-dependent strings (optional)
 if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
 }

 // ---------------------------------------------------------
// set font
$pdf->SetFont('helvetica', '', 10);
// add a page
$pdf->AddPage();
foreach ($personal_info as $personal_info1) {
}
foreach ($will_info as $will_info1) {
}

$date = $will_info1->will_date;
$timestamp = strtotime($date);
$day = date("d<\s\u\p>S</\s\u\p>", $timestamp);
$month = date("M", $timestamp);
$year = date("Y", $timestamp);

$html = ' <h1 style="text-align:center; font-family: times, serif; font-size:18px;">
            LAST WILL AND TESTAMENT OF
          </h1>
          <p style="text-align:center; font-family: times, serif; font-size:16px; ">
            '.$personal_info1->full_name.'
          </p>
          <p style="text-align:center; font-family: times, serif; font-size:16px; ">
            This Last Will and Testament is executed at '.$will_info1->will_place.' on this '.$day.' day of month '.$month.' of year '.$year.'.
          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
          I Mr. Amit Patil son of Mr. Ashok Patil now residing at C. S. No. 205, E Ward, Kolhapur pin code - 416003 (Nationality Indian)
          I was born on 01/02/1970, Occupation – Service / Business, by Religion – Hindu having my Aadhar No. 123456789125.
          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
            WHEREAS I do hereby make, publish and declare this is to be my last will and testament revoking all wills and
            codicils and testamentary dispositions at any time heretofore made by me.
          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
            AND WHEREAS I am maintaining good health and I am of sound mind. This will is made by me of my own independent decision,
            my free mind and volition and in sound health without any persuasion, influence or coercion and out of my independent decision only.
          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
            AND WHEREAS I fully understand what is right and wrong so I wish to make necessary and proper arrangements in respect of the enjoyment
            and distribution of my assets and properties after my life time so that unnecessary misunderstanding and consequential wasteful litigation
            or unpleasantness between the members of my family may be avoided
          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">

          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">

          </p>

          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">

          </p>
        ';
// $pdf->Image(base_url().'assets/images/title.png', 10, 150, 190, 50, '', '', '', 72);
// $pdf->Image(base_url().'assets/images/Easy_Islamic_Will_V3-06.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// add a page
$pdf->AddPage();

$pdf->Output('ISLAMIC_WILL_Demo.pdf', 'I');

?>
