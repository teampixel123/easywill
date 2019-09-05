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
}
?>
