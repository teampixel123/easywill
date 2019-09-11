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
    LAST WILL AND TESTAMENT <br>of<br>
    <span style="text-align:center; font-family: times, serif; font-size:16px; " >'.$personal_info1->full_name.'</span>
  </h1>
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
else{
    $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
      Therefore, I have executed this Last Will and Testament and declare as follows:
    </p>';

    $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px;">'
      .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby revoke all former wills and codicils made by me at any time heretofore.
    </p>';

    $family_num = 'a';
    $is_spouse = 0;
    $family_num2 = '0';
    foreach ($family_info as $family_info1) {
      $family_num2++;
      if($family_info1->relationship == 'Spouse'){
        ++$is_spouse;
        $spouse = $family_info1->family_person_name;
        $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px;">'
          .++$num.'. &nbsp;&nbsp;&nbsp; My family consists of my spouse '.$family_info1->family_person_name.'';
          if($is_have_child == 'yes'){
            $html .=' and I have following children.';
          }
          $html .='</p>';
      }
      else{
        if($family_num2 == '1'){
          $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px;">'.++$num.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          My family consists of I have following children.
          </p>';
        }
        $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px;">'.$family_num++.') '.$family_info1->family_person_name.'
        born on '.$family_info1->family_person_dob.'.
        </p>';

        if($family_info1->is_minar == 'yes'){
          $tokens = explode(" ", $family_info1->family_person_name);
          $name = $tokens[0];
          $html .='<p style="text-align:justify; font-family: times, serif; font-size:16px;">AND WHEREAS it is my wish that, In case I die before my
            above mentioned minor child i.e. '.$name.' attains majority';
            if($is_spouse > 0){
              $html .=' in the absence of natural guardian '.$spouse.'.';
            }
            $html .=' I hereby appoint '.$family_info1->guardian_name_title.' '.$family_info1->guardian_name.' as '.$name.'’s
            guardian under this will, who will take care and look after my minor '.$name.', the said guardian shall look after '.$name.'’s education, support
            and training in useful manner to earn a decent living till '.$name.' becomes '.$family_info1->major_age.' years old and the said guardian also will have authority to
            look after all the properties and estates and do all acts which are reasonable and proper for the realization, protection and benefit of
            '.$name.' and the property. Subject to condition that well being and benefit of '.$name.' will be on paramount consideration and the said guardian
            should be stand in a fiduciary relation with '.$name.'. However if '.$name.' attains majority during my lifetime and survives me, this provision
            relating to appointment of the guardian shall not be operative.
          </p>';
        }
      }
    }
}

$html .='
  <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
    .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby appoint';
    $exec_num = 0;
    foreach ($executor_info as $executor_info1) {
      $exec_num++;
      if($exec_num == '1'){
        $html .=' '.$executor_info1->executor_name_title.' '.$executor_info1->executor_name;
        $exec_val = 'executor';
      }
      else{
        $html .=' and '.$executor_info1->executor_name_title.' '.$executor_info1->executor_name;
        $exec_val = 'executors';
      }
    }
    $html .=' as '.$exec_val.' of my will.
    My '.$exec_val.' shall upon my death, administer my estate and effect the bequests and distribution of my estates and '.$exec_val.' will
    assist my family after my death.
  </p>

  <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
    .++$num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby direct that my '.$exec_val.' shall first pay all my debts and liabilities
    out of my estate. All expenses in relation to my funeral and other obsequies ceremonies should be considered reasonable by my executor
    out of my estate.
  </p>
';
$html .='
  <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
    .++$num.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My assets –
  </b></p>
';
$asset_num = 'A';

if($real_estate_data){
  $html .='
    <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
      .$asset_num++.'. &nbsp;&nbsp;&nbsp; I own and possess and I am absolutely entitled to the following immovable
      property / properties:
    </p>
  ';
  $real_num = 0;
  foreach ($real_estate_data as $real_estate_data1) {
    $real_num++;
    $html .='
      <p style="text-align:justify; font-family: times, serif; font-size:16px; ">'
        .$real_num.'. &nbsp;&nbsp;&nbsp; Whereas I am the owner of '.$real_estate_data1->estate_type.' no. '.$real_estate_data1->estate_number.'
        having property bearing '.$real_estate_data1->survey_number_type.' '.$real_estate_data1->survey_number.'
        measuring about '.$real_estate_data1->measurement_area.' '.$real_estate_data1->measurement_unit.',
        located at '.$real_estate_data1->real_estate_address.', '.$real_estate_data1->real_estate_city.',
        Pin No. '.$real_estate_data1->real_estate_pin.', '.$real_estate_data1->real_estate_state.', '.$real_estate_data1->real_estate_country.'.
      </p>
      <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
        I bequeath this property with all my rights, titles and interest therein';
        $estate_id = $real_estate_data1->id;
        $will_id = $real_estate_data1->will_id;
        $estate_type = 'real_estate';
        $real_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $real_destr_num = 0;

        foreach ($real_destr_data as $real_destr_data1) {
          $distribution_name_title = $real_destr_data1->distribution_name_title;
          $real_destr_num++;
          if($real_destr_num == 1){
            $html .=' '.$real_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$real_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$real_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$real_destr_data1->distribution_name.'';
          }
        }
        if($real_destr_num > 1){
          $tlt1 = 'them';
          $tlt2 = 'their';
          $tlt3 = 'they';
          $tlt4 = 'will';
        }
        else{
          if($distribution_name_title == 'Mr.'){
            $tlt1 = 'him';
            $tlt2 = 'his';
            $tlt3 = 'he';
            $tlt4 = 'shall';
          }
          else{
            $tlt1 = 'her';
            $tlt2 = 'her';
            $tlt3 = 'she';
            $tlt4 = 'shall';
          }
        }
      $html .='
        absolutely to be held and enjoyed by '.$tlt1.' with full and absolute powers of alienation after my demise, the said property shall become
        '.$tlt2.' property then '.$tlt3.' '.$tlt4.' get the same transferred, mutated and substituted in '.$tlt2.' own name in the records of rights
        or any other concerned authority on the basis of this will. '.$tlt3.' then '.$tlt4.' use and enjoy the same like me. '.$tlt3.' then '.$tlt4.'
        be fully competent/entitled to transfer the same by way of sale, assign, gift, mortgage, lease or otherwise as per the procedure of law.
      </p>
    ';
  }

  if($bank_assets_data){
    $savings = 0;
    $current = 0;
    $Fixed = 0;
    $PPF = 0;
    $Locker = 0;
    $Mutual_Funds = 0;
    $Stock = 0;
    $Insurance = 0;
    // $account_type_num='1';
    foreach ($bank_assets_data as $bank_assets_data1) {
      $assets_type = $bank_assets_data1->account_type;
      if ($assets_type == 'Savings Account') {
        $savings++;
        if($savings == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Savings in Bank Accounts
            </b></p>
          ';
        }
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
            .$savings.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank balance of my Savings Account No. '.$bank_assets_data1->account_number.' with '.$bank_assets_data1->bank_name.', Branch – '.$bank_assets_data1->bank_branch.', Pincode - '.$bank_assets_data1->bank_pin_code.', '.$bank_assets_data1->bank_state.'.
          </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
          I hereby give, device and bequeath the monies lying in the aforesaid bank account, is to be transferred
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $bank_destr_num++;
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'Current Account') {
        $current++;
        if($current == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Current Account -
            </b></p>
          ';
        }
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
            .$current.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank balance of my Current Account No. '.$bank_assets_data1->account_number.' with '.$bank_assets_data1->bank_name.', Branch – '.$bank_assets_data1->bank_branch.', Pincode - '.$bank_assets_data1->bank_pin_code.', '.$bank_assets_data1->bank_state.'.
          </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
          I hereby give, device and bequeath the monies lying in the aforesaid bank account, is to be transferred
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'Fixed Deposits') {
        $Fixed++;
        if($Fixed == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fixed Deposits -
            </b></p>
          ';
        }
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
            .$Fixed.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My bank fixed deposits with customer ID no.
            '.$bank_assets_data1->account_number.' with '.$bank_assets_data1->bank_name.', Branch - '.$bank_assets_data1->bank_branch.',
            Pincode - '.$bank_assets_data1->bank_pin_code.', '.$bank_assets_data1->bank_state.', vide F.D. receipt no. '.$bank_assets_data1->fd_recipt_no.'.
          </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
           I hereby give and bequeath the monies lying in the aforesaid fixed deposits, is to be transferred to
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'PPF') {
        $PPF++;
        if($PPF == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Public Provident Fund -
            </b></p>
          ';
        }
        $html .='
        <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
          .$PPF.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My PPF Account No. '.$bank_assets_data1->account_number.' with
          '.$bank_assets_data1->bank_name.', Branch – '.$bank_assets_data1->bank_branch.', Pincode - '.$bank_assets_data1->bank_pin_code.',
          '.$bank_assets_data1->bank_state.'.
        </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
           I hereby give and bequeath the monies lying in the aforesaid Public Provident Fund, is to be transferred to
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'Bank Locker') {
        $Locker++;
        if($Locker == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank Locker –
            </b></p>
          ';
        }
        $html .='
        <p style="text-align:justify; font-family: times, serif; font-size:16px;">'.$Locker.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The contents of bank locker no. '.$bank_assets_data1->account_number.'
          with key no. '.$bank_assets_data1->key_number.' with '.$bank_assets_data1->bank_name.', branch – '.$bank_assets_data1->bank_branch.',
          Pincode - '.$bank_assets_data1->bank_pin_code.', '.$bank_assets_data1->bank_state.'.
        </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
           I hereby give and bequeath the monies lying in the aforesaid Bank Locker, is to be transferred to
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'Mutual Funds') {
        $Mutual_Funds++;
        if($Mutual_Funds == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mutual Funds –
            </b></p>
          ';
        }
        $html .='
        <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
          .$Mutual_Funds.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My mutual fund investments with folio numbers '.$bank_assets_data1->account_number.'
          with '.$bank_assets_data1->bank_name.', branch – '.$bank_assets_data1->bank_branch.', Pincode - '.$bank_assets_data1->bank_pin_code.'.
        </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
           I hereby give and bequeath the monies lying in the aforesaid mutual fund, is to be transferred to
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='</p>';
      }

      if ($assets_type == 'Stock Equities') {
        $Stock++;
        if($Stock == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stock Equities –
            </b></p>
          ';
        }
        $html .='
        <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
          .$Stock.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My shares/Stock Equities in '.$bank_assets_data1->bank_name.',
          branch – '.$bank_assets_data1->bank_branch.', Pincode - '.$bank_assets_data1->bank_pin_code.' with ISIN/Serial no.
          '.$bank_assets_data1->account_number.'.
        </p>
        ';
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:16px; text-indent:40px;">
           I hereby give and bequeath the monies lying in the aforesaid Stock Equities/shares, is to be transferred to
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='.</p>';
      }

      if ($assets_type == 'Insurance Policy') {
        $Insurance++;
        if($Insurance == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
              .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Insurance Policy –
            </b></p>
          ';
        }
        $html .='
        <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
          .$Insurance.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My insurance policy '.$bank_assets_data1->account_number.' from
          '.$bank_assets_data1->bank_name.' branch – '.$bank_assets_data1->bank_branch.' for sum assurance of Rs.'.$bank_assets_data1->sum_assurance_amount.'/-.
          I bequeath my this insurance claim
        ';

        $estate_id = $bank_assets_data1->id;
        $estate_type = 'bank_estate';
        $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $bank_destr_num = 0;
        foreach ($bank_destr_data as $bank_destr_data1) {
          $distribution_name_title = $bank_destr_data1->distribution_name_title;
          $bank_destr_num++;
          if($bank_destr_num == 1){
            $html .=' '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
          else{
            $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$distribution_name_title.' '.$bank_destr_data1->distribution_name.'';
          }
        }
        $html .='.</p>';
      }
    }
  }

  if($vehicle_assets_data){
    $vehicle_num = 0;
    foreach ($vehicle_assets_data as $vehicle_assets_data1) {
      $vehicle_num++;
      if($vehicle_num == 1){
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
            .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vehicles –
          </b></p>
        ';
      }

      $html .='
      <p style="text-align:justify; font-family: times, serif; font-size:16px;">'
        .$vehicle_num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My vehicle with registration no '.$vehicle_assets_data1->vehicle_registration_no.',
        make year '.$vehicle_assets_data1->vehicle_make_year.', model name '.$vehicle_assets_data1->vehicle_model_name.'
        is to be transferred to
      ';

      $estate_id = $vehicle_assets_data1->id;
      $estate_type = 'vehicle_estate';
      $vehicle_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
      $vehicle_destr_num = 0;
      foreach ($vehicle_destr_data as $vehicle_destr_data1) {
        $vehicle_destr_num++;
        if($vehicle_destr_num == 1){
          $html .=' '.$vehicle_destr_data1->distribution_percent.'% to '.$vehicle_destr_data1->distribution_name.'';
        }
        else{
          $html .=' and '.$vehicle_destr_data1->distribution_percent.'% to '.$vehicle_destr_data1->distribution_name.'';
        }
      }
      $html .='.</p>';
      // code...
    }
  }

  if($other_gift_data){
    $gift_num = 0;
    $Jewellery = 0;
    $Remained_Assets_num = 0;
    foreach ($other_gift_data as $other_gift_data1) {
      $gift_num++;
      if($gift_num == 1){
        $html .='
          <p style="text-align:justify; font-family: times, serif; font-size:18px;"><b>'
            .$asset_num++.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other gifts -
          </b></p>
        ';
      }

      if($other_gift_data1->gift_type == 'Jewellery and Valuables'){
        $Jewellery++;
        if($Jewellery == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:16px;"><b>Jewelry and Ornaments -
            </b></p>
          ';
        }
    		$html .= '<p style="text-align:justify; font-family: times, serif; font-size:16px;">'.$Jewellery.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        All the jewellery and valuables of '. $other_gift_data1->gift_description .' will belong ';

        $estate_id = $other_gift_data1->id;
        $estate_type = 'other_gift_estate';
        $gift_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $gift_destr_num = 0;
        foreach ($gift_destr_data as $gift_destr_data1) {
          $gift_destr_num++;
          if($gift_destr_num == 1){
            $html .='fully to '.$gift_destr_data1->distribution_name.'';
          }
          // else{
          //   $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$bank_destr_data1->distribution_name.'';
          // }
        }
        $html .='.</p>';
    	}
    	elseif($other_gift_data1->gift_type == 'Remained Assets'){
        $Remained_Assets_num++;
        if($Remained_Assets_num == 1){
          $html .='
            <p style="text-align:justify; font-family: times, serif; font-size:16px;"><b>Remained assets -
            </b></p>
          ';
        }
    		$html .= '<p style="font-size:12; font-family: times, serif;" > '.$Remained_Assets_num.'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        All '. $other_gift_data1->gift_description .' to be given
    		';

        $estate_id = $other_gift_data1->id;
        $estate_type = 'other_gift_estate';
        $gift_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
        $gift_destr_num = 0;
        foreach ($gift_destr_data as $gift_destr_data1) {
          $gift_destr_num++;
          if($gift_destr_num == 1){
            $html .='fully to '.$gift_destr_data1->distribution_name.'';
          }
          // else{
          //   $html .=' and '.$bank_destr_data1->distribution_percent.'% to '.$bank_destr_data1->distribution_name.'';
          // }
        }
        $html .='.</p>';
    	}
    }
  }


// Omited Assets Destribution...


  $estate_id = '-1';
  $estate_type = 'omited_estate';
  $omit_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
  if($omit_destr_data){

    $html .= '
    <p style="font-size:12; font-family: times, serif; text-indent:40px;">
      Any assets, movable or immovable which might be omitted from being mentioned in this will or which may hereafter be acquired by me shall be
      taken ';
      $omit_num = 0;
      foreach ($omit_destr_data as $omit_destr_data1) {
        $omit_num++;
        if($omit_num == '1'){
          $html .= $omit_destr_data1->distribution_percent.'% by '.$omit_destr_data1->distribution_name.'';
        }
        else{
          $html .= ' and '.$omit_destr_data1->distribution_percent.'% by '.$omit_destr_data1->distribution_name.'';
        }
      }
    $html .= '. </p>';
  }


// Adequete Information...


  if($adequate_provision_info){
    $adeq_num = 0;
    $html .= '<p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
      During my life time, I have already made adequate provisions for ';
      foreach ($adequate_provision_info as $adequate_provision_info1) {
        $adeq_num++;
        if($adeq_num == 1){
          $html .= ''.$adequate_provision_info1->adequate_provision_name_title.' '.$adequate_provision_info1->adequate_provision_name.'';
        }
        else{
          $html .= ' and '.$adequate_provision_info1->adequate_provision_name_title.' '.$adequate_provision_info1->adequate_provision_name.'';
        }

      }
    $html .= ' and hence I have not made any separate provisions under this Will.
    </p>';
  }

  $html .= '
  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
    This is my final last will and testament.
  </p>

  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
    I am a person of sound mind and not affected in any manner by any legal disability while making this Will. I have made and executed this Will
    of my own accord, voluntarily and without any dictate, coercion or without any undue influence or outside pressure. I have made this will being
    in full possession of my faculties of sense and being fully aware after understanding the true purpose, legal meaning and effect thereof.
  </p>

  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
    That the contents of this will have been explained to me parawise which I have understood and found to be correct as per my instructions.
  </p>

  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
    In witness whereof I have executed this Last will and Testament, voluntarily, without any outside pressure and in my full sense in the
    presence of the following witnesses on the date and place mentioned below.
  </p>

  <style>
    table {
      border-collapse: collapse;
    }
    table, td, th {
      border: 1px solid black;
      text-align:center;

    }
    td{
      vertical-align: center !important;
    }
</style>

  <table>
    <tr style="height:50px;">
      <td style="height:60px;"> <b> <br> Name of Testator</b> </td>
      <td style="height:60px;"> <b> <br> Photo</b> </td>
      <td style="height:60px;"> <b> <br> Signature</b> </td>
    </tr>
    <tr>
      <td style="height:120px;"> <span><br> '.$personal_info1->full_name.' </span></td>
      <td>  </td>
      <td>  </td>
    </tr>
  </table>

  <p style="font-size:12; font-family: times, serif;">
    Date : '.$will_info1->will_date.'
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Place : '.$will_info1->will_place.'<br><br><br><br>
  </p>

  <h1 style="text-align:center; font-family: times, serif; font-size:18px;">
    Witnesses
  </h1>

  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
    We, the witnesses have signed this Will on the request of testator, who has also sighed this will in our presence after understanding the
    contents of this will,   that the testator signs and executes this instrument as the testator`s last will and that the testator signs it
    willingly, and that each of us in the presence and hearing of the testator, hereby signs this will as witness to the testator`s signing,
    and that to the best of our knowledge the testator is of major by age, of sound mind, and under no constraint or undue influence.
  </p>

  <table style="width:650px;">
    <tr style="height:50px;">
      <td style="height:60px; width:80px;"> <b> <br> Sr. No. </b> </td>
      <td style="height:60px;"> <b> <br> Name of Witness </b> </td>
      <td style="height:60px;"> <b> <br> Address </b> </td>
      <td style="height:60px;"> <b> <br> Signature</b> </td>
    </tr>';
    if($witness_info){
      $witness_num = 0;
      foreach ($witness_info as $witness_info1) {
        $witness_num++;
        $html .= '
        <tr>
          <td> <span><br> '.$witness_num.' </span></td>
          <td style="height:120px;"> <span><br> '.$witness_info1->witness_name_title.' '.$witness_info1->witness_name.' </span></td>
          <td> <span><br> '.$witness_info1->witness_address.' </span></td>
          <td>  </td>
        </tr>
      ';
      }
      $html .= ' </table> ';
    }


}

// $pdf->Image(base_url().'assets/images/title.png', 10, 150, 190, 50, '', '', '', 72);
// $pdf->Image(base_url().'assets/images/Easy_Islamic_Will_V3-06.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

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
    Certificate
  </h1>

  <p style="text-align:justify; font-size:12; font-family: times, serif; text-indent:40px;">
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
