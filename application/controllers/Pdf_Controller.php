<?php
class Pdf_Controller extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Will_Model');
    $this->load->library('Pdf');
    // $this->load->model('Will_Model');
  }

  public function create_pdf(){
    $will_id = $this->input->post('will_id');

    $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
    $data['will_info'] = $this->Will_Model->get_will_data($will_id);

    $this->load->view('pages/will/blur_pdf',$data);
    // echo $will_id;
  }
}
?>
