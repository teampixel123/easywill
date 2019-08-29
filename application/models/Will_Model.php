<?php
class Will_Model extends CI_Model{

  // Save will Info... Datta...
  public function save_will_data($will_data){
    $this->db->insert('tbl_will',$will_data);
  }
  //Save Perrsonal start info... Datta...
  public function save_start_info($start_data){
    $this->db->insert('tbl_personal_info',$start_data);
  }
  // Get Will Data... Datta...
  public function get_will_data($will_id){
    $this->db->select('*');
    $this->db->from('tbl_will');
    $this->db->where('will_id',$will_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  // Get Will Data... Datta...
  public function get_personal_data($will_id){
    $this->db->select('*');
    $this->db->from('tbl_personal_info');
    $this->db->where('will_id',$will_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  // save Personal info... Update table... Datta...
  public function save_personal_info($will_id,$personal_data){
    $this->db->where('will_id',$will_id);
    $this->db->update('tbl_personal_info',$personal_data);
  }
  // Save family information... Datta...
  public function save_family_info($family_data){
    $this->db->insert('tbl_family_info',$family_data);
  }
  // Get Family Member List
  public function get_family_data($will_id){
    $query = $this->db->select('*')
    ->from('tbl_family_info')
    ->where('will_id',$will_id)
    ->get();
    $result = $query->result();
    return $result;
  }
  // Update Family Member...
  public function update_family_member($member_id, $will_id, $family_update_data){
    $this->db->where('id',$member_id);
    $this->db->where('will_id',$will_id);
    $this->db->update('tbl_family_info',$family_update_data);
  }
  // Delete Family Mebmber...
  public function delete_family_member($member_id, $will_id){
    $this->db->where('id', $member_id);
    $this->db->where('will_id', $will_id);
    $this->db->delete('tbl_family_info');
  }
  // Save Real Estate
  public function save_real_estate_info($real_estate_data){
    $this->db->insert('tbl_real_estate',$real_estate_data);
  }
  // Get Real Estate Data...
  public function real_estate_data($will_id){
    $query = $this->db->select('*')
            ->where('will_id',$will_id)
            ->from('tbl_real_estate')
            ->get();
    $result = $query->result();
    return $result;
  }
  // Update Real Estate
  public function update_real_estate_info($real_estate_id, $will_id, $real_estate_data_update){
    $this->db->where('id',$real_estate_id);
    $this->db->where('will_id',$will_id);
    $this->db->update('tbl_real_estate',$real_estate_data_update);
  }

  public function delete_real_estate($real_estate_id, $will_id){
    $this->db->where('id', $real_estate_id);
    $this->db->where('will_id', $will_id);
    $this->db->delete('tbl_real_estate');
  }
}
?>
