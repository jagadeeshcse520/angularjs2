<?php
class Employee_model extends CI_Model {
	public function emp_insert($emp_data) { 
		print_r($emp_data);
		echo "ddddddddddddddddddddddddddddddddd";
		$insertres = $this->db->insert('emp_details', $emp_data); 
		echo $insertres;
		echo $this->db->last_query();
		return $insertres; 
	}
	
	public function emp_list() { 
		$this->db->select('*'); 
		$this->db->from('emp_details');
		$emplistres = $this->db->get();
		//echo $emplistres;
		//echo $this->db->last_query();		
		return $emplistres->result_array();; 
	}
	
	public function edit_employee($id) { 
		$this->db->select('*'); 
		$this->db->from('emp_details');
		$this->db->where('emp_id', $id);
		$editemp = $this->db->get();
		//echo $emplistres;
		//echo $this->db->last_query();
		return $editemp; 
	}
	
	public function update_employee($id,$data){
		  $this->db->where('emp_id', $id);
		  $this->db->update('emp_details',$data);
		  return true;
		
    }
	
	public function delete_employee($id){
		  $this->db->where('emp_id',$id);
		  $this->db->delete('emp_details');
		  echo $this->db->last_query();
		  return true;
		
    }
	
	public function check_login($email,$pwd) { 
		$this->db->select('*'); 
		$this->db->from('emp_details');
		$where="emp_email='".$email."' and pwd='".$pwd."'";
		$this->db->where($where);
		$editemp = $this->db->get();
		//echo $emplistres;
		//echo $this->db->last_query();
		return $editemp; 
	}
	
	public function profile_view() {
		$id = $this->session->userdata('user_id');
		//echo $id;
		$this->db->select('*');
		$this->db->from('emp_details');
		$this->db->where('emp_id',$id);
		$emp_profile_query = $this->db->get();
		//echo $this->db->last_query();
		return $emp_profile_query;
	}
	
	public function country_list() { 
		$this->db->select('country_name, country_id'); 
		$this->db->from('country');
		$countryres = $this->db->get();
		//echo $emplistres;
		//echo $this->db->last_query();
		return $countryres; 
	}
	
	public function state_list($id) { 
		$this->db->select('state_name, state_id, country_id'); 
		$this->db->from('state');
		$this->db->where('country_id', $id);
		$stateres = $this->db->get();
		//echo $emplistres;
		//echo $this->db->last_query();
		return $stateres; 
	}
	
	public function emp_data($emp_id) { 
		$this->db->select('*'); 
		$this->db->from('emp_details');
		$where="emp_id='".$emp_id."'";
		$this->db->where($where);
		$emplistres = $this->db->get();		
		return $emplistres->result_array();; 
	}
}