<?php
  class Will_Controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->model('User_Model');
    }
    // Load Start Will Page... Datta...
    public function start_will_view(){
      $user_is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');

      if($user_is_login && $user_id){
        $will_id = $this->input->post('will_id');
        $is_edit = $this->input->post('is_edit');

        if($will_id && $is_edit){
          $will_rem_updations = $this->input->post('will_rem_updations');
          $this->session->set_userdata('will_id',$will_id);
          setcookie('set_update',$will_id, time() + (86400 * 30), "/");
          setcookie('will_rem_updations',$will_rem_updations, time() + (86400 * 30), "/");
          header('location:'.base_url().'Start-Will');
        }
        else if($will_id && !$is_edit){
          $this->session->set_userdata('will_id',$will_id);
          header('location:'.base_url().'Start-Will');
        }
        else{
          $this->session->unset_userdata('will_id');
          header('location:'.base_url().'Start-Will');
        }
      }
      else{
        $this->session->unset_userdata('will_id');
        header('location:'.base_url().'Start-Will');
      }
    }
    // Load Start Will Page... Datta...
    public function start_will(){
      $user_is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      $will_id = $this->session->userdata('will_id');

      if($user_id && $user_is_login){

        $user_details = $this->User_Model->user_details($user_id);
        foreach ($user_details as $user_details1){
        }

        $is_have_blur = $user_details1->is_have_blur;
        $rem_will = $user_details1->rem_will;
        $user_subscription = $user_details1->user_subscription;
        $rem_updations = $user_details1->rem_updations;
        if($will_id){
          $data['will_start_data'] = $this->Will_Model->get_personal_data($will_id);
        }
        else{
          $data['will_start_data'] = '';
        }

        if($user_subscription == 'yes' && $max_will > 0){
          $this->load->view('pages/will/start_will',$data);
        }
        else if($user_subscription == 'yes' && $rem_updations > 0 && $will_id ){
          $this->load->view('pages/will/start_will',$data);
        }
        else if($is_have_blur == 'no'){
          $this->load->view('pages/will/start_will',$data);
        }
        else if($is_have_blur == 'yes' && $will_id){
          $this->load->view('pages/will/start_will',$data);
        }
        else{
          $this->session->set_flashdata('is_have_blur','yes');
          header('location:'.base_url().'User-Dashboard');
        }
      }
      else{
        $data['will_start_data'] = '';
        $this->load->view('pages/will/start_will',$data);
      }
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

      $will_date = date('d-m-Y');
      // If User is Login...
      if($login && $user_id){

        $user_details = $this->User_Model->user_details($user_id);
        foreach ($user_details as $user) {
          $max_will_old = $user->max_will;
          $rem_will_old = $user->rem_will;
          $complete_will_old = $user->complete_will;
          $rem_updations_old = $user->rem_updations;
          $is_have_blur = $user->is_have_blur;
          $updation_end_date = $user->updation_end_date;
          $user_subscription_type = $user->user_subscription_type;
        }

        if($max_will_old == 0){
          $updation_end_date = '';
          $is_have_blur = 'yes';
          $is_blur = 'yes';
          $max_will = $max_will_old;
          $rem_will = $rem_will_old;
        }
        else{
          $is_have_blur = 'no';
          $is_blur = 'no';
          $max_will = $max_will_old - 1;
          $rem_will = $rem_will_old - 1;
        }
        if($max_will_old > 0 && $user_subscription_type == 'Platinum'){
          $rem_updations = 2;
        }
        else if($max_will_old > 0 && ($user_subscription_type == 'Silver' || $user_subscription_type == 'Gold')){
          $rem_updations = 1;
        }
        else{
          $rem_updations = 0;
        }
        $complete_will = $complete_will_old + 1;

        //update in tbl_user
         $will_count_data = array(
           'complete_will' => $complete_will,
           'is_have_blur' => $is_have_blur,
           'max_will' => $max_will,
         );

        $will_data = array(
          'will_user_id' => $user_id,
          'will_id' => $will_id,
          'will_date' => $will_date,
          'date' => $will_date,
          'will_rem_updations' => $rem_updations,
          'updation_last_date' => $updation_end_date,
          'is_blur' => $is_blur,
        );
        $this->Will_Model->update_will_count($will_count_data,$user_id);
      }
      else{
        $will_data = array(
          'will_id' => $will_id,
          'will_date' => $will_date,
          'date' => $will_date,
          'will_rem_updations' => 0,
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

      header('Location:'.base_url().'Personal-Information');
       // echo $name_title;
    }


    public function update_start_info(){
      $user_is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      $will_id = $this->session->userdata('will_id');
      $will_date = date('d-m-Y');

      if($user_is_login && $user_id && $will_id){
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

        $start_data_update = array(
          'name_title' => $name_title,
          'full_name' => $this->input->post('full_name'),
          'gender' => $gender,
          'marital_status' => $marital_status,
          'is_have_child' => $this->input->post('is_have_child'),
          'mobile_no' => $this->input->post('mobile_no'),
          'email' => $this->input->post('email'),
        );

        $this->Will_Model->update_start_info($will_id, $start_data_update);
        header('Location:'.base_url().'Personal-Information');
      }
      else{
        header('Location:'.base_url().'Login');
      }
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
        $this->session->set_flashdata('is_success','save');
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
        $this->session->set_flashdata('is_success','update');
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
        $this->Will_Model->delete_destribution_on_assets($real_estate_id, $will_id); // Delete destribution also
        $this->session->set_flashdata('is_success','delete');
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
        $this->session->set_flashdata('is_success','save');
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
        $this->session->set_flashdata('is_success','update');
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
        $this->Will_Model->delete_destribution_on_assets($bank_assets_id, $will_id); // Delete destribution also
        $this->session->set_flashdata('is_success','delete');
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
        $this->session->set_flashdata('is_success','save');
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
        $this->session->set_flashdata('is_success','update');
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
        $this->Will_Model->delete_destribution_on_assets($vehicle_id, $will_id); // Delete destribution also
        $this->session->set_flashdata('is_success','delete');
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
        $this->session->set_flashdata('is_success','save');
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
        $this->session->set_flashdata('is_success','update');
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
        $this->Will_Model->delete_destribution_on_assets($gift_id, $will_id); // Delete destribution also
        $this->session->set_flashdata('is_success','delete');
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
          'distribution_name_title' => $this->input->post('distribution_name_title'),
          'distribution_name' => $this->input->post('distribution_name'),
          'distribution_percent' => $this->input->post('distribution_percent')
        );

        $this->Will_Model->save_distribution($distribution_data);
        $this->session->set_flashdata('assets_tab',$flashdata);
        $this->session->set_flashdata('is_success','save');
        header('Location:'.base_url().'Distribution');
    }
    else{
      header('Location:'.base_url().'');
    }
    }
    public function update_distribution(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $flashdata = $this->input->post('flashdata');
        $distribution_id = $this->input->post('distribution_id');
        $distribution_data_update = array(
          'distribution_name_title' => $this->input->post('distribution_name_title'),
          'distribution_name' => $this->input->post('distribution_name'),
          'distribution_percent' => $this->input->post('distribution_percent')
        );
        $this->Will_Model->update_distribution($distribution_id, $will_id, $distribution_data_update);
        $this->session->set_flashdata('assets_tab',$flashdata);
        $this->session->set_flashdata('is_success','update');
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
        $this->session->set_flashdata('is_success','delete');
      }
      else{
        header('Location:'.base_url().'');
      }
    }


/******************************************************************************/
/*********************** Other Information ************************************/
/*********** Executor, Witness, Adequate Provision, Date & Place **************/
/******************************************************************************/

    // Other Information View...
    public function other_information(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $data['executor_info'] = $this->Will_Model->get_executor_list($will_id);
        $data['witness_info'] = $this->Will_Model->get_witness_list($will_id);
        $data['adequate_provision_info'] = $this->Will_Model->get_adequate_provision_list($will_id);
        $data['will_data'] = $this->Will_Model->get_will_data($will_id);
        $this->load->view('pages/will/other_info', $data);
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Save Executor...
    public function save_executor_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $executor_data = array(
          'will_id' => $will_id,
          'executor_name_title' => $this->input->post('executor_name_title'),
          'executor_name' => $this->input->post('executor_name'),
          'executor_address' => $this->input->post('executor_address'),
        );
        $this->Will_Model->save_executor_info($executor_data);
        $this->session->set_flashdata('other_tab','executor');
        $this->session->set_flashdata('is_success','save');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Update Executor
    public function update_executor_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $executor_id = $this->input->post('executor_id');
        $executor_data_update = array(
          'executor_name_title' => $this->input->post('executor_name_title'),
          'executor_name' => $this->input->post('executor_name'),
          'executor_address' => $this->input->post('executor_address'),
        );
        $this->Will_Model->update_executor_info($executor_id, $will_id, $executor_data_update);
        $this->session->set_flashdata('other_tab','executor');
        $this->session->set_flashdata('is_success','update');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Save Witness...
    public function save_witness_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $witness_data = array(
          'will_id' => $will_id,
          'witness_name_title' => $this->input->post('witness_name_title'),
          'witness_name' => $this->input->post('witness_name'),
          'witness_address' => $this->input->post('witness_address'),
        );
        $this->Will_Model->save_witness_info($witness_data);
        $this->session->set_flashdata('other_tab','witness');
        $this->session->set_flashdata('is_success','save');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Update Executor
    public function update_witness_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $witness_id = $this->input->post('witness_id');
        $witness_data_update = array(
          'witness_name_title' => $this->input->post('witness_name_title'),
          'witness_name' => $this->input->post('witness_name'),
          'witness_address' => $this->input->post('witness_address'),
        );
        $this->Will_Model->update_witness_info($witness_id, $will_id, $witness_data_update);
        $this->session->set_flashdata('other_tab','witness');
        $this->session->set_flashdata('is_success','update');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Save Adequate Provision...
    public function save_adequate_provision_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $adequate_provision_data = array(
          'will_id' => $will_id,
          'adequate_provision_name_title' => $this->input->post('adequate_provision_name_title'),
          'adequate_provision_name' => $this->input->post('adequate_provision_name'),
          'adequate_provision_address' => $this->input->post('adequate_provision_address'),
        );
        $this->Will_Model->save_adequate_provision_info($adequate_provision_data);
        $this->session->set_flashdata('other_tab','adequate_provision');
        $this->session->set_flashdata('is_success','save');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Update Adequate Provision
    public function update_adequate_provision_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $adequate_provision_id = $this->input->post('adequate_provision_id');
        $adequate_provision_data_update = array(
          'adequate_provision_name_title' => $this->input->post('adequate_provision_name_title'),
          'adequate_provision_name' => $this->input->post('adequate_provision_name'),
          'adequate_provision_address' => $this->input->post('adequate_provision_address'),
        );
        $this->Will_Model->update_adequate_provision_info($adequate_provision_id, $will_id, $adequate_provision_data_update);
        $this->session->set_flashdata('other_tab','adequate_provision');
        $this->session->set_flashdata('is_success','update');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Save Date and Place... Update in tbl_will...
    public function save_date_place_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $date_place_data = array(
          'will_date' => $this->input->post('will_date'),
          'will_place' => $this->input->post('will_place'),
        );
        $this->Will_Model->save_date_place_info($will_id, $date_place_data);
        $this->session->set_flashdata('other_tab','date_place');
        $this->session->set_flashdata('is_success','save');
        header('Location:'.base_url().'Other-Information');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

    // Delete Other Info
    public function delete_other_info(){
      $will_id = $this->session->userdata('will_id');
      if($will_id){
        $other_delete_id = $this->input->post('other_delete_id');
        $other_delete_type = $this->input->post('other_delete_type');

        if($other_delete_type == 'Executor'){
          $table = 'tbl_executor';
        } else if($other_delete_type == 'Witness'){
          $table = 'tbl_witness';
        } else if($other_delete_type == 'Adequate Provision'){
          $table = 'tbl_adequate_provision';
        }
        $this->Will_Model->delete_other_info($will_id, $other_delete_id, $table);
        $this->session->set_flashdata('is_success','delete');
      }
      else{
        header('Location:'.base_url().'');
      }
    }

  }
?>
