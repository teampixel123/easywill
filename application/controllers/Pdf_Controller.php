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
