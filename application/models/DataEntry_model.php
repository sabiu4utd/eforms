<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataEntry_model extends CI_Model {
	
	public function getAll(){
		$this->db->from('profiles');
		$this->db->join('users', 'users.employeeID = profiles.employee_no');
		$this->db->order_by('username', 'asc');
		return $this->db->get()->result();
	}

	public function addStaff($data){
		return $this->db->insert('staff', $data);
	}

	public function getInfo(){
		$this->db->from('users');
		$this->db->join('profiles', 'users.employeeID = profiles.employee_no');
		$this->db->join('designations', 'profiles.designation_id = designations.id');
		$this->db->where('users.username', $_SESSION['username']);
		return $this->db->get()->row();
	}

	public function getAllDesignations(){
		$this->db->from('designations');
		$this->db->order_by('designation', 'asc');
		return $this->db->get()->result();
	}

	public function getAllApptTypes(){
		$this->db->from('appt_types');
		$this->db->order_by('appointment_type', 'asc');
		return $this->db->get()->result();
	}

	public function getAllDivisions(){
		$this->db->from('divisions');
		$this->db->order_by('division_name', 'asc');
		return $this->db->get()->result();
	}

	public function getAllDepartments(){
		$this->db->from('departments');
		$this->db->order_by('dept_name', 'asc');
		return $this->db->get()->result();
	}

	public function getAllBanks(){
		$this->db->from('banks');
		$this->db->order_by('bank', 'asc');
		return $this->db->get()->result();
	}

	public function getAllPFAs(){
		$this->db->from('pension_administrators');
		$this->db->order_by('pfa', 'asc');
		return $this->db->get()->result();
	}

	public function getAllSalaryStructures(){
		$this->db->from('salary_structure');
		$this->db->order_by('structure', 'asc');
		return $this->db->get()->result();
	}

	public function getAllDepartmentsByDivision($div_id){
		$this->db->select('id, dept_name');
		$this->db->from('departments');
		$this->db->where('division_id', $div_id);
		$this->db->order_by('dept_name', 'asc');
		return $this->db->get()->result();
	}

	public function getStaff($hash){
		$this->db->from('users');
		$this->db->join('profiles', 'users.employeeID = profiles.employee_no');
		$this->db->where('users.user_hash', $hash);
		return $this->db->get()->row();
	}

	public function getStaffByEmployeeID($employeeID){
		$this->db->from('users');
		$this->db->join('profiles', 'users.id = profiles.userid');
		$this->db->where('users.employeeID', $employeeID);
		return $this->db->get()->row();
	}

	public function updateBio($userid, $data){
		$this->db->where('userid', $userid);
		return $this->db->update('profiles', $data) ? true : false;
	}

	public function updateContact($userid, $data){
		$this->db->where('userid', $userid);
		return $this->db->update('contact_info', $data) ? true : false;
	}

	public function updateEmployment($userid, $data){
		$this->db->where('userid', $userid);
		$result = $this->db->update('profiles', $data) ? true : false;
		return $result;
	}

	public function updateFinance($userid, $data){
		$this->db->where('userid', $userid);
		$result = $this->db->update('finance_info', $data) ? true : false;
		return $result;
	}
}