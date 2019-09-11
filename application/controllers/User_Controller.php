<?php
class User_Controller extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }
  public function load_dashboard(){
    header('location:'.base_url().'User-Dashboard');
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

  public function user_profile(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $data['user_details'] = $this->User_Model->user_details($user_id);
      $this->load->view('pages/will_user/user_profile', $data);
    }
    else{
      header('location:'.base_url().'Login');
    }
  }

  public function user_logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'Login');
  }

  public function update_profile(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $update_profile_data = array(
        'user_fullname' => $this->input->post('user_fullname'),
        'user_mobile_number' => $this->input->post('user_mobile_number'),
        'user_email_id' => $this->input->post('user_email_id'),
      );
      $this->User_Model->update_profile($user_id, $update_profile_data);
      $this->session->set_flashdata('is_success','update');
      header('Location:'.base_url().'User-Profile');
    }
    else{
      header('location:'.base_url().'Login');
    }
  }

  public function update_password(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $old_password = $this->input->post('old_password');
      $new_password = $this->input->post('new_password');

      $check_user_password = $this->User_Model->check_user_password($user_id, $old_password);
      if($check_user_password){
        $this->User_Model->update_password($user_id, $new_password);
        $this->session->set_flashdata('is_success','update');
        header('Location:'.base_url().'User-Profile');
      }
      else{
        $this->session->set_flashdata('is_success','delete');
        header('Location:'.base_url().'User-Profile');
      }
    }
    else{
      header('location:'.base_url().'Login');
    }
  }

  public function update_photo(){
    $user_is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($user_is_login && $user_id){
      $old_photo = $this->input->post('old_photo');
      $photo_id = random_string('nozero',8);

      $config['upload_path']="assets/images/will_user";
      $config['allowed_types']='gif|jpg|png';
      $config['file_name']=$user_id.'_'.$photo_id;
      $filename=$_FILES['profile_phto']['name'];
      $ext= pathinfo($filename,PATHINFO_EXTENSION);
      $this->load->library('upload',$config);
      if($this->upload->do_upload("profile_phto")){
        if($old_photo != 'default_profile.png'){
          unlink(base_url().'assets/images/will_user/'.$old_photo);
        }
        // unlink($get_file);
        $data = array('upload_data' => $this->upload->data());
          $update_user = array(
          'profile_phto' =>$data['upload_data']['file_name'],
        );

      }

      echo $data['upload_data']['file_name'];
      // else{
      //   $update_user = array(
      //     'user_fullname'=>$this->input->post('username'),
      //     'user_mobile_number'=>$this->input->post('mobile'),
      //     'user_email_id'=>$this->input->post('email'),
      //   );
      // }
      // $this->User_Model->update_user($update_user,$user_id);

    }
  }

}
?>
