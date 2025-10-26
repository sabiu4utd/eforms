<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form_model extends CI_Model {
	public function getFormTypes(){
		return $this->db->where('status', 'active')->get("forms_type")->result();
	}
	public function addStaff($data){
		return $this->db->insert('staff', $data);
	}
	public function getFormsOrderedByAplicant(){
		return $this->db
			->select('prog_abbr, form_type, order_hash, session_applied, payment_status, app_status, admission_status')
			->from('ordered_forms')
			->join('forms_type', 'forms_type.id = form_id')
			->join('programmes', 'ordered_forms.program_id = programmes.id')
			->where('applicant_id', $_SESSION['userid'])
			->order_by('ordered_forms.created_at', 'desc')
			->get()
			->result();
	}
	public function getFormByID($id){
		return $this->db->get_where("forms_type", ['id' => $id])->row();
	}
	public function processOrder($data){
		return $this->db->insert("ordered_forms", $data);
	}
	public function getFormByHash($hash){
		return $this->db
			->select('ordered_forms.id, rrr, jamb_no,nin_verified,  ordered_forms.updated_at, forms_type.fees, ordered_forms.created_at, applicant_id, department.facultyid, form_id, bio_status, payment_status, olevel_status, alevel_status, upload_status, referee_status, order_hash, prog_abbr, faculty, department, form_type, app_status, submission_date')
			->from('ordered_forms')
			->join('forms_type', 'forms_type.id = ordered_forms.form_id')
			->join('programmes', 'program_id = programmes.id')
			->join('department', 'dept_id = department.id')
			->join('faculty', 'facultyid = faculty.id')
			->where('order_hash', $hash)
			->get()
			->row();
	}
}