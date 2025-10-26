<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	public function getDashInfo($semid){
        $sql = "SELECT * FROM `gen_settings` where id = '".$semid."' order by id asc";
		return $this->db->query($sql)->row();
	}

	public function getAllSession(){
		$sql = "SELECT * FROM `gen_settings` where setting = 'semester' order by session desc, value desc";
		return $this->db->query($sql)->result();
	}

	public function getAllDepartments(){
        $sql = "SELECT * FROM `gen_departments` order by dept_name asc";
		return $this->db->query($sql)->result();
	}
    

}
