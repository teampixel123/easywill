<?php
class Pdf_Controller extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Login_Model');
    // $this->load->model('Will_Model');
  }

  public function create_pdf(){
    $will_id = $this->input->post('will_id');
    echo $will_id;
  }
}
?>
