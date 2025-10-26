<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom_model extends CI_Model {
	
	public function getAll(){
		$this->db->order_by('classname', 'asc');
		return $this->db->get('classrooms')->result();
	}

}
