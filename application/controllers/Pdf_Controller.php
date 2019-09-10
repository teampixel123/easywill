<?php
class Pdf_Controller extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Will_Model');
    $this->load->library('Pdf');
    // $this->load->model('Will_Model');
  }

  // public function create_pdf(){
  //   $will_id = $this->input->post('will_id');
  //   $this->Will_Model->set_will_complete($will_id);
  //
  //   $user_is_login = $this->session->userdata('user_is_login');
  //   $user_id = $this->session->userdata('user_id');
  //   if($user_is_login && $user_id && $will_id){
  //     $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
  //     $data['will_info'] = $this->Will_Model->get_will_data($will_id);
  //     $data['family_info'] = $this->Will_Model->get_family_data($will_id);
  //     $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
  //     $data['real_estate_data'] = $this->Will_Model->get_real_estate_data($will_id);
  //     $data['bank_assets_data'] = $this->Will_Model->get_bank_assets_data($will_id);
  //     $data['vehicle_assets_data'] = $this->Will_Model->get_vehicle_assets_data($will_id);
  //     $data['other_gift_data'] = $this->Will_Model->get_other_gift_data($will_id);
  //     $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
  //     $data['witness_info'] = $this->Will_Model->get_witness_list($will_id);
  //     $data['adequate_provision_info'] = $this->Will_Model->get_adequate_provision_list($will_id);
  //
  //     $this->load->view('pages/will/blur_pdf',$data);
  //   }
  //   else{
  //     header('location:'.base_url().'Login');
  //   }
  // }

  public function final_pdf(){
    $will_id = $this->input->post('will_id');
    $this->Will_Model->set_will_complete($will_id);

    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id && $will_id){

      if(isset($_COOKIE['set_update']) && $_COOKIE['set_update'] == $will_id && isset($_COOKIE['will_rem_updations'])){
        $will_rem_updations1 = $_COOKIE['will_rem_updations'];
        $will_rem_updations = $will_rem_updations1 - 1;
        $update = $this->Will_Model->set_will_updation_count($will_id,$will_rem_updations);
        if($update){
          unset($_COOKIE['set_update']);
          unset($_COOKIE['will_rem_updations']);
          setcookie('set_update', null, -1, '/');
          setcookie('will_rem_updations', null, -1, '/');
        }
      }
      // else{
      //   unset($_COOKIE['set_update']);
      //   setcookie('set_update', null, -1, '/');
      // }

      $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
      $data['will_info'] = $this->Will_Model->get_will_data($will_id);
      $data['family_info'] = $this->Will_Model->get_family_data($will_id);
      $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
      $data['real_estate_data'] = $this->Will_Model->get_real_estate_data($will_id);
      $data['bank_assets_data'] = $this->Will_Model->get_bank_assets_data($will_id);
      $data['vehicle_assets_data'] = $this->Will_Model->get_vehicle_assets_data($will_id);
      $data['other_gift_data'] = $this->Will_Model->get_other_gift_data($will_id);
      $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
      $data['witness_info'] = $this->Will_Model->get_witness_list($will_id);
      $data['adequate_provision_info'] = $this->Will_Model->get_adequate_provision_list($will_id);

      $this->load->view('pages/will/final_pdf',$data);
    }
    else{
      header('location:'.base_url().'Login');
    }
  }

  public function blur_pdf(){
    $will_id = $this->input->post('will_id');

    $this->Will_Model->set_will_complete($will_id);

    $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
    $data['will_info'] = $this->Will_Model->get_will_data($will_id);
    $data['family_info'] = $this->Will_Model->get_family_data($will_id);
    $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
    $data['real_estate_data'] = $this->Will_Model->get_real_estate_data($will_id);
    $data['bank_assets_data'] = $this->Will_Model->get_bank_assets_data($will_id);
    $data['vehicle_assets_data'] = $this->Will_Model->get_vehicle_assets_data($will_id);
    $data['other_gift_data'] = $this->Will_Model->get_other_gift_data($will_id);
    $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
    $data['witness_info'] = $this->Will_Model->get_witness_list($will_id);
    $data['adequate_provision_info'] = $this->Will_Model->get_adequate_provision_list($will_id);

    $this->load->view('pages/will/blur_pdf',$data);
    // echo $will_id;
  }
}
?>
