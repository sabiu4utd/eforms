<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model {
	
	public function register($data){
		$exists = $this->db->get_where('users', ['email' => $data['email']])->num_rows();
		if($exists == 0){
			$status = $this->db->insert('users', $data);
			return $status ? "success" : "fail";
		}else{
			return "exists";
		}
	}
	public function deregister($data){
		return $this->db->where('email', $data['email'])->delete('users');
		
	}

	public function authenticate($data){
		$result = $this->db->get_where('users', $data);
		if($result->num_rows() == 1){
			$this->db->set('last_login', time(), false);
			$this->db->where('email', $data['email']);
			$this->db->update('users');
			return $result->row();
		}else{
			return false;
		}
	}
	
	public function activateUser($hash){
	    return $this->db
	            ->set('status', 'active')
	            ->where('temp_hash', $hash)
	            ->update('users');
	}

	public function getUser($id){
		$result = $this->db->get_where('users', ['id' => $id]);
		return $result->num_rows() == 1 ? $result->row() : false;
	}

	public function getUserByJAMB($jamb_no){
		$result = $this->db->get_where('jamb_info', ['jamb_no' => $jamb_no]);
		return $result->num_rows() == 1 ? $result->row() : false;
	}

	public function getUserByEmail($email){
		$result = $this->db->get_where('users', ['email' => $email]);
		return $result->num_rows() == 1 ? $result->row() : false;
	}

	public function getUserByHash($hash){
		$result = $this->db->get_where('users', ['temp_hash' => $hash]);
		return $result->num_rows() == 1 ? $result->row() : false;
	}
	public function setResetHash($data){
		$this->db->set('temp_hash', $data['reset_hash']);
		$this->db->where('email', $data['username']);
		return $this->db->update('users');
	}
	public function setPassword($data){
		$this->db->set('password', $data['password']);
		$this->db->where('username', $data['username']);
		return $this->db->update('users');
	}
	public function changeUserPassword($data){
		$this->db->set('password', $data['password']);
		$this->db->where('temp_hash', $data['reset_hash']);
		return $this->db->update('users');
	}
	
	public function getRefereeByHash($hash){
		$result = $this->db->get_where('referees', ['referee_hash' => $hash]);
		return $result->num_rows() == 1 ? $result->row() : false;
	}
	public function getFormByHash($hash){
		$this->db->select('email, surname, firstname,middlename,phone,program');
		$this->db->from('ordered_forms');
		$this->db->join('users', 'ordered_forms.applicant_id = users.id');
		$this->db->join('programmes', 'ordered_forms.program_id = programmes.id');
		$this->db->where('ordered_forms.order_hash', $hash);
		$result = $this->db->get();
		return $result->num_rows() == 1 ? $result->row() : false;
	}
	public function updateRef($data){
		$this->db->set('referee_name', $data['referee_name']);
		$this->db->set('referee_email', $data['referee_email']);
		$this->db->set('referee_phone', $data['referee_phone']);
		$this->db->set('referee_rank', $data['referee_rank']);
		$this->db->where('referee_hash', $data['referee_hash']);
		return $this->db->update('referees');
	}
	public function referee_response($data){
		return $this->db
					->set('did_you_know', $data['did_you_know'])
					->set('Personal_assesment', $data['Personal_assesment'])
					->set('preparation_for_course', $data['preparation_for_course'])
					->set('expression', $data['expression'])
					->set('planning', $data['planning'])
					->set('technical_competence', $data['technical_competence'])
					->set('intellectual_promise', $data['intellectual_promise'])
					->set('motivation', $data['motivation'])
					->set('recommendation', $data['recommendation'])
					->set('permission', $data['permission'])
					->set('completed', 1)
					->where('referee_hash', $data['referee_hash'])
					->update('referees');

		
	}
	
}
