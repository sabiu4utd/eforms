<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslips_model extends CI_Model {
	
	public function getMySlips($limit = 0){
		$this->db->order_by('slip_unixdate', 'desc');
		$this->db->where('ippis_no', $_SESSION['ippis_no']);
		if($limit != 0) $this->db->limit($limit);
		return $this->db->get('staff_slips')->result();
	}
	
	public function getPaySlips(){
		$this->db->order_by('unix_date', 'desc');
		return $this->db->get('staff_payslips')->result();
	}
	
	public function getSlips($hash){
		$this->db->from('staff_slips');
		$this->db->join('staff_payslips', 'staff_payslips.id = staff_slips.payslip_id');
		$this->db->join('staff_finance_info', 'staff_finance_info.ippis_no = staff_slips.ippis_no');
		$this->db->join('staff_profiles', 'staff_profiles.user_id = staff_finance_info.userid');
		$this->db->where('staff_payslips.hash', $hash);
		$this->db->order_by('slip_unixdate', 'desc');
		return $this->db->get()->result();
	}
	
	public function approvePayslip($hash){
		$this->db->set('status', '1');
		$this->db->where('hash', $hash);
		return $this->db->update('staff_payslips');
	}
	
	public function disapprovePayslip($hash){
		$this->db->set('status', '0');
		$this->db->where('hash', $hash);
		return $this->db->update('staff_payslips');
	}
	
	public function deletePayslip($hash){
		$sql = "select staff_payslips.id from staff_payslips WHERE staff_payslips.hash = ?";
		$pid = $this->db->query($sql, [$hash])->row()->id;
		
		$this->db->where('payslip_id', $pid);
        $this->db->delete('staff_slips');
        
        $this->db->reset_query();
        
        $this->db->where('id', $pid);
        $this->db->delete('staff_payslips');
		return true;
	}
	
	public function savePaySlip($data){
        $this->db->replace('staff_payslips', $data);
        $lastid = $this->db->insert_id();
        return $lastid ? $lastid : FALSE;
    }
    
    public function saveSlips($data){
        //var_dump($data); 
        $this->db->where('payslip_id', $data[0]['payslip_id']);
        $this->db->delete('staff_slips');
        $this->db->reset_query();
        return $this->db->insert_batch('staff_slips', $data);
    }

}
