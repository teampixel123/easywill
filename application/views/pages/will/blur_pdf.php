<?php
 // Extend the TCPDF class to create custom Header and Footer
 class MYPDF extends TCPDF {
 	//Page header
 	public function Header() {
    $this->SetY(-20);
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(20, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    // Set font
    $this->SetFont('helvetica', 'I', 12);
    $this->Cell(245, 20, ' Signature.................. ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
 	}

 	// Page footer
 	public function Footer() {
    $this->SetLineStyle( array( 'width' => 0.30, 'color' => array(0, 0, 0)));
    $this->Line(10, 10, $this->getPageWidth()-10, 10);
    $this->Line($this->getPageWidth()-10, 10, $this->getPageWidth()-10,  $this->getPageHeight()-10);
    $this->Line(10, $this->getPageHeight()-10, $this->getPageWidth()-10, $this->getPageHeight()-10);
    $this->Line(10, 10, 10, $this->getPageHeight()-10);
 	}
 }

 foreach ($will_info as $will_info1) {
 }
 $will_id = $will_info1->will_id;

 // create new PDF document
  $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor(' ');
  $pdf->SetTitle('EasyWill_'.$will_id.'');
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
  $pdf->SetMargins(25, 25, 25);
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
$pdf->SetFont('times', '', 12);
// add a page
$pdf->AddPage();
foreach ($personal_info as $personal_info1) {
}
$is_have_child = $personal_info1->is_have_child;
$gender = $personal_info1->gender;
$date = $will_info1->will_date;
$timestamp = strtotime($date);
$day = date("d<\s\u\p>S</\s\u\p>", $timestamp);
$month = date("M", $timestamp);
$year = date("Y", $timestamp);

$html = '
  <h1 style="text-align:center; font-family: times, serif; font-size:18px;">
    LAST WILL AND TESTAMENT OF
  </h1>
  <p style="text-align:center; font-family: times, serif; font-size:16px; ">
    '.$personal_info1->full_name.'
  </p>
  <p style="text-align:center; font-family: times, serif; font-size:16px; ">
    This Last Will and Testament is executed at '.$will_info1->will_place.' on this '.$day.' day of month '.$month.' of year '.$year.'.
  </p>

  <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
  I '.$personal_info1->name_title.' '.$personal_info1->full_name.' now residing at '.$personal_info1->address.', '.$personal_info1->city.',
  pin code - 416003, '.$personal_info1->state.' (Nationality '.$personal_info1->nationality.') I was born on '.$personal_info1->birthdate.',
  Occupation – '.$personal_info1->occupation.', by Religion – '.$personal_info1->religion.' having my Aadhar No. '.$personal_info1->aadhar_no.'.
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
';
$marital_status = $personal_info1->marital_status;
$is_have_child = $personal_info1->is_have_child;
$num = 0;
if($marital_status != 'Married' && $is_have_child == 'no'){
  $html .='
  <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
    .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; All personal property (Immovable and / or Movable) owned by me at the time of my death
    will be given / distributed as mentioned in following sections.
  </p>
  ';
}


$html .='
  <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
    .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby appoint';
    $exec_num = 0;
    foreach ($executor_info as $executor_info1) {
      $exec_num++;
      if($exec_num == '1'){
        $html .=' '.$executor_info1->executor_name_title.' '.$executor_info1->executor_name;
      }
      else{
        $html .=' and '.$executor_info1->executor_name_title.' '.$executor_info1->executor_name;
      }
    }
    $html .=' as Executor of my will.
    My executor shall upon my death, administer my estate and effect the bequests and distribution of my estates and executor will assist my
    family after my death.
  </p>

  <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
    .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby direct that my executor shall first pay all my debts and liabilities out of my
    estate. All expenses in relation to my funeral and other obsequies ceremonies should be considered reasonable by my executor out of my estate.
  </p>
';



// $pdf->Image(base_url().'assets/images/title.png', 10, 150, 190, 50, '', '', '', 72);
// $pdf->Image(base_url().'assets/images/Easy_Islamic_Will_V3-06.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);



//page 1
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
// $bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
// $auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/will/blur_img.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


//page 2
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/will/blur_img.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


//page 3
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/will/blur_img.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();



//page 4
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/will/blur_img.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();










// add a page
$pdf->AddPage();
  if($gender == 'male'){
    $wit_ttl1 = 'him';
    $wit_ttl2 = 'his';
  }
  else{
    $wit_ttl1 = 'her';
    $wit_ttl2 = 'her';
  }
  $html2 = '<h1 style="text-align:center; font-family: times, serif; font-size:18px;">
    Checklist and Certificate
  </h1>

  <p style="font-size:12; font-family: times, serif; text-indent:40px;">
    This is to certify that I have examined within signed Name '.$personal_info1->name_title.' '.$personal_info1->full_name.' on the date of this will and is found to be conscious,
    well oriented in time and space also he is absolutely normal as regards cognition, emotions and intellect. I found '.$wit_ttl1.' in normal position of
    '.$wit_ttl2.' mental faculties at the time of examination.
  </p>

  <p style="font-size:12; font-family: times, serif;">
    Date : '.$will_info1->will_date.'
  </p>

  <p style="font-size:12; font-family: times, serif;">
    Place : '.$will_info1->will_place.'
  </p>

  <p style="font-size:12; font-family: times, serif; text-indent:400px;">
    Signature and stamp
  </p>
  ';



$pdf->writeHTML($html2, true, 0, true, 0);
$pdf->Output('EasyWill_'.$will_id.'.pdf', 'I');

?>
