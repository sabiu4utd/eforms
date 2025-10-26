<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utility_model extends CI_Model {
	
	public function getFaculties($id){
		if($id == 3){
		    $this->db->where("id", 8);
		}elseif($id == 6){
		    $this->db->where("id", 11);
		}elseif($id == 8){
		    $this->db->where("id", 10);
		}elseif($id == 9){
		    $this->db->where("id", 12);
		}
		else {
		    $this->db->where("id !=", 8);
		}
	    return $this->db->get("faculty")->result();
			
	}

	public function getDepartmentByFacultyID($facultyid){
		return $this->db
			->order_by('department', 'asc')
			->get_where("department", ['facultyid' =>$facultyid, 'status'=>'active'])
			->result();
	}

	public function getProgrammeByDeptID($departmentid, $formid){
	    if($formid == 6){
	        return $this->db
			->order_by('program', 'asc')
			->where('dept_id', $departmentid)
			->where('prog_type', 'PUG')
			->get('programmes')
			->result();
	    }else if($formid == 3){
    		return $this->db
    			->order_by('program', 'asc')
			    ->where('prog_type', 'SBS')
    			->get('programmes')
    			->result();
	    }else{
	        return $this->db
    			->order_by('program', 'asc')
			    ->where('dept_id', $departmentid)
    			->get('programmes')
    			->result();
	    }
	}

	public function getSubjects(){
		return $this->db
			->order_by('subject', 'asc')
			->get_where("subjects", ['id > ' => 2])
			->result();
	}
}