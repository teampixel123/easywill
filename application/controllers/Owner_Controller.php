<?php
class Owner_Controller extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->Model('User_Model');
    $this->load->Model('Login_Model');
    $this->load->Model('Will_Model');
    $this->load->helper('string');
  }

  public function owner_dashboard(){
    $this->load->view('pages/owner/owner_dashboard');
  }

  public function will_list(){
    $this->load->view('pages/owner/will_list');
  }
}
?>
