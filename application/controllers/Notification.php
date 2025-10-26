<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
	private $mail = null;

	public function __construct(){
		parent::__construct();
		
		$this->load->library('phpmailer_lib');
	}

	public function index(){
		$this->load->view('notifications/mis_weekly');
	}

	public function sendMail(){
		echo "Sending mail...";
		$mail = $this->phpmailer_lib->initialize();

		try {
			
			$mail->Subject = $this->input->post('subject');
			$mail->setFrom('noreply@fubk.edu.ng', 'FUBK Cloud Identity');
			$mail->addAddress($this->input->post('receipient'));
			$mail->addCC('noreply@fubk.edu.ng');
			$mail->addAttachment('./uploads/fubklogo.jpeg', 'The University Logo');
			$mail->Body    = $this->input->post('msg');
			$mail->AltBody = $this->input->post('msg');

			$mail->send();
			$this->session->set_flashdata('msg', 'Message has been sent');
		} catch (Exception $e) {
			$this->session->set_flashdata('msg', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
		}
		redirect('notification/index', 'refresh');
	}
}
