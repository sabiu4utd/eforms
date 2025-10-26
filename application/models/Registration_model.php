<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model {
    public function search($parameter){
		$sql = "SELECT ug_profiles.user_id, username, jamb_no, pnumber, surname, firstname, othername, gender, entrymode,  prog_abbr FROM `ug_profiles` join gen_programme on gen_programme.id = ug_profiles.programid join gen_users on gen_users.userid = ug_profiles.user_id where username like '%".$parameter."%' order by programid asc, username asc";
        return $this->db->query($sql)->result();
	}
	public function getAdmissionSessions(){
		$sql = "SELECT session_admitted, count(id) FROM `ug_profiles` group by session_admitted order by session_admitted desc";
        return $this->db->query($sql)->result();
	}
    public function getAdmissionList($session){
		$sql = "SELECT ug_profiles.user_id, username, jamb_no, pnumber, surname, firstname, othername, gender, entrymode,  prog_abbr FROM `ug_profiles` join gen_programme on gen_programme.id = ug_profiles.programid join gen_users on gen_users.userid = ug_profiles.user_id ";
		if($session != "ALL") {
			$sql .= " where session_admitted = '".$session."'";
		}
		$sql .= " order by programid asc, username asc";
        return $this->db->query($sql)->result();
	}
    public function admin_reset_password($userid){
		$sql = "update gen_users set password = md5(left(username, 10)) where userid = ".$userid;
        return $this->db->query($sql);
	}
    public function admin_confirm_admission($userid){
		$sql = "update ug_profiles set confirm_status = 'Confirmed', confirm_date = now() where user_id = ".$userid;
        return $this->db->query($sql);
	}
    public function admin_idCard($userid){
		$sql = "select * from ug_profiles join gen_departments join gen_divisions join gen_programme on ug_profiles.deptid = gen_departments.id and ug_profiles.facultyid = gen_divisions.id and gen_programme.id = ug_profiles.programid where ug_profiles.user_id = ".$userid;
        return $this->db->query($sql)->row();
	}
}