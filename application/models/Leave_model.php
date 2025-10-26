<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_model extends CI_Model {
	
	public function getLeaves($userid){
		$this->db->from('leaves');
		$this->db->order_by('date_generated', 'desc');
		$this->db->where('userid', $userid);
		return $this->db->get()->result();
	}
	public function getLeave($hash){
		$this->db->from('leaves');
		$this->db->order_by('date_generated', 'desc');
		$this->db->where('userid', $_SESSION['userid']);
		$this->db->where('leave_hash', $hash);
		return $this->db->get()->result();
	}

	public function addLeave($data){
		return $this->db->insert('leaves', $data);
	}

	public function getInfo(){
		$this->db->from('users');
		$this->db->join('profiles', 'users.username = profiles.employee_no');
		$this->db->where('users.username', $_SESSION['username']);
		return $this->db->get()->row();
	}

	public function getStaff($hash){
		$this->db->from('users');
		$this->db->join('profiles', 'users.username = profiles.employee_no');
		$this->db->where('users.user_hash', $hash);
		return $this->db->get()->row();
	}

}
