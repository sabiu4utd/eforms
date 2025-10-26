<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_model extends CI_Model {
	
	public function getCountAllCourses($semester){
		$sql = "select sum(case when status = 'uploaded' then 1 else 0 end) as uploadedCourses, count(id) as offeredCourses from ug_courses where semester = '".$semester."'";
		return $this->db->query($sql)->row();
	}
	
	public function getCountAllCoursesByDept($semester){
		$sql = "select gen_departments.id, gen_departments.dept_name, sum(case when status = 'uploaded' then 1 else 0 end) as uploadedCourses, count(ug_courses.id) as offeredCourses from ug_courses join gen_departments on deptid = gen_departments.id where semester = '".$semester."' group by deptid order by gen_departments.division_id asc, dept_name asc";
		return $this->db->query($sql)->result();
	}
	
	public function getAllSession(){
		$sql = "SELECT * FROM `gen_settings` where setting = 'semester' order by session desc, value desc";
		return $this->db->query($sql)->result();
	}

	public function getResultHistory($uniqueID){
		$sql = "SELECT * from gen_results where studentid = '".$uniqueID."'  order by session desc, semester desc ";
		$res = $this->db->query($sql);
		return $res->result();;
	}

	//from online
	
    public function getSemesterInfo($semester){
		$sql = "SELECT * from gen_settings where id = ".$semester;
        return $this->db->query($sql)->row();
	}
	
    public function getDetails($pnumber){
		$this->db->from('ug_profiles');
		$this->db->join('gen_users', 'gen_users.userid=ug_profiles.user_id');
		$this->db->join('gen_departments', 'deptid=gen_departments.id');
		$this->db->join('gen_programme', 'programid=gen_programme.id');
		$this->db->join('gen_divisions', 'ug_profiles.divisionid=gen_divisions.id');
		$this->db->where('ug_profiles.pnumber', $pnumber);
		return $this->db->get()->row();
	}
	
    public function getMyResultSummary($pnumber){
        $sql = "SELECT settings.id, settings.value, settings.session, ug_creg.level FROM `ug_creg` join ug_courses on ug_courses.id = csid join settings on settings.id = courses.semester where studentid = ".$pnumber." and upload_status = 'uploaded'  group by courses.semester order by settings.session desc, settings.value asc";
        return $this->db->query($sql)->result();
    }
    
    public function getPreviousFailedCourses($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and (ca+exams) < ".$data['passmark']." and semester < ".$data['semester']." order by course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getPreviousPassedCourses($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and (ca+exams) >= ".$data['passmark']." and semester < ".$data['semester']." order by course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getPreviousCGPA($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and semester < ".$data['semester']." order by course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getResultThisSemester($data){
        $sql = "select course_code, credit_unit, course_title, ca, exams, ug_creg.level from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and semester = ".$data['semester']." order by ug_courses.level asc, course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getPrevCOTakenThisSemester($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where ug_creg.level > ug_courses.level and studentid = ".$data['studentid']." and semester = ".$data['semester']." order by ug_courses.level asc, course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getResultToDate($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and semester <= ".$data['semester']." order by ug_courses.level asc, course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getOverallFailedCourses($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and (ca+exams) < ".$data['passmark']." and semester <= ".$data['semester']." order by course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getOverallPassedCourses($data){
        $sql = "select course_code, credit_unit, ca, exams from ug_creg join ug_courses on csid = ug_courses.id where studentid = ".$data['studentid']." and (ca+exams) >= ".$data['passmark']." and semester <= ".$data['semester']." order by course_code asc";
		 return $this->db->query($sql)->result();
    }
    
    public function getResultFor($data){
	    $sql = "SELECT * FROM `ug_creg` join ug_courses on ug_courses.id = csid join settings on settings.id = courses.semester join ug_profiles on ug_profiles.pnumber = studentid where value = '".$data['semester']."' and courses.session = '".$data['session']."' and ug_profiles.deptid = '".$data['deptid']."' order by studentid asc group by studentid";
	    return $this->db->query($sql)->result();
	}
    
    public function getPDFSummary(){
	    $sql = "SELECT session, semester, status, count(studentid) as totalUploads FROM `gen_results` group by session, semester ORDER BY `gen_results`.`session` desc, semester desc";
	    return $this->db->query($sql)->result();
	}
    
    public function getPDFSummaryByDept($data){
		$sql = "select dept_name,gen_results.status,deptid, session, semester, sum(case when length(filename) > 10 then 1 else 0 end) as totalUploads, count(pnumber) as totalStudents from ug_profiles join gen_departments on deptid = gen_departments.id left join gen_results on studentid = pnumber  where session = '".$data['session']."' and semester = '".$data['semester']."' group by deptid order by dept_name asc";
	    return $this->db->query($sql)->result();
	}
    
    public function getPDFSummaryBySelectedDept($deptid){
		$sql = "select dept_name,gen_results.status,deptid, session, semester, count(studentid) as totalStudents from ug_profiles join gen_departments on deptid = gen_departments.id left join gen_results on studentid = pnumber  where deptid = '".$deptid."' group by session, semester order by session desc, semester asc";
	    return $this->db->query($sql)->result();
	}
    
    public function getPDFSummaryForDept($data){
		$sql = "SELECT * from gen_results join ug_profiles on pnumber = studentid join gen_departments on gen_departments.id = deptid where session = '".$data['session']."' and semester = '".$data['semester']."' and deptid = '".$data['deptid']."' order by studentid desc";
	    return $this->db->query($sql)->result();
	}
	
	public function saveResultSlips($data){
        return $this->db->insert_batch('gen_results', $data);
    }
	
	public function dropAll($data){
	    $sql = "SELECT gen_results.id, filename FROM `gen_results` join ug_profiles on pnumber = studentid where deptid = '".$data['deptid']."' and semester = '".$data['semester']."' and session = '".$data['session']."'";
        return $this->db->query($sql)->result();
    }
    
    public function deleteAll($resultids){
	    $sql = "delete from gen_results where id in (".$resultids.")";
        return $this->db->query($sql);
    }

}
