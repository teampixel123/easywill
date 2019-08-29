<?php
class Login_Model extends CI_Model{
  // Check for email id exist or not...
  public function check_mail_id($mail){
    $this->db->select('user_email_id');
    $this->db->from('tbl_user');
    $this->db->where('user_email_id',$mail);
    $query =  $this->db->get();
    $num= $query->num_rows();
    return $num;
  }

  // Check for mobile_no id exist or not...
  public function check_mobile_no($mobile_no){
    $this->db->select('user_mobile_number');
    $this->db->from('tbl_user');
    $this->db->where('user_mobile_number',$mobile_no);
    $query =  $this->db->get();
    $num = $query->num_rows();
    return $num;
  }

  // Get User Data... Datta...
  public function get_user_id_count($user_id){
    $this->db->select('id');
    $this->db->from('tbl_user');
    $this->db->where('user_id',$user_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  // Add new user...
  public function save_register_user($register_data){
    $this->db->insert('tbl_user',$register_data);
  }

  public function validate_login($mob_email,$user_password){
    $this->db->select('*');
    $this->db->from('tbl_user');
    // $this->db->where('user_id =',$user_id);
    $this->db->where('user_password =',$user_password);
    $this->db->where("(user_email_id = '$mob_email' or user_mobile_number = '$mob_email')");
    $query = $this->db->get();
     $last = $this->db->last_query();
    $result = $query->result_array();
    return $result;
  }

}
// Check for email id exist or not...

?>
