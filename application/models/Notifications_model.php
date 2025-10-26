<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_model extends CI_Model {
	
	public function getNotifications($limit = 0){
		$this->db
            ->from('staff_notifications')
            ->where('status', '1')
            ->group_start()
            ->where('assigned_to', '0')
            ->or_where('assigned_to', $_SESSION['userid'])
            ->group_end()
            ->order_by('date_posted', 'desc');
		if($limit != 0) $this->db->limit($limit);
		return $this->db->get()->result();
	}
	
}