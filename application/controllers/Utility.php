<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utility extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['form_model', 'auth_model', 'utility_model']);
	}

	public function getDepartmentByFacultyID(){
		$facultyid = $this->input->post("facultyid");
		$deprtments = $this->utility_model->getDepartmentByFacultyID($facultyid)

	}
	
}
