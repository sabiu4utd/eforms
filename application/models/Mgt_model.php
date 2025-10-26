<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mgt_model extends CI_Model {
	
	public function getAll(){
		//SELECT * FROM `ordered_forms` join users on users.id = ordered_forms.applicant_id where session_applied = '2025/2026';
		$this->db->select('*');
		$this->db->from('ordered_forms');
		$this->db->join('users', 'ordered_forms.applicant_id = users.id');
		$this->db->join('programmes', 'ordered_forms.program_id = programmes.id');
		$this->db->where('session_applied', '2025/2026');
		$this->db->where('form_id', 6);
		return $this->db->get()->result();
	}
	
	public function getApplicantByEmail($email){
		$sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, [$email]);
        return $query->row();
	}
	
	public function getProgrammes(){
	    //$sql = "SELECT * FROM programmes WHERE prog_type = ?";
	      $sql = "SELECT * FROM programmes WHERE prog_type in ('PUG', 'Diploma','Certificate')";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	public function assignForm($data){
	   
        return $this->db->insert('ordered_forms', $data);
	}

	
}
