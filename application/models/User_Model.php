<?php
class User_Model extends CI_Model{

  public function user_details($user_id){
    $query = $this->db->select('*')
            ->where('user_id', $user_id)
            ->from('tbl_user')
            ->get();
    $result = $query->result();
    return $result;
  }

  // Get Will List of perticular user...
  public function get_will_list($user_id){
    $this->db->select('*');
    $this->db->from('tbl_will w');
    $this->db->join('tbl_personal_info p','w.will_id = p.will_id','left');
    $this->db->where('w.will_user_id',$user_id);
    $this->db->order_by("FIELD(w.is_blur,'yes','no')",'',TRUE);
    $this->db->order_by("w.id",'DESC');
    $query = $this->db->get();
    //$last = $this->db->last_query();
    $result = $query->result();
    return $result;
  }

  // Update Subscription info in tbl_User...
  public function update_subscription_info($user_id,$subscription_info){
    $this->db->where('user_id', $user_id)
    ->update('tbl_user',$subscription_info);
  }

  // Get Blur Will info by user id
  public function get_blur_will_info($user_id){
    $this->db->select('*');
    $this->db->where('will_user_id',$user_id);
    $this->db->where('is_blur','yes');
    $this->db->from('tbl_will');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function set_user_noblur($user_id,$key){
    $this->db->set('is_have_blur',$key);
    $this->db->where('user_id',$user_id);
    $this->db->update('tbl_user');
  }
  public function set_will_noblur($will_id,$key){
    $this->db->set('is_blur',$key);
    $this->db->where('will_id',$will_id);
    $this->db->update('tbl_will');
  }

  public function update_profile($user_id, $update_profile_data){
    $this->db->where('user_id',$user_id);
    $this->db->update('tbl_user', $update_profile_data);
  }

  public function check_user_password($user_id, $old_password){
    $query = $this->db->select('*')
    ->where('user_id', $user_id)
    ->where('user_password', $old_password)
    ->from('tbl_user')
    ->get();
    $result = $query->result();
    return $result;
  }

  public function update_password($user_id, $new_password){
    $this->db->set('user_password',$new_password);
    $this->db->where('user_id',$user_id);
    $this->db->update('tbl_user');
  }
}
?>
