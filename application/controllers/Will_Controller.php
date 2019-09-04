<?php
  class Will_Controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
    }

    // Load Start Will Page... Datta...
    public function start_will(){
      $this->load->view('pages/will/start_will');
    }
    // Save Will Info and Start Info... Datta...
    public function save_start_info(){
      $login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      $will_id = random_string('nozero',8);
      $flag = 0;
      while($flag==0){
        $will_data = $this->Will_Model->get_will_data($will_id);
        if($will_data){
          $flag = 0;
          $will_id = random_string('nozero',8);
        }
        else{
          $flag = 1;
        }
      }
      $gender = $this->input->post('gender');
      $marital_status = $this->input->post('marital_status');

      if($gender == 'male'){
        $name_title = 'Mr.';
      }
      elseif ($gender == 'female' && ($marital_status == 'Unmarried' || $marital_status == 'Divorcee' || $marital_status == 'Widow' )) {
        $name_title = 'Ms.';
      }
      elseif ($gender == 'female' && $marital_status == 'Married') {
        $name_title = 'Mrs.';
      }

      echo $login;
      echo $user_id;

      $will_date = date('d-m-Y');
      //
      if($login && $user_id){
        $will_data = array(
          'will_user_id' => $user_id,
          'will_id' => $will_id,
          'will_date' => $will_date,
          'date' => $will_date,
          'is_blur' => 'yes',
        );
      }
      else{
        $will_data = array(
          'will_id' => $will_id,
          'will_date' => $will_date,
          'date' => $will_date,
          'is_blur' => 'yes',
        );
      }
      $start_data = array(
        'will_id' => $will_id,
        'name_title' => $name_title,
        'full_name' => $this->input->post('full_name'),
        'gender' => $gender,
        'marital_status' => $marital_status,
        'is_have_child' => $this->input->post('is_have_child'),
        'mobile_no' => $this->input->post('mobile_no'),
        'email' => $this->input->post('email'),
      );

      $this->Will_Model->save_will_data($will_data);
      $this->Will_Model->save_start_info($start_data);

      $this->session->set_userdata('will_start','yes');
      $this->session->set_userdata('will_id',$will_id);

      header('Location:'.base_url().'Persinal-Information');
       // echo $name_title;
    }

    public function personal_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $personal_info = $this->Will_Model->get_personal_data($will_id);
        $data['personal_info'] = $personal_info;
        // echo print_r($personal_info);
        $this->load->view('pages/will/personal_info',$data);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function save_personal_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $personal_data = array(
          'address' => $this->input->post('address'),
          'city' => $this->input->post('city'),
          'pincode' => $this->input->post('pincode'),
          'state' => $this->input->post('state'),
          'country' => $this->input->post('country'),
          'birthdate' => $this->input->post('birthdate'),
          'occupation' => $this->input->post('occupation'),
          'aadhar_no' => $this->input->post('aadhar_no'),
          'pan_no' => $this->input->post('pan_no'),
          'nationality' => $this->input->post('nationality'),
          'religion' => $this->input->post('religion'),
        );
        $this->Will_Model->save_personal_info($will_id,$personal_data);
        header('Location:'.base_url().'Family-Information');
      }
    }

    public function family_information(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $family_info = $this->Will_Model->get_family_data($will_id);
        $data['family_info'] = $family_info;
        // echo print_r($personal_info);
        $this->load->view('pages/will/family_info',$data);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function save_family_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $family_person_age = $this->input->post('family_person_age');
        if($family_person_age < 18){ $is_minar = 'yes'; }
        else{ $is_minar = 'no'; }
        $family_data = array(
          'will_id' => $will_id,
          'relationship' => $this->input->post('relationship'),
          'family_person_name' => $this->input->post('family_person_name'),
          'family_person_dob' => $this->input->post('family_person_dob'),
          'family_person_age' => $family_person_age,
          'guardian_name_title' => $this->input->post('guardian_name_title'),
          'guardian_name' => $this->input->post('guardian_name'),
          'major_age' => $this->input->post('major_age'),
          'is_minar' => $is_minar,
        );

        $this->Will_Model->save_family_info($family_data);
        header('Location:'.base_url().'Family-Information');
      }
    }

    public function update_family_member(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $family_person_age = $this->input->post('family_person_age');
        $member_id = $this->input->post('member_id');
        if($family_person_age < 18){ $is_minar = 'yes'; }
        else{ $is_minar = 'no'; }
        $family_update_data = array(
          'relationship' => $this->input->post('relationship'),
          'family_person_name' => $this->input->post('family_person_name'),
          'family_person_dob' => $this->input->post('family_person_dob'),
          'family_person_age' => $family_person_age,
          'guardian_name_title' => $this->input->post('guardian_name_title'),
          'guardian_name' => $this->input->post('guardian_name'),
          'major_age' => $this->input->post('major_age'),
          'is_minar' => $is_minar,
        );
        $this->Will_Model->update_family_member($member_id, $will_id, $family_update_data);
      }
    }

    public function delete_family_member(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $member_id = $this->input->post('member_id');
        $this->Will_Model->delete_family_member($member_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function assets_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $data['real_estate_data'] = $this->Will_Model->get_real_estate_data($will_id);
        $data['bank_assets_data'] = $this->Will_Model->get_bank_assets_data($will_id);
        $data['vehicle_assets_data'] = $this->Will_Model->get_vehicle_assets_data($will_id);
        $data['other_gift_data'] = $this->Will_Model->get_other_gift_data($will_id);
        $this->load->view('pages/will/assets_info',$data);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function save_real_estate_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $real_estate_data = array(
          'will_id' => $will_id,
          'estate_type' => $this->input->post('estate_type'),
          'estate_number' => $this->input->post('estate_number'),
          'survey_number_type' => $this->input->post('survey_number_type'),
          'survey_number' => $this->input->post('survey_number'),
          'measurement_area' => $this->input->post('measurement_area'),
          'measurement_unit' => $this->input->post('measurement_unit'),
          'real_estate_address' => $this->input->post('real_estate_address'),
          'real_estate_city' => $this->input->post('real_estate_city'),
          'real_estate_pin' => $this->input->post('real_estate_pin'),
          'real_estate_state' => $this->input->post('real_estate_state'),
          'real_estate_country' => $this->input->post('real_estate_country'),
        );
        $this->Will_Model->save_real_estate_info($real_estate_data);
        $this->session->set_flashdata('assets_tab','real');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function update_real_estate_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $real_estate_id = $this->input->post('real_estate_id');
        $real_estate_data_update = array(
          'estate_type' => $this->input->post('estate_type'),
          'estate_number' => $this->input->post('estate_number'),
          'survey_number_type' => $this->input->post('survey_number_type'),
          'survey_number' => $this->input->post('survey_number'),
          'measurement_area' => $this->input->post('measurement_area'),
          'measurement_unit' => $this->input->post('measurement_unit'),
          'real_estate_address' => $this->input->post('real_estate_address'),
          'real_estate_city' => $this->input->post('real_estate_city'),
          'real_estate_pin' => $this->input->post('real_estate_pin'),
          'real_estate_state' => $this->input->post('real_estate_state'),
          'real_estate_country' => $this->input->post('real_estate_country'),
        );
        $this->Will_Model->update_real_estate_info($real_estate_id, $will_id, $real_estate_data_update);
        $this->session->set_flashdata('assets_tab','real');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function delete_real_estate(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $real_estate_id = $this->input->post('real_estate_id');
        $this->Will_Model->delete_real_estate($real_estate_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function save_bank_assets_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $bank_assets_data = array(
          'will_id' => $will_id,
          'account_type' => $this->input->post('account_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'bank_branch' => $this->input->post('bank_branch'),
          'bank_state' => $this->input->post('bank_state'),
          'bank_pin_code' => $this->input->post('bank_pin_code'),
          'fd_recipt_no' => $this->input->post('fd_recipt_no'),
          'sum_assurance_amount' => $this->input->post('sum_assurance_amount'),
          'key_number' => $this->input->post('key_number'),
        );
        $this->Will_Model->save_bank_assets_info($bank_assets_data);
        $this->session->set_flashdata('assets_tab','bank');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function update_bank_assets_info(){
      $will_id = $this->session->userdata('will_id');
      $assets_id = $this->input->post('assets_id');
      if($will_id){
        $bank_assets_data_update = array(
          'account_type' => $this->input->post('account_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'bank_branch' => $this->input->post('bank_branch'),
          'bank_state' => $this->input->post('bank_state'),
          'bank_pin_code' => $this->input->post('bank_pin_code'),
          'fd_recipt_no' => $this->input->post('fd_recipt_no'),
          'sum_assurance_amount' => $this->input->post('sum_assurance_amount'),
          'key_number' => $this->input->post('key_number'),
        );
        $this->Will_Model->update_bank_assets_info($assets_id, $will_id, $bank_assets_data_update);
        $this->session->set_flashdata('assets_tab','bank');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    public function delete_bank_assets(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $bank_assets_id = $this->input->post('bank_assets_id');
        $this->Will_Model->delete_bank_assets($bank_assets_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // Save Vehicle... Datta...
    public function save_vehicle_assets_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $vehicle_data = array(
          'will_id' => $will_id,
          'vehicle_model_name' => $this->input->post('vehicle_model_name'),
          'vehicle_registration_no' => $this->input->post('vehicle_registration_no'),
          'vehicle_make_year' => $this->input->post('vehicle_make_year'),
        );
        $this->Will_Model->save_vehicle_assets_info($vehicle_data);
        $this->session->set_flashdata('assets_tab','vehicle');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // Update Vehicle... Datta...
    public function update_vehicle_assets_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $vehicle_id = $this->input->post('vehicle_id');
        $vehicle_data_update = array(
          'vehicle_model_name' => $this->input->post('vehicle_model_name'),
          'vehicle_registration_no' => $this->input->post('vehicle_registration_no'),
          'vehicle_make_year' => $this->input->post('vehicle_make_year'),
        );
        $this->Will_Model->update_vehicle_assets_info($vehicle_id, $will_id, $vehicle_data_update);
        $this->session->set_flashdata('assets_tab','vehicle');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // Delete Vehicle
    public function delete_vehicle(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $vehicle_id = $this->input->post('vehicle_id');
        $this->Will_Model->delete_vehicle($vehicle_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // save Other gift...
    public function save_other_gift_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $other_gift_data = array(
          'will_id' => $will_id,
          'gift_type' => $this->input->post('gift_type'),
          'gift_description' => $this->input->post('gift_description'),
        );
        $this->Will_Model->save_other_gift_info($other_gift_data);
        $this->session->set_flashdata('assets_tab','other_gifts');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // Update Other Gift...
    public function update_other_gift_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $gift_id = $this->input->post('gift_id');
        $other_gift_data_update = array(
          'gift_type' => $this->input->post('gift_type'),
          'gift_description' => $this->input->post('gift_description'),
        );
        $this->Will_Model->update_other_gift_info($gift_id, $will_id, $other_gift_data_update);
        $this->session->set_flashdata('assets_tab','other_gifts');
        header('Location:'.base_url().'Assets-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }
    // Delete Other Gift...
    public function delete_other_gift(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $gift_id = $this->input->post('gift_id');
        $this->Will_Model->delete_other_gift($gift_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Load Distribution view...
    public function distribution_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $data['real_estate_data'] = $this->Will_Model->get_real_estate_data($will_id);
        $data['bank_assets_data'] = $this->Will_Model->get_bank_assets_data($will_id);
        $data['vehicle_assets_data'] = $this->Will_Model->get_vehicle_assets_data($will_id);
        $data['other_gift_data'] = $this->Will_Model->get_other_gift_data($will_id);
        $this->load->view('pages/will/distribution',$data);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Save Distribution...
    public function save_distribution(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $flashdata = $this->input->post('flashdata');
        $distribution_data = array(
          'will_id' => $will_id,
          'estate_id' => $this->input->post('estate_id'),
          'estate_type' => $this->input->post('estate_type'),
          'distribution_name' => $this->input->post('distribution_name'),
          'distribution_percent' => $this->input->post('distribution_percent')
        );

        $this->Will_Model->save_distribution($distribution_data);
        $this->session->set_flashdata('assets_tab',$flashdata);
        header('Location:'.base_url().'Distribution');
    }
    else{
      header('Location:'.base_url().'');
    }
    }

    // Delete Destribution...
    public function delete_destribution(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $distribution_id = $this->input->post('distribution_id');
        // echo $distribution_id;
        $this->Will_Model->delete_destribution($distribution_id, $will_id);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Other Information View...
    // Executor, Witness, Date & Place...
    public function other_information(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $this->load->view('pages/will/other_info');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

  }
?>
