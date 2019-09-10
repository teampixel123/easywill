<?php
class User_Controller extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function dashboard(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $this->session->unset_userdata('will_id');
      $data['user_details'] = $this->User_Model->user_details($user_id);
      $data['will_list'] = $this->User_Model->get_will_list($user_id);
      $this->load->view('pages/will_user/dashboard', $data);
    }
    else{
      header('location:'.base_url().'Login');
    }
  }

  public function user_logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'Login');
  }
}
?>
