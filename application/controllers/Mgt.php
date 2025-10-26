<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mgt extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['mgt_model']); 
        $this->load->library('phpmailer_lib'); 
        $this->load->helper('url');
    }

    public function index() {
        $data = [
            'result' => $this->mgt_model->getAll()
        ];
        $this->load->view("mgt/index", $data);
    }

    public function add() {
        $data = [];

        if ($this->input->post('email')) {
            $email = trim($this->input->post('email'));

            if ($email) {
                $applicant = $this->mgt_model->getApplicantByEmail($email);

                if ($applicant) {
                    $data['applicant'] = $applicant;
                } else {
                    $data['error'] = "No applicant found with the provided email.";
                }
            } else {
                $data['error'] = "Invalid email format.";
            }
        }

        $data['programmes'] = $this->mgt_model->getProgrammes();

        $this->load->view("mgt/add", $data);
    }

    public function assign() {
        $userid = $this->input->post('userid');
        $programid = $this->input->post('programid');
        
        $data = [
            "applicant_id" => $userid,
            "form_id" => 6,
            "program_id" => $programid,
            "session_applied" => "2025/2026",
            "rrr" => '1404' . str_pad(mt_rand(11111111, 99999999), 8, '0', STR_PAD_LEFT),
            "payment_status" => 1,
            "generated_by" => $_SESSION['userid'],
            "order_hash" => md5(time())
        ];
        
        $this->mgt_model->assignForm($data);

        redirect("mgt/index", 'refresh');
    }
    
    public function generateRRR() {
        return '404' . str_pad(mt_rand(111111111, 999999999), 9, '0', STR_PAD_LEFT);
    }

}