<?php
class Login_Controller extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Login_Model');
    $this->load->model('Will_Model');
    $this->load->model('User_Model');
  }

  public function send_security_code(){
    $security_code = random_string('nozero',8);
    $reg_name = $this->input->post('reg_name');
    $reg_mob_email = $this->input->post('reg_mob_email');
    $contact_type = $this->input->post('contact_type');
    // echo $contact_type;
    // $check = 0;
    if ($contact_type=='email') {
    $check = $this->Login_Model->check_mail_id($this->input->post('reg_mob_email'));
    }
    elseif ($contact_type=='mobile_number') {
    $check = $this->Login_Model->check_mobile_no($this->input->post('reg_mob_email'));
    }

    if ($check >0) {
      $error = 'Mobile_Exist';
      echo json_encode($error);
    }
    else{
      $this->session->set_userdata('reg_name',$reg_name);
      $this->session->set_userdata('reg_mob_email',$reg_mob_email);
      $this->session->set_userdata('otp',$security_code);

      if ($contact_type=='mobile_number') {
        //echo $security_code;
        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => "EasyWill OTP: $security_code",
            "language" => "english",
            "route" => "p",
            "numbers" => $reg_mob_email,
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: zHGpE0Cl6iqLKWtmBrNx3oARIkjnVh8c7Xde9MvfDSFOTZ4aJ5Sa0mUig3pQqET2IvFjK1AwrkbzfCyu",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        $res = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
      }
      else
      {
        $from_email = "info@easywillindia.com";
        $formcontent='
  			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 20px;font-family: Georgia, serif; ">
  			 Welcome to Easy Islamic Will
  			 </p>
  			 <hr>
  			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  			 Your Security Code is: '.$security_code.'
  			 </p>
  		 ';
        $recipient = $reg_mob_email;
        $subject = "Easy Will Security Code";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from_email."\r\n".
                    'Reply-To: '.$from_email."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($recipient, $subject, $formcontent, $headers);
      }
      $error = $security_code;  // Change this value to success after project complete...
      echo json_encode($error);
    }
  }
  // Save new user.. if otp is correct...
   public function user_register(){
    $security_code = $this->input->post('security_code');
    $user_password = $this->input->post('user_password');
    $otp2 = $this->session->userdata('otp');
    $contact_type= $this->input->post('contact_type');

    if($security_code == $otp2 ) {
      $date = date('d-m-Y');
      $user_id = random_string('nozero',8);  // Generate user id...
      // Check for id duplication...
      $flag = 0;
      while($flag==0){
        $user_data = $this->Login_Model->get_user_id_count($user_id);
        if($user_data){
          $flag = 0;
          $user_id = random_string('nozero',8);
        }
        else{
          $flag = 1;
        }
      }
      // data if mobile num..
      if($contact_type == 'mobile_number') {
        $register_data = array(
          'user_id' => $user_id,
          'user_fullname' => $this->session->userdata('reg_name'),
          'user_mobile_number' => $this->session->userdata('reg_mob_email'),
          'user_password' => $user_password,
          'reg_date' => $date,
        );
      }
      else {
        //data if email id;
        $register_data = array(
          'user_id' => $user_id,
          'user_fullname' => $this->session->userdata('reg_name'),
          'user_email_id' => $this->session->userdata('reg_mob_email'),
          'user_password' => $user_password,
          'reg_date' => $date,
        );
      }

      // echo print_r($register_data);
      $this->Login_Model->save_register_user($register_data);
      // $session_data = array('user_is_login' => 'YES','user_id' =>$user_id);
      // $this->session->set_userdata($session_data);
      $result['responce'] = 'Valide';
    }
    else{
      $result['responce'] = 'Invalide';
    }
    echo json_encode($result);
   }

   // Validate and Login... Datta...
   public function login_user(){
      $mob_email = $this->input->post('mob_email');
      $user_password = $this->input->post('user_password');
      $get_data = $this->Login_Model->validate_login($mob_email,$user_password);
       //echo print_r($get_data);
      if($get_data){
         $user_id = $get_data[0]['user_id'];
         $user_subscription = $get_data[0]['user_subscription'];
         $user_subscription_type = $get_data[0]['user_subscription_type'];
         $incomplete_will = $get_data[0]['incomplete_will'];
         $complete_will = $get_data[0]['complete_will'];
         $is_have_blur = $get_data[0]['is_have_blur'];
         $max_will = $get_data[0]['max_will'];
         $rem_will = $get_data[0]['rem_will'];
         $updation_end_date = $get_data[0]['updation_end_date'];
         $rem_updations = $get_data[0]['rem_updations'];

         $blur_will_id = $this->session->userdata('blur_will_id');
         if($blur_will_id && $user_subscription == 'yes' && $max_will > 0){
           if($user_subscription_type == 'Silver' || $user_subscription_type == 'Gold'){
             $will_rem_updations = 1;
             $rem_updations = $rem_updations + 1;
           }
           else if($user_subscription_type == 'Platinum'){
             $will_rem_updations = 2;
             $rem_updations = $rem_updations + 2;
           }

           $will_data = array(
             'will_user_id' => $user_id,
             'updation_last_date' => $updation_end_date,
             'will_rem_updations' => $will_rem_updations,
             'is_blur' => 'no',
           );

           $this->Will_Model->update_will_on_login($blur_will_id, $will_data);

           $complete_will = $complete_will + 1;
           $max_will = $max_will - 1;
           $rem_will = $rem_will - 1;

           $will_count_data = array(
             'complete_will' => $complete_will,
             'max_will' => $max_will,
             'rem_will' => $rem_will,
             'rem_updations' => $rem_updations,
             'is_have_blur' => 'no',
           );
           $this->User_Model->update_subscription_info($user_id,$will_count_data);

         }
         else if($blur_will_id && $is_have_blur=='no' && $max_will == 0){
           $will_data = array(
             'will_user_id' => $user_id,
             'is_blur' => 'yes',
           );
           $this->Will_Model->update_will_on_login($blur_will_id, $will_data);

           $complete_will = $complete_will + 1;
           $will_count_data = array(
             'complete_will' => $complete_will,
             'is_have_blur' => 'yes',
           );
           $this->User_Model->update_subscription_info($user_id,$will_count_data);
         }

         $session_data = array('user_is_login' => 'YES','user_id' =>$user_id);
         $this->session->set_userdata($session_data);
         $result['responce'] = 'Success';
      }
      else{
        $result['responce'] = 'Invalide_Password';
      }
       echo json_encode($result);
    }



    public function clear_session(){
      $this->session->sess_destroy();
    }
}
?>
