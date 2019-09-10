<?php
class Payment_Controller extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->Model('User_Model');
    $this->load->Model('Login_Model');
    $this->load->Model('Will_Model');
    $this->load->helper('string');
  }

  public function payment(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $pack_name = $this->input->post('pack_name');
      $amount = $this->input->post('amount');
      $promocode = $this->input->post('promocode');
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $mobile = $this->input->post('mobile');

      $this->session->set_flashdata('pack_amount',$pack_amount);
      $this->session->set_flashdata('pack_name',$pack_name);
      $this->session->set_flashdata('email',$email);
      $this->session->set_flashdata('mobile',$mobile);

      if($mobile == ''){$mobile = '9999999999';}
      if($email == ''){$email = 'datta@pixelbazar.com';}

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER,
      array("X-Api-Key:test_0d6432ff71bdad7c1c14113908c","X-Auth-Token:test_26525dbef8eb3c043dc53600da4"));
      // For Localhost..
      $payload = Array(
       'purpose' => 'EasyWill Payment',
       'amount' => $amount,
       'phone' => $mobile,
       'buyer_name' => $user_id,
       'redirect_url' => 'http://www.islamic.easywillindia.com/Payment_Gateway/success',
       'send_email' => true,
       'webhook' => 'http://www.islamic.easywillindia.com/Payment_Gateway/webhook',
       'send_sms' => true,
       'email' => $email,
       'allow_repeated_payments' => false
      );

      // // For Online..
      // $payload = Array(
      //   'purpose' => 'Will Payment',
      //   'amount' => $amount,
      //   'phone' => $mobile,
      //   'buyer_name' => $user_id,
      //   'redirect_url' => base_url().'Payment_Gateway/success',
      //   'send_email' => true,
      //   'webhook' => base_url().'Payment_Gateway/webhook',
      //   'send_sms' => true,
      //   'email' => $email,
      //   'allow_repeated_payments' => false
      // );

      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
      $response = curl_exec($ch);
      curl_close($ch);

      $json_decode= json_decode($response, 'true');
      $long_url=$json_decode['payment_request']['longurl'];
      header('Location:'.$long_url);
    }
    else{
      header('Location:'.base_url().'Login');
    }
  }

  // Success Function...
  public function success(){
    date_default_timezone_set('Asia/Kolkata');
    $user_id = $this->session->userdata('user_id');
    $date = date('d-m-Y');
    if($user_id){
      $pack_name = $this->session->flashdata('pack_name');
      $pack_amount = $this->session->flashdata('pack_amount');
      $thirty_days =  date('d-m-Y', strtotime("+30 days"));
      $ninety_days =  date('d-m-Y', strtotime("+90 days"));
      $one_eighty_days =  date('d-m-Y', strtotime("+180 days"));

      $user_details = $this->User_Model->user_details($user_id);
      foreach ($user_details as $user) {
        $max_will_old = $user->max_will;
        $rem_will_old = $user->rem_will;
        $rem_updations_old = $user->rem_updations;
        $is_have_blur = $user->is_have_blur;
      }

      // Add will count...
      $max_will = $max_will_old + 1;
      $rem_will = $rem_will_old + 1;

      // Updation 30 days for Silver Pack and 90 days for gold.
      if($pack_name == 'Silver'){
        $updation_end_date = $thirty_days;
        $add_updation = 1;
      }
      else if($pack_name == 'Gold'){
        $updation_end_date = $ninety_days;
        $add_updation = 1;
      }
      else{
        $updation_end_date = $one_eighty_days;
        $add_updation = 2;
      }

      $rem_updations = $rem_updations_old + $add_updation;
      // Update Subscription info in tbl_User...
      $subscription_info = array(
        'user_subscription' => 'yes',
        'user_subscription_type' => $pack_name,
        'user_subscription_start_date' => 'yes',
        'user_subscription_end_date' => 'yes',
        'updation_end_date' => $updation_end_date,
        'max_will' => $max_will,
        'rem_will' => $rem_will,
        'rem_updations' => $rem_updations;
      );
      $this->User_Model->update_subscription_info($user_id,$subscription_info);

      // If User has Blur Will...
      $get_blur_will = $this->User_Model->get_blur_will_info($user_id);
      if($get_blur_will){
        $key = 'no';
        $will_id = $get_blur_will[0]['will_id'];
        $this->User_Model->set_user_noblur($user_id,$key);
        $this->User_Model->set_will_noblur($will_id,$key);

        $user_details2 = $this->User_Model->user_details($user_id);
        foreach ($user_details2 as $user2) {
          $max_will_old = $user2->max_will;
          $rem_will_old = $user2->rem_will;
        }
        $max_will2 = $max_will_old - 1;
        $rem_will2 = $rem_will_old - 1;

        // Update Will Count...
        $will_count_data = array(
          'max_will' => $max_will2,
          'rem_will' => $rem_will2,
        );
        $this->User_Model->update_subscription_info($user_id,$will_count_data);

        // Save Will Updation Count and Updation Expire Date..
        $will_updation_count_data = array(
          'will_rem_updations' => $add_updation,
          'updation_last_date' => $updation_end_date,
        );
        $this->Will_Model->save_date_place_info($will_id,$will_updation_count_data);
      }

      header('location:'.base_url().'User-Dashboard');
    }
    else{
      header('Location:'.base_url().'Login');
    }
  }


  // Webhook Function...
  public function webhook(){
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y');
    $time = date('h:ia');
    $data = $_POST;
    $payment_id = $data['payment_id'];
    $payment_request_id = $data['payment_request_id'];
    $amount = $data['amount'];
    $fees = $data['fees'];
    $user_id = $data['buyer_name'];
    $status = $data['status'];

    if($satus = 'Credit'){
      $user_details = $this->User_Model->user_details($user_id);
      foreach ($user_details as $user) {
      }
      $user_fullname = $user->user_fullname;
      $payment_data = array(
        'user_id' => $user_id,
        'payment_user_name' => $user_fullname,
        'payment_id' => $payment_id,
        'payment_request_id' => $payment_request_id,
        'payment_date' => $date,
        'payment_time' => $time,
        'payment_amount' => $amount,
        'payment_fees' => $fees,
      );
      $this->User_Model->save_payment_info($payment_data);
    }
  }
}
?>
