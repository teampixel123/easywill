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
  //Update Personal Start Info...
  public function update_start_info($will_id, $start_data_update){
    $this->db->where('will_id', $will_id)
    ->update('tbl_personal_info', $start_data_update);
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
  public function get_real_estate_data($will_id){
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

  public function save_bank_assets_info($bank_assets_data){
    $this->db->insert('tbl_bank_assets',$bank_assets_data);
  }

  public function get_bank_assets_data($will_id){
    $query = $this->db->select('*')
          ->where('will_id',$will_id)
          ->from('tbl_bank_assets')
          ->get();
    $result = $query->result();
    return $result;
  }

  public function update_bank_assets_info($assets_id, $will_id, $bank_assets_data_update){
    $this->db->where('id',$assets_id);
    $this->db->where('will_id',$will_id);
    $this->db->update('tbl_bank_assets',$bank_assets_data_update);
  }

  public function delete_bank_assets($bank_assets_id, $will_id){
    $this->db->where('id',$bank_assets_id);
    $this->db->where('will_id',$will_id);
    $this->db->delete('tbl_bank_assets');
  }
  // Save Vehicle Info..
  public function save_vehicle_assets_info($vehicle_data){
    $this->db->insert('tbl_vehicle',$vehicle_data);
  }
  // Get Vehicle data...
  public function get_vehicle_assets_data($will_id){
    $query = $this->db->select('*')
            ->where('will_id',$will_id)
            ->from('tbl_vehicle')
            ->get();
    $result = $query->result();
    return $result;
  }

  public function update_vehicle_assets_info($vehicle_id, $will_id, $vehicle_data_update){
    $this->db->where('id', $vehicle_id)
    ->where('will_id', $will_id)
    ->update('tbl_vehicle', $vehicle_data_update);
  }

  public function delete_vehicle($vehicle_id, $will_id){
    $this->db->where('id',$vehicle_id);
    $this->db->where('will_id',$will_id);
    $this->db->delete('tbl_vehicle');
  }
  // save Other gift...
  public function save_other_gift_info($other_gift_data){
    $this->db->insert('tbl_other_gift',$other_gift_data);
  }
  // Get Other gift data...
  public function get_other_gift_data($will_id){
    $query = $this->db->select('*')
            ->where('will_id',$will_id)
            ->from('tbl_other_gift')
            ->get();
    $result = $query->result();
    return $result;
  }
  //Update Other Gift...
  public function update_other_gift_info($gift_id, $will_id, $other_gift_data_update){
    $this->db->where('id', $gift_id)
    ->where('will_id', $will_id)
    ->update('tbl_other_gift',$other_gift_data_update);
  }
  // Delete Other Gift...
  public function delete_other_gift($gift_id, $will_id){
    $this->db->where('id', $gift_id)
    ->where('will_id', $will_id)
    ->delete('tbl_other_gift');
  }
  // Save Distribution...
  public function save_distribution($distribution_data){
    $this->db->insert('tbl_distribution',$distribution_data);
  }

  public function get_distribution_percent($estate_id, $will_id, $estate_type){
    $query = $this->db->select('SUM(distribution_percent) as distribution_percent')
            ->where('estate_id', $estate_id)
            ->where('will_id', $will_id)
            ->where('estate_type', $estate_type)
            ->from('tbl_distribution')
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_distribution_list($estate_id, $will_id, $estate_type ){
    $query = $this->db->select('*')
            ->where('estate_id', $estate_id)
            ->where('will_id', $will_id)
            ->where('estate_type', $estate_type)
            ->from('tbl_distribution')
            ->get();
    $result = $query->result();
    return $result;
  }

  // Delete Destribution...
  public function delete_destribution($distribution_id, $will_id){
    $this->db->where('id', $distribution_id)
    ->where('will_id', $will_id)
    ->delete('tbl_distribution');
  }
  // Delete Destribution if assets deleted
  public function delete_destribution_on_assets($real_estate_id, $will_id){
    $this->db->where('estate_id', $real_estate_id)
    ->where('will_id', $will_id)
    ->delete('tbl_distribution');
  }

  //Save Executor...
  public function save_executor_info($executor_data){
    $this->db->insert('tbl_executor', $executor_data);
  }
  // Update Executor
  public function update_executor_info($executor_id, $will_id, $executor_data_update){
    $this->db->where('id', $executor_id)
    ->where('will_id', $will_id)
    ->update('tbl_executor', $executor_data_update);
  }
  //Save Witness...
  public function save_witness_info($witness_data){
    $this->db->insert('tbl_witness', $witness_data);
  }
  // Update Witness...
  public function update_witness_info($witness_id, $will_id, $witness_data_update){
    $this->db->where('id', $witness_id)
    ->where('will_id', $will_id)
    ->update('tbl_witness', $witness_data_update);
  }
  //Save Adequate Provision...
  public function save_adequate_provision_info($adequate_provision_data){
    $this->db->insert('tbl_adequate_provision', $adequate_provision_data);
  }
  // Update Adequate Provision...
  public function update_adequate_provision_info($adequate_provision_id, $will_id, $adequate_provision_data_update){
    $this->db->where('id', $adequate_provision_id)
    ->where('will_id', $will_id)
    ->update('tbl_adequate_provision', $adequate_provision_data_update);
  }
  // Save Date and Place... Update in tbl_will...
  public function save_date_place_info($will_id, $date_place_data){
    $this->db->where('will_id', $will_id)
    ->update('tbl_will', $date_place_data);
  }
  // Get Executor List...
  public function get_executor_list($will_id){
    $query = $this->db->select('*')
            ->where('will_id', $will_id)
            ->from('tbl_executor')
            ->get();
    $result = $query->result();
    return $result;
  }
  // Get Witness List...
  public function get_witness_list($will_id){
    $query = $this->db->select('*')
            ->where('will_id', $will_id)
            ->from('tbl_witness')
            ->get();
    $result = $query->result();
    return $result;
  }
  // Get Adequate Provision List...
  public function get_adequate_provision_list($will_id){
    $query = $this->db->select('*')
            ->where('will_id', $will_id)
            ->from('tbl_adequate_provision')
            ->get();
    $result = $query->result();
    return $result;
  }

  //Delete Other Info...
  public function delete_other_info($will_id, $other_delete_id, $table){
    $this->db->where('id', $other_delete_id)
    ->where('will_id', $will_id)
    ->delete($table);
  }
}
?>
