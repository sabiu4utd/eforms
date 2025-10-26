<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formapi_model extends CI_Model
{
	public function getFormTypes(){
		return $this->db->get('forms_type')->result();
	}
	
	public function getOrderedForms(){
		return $this->db
		    ->select('email, surname, firstname, middlename, gender, payment_status, app_status, form_type, lga_name, prog_abbr, rrr,order_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->join('ordered_forms', 'ordered_forms.applicant_id = users.id')
		    ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		    ->join('programmes', 'programmes.id = ordered_forms.program_id')
		    ->where('app_status', 1)
		    ->where('form_type', 'PG Form')
		    ->where('session_applied', '2025/2026')
		    ->order_by('program_id', 'asc')
		    ->get()
		    ->result();
	}
	
	public function getOrderedFormsByFormID($id){
		return $this->db
		    ->select('email, surname, firstname, middlename, gender, payment_status, app_status, form_type, prog_abbr, lga_name, rrr, order_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->join('ordered_forms', 'ordered_forms.applicant_id = users.id')
		    ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		    ->join('programmes', 'programmes.id = ordered_forms.program_id')
		    ->where('form_id', $id)
		    ->get()
		    ->row();
	}
	
	public function getOrderedFormsByHash($hash){
		return $this->db
		    ->select('ordered_forms.applicant_id, email, surname, firstname, middlename, gender, payment_status, app_status, lga_name, form_type, prog_abbr,rrr, order_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->join('ordered_forms', 'ordered_forms.applicant_id = users.id')
		    ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		    ->join('programmes', 'programmes.id = ordered_forms.program_id')
		    ->where('order_hash', $hash)
		    ->get()
		    ->row();
	}
	
	public function getApplicantFormByHash($hash){
		return $this->db
		    ->select('application_number, payment_status, app_status, rrr, form_type, prog_abbr, order_hash, lga_name, state_name, admission_status')
		    ->from('users')
		    ->join('ordered_forms', 'users.id = applicant_id')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		    ->join('programmes', 'programmes.id = ordered_forms.program_id')
		    ->where('order_hash', $hash)
		    ->get()
		    ->row();
	}
	
	public function getAllapplicants(){
		return $this->db
		    ->select('email, surname, firstname, state_name, lga_name, middlename, gender, dob, phone, passport, paddress, caddress, nok_name, nok_relationship, nok_phone, user_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->get()
		    ->result();
	}
	
	public function getApplicantByHash($hash){
		return $this->db
		    ->select('email, surname, firstname, state_name, lga_name, middlename, gender, dob, phone, concat("https://eforms.fubk.edu.ng/uploads/",passport) as passport, paddress, caddress, nok_name, nok_relationship, nok_phone, user_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->where('user_hash', $hash)
		    ->get()
		    ->row();
	}
	
	public function getApplicantByID($id){
		return $this->db
		    ->select('email, surname, firstname, state_name, lga_name, middlename, gender, dob, phone, concat("https://eforms.fubk.edu.ng/uploads/",passport) as passport, paddress, caddress, nok_name, nok_relationship, nok_phone, user_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->where('users.id', $id)
		    ->get()
		    ->row();
	}
	
	public function getApplicantForm($id){
		return $this->db
		    ->select('session_applied, form_type, prog_abbr, payment_status, app_status, ordered_forms.created_at, order_hash')
		    ->from('ordered_forms')
		    ->join('forms_type', 'forms_type.id = ordered_forms.form_id')
		    ->join('programmes', 'programmes.id = ordered_forms.program_id')
		    ->where('applicant_id', $id)
		    ->get()
		    ->row();
	}
	
	public function getPaymentByFormID($hash){
		return $this->db
		    ->select('email, surname, firstname, state_name, lga_name, middlename, gender, dob, phone, conact("https://eforms.fubk.edu.ng/uploads/", passport), paddress, caddress, nok_name, nok_relationship, nok_phone, user_hash')
		    ->from('users')
		    ->join('local_governments', 'lga_id = local_governments.id')
		    ->join('states', 'states.id = local_governments.state_id')
		    ->where('user_hash', $hash)
		    ->get()
		    ->row();
	}
	
	public function getFormStats(){
	    $sql = 'select 
	session_applied, program, ordered_forms.program_id, count(ordered_forms.id) as all_forms, 
	sum(case when app_status = 1 then 1 else 0 end) as submitted,
	sum(case when app_status = 1 and gender = "Male"  then 1 else 0 end) as malesubmitted,
	sum(case when app_status = 1  and gender = "Female" then 1 else 0 end) as femalesubmitted,
	sum(case when app_status = 1  and prog_type = "Masters" then 1 else 0 end) as masters,
	sum(case when app_status = 1  and prog_type = "PhD" then 1 else 0 end) as PhD,
	sum(case when app_status = 1  and prog_type = "PGD" then 1 else 0 end) as PGD,
	sum(case when app_status = 0  then 1 else 0 end) as not_submitted,
	sum(case when admission_status = "admitted" and app_status = 1   then 1 else 0 end) as admitted,
	sum(case when admission_status = "admitted" and gender = "Male"   then 1 else 0 end) as maleadmitted,
	sum(case when admission_status = "admitted" and gender = "Female"   then 1 else 0 end) as femaleadmitted,
	sum(case when admission_status = "rejected" and app_status = 1  then 1 else 0 end) as rejected,
	sum(case when admission_status = "pending" and app_status = 1  then 1 else 0 end) as pending
from ordered_forms join programmes on programmes.id = program_id 
join users on users.id = applicant_id where form_id = 1 and session_applied ="2025/2026" group by program_id;';
		return $this->db->query($sql)->result();
	}
	
	public function getFormStatsbs(){
	    $sql = 'select 
	session_applied, program, ordered_forms.program_id, count(ordered_forms.id) as all_forms, 
	sum(case when app_status = 1 then 1 else 0 end) as submitted,
	sum(case when app_status = 1 and gender = "Male"  then 1 else 0 end) as malesubmitted,
	sum(case when app_status = 1  and gender = "Female" then 1 else 0 end) as femalesubmitted,
	sum(case when app_status = 1  and prog_type = "Masters" then 1 else 0 end) as masters,
	sum(case when app_status = 1  and prog_type = "PhD" then 1 else 0 end) as PhD,
	sum(case when app_status = 1  and prog_type = "PGD" then 1 else 0 end) as PGD,
	sum(case when app_status = 0  then 1 else 0 end) as not_submitted,
	sum(case when admission_status = "admitted" and app_status = 1   then 1 else 0 end) as admitted,
	sum(case when admission_status = "admitted" and gender = "Male"   then 1 else 0 end) as maleadmitted,
	sum(case when admission_status = "admitted" and gender = "Female"   then 1 else 0 end) as femaleadmitted,
	sum(case when admission_status = "rejected" and app_status = 1  then 1 else 0 end) as rejected,
	sum(case when admission_status = "pending" and app_status = 1  then 1 else 0 end) as pending
from ordered_forms join programmes on programmes.id = program_id 
join users on users.id = applicant_id where form_id = 3 and session_applied ="2025/2026" group by program_id;';
		return $this->db->query($sql)->result();
	}
	public function getFormStatpt(){
	    $sql = 'select 
	session_applied, program, ordered_forms.program_id, count(ordered_forms.id) as all_forms, 
	sum(case when app_status = 1 then 1 else 0 end) as submitted,
	sum(case when app_status = 1 and gender = "Male"  then 1 else 0 end) as malesubmitted,
	sum(case when app_status = 1  and gender = "Female" then 1 else 0 end) as femalesubmitted,
	sum(case when app_status = 1  and prog_type = "PUG" then 1 else 0 end) as pdeg,
	sum(case when app_status = 1  and prog_type = "Certificate" then 1 else 0 end) as pcert,
	sum(case when app_status = 1  and prog_type = "Diploma" then 1 else 0 end) as pdip,
	sum(case when app_status = 0  then 1 else 0 end) as not_submitted,
	sum(case when admission_status = "admitted" and app_status = 1   then 1 else 0 end) as admitted,
	sum(case when admission_status = "admitted" and gender = "Male"   then 1 else 0 end) as maleadmitted,
	sum(case when admission_status = "admitted" and gender = "Female"   then 1 else 0 end) as femaleadmitted,
	sum(case when admission_status = "rejected" and app_status = 1  then 1 else 0 end) as rejected,
	sum(case when admission_status = "pending" and app_status = 1  then 1 else 0 end) as pending
from ordered_forms join programmes on programmes.id = program_id 
join users on users.id = applicant_id where form_id in (6,8,10) and session_applied ="2025/2026" group by program_id;';
		return $this->db->query($sql)->result();
	}
	
	public function getApplicantOlevel($id){
		return $this->db
		    ->select('exam_type, exam_no, exam_year, center_no, subject, subject_code,subject_short, grade')
		    ->from('olevels')
		    ->join('subjects', 'subjects.id = subject_id')
		    ->where('applicant_id', $id)
		    ->get()
		    ->result();
	}
	
	public function getApplicantAlevel($id){
		return $this->db
		    ->where('applicant_id', $id)
	        ->get('alevels')
	        ->result();
	}
	
	public function getApplicantUploads($id){
		return $this->db
		    ->select('concat("https://eforms.fubk.edu.ng/uploads/", file_name) as file_url, file_type, year_obtained, description')
	        ->where('applicant_id', $id)
	        ->get('uploads')
	        ->result();
	}
	
	public function getApplicantReferees($id){
	return $this->db
	         ->select('*')
	         ->where('applicant_id', $id)
	        ->get('referees')
	            ->result();
	}

	public function getUploads($id){
	    return $this->db
	        ->where('applicant_id', $id)
	        ->get('uploads')
	        ->result();
	}
	
    public function getSbsForms($prog, $status){
        /*
    	    0 - pending
    	    1 - admitted
    	    2 - rejected
    	    3 - all forms
    	 */
        $this->db->from('users')
         ->join('local_governments', 'lga_id = local_governments.id')
    	 ->join('states', 'states.id = local_governments.state_id')
         ->join('ordered_forms', 'users.id = ordered_forms.applicant_id')
         ->join('programmes', 'ordered_forms.program_id = programmes.id')
         ->where('ordered_forms.form_id', 3)
         ->where('ordered_forms.program_id', $prog)
         ->where('ordered_forms.app_status', 1)
         ->where('ordered_forms.session_applied', '2025/2026');
        
        if($status == 0){
            $this->db->where('admission_status', 'pending');
        }else if ($status == 1){
            $this->db->where('admission_status', 'admitted');
        }else if ($status == 2){
            $this->db->where('admission_status', 'rejected');
        }
        
        return $this->db->get()->result();
    }
     public function getParttimeForms($prog, $status){
        /*
    	    0 - pending
    	    1 - admitted
    	    2 - rejected
    	    3 - all forms
    	 */
        $this->db->from('users')
         ->join('local_governments', 'lga_id = local_governments.id')
    	 ->join('states', 'states.id = local_governments.state_id')
         ->join('ordered_forms', 'users.id = ordered_forms.applicant_id')
         ->join('programmes', 'ordered_forms.program_id = programmes.id')
         ->where_in('ordered_forms.form_id', [6,8,9])
         ->where('ordered_forms.program_id', $prog)
         ->where('ordered_forms.app_status', 1)
         ->where('ordered_forms.session_applied', '2025/2026');
        
        if($status == 0){
            $this->db->where('admission_status', 'pending');
        }else if ($status == 1){
            $this->db->where('admission_status', 'admitted');
        }else if ($status == 2){
            $this->db->where('admission_status', 'rejected');
        }
        
        return $this->db->get()->result();
    }
  
    public function getRegisteredOlevel($id){
        return $this->db
            ->select('subject_code as subject, grade')
            ->from('subjects')
            ->join('olevels', 'subjects.id = olevels.subject_id')
            ->where("applicant_id", $id)
            ->get()
            ->result();
    }
	
	public function updateAdmissionStatus($hash, $status){
	    return $this->db
	        ->where('order_hash', trim($hash))
	        ->set('admission_status', trim($status))
	        ->set('admission_date', 'now()', false)
	        ->update('ordered_forms');
	}
	
}
?>