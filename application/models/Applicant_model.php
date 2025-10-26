<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_model extends CI_Model
{
	public function getBio($id){
		return $this->db
		            ->from('users')
		            ->join('local_governments', 'users.lga_id = local_governments.id', 'left')
		            ->join('states', 'states.id = local_governments.state_id', 'left')
		            ->join('ordered_forms', 'users.id = ordered_forms.applicant_id', 'left')
		            ->where('users.id',  $id)
		            ->get()
		            ->row();
	}
	public function getBioByJAMB($jamb_no){
		return $this->db
		            ->from('jamb_info')
		            ->where('jamb_no',  $jamb_no)
		            ->get()
		            ->row();
	}

	public function getForm($id){
		return $this->db
		            ->from('ordered_forms')
		            ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		            ->join('users', 'users.id = ordered_forms.applicant_id')
		            ->where('form_id',  $id)
		            ->get()
		            ->row();
	}

	public function saveBio($id, $data)
	{
		return $this->db
			->where('id', $id)
			->update('users', $data);
	}

	public function saveNIN($data)
	{
		return $this->db->insert('nin_verifications', $data);
	}

	public function updateTimeline($id, $item, $value){
		return $this->db
			->set($item, $value, true)
			->where('id', $id)
			->where('applicant_id', $_SESSION['userid'])
			->update('ordered_forms');
	}

	public function setPassport($file){
		return $this->db
			->set('passport', $file)
			->where("id", $_SESSION['userid'])
			->update('users');
	}

	public function getOlevel($id){
		return $this->db
			->from('olevels')
			->join('subjects', 'subjects.id = subject_id')
			->where("applicant_id", $id)
			->get()->result();
	}

	public function updateOlevels($data){
		$this->db->where('applicant_id', $data[0]['applicant_id'])->delete('olevels');
		$this->db->reset_query();
		return $this->db->insert_batch('olevels', $data);
	}

	public function getAlevel($id){
		return $this->db->get_where('alevels', ["applicant_id" => $id])->result();
	}

	public function updateAlevels($data){
		return $this->db->insert('alevels', $data);
	}

	public function deleteAlevel($id){
		return $this->db
			->where('id', $id)
			->delete('alevels');
	}

	public function deleteUpload($id){
		return $this->db
			->where('id', $id)
			->delete('uploads');
	}

	public function saveUpload($data){
		return $this->db->insert('uploads', $data);
	}

	public function getUploads($id){
		return $this->db->get_where('uploads', ["applicant_id" => $id])->result();
	}

	public function getStates(){
		return $this->db->where('id > 0')->get('states')->result();
	}

	public function getLGAs($stateid){
		return $this->db->get_where('local_governments', ['state_id' => $stateid])->result();
	}

	public function saveReferee($data){
		return $this->db->insert('referees', $data);
	}

	public function getReferees($id){
		return $this->db->get_where('referees', ["applicant_id" => $id])->result();
	}
	public function deleteReferee($id){
		return $this->db
			->where('id', $id)
			->delete('referees');
	}

	public function updatePaymentStatus($data){
		return $this->db
			->set("payment_status", $data['status'] == "PAID" ? 1 : 0)
			->set("order_hash", $data['orderid'])
			->set("updated_at", date('Y-m-d H:i:s'))
			->where("rrr", $data["rrr"])
			->update('ordered_forms');
	}
	public function genAppNo($app_no){
	    $this->db->where('applicant_id', $this->session->userdata('userid'));
	    $this->db->set('application_number', $app_no);
	    $this->db->set('submission_date', 'now()', false);
	    return $this->db->update('ordered_forms');
	}
	public function biodata($id){
	    $this->db->select('*');
	    $this->db->from('users');
	    $this->db->join('ordered_forms', 'users.id=ordered_forms.applicant_id');
	    $this->db->join('programmes', 'programmes.id = ordered_forms.program_id');
	    $this->db->where('users.id', $id);
	    return $this->db->get()->row();
	}
	public function get_referee_record($ref_id){
	    $this->db->where('referee_hash', $ref_id);
	    return $this->db->get('referees')->row();
	}
	
	public function getSchedule($facultyid, $session){
	    return $this->db
			->from('putme_schedules')
			->join('faculty', 'facultyid = faculty.id')
	        ->where('facultyid', $facultyid)
	        ->where('session', $session)
	        ->get()->row();
	}
	
	
}
