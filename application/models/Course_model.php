<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Course_model extends CI_Model
{
	public function getCoursesStatusByDept($deptid){
		$sql = "SELECT count(studentid) as regStudents, ug_courses.level, course_code, course_title, credit_unit, ug_courses.hashcode, ug_courses.status, csid from ug_courses left join ug_creg on ug_courses.id = ug_creg.csid where ug_courses.deptid = " . $deptid . " and ug_courses.semester = " . $_SESSION['semester_code'] . " GROUP BY csid order by course_code asc";
		return $this->db->query($sql)->result();
	}
	public function getCourseByID($courseid){
		$sql = "SELECT * from ug_courses join gen_settings on gen_settings.id = semester where ug_courses.id = '" . $courseid . "'";
		return $this->db->query($sql)->row();
	}
	public function getCourseMarksByID($courseid){
		$sql = "SELECT * FROM `ug_creg` left join ug_profiles on studentid = pnumber join gen_programme on gen_programme.id = ug_profiles.programid where csid = '" . $courseid . "' order by ug_profiles.programid asc, studentid asc";
		return $this->db->query($sql)->result();
	}
	public function getMyCourses($data){
		$sql = "SELECT ug_courses.id, course_code, course_title, credit_unit, value, gen_settings.session, ug_courses.status FROM ug_course_allocation join ug_courses on ug_courses.id = ug_course_allocation.csid join gen_settings on gen_settings.id = ug_courses.semester where ug_courses.semester = '".$data['semester']."' and lecturerid = '".$data['lecturerid']."' order by ug_courses.session desc,  ug_courses.semester desc";
		return $this->db->query($sql)->result();
	}
	public function getCourseRegHistory($uniqueID){
		$sql = "SELECT gen_settings.id, sum(ug_courses.credit_unit) as units, ug_creg.level, gen_settings.value, studentid from ug_creg join ug_courses on ug_creg.csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.session where studentid = '" . $uniqueID . "' GROUP by ug_courses.session order by gen_settings.value desc";
		$res = $this->db->query($sql);
		return $res->result();;
	}
	public function getExamsCard($uniqueID){
		$sql = "SELECT ug_creg.level, gen_settings.id, gen_settings.value, gen_settings.session FROM `ug_creg` join ug_courses on csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.semester  where studentid = '" . $uniqueID . "'  group by ug_courses.semester order by gen_settings.id desc ";
		$res = $this->db->query($sql);
		return $res->result();;
	}
	public function getCoursesRegisteredForSession($data){
		$sql = "select ug_courses.course_code,course_title,credit_unit, value,ug_creg.level, gen_settings.session, ug_course_schedule.type  from ug_creg join ug_courses on ug_creg.csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.semester left join ug_course_schedule on ug_course_schedule.courseid = ug_creg.id  where ug_courses.session = '" . $data['session'] . "' and studentid = '" . $data['studentid'] . "' order by  ug_courses.semester asc, ug_courses.level asc,  ug_courses.course_code asc";
		return $this->db->query($sql)->result();
	}
	public function getCoursesRegisteredForSemester($data){
		$sql = "select ug_courses.course_code,course_title,credit_unit, value,ug_creg.level, gen_settings.session, ug_course_schedule.type  from ug_creg join ug_courses on ug_creg.csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.semester left join ug_course_schedule on ug_course_schedule.courseid = ug_courses.id  where ug_courses.semester = '" . $data['semester'] . "' and studentid = '" . $data['studentid'] . "' order by ug_courses.semester,  ug_courses.course_code asc";
		return $this->db->query($sql)->result();
	}
	public function getCoursesRegisteredForSemesterExamsCard($data){
		$sql = "select ug_courses.course_code,course_title,credit_unit, value,ug_creg.level, gen_settings.session  from ug_creg join ug_courses on ug_creg.csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.semester where ug_courses.semester = '" . $data['semester'] . "' and studentid = '" . $data['studentid'] . "' order by ug_courses.semester,  ug_courses.course_code asc";
		return $this->db->query($sql)->result();
	}
	public function getExamsTimetable($data){
		$sql = "SELECT * FROM gen_exams_timetable join ug_courses on ug_courses.course_code = gen_exams_timetable.course_code join ug_creg on ug_creg.csid = ug_courses.id where gen_exams_timetable.semester = '".$data['semester']."' and ug_courses.semester = '".$data['semester']."' and ug_creg.studentid = '".$data['studentid']."'";
		return $this->db->query($sql)->result();
	}
	public function getCourseCodes(){
		$sql = "SELECT DISTINCT(course_code) FROM `ug_courses` order by course_code asc";
		return $this->db->query($sql)->result();
	}
	public function getDetails($pnumber){
		$res = $this->db
		    ->from('ug_profiles')
		    ->join('gen_users', 'gen_users.userid=ug_profiles.user_id')
		    ->join('gen_departments', 'deptid = gen_departments.id')
		    ->join('gen_programme', 'programid = gen_programme.id')
		    ->join('gen_divisions', 'ug_profiles.facultyid = gen_divisions.id')
		    ->where('ug_profiles.pnumber', $pnumber)
		    ->get()->row();
		//echo $this->db->last_query(); die;
		return $res;
	}
    public function getECardCourses($data){
        $sql = "select ug_courses.course_code, ug_courses.course_title, ug_courses.credit_unit, ug_courses.id as id, value, gen_settings.session, ug_creg.level, tt_date, tt_time from ug_creg join ug_courses on csid = ug_courses.id join gen_settings on gen_settings.id = ug_courses.semester left join gen_timetable on gen_timetable.course_code = ug_courses.course_code where ug_courses.semester = '".$data['semester']."' and studentid = '".$data['studentid']."' order by STR_TO_DATE(tt_date,'%d/%m/%Y') asc";
        return $this->db->query($sql)->result();
    }
    public function getECardTimetable($data){
        $sql = "select * from gen_timetable join ug_courses on ug_courses.course_code = gen_timetable.course_code join ug_creg on csid = ug_courses.id where gen_timetable.semester = ug_courses.semester and gen_timetable.semester = '".$data['semester']."' and studentid = '".$data['studentid']."' order by tt_date asc, tt_time asc";
        $res = $this->db->query($sql);
        //echo $this->db->last_query(); die;
		return $res->result();
    }
    public function getFaculties(){
        $sql = "select * from gen_divisions order by division_name asc";
        return $this->db->query($sql)->result();
    }
    public function getDepartmentByFaculty($facultyid){
        $sql = "SELECT * FROM gen_departments where division_id = ? and dtype='Academic' ORDER BY dept_name ASC";
        return $this->db->query($sql, [$facultyid])->result();
    }
    public function getCoursesByFilter($data){
        $sql = "SELECT ug_courses.id, course_code, course_title, credit_unit, value, level, gen_settings.session FROM `ug_courses` join gen_settings on ug_courses.semester = gen_settings.id where deptid = '".$data['deptid']."' and value='".$data['semester']."' and gen_settings.session='".$data['session']."' and level= '".$data['level']."' order by course_code asc";
        return $this->db->query($sql)->result();
    }
    public function generate_ttable($studentid, $semester){
         //$sql = "select * from gen_timetable join ug_courses on ug_courses.course_code = gen_timetable.course_code join ug_creg on csid = ug_courses.id where gen_timetable.semester = ug_courses.semester and gen_timetable.semester = '".$semester."' and studentid = '".$studentid."' and gen_timetable.type in ('LECTURES', 'PRACTICALS')";
         $sql = "select tt_time, tt_date, day_number, csid, ug_courses.id, ug_courses.course_title, gen_timetable.type, gen_timetable.course_code, venue from gen_timetable join ug_courses join ug_creg on gen_timetable.course_code = ug_courses.course_code and ug_courses.id = ug_creg.csid where gen_timetable.semester = ug_courses.semester and studentid = '".$studentid."' and gen_timetable.type in ('LECTURES', 'PRACTICALS') order by day_number asc, tt_time desc";
        $res = $this->db->query($sql);
        //echo $this->db->last_query(); die;
		return $res->result();
    }
}
