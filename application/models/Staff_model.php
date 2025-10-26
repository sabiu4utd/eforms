<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff_model extends CI_Model {
	public function getAll(){
		$this->db
			->from('staff_profiles')
			->join('gen_users', 'gen_users.userid = staff_profiles.user_id')
			->join('staff_designations', 'staff_profiles.designation_id = staff_designations.id')
			->order_by('gen_users.username', 'asc');
		return $this->db->get()->result();
	}
	public function addStaff($data){
		return $this->db->insert('staff', $data);
	}
	public function getBasicInfo(){
		return $this->db
		->from('gen_users')
		->join('staff_profiles', 'gen_users.userid = staff_profiles.user_id')
		->join('staff_designations', 'staff_designations.id = staff_profiles.designation_id')
		->join('staff_finances', 'staff_finances.user_id = staff_profiles.user_id')
		->where('gen_users.userid', $_SESSION['userid'])
		->get()
		->row();
	}
	public function getInfo(){
		$res = $this->db
			->from('gen_users')
			->join('staff_profiles', 'gen_users.userid = staff_profiles.user_id')
			->join('staff_designations', 'staff_designations.id = staff_profiles.designation_id')
			->join('staff_finances', 'staff_finances.user_id = staff_profiles.user_id')
			->where('gen_users.userid', $_SESSION['userid'])
			->get()
			->row();
		return $res;
	}
	public function saveEdit($data){
		return $this->db
		    ->where('user_id', $_SESSION['userid'])
		    ->update('gen_contacts', $data);
	}
	public function savePassport($data){
		$this->db->where('user_id', $_SESSION['userid']);
		return $this->db->update('staff_profiles', $data);
	}
	public function getStaff($hash){
		$this->db
			->from('gen_users')
			->join('staff_profiles', 'users.userid = profiles.user_id')
			->where('gen_users.user_hash', $hash);
		return $this->db->get()->row();
	}
	public function getStates(){
		$this->db
			->from('gen_states')
			->order_by('state_name', 'asc');
		return $this->db->get()->result();
	}
	public function getLGAs($stateid){
		$this->db
			->select('id, lga_name')
			->from('gen_local_governments')
			->where('state_id', $stateid)
			->order_by('lga_name', 'asc');
		return $this->db->get()->result();
	}
	public function getBio($staffid){
		$this->db
			->from('gen_users')
			->join('staff_profiles', 'gen_users.userid = staff_profiles.user_id')
			->join('staff_appt_types', 'staff_appt_types.id = staff_profiles.appt_type')
			->join('gen_departments', 'gen_departments.id = staff_profiles.dept_id')
			->join('gen_divisions', 'gen_divisions.id = gen_departments.division_id')
			->join('staff_designations', 'staff_profiles.designation_id = staff_designations.id')
			->where('staff_profiles.user_id', $staffid);
		return $this->db->get()->row();
	}
	public function getContactInfo($staffid){
		$this->db
			->from('gen_contacts')
			->join('gen_states', 'gen_states.stateid = gen_contacts.stateid')
			->join('gen_lgas', 'gen_lgas.id = gen_contacts.lgaid')
			->where('user_id', $staffid);
		return $this->db->get()->row();
	}
	public function getFinInfo($staffid){
		$this->db
			->from('staff_finances')
			->join('staff_banks', 'staff_banks.id = staff_finances.bank_id')
			->join('staff_pension_administrators', 'staff_pension_administrators.id = staff_finances.pfa_admin_id')
			->join('staff_salary_structure', 'staff_salary_structure.id = staff_finances.salary_structure')
			->where('staff_finances.user_id', $staffid);
		return $this->db->get()->row();
	}
	public function getAcadInfo($staffid){
		return $this->db
			->get_where('staff_academic_qualifications', ['userid' => $staffid])
			->result();
	}
	public function staffDistribution(){
	    $sql = 'select gender, employee_type, count(id) as total from staff_profiles group by gender, employee_type order by gender asc, employee_type asc';
	    return $this->db->query($sql)->result();
	}
	public function apptDistribution(){
	    $sql = 'SELECT appointment_type, COUNT(appt_type) as total FROM `staff_profiles` join staff_appt_types on staff_appt_types.id = appt_type group by appt_type order by total desc';
	    return $this->db->query($sql)->result();
	}
	public function facultyDistribution(){
	    $sql = 'select division_name, sum(case when appointment_type = "CONTRACT" then 1 else 0 end) as contract, sum(case when appointment_type = "VISITING" then 1 else 0 end) as visiting, sum(case when appointment_type = "SABBATICAL" then 1 else 0 end) as sabbatical, sum(case when appointment_type = "TENURE" then 1 else 0 end) as tenure, sum(case when gender = "MALE" then 1 else 0 end) as male, sum(case when gender = "FEMALE" then 1 else 0 end) as female, sum(case when employee_type = "JUNIOR STAFF" then 1 else 0 end) as junior, sum(case when employee_type = "SENIOR STAFF" then 1 else 0 end) as senior from staff_profiles join gen_departments on dept_id = gen_departments.id join staff_appt_types on staff_appt_types.id = appt_type join gen_divisions on gen_divisions.id = division_id group by gen_departments.division_id order by division_name asc';
	    return $this->db->query($sql)->result();
	}
}
