s<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Applicant extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['userid'])) {
			redirect('auth/logout', 'refresh');
		}
		$this->load->model(['form_model', 'applicant_model', 'utility_model', 'auth_model']);
		$this->load->helper(['url', 'form']);
		$this->load->library('phpmailer_lib');
	}
	public function index()
	{
		$_SESSION['pageTitle'] = 'Applicant Welcome .::. University Portal';
		$data = [
			'forms' => $this->form_model->getFormTypes(),
			'myforms' => $this->form_model->getFormsOrderedByAplicant(),
			'referees'=>$this->applicant_model->getReferees($_SESSION['userid'])
		];
		return $this->load->view('applicant/index', $data);
	}

	public function getApplicantInfoByID($id)
	{
		$data = [
			'applicant' => $this->applicant_model->getApplicantInfoByID()
		];
		return $this->load->view('form/edit', $data);
	}

	public function doUpload()
	{
		$config = [
			'upload_path' => "uploads/",
			'allowed_types' => "jpg|JPG|jpeg|JPEG|png|PNG",
			'overwrite' => TRUE,
			'max_size' => "4096000",
			'encrypt_name' => TRUE
		];
		$this->upload->initialize($config);
		if ($this->upload->do_upload('file')) {
			$file_name = $this->upload->data()["file_name"];
			$this->applicant_model->setPassport($file_name);
			$_SESSION['passport'] = $file_name;
			$this->session->set_flashdata('msg', "Passport uploaded successfully");
		} else {
			$this->session->set_flashdata('msg', $this->upload->display_errors());
		}
		redirect('applicant/index', 'refresh');
	}

	public function payment()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}

		unset($_SESSION['activeForm']);
		$_SESSION['activeForm'] = $form;
		$data = [
			'form' => $form,
			'applicant' => $this->applicant_model->getBio($form->applicant_id)
		];

		$this->load->view('applicant/payment', $data);
	}

	public function bio()
	{

		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		if (!$form->payment_status) {
			$this->session->set_flashdata('msg', "Payment status needs to be updated");
			redirect('applicant/payment/' . $hash, 'refresh');
		}

		$_SESSION['activeForm'] = $form;
		$data = [
			'form' => $form,
			'applicant' => $this->applicant_model->getBio($form->applicant_id),
			'states' => $this->applicant_model->getStates()
		];
		//var_dump($data); die;

		$this->load->view('applicant/bio', $data);
	}

    public function saveBio()
	{
		$data = [
			'email' => trim($this->input->post('email')),
			'middlename' => trim($this->input->post('middlename')),
			'gender' => trim($this->input->post('gender')),
			'dob' => trim($this->input->post('dob')),
			'lga_id' => trim($this->input->post('lga')),
			'phone' => trim($this->input->post('phone')),
			'caddress' => trim($this->input->post('caddress')),
			'paddress' => trim($this->input->post('paddress')),
			'nok_name' => trim($this->input->post('nok_name')),
			'nok_relationship' => trim($this->input->post('nok_relationship')),
			'nok_phone' => trim($this->input->post('nok_phone')),
		];
		//var_dump($data); die;
		$res = $this->applicant_model->saveBio($_SESSION['userid'], $data);
		if ($res) {
			$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'bio_status', 1);
			$this->session->set_flashdata('msg', 'Personal updated successfully');
			return redirect('applicant/nin/' . $_SESSION['activeForm']->order_hash, 'refresh');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
			return redirect('applicant/index', 'refresh');
		}
	}

	
	public function nin()
	{

		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		if (!$form->bio_status) {
			$this->session->set_flashdata('msg', "Please update your bio data to proceed");
			redirect('applicant/bio/' . $hash, 'refresh');
		}

		$_SESSION['activeForm'] = $form;
		$info = $this->applicant_model->getBio($form->applicant_id);
		$data = [
			'form' => $form,
			'info' => $info,
			'applicant' => $form->form_id == 2 ? $this->applicant_model->getBioByJAMB($form->jamb_no) : $info
		];

		$this->load->view('applicant/nin', $data);
	}

	public function verifynin()
	{
		$data = [
			'surname' => trim($this->input->post('surname')),
			'middlename' => trim($this->input->post('middlename')),
			'firstname' => trim($this->input->post('firstname')),
			'dob' => trim($this->input->post('dob')),
			'gender' => trim($this->input->post('gender')),
			'nin' => trim($this->input->post('nin')),
			'jamb_no' => trim($this->input->post('jamb_no')) ?? null,
			'user_id' => $_SESSION['userid']
		
		];
		$res = $this->applicant_model->saveNIN($data);
		if ($res) {
			$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'nin_verified', 1);
			$this->session->set_flashdata('msg', 'NIN verified successfully');
			return redirect('applicant/olevel/' . $_SESSION['activeForm']->order_hash, 'refresh');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
			return redirect('applicant/index', 'refresh');
		}
	}

	public function olevel()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}

		if (!$form->nin_verified) {
			$this->session->set_flashdata('msg', "NIN Verification is not completed");
			redirect('applicant/nin/' . $hash, 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'form' => $form,
			'subjects' => $this->utility_model->getSubjects(),
			'olevels' => $this->applicant_model->getOlevel($_SESSION['userid'])
		];
		$this->load->view('applicant/olevel', $data);
	}

	public function saveolevel()
	{
		$subject = $this->input->post('subject');
		$grade = $this->input->post('grade');
		$exam_type = $this->input->post('exam_type');
		$exam_no = $this->input->post('exam_no');
		$center_no = $this->input->post('center_no');
		$exam_year = $this->input->post('exam_year');

		$data = [];
		for ($i = 0; $i < count($subject); $i++) {
			$row = [
				'subject_id' => $subject[$i],
				'grade' => $grade[$i],
				'exam_type' => $exam_type[$i],
				'exam_no' => $exam_no[$i],
				'center_no' => $center_no[$i],
				'exam_year' => $exam_year[$i],
				'applicant_id' => $_SESSION['userid'],
			];
			$data[] = $row;
		}

		$res = $this->applicant_model->updateOlevels($data);
		//var_dump($_SESSION['activeForm']->form_id); exit;

		if ($res) {
			$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'olevel_status', 1);
			$this->session->set_flashdata('msg', 'OLevel updated successfully');
			if($_SESSION['activeForm']->form_id == 1 ){
			return redirect('applicant/alevel/' . $_SESSION['activeForm']->order_hash, 'refresh');
			} else{
			    return redirect('applicant/uploads/' . $_SESSION['activeForm']->order_hash, 'refresh');
			}
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
			return redirect('applicant/olevel/' . $_SESSION['activeForm']->order_hash, 'refresh');
		}
	}

	public function alevel()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		if (!$form->olevel_status) {
			$this->session->set_flashdata('msg', "OLevel status needs to be updated");
			redirect('applicant/olevel/' . $hash, 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'alevels' => $this->applicant_model->getAlevel($_SESSION['userid'])
		];
		$this->load->view('applicant/alevel', $data);
	}

	public function savealevel()
	{
		$data = [
			'institution_name' => trim($this->input->post('institution_name')),
			'graduation_year' => $this->input->post('graduation_year'),
			'qualification' => $this->input->post('qualification'),
			'grade' => $this->input->post('grade'),
			'applicant_id' => $_SESSION['userid']
		];

		$res = $this->applicant_model->updateAlevels($data);

		if ($res) {
			$this->session->set_flashdata('msg', 'ALevel added successfully');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
		}
		return redirect('applicant/alevel/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function save_alevel_progress()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'alevel_status', 1);
		$this->session->set_flashdata('msg', 'ALevel Completed successfully');
		return redirect('applicant/uploads/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function delete_alevel()
	{
		$id = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		$res = $this->applicant_model->deleteAlevel($id);
		if ($res) {
			$this->session->set_flashdata('msg', 'ALevel deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
		}
		return redirect('applicant/alevel/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function delete_upload()
	{
		$id = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		$res = $this->applicant_model->deleteUpload($id);
		if ($res) {
			$this->session->set_flashdata('msg', 'Upload deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
		}
		return redirect('applicant/uploads/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function uploads()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
        if($form->form_id == 1){
		    if (!$form->alevel_status) {
			    $this->session->set_flashdata('msg', "ALevel status needs to be updated");
			    redirect('applicant/alevel/' . $hash, 'refresh');
			} 
		}else if(!$form->olevel_status){
		    $this->session->set_flashdata('msg', "OLevel status needs to be updated");
			redirect('applicant/olevel/' . $hash, 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'uploads' => $this->applicant_model->getUploads($_SESSION['userid'])
		];
		$this->load->view('applicant/uploads', $data);
	}

	public function saveupload()
	{
		$config = [
			'upload_path' => "uploads/",
			'allowed_types' => "jpg|png|JPG|PNG",
			'overwrite' => TRUE,
			'max_size' => 4096000 * 2,
			'encrypt_name' => TRUE
		];
		$this->upload->initialize($config);
		if ($this->upload->do_upload('file_name')) {

			$data = [
				'file_type' => trim($this->input->post('file_type')),
				'year_obtained' => trim($this->input->post('year_obtained')),
				'description' => trim($this->input->post('description')),
				'file_name' => $this->upload->data()["file_name"],
				'applicant_id' => $_SESSION['userid']
			];
			$this->applicant_model->saveUpload($data);
			$this->session->set_flashdata('msg', "Document uploaded successfully");
		} else {
			$this->session->set_flashdata('msg', $this->upload->display_errors());
		}
		return redirect('applicant/uploads/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function save_uploads_progress()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'upload_status', 1);
		$this->session->set_flashdata('msg', 'Document upload Completed successfully');
		if($_SESSION['activeForm']->form_id == 1){
		return redirect('applicant/referees/' . $_SESSION['activeForm']->order_hash, 'refresh');
		} else{
		   return redirect('applicant/submit/' . $_SESSION['activeForm']->order_hash, 'refresh');
		}
	}

	public function referees()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}

		if (!$form->upload_status) {
			$this->session->set_flashdata('msg', "Upload status needs to be updated");
			redirect('applicant/uploads/' . $hash, 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'referees' => $this->applicant_model->getReferees($_SESSION['userid'])
		];
		$this->load->view('applicant/referees', $data);
	}

	public function savereferee()
	{

		$data = [
			'referee_name' => trim($this->input->post('referee_name')),
			'referee_title' => $this->input->post('referee_title'),
			'referee_rank' => $this->input->post('referee_rank'),
			'referee_email' => $this->input->post('referee_email'),
			'referee_phone' => $this->input->post('referee_phone'),
			'applicant_id' => $_SESSION['userid'],
			'referee_hash' => hash('sha512', time() . $_SESSION['userid'] . $this->input->post('referee_email'))
		];
		$res = $this->applicant_model->saveReferee($data);

		if ($res) {
			$this->session->set_flashdata('msg', 'Referee added successfully');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
		}
		return redirect('applicant/referees/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function save_referees_progress()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'referee_status', 1);
		$this->session->set_flashdata('msg', 'Referee added successfully');
		return redirect('applicant/submit/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}



	public function delete_referee()
	{
		$id = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		$res = $this->applicant_model->deleteReferee($id);
		if ($res) {
			$this->session->set_flashdata('msg', 'Referee deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Update Failed, please try again');
		}
		return redirect('applicant/referees/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function submit()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}

		if (!$form->referee_status and $form->form_id == 1) {
		    
			$this->session->set_flashdata('msg', "Referee status needs to be updated");
			if($form->form_id == 1){
			    	redirect('applicant/referees/' . $hash, 'refresh');
			}
		
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'applicant' => $this->applicant_model->getBio($form->applicant_id),
			'olevels' => $this->applicant_model->getOlevel($form->applicant_id),
			'alevels' => $this->applicant_model->getAlevel($_SESSION['userid']),
			'uploads' => $this->applicant_model->getUploads($_SESSION['userid']),
			'referees' => $this->applicant_model->getReferees($form->applicant_id),
			'jamb_info' => $this->auth_model->getUserByJAMB($form->jamb_no)

		];
		$this->load->view('applicant/submit', $data);
	}


    public function submitapp()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

        
		$referees = $this->applicant_model->getReferees($_SESSION['userid']);
		
// 		if($form->form_id == 1){
//     		foreach($referees as $ref){
//     			$subject = "Recommendation Request for " . $ref->referee_name;
//                 $headers = "MIME-Version: 1.0" . "\r\n";
//         		$headers .= 'From: FUBK eForms <pgs@fubk.edu.ng>' . "\r\n";
        
//         		$msg = "Dear " . $ref->referee_title.' '.$ref->referee_name."<br><br><br>You are receiving this email because " . $_SESSION['firstname']." ".$_SESSION['surname'] . " is applying for " .$_SESSION['activeForm']->prog_abbr . " at Federal University Birnin-Kebbi, Nigeria and nominated you as a referee.<br><br>";
//         		$msg .= "We would be extremely obliged if you could kindly take some time from your busy schedule and submit an online recommendation form for the applicant as soon as possible within the next 14 days to be able to process the application further.<br><br>";
//         		$msg .= "To make a recommendation, please follow the link below.<br><br>";
//         		$msg .= "<a href='https://eforms.fubk.edu.ng/auth/ref/".$hash."/".$ref->referee_hash."' style=''padding:7px; width:30px; border:0.5px solid #000 >Complete Reference</a><br><br>";
//         		$msg .= "After entering the recommendation area, please fill in all the necessary information and click <b>Submit</b>.<br><br>If you wish to decline this recommendation request, please visit the link and click Decline at the bottom of the page.<br><br>In case you need to contact the applicant for more information, please feel free to contact through applicant's e-mail: " .$_SESSION['email']."<br><br><br>";
//         		$msg .= "In case you need more information, please feel free to contact us thorugh: pgs@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Admissions Office<br>Deanship of Postgraduate Studies<br>Federal University Birnin-Kebbi<br>Kebbi State, Nigeria<br>";
//         		$msg .="Email: pgs@fubk.edu.ng<br>Website: https://www.fubk.edu.ng/pgs";
    		
//     		    //$mail = mail($ref->referee_email, $subject, $msg, $headers); 
//     		    $mail = $this->phpmailer_lib->initialize();
    		
//         		$mail->Subject = $subject;
//         		$mail->setFrom('pgs@fubk.edu.ng', 'FUBK School of Postgraduate Studies');
//         		$mail->addAddress($ref->referee_email);
//         		$mail->msgHTML($msg);
//         		$mail->AltBody = $msg;
//         		$mail->send();
//     		}
//     	}
		
	    /*
            Generate Application Number
            PG2312050723
            PG: Fixed
            23: Year
            12: Week of the year
            05: Day of the weak
            07: Hour of the day
            23: Minute 
        */
        $date = new DateTimeImmutable();
        
        $app_no = "";
        if($_SESSION['activeForm']->form_id ==1){$app_no = "PG"; }
        if($_SESSION['activeForm']->form_id ==2){$app_no = "PU"; }
        if($_SESSION['activeForm']->form_id ==3){$app_no = "BS"; }
        if($_SESSION['activeForm']->form_id ==6){$app_no = "PT"; }
        
        $app_no .= $date->format('y');
        $app_no .= $date->format('W');
        $app_no .= '0'.$date->format('N');
        $app_no .= $date->format('H');
        $app_no .= $date->format('i');
        $app_no .= $date->format('s');
        
		$this->applicant_model->updateTimeline($_SESSION['activeForm']->id, 'app_status', 1);
		$this->applicant_model->genAppNo($app_no);
		
		$subject = "FUBK e-Forms Notification";
        $headers = "MIME-Version: 1.0" . "\r\n";
// 		$headers .= 'From: FUBK eForms <noreply@fubk.edu.ng>' . "\r\n";

		$msg = "Dear " .  $_SESSION['firstname'].",<br><br><br>Thank you for completing and submitting your application form for " .$_SESSION['activeForm']->prog_abbr . " at Federal University Birnin-Kebbi, Nigeria.<br><br>";
		$msg .= "Your application number is ".$app_no.". Please quote this number in any correspondance with us henceforth.<br><br>";
		$msg .= "In case you need more information, please feel free to contact us thorugh: mis@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Admissions Office";
		$msg .= "<br>Federal University Birnin-Kebbi<br>Kebbi State, Nigeria<br>";
		$msg .="Email: admissions@fubk.edu.ng<br>Website: https://www.fubk.edu.ng";
		
		$msg = str_replace("<br>", "\n", $msg);
		mail($_SESSION['email'], $subject,$msg,$headers);
	
// 	    $mail = $this->phpmailer_lib->initialize();
// 		$mail->Subject = $subject;
// 		$mail->setFrom('pgs@fubk.edu.ng', 'FUBK School of Postgraduate Studies');
// 		$mail->addAddress($_SESSION['email']);
// 		$mail->msgHTML($msg);
// 		$mail->AltBody = $msg;
// 		$mail->send();
		
		$this->session->set_flashdata('msg', 'Application submitted successfully');
		return redirect('applicant/submit/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function print()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'applicant' => $this->applicant_model->getBio($form->applicant_id),
			'olevels' => $this->applicant_model->getOlevel($form->applicant_id),
			'alevels' => $this->applicant_model->getAlevel($_SESSION['userid']),
			'uploads' => $this->applicant_model->getUploads($_SESSION['userid']),
			'referees' => $this->applicant_model->getReferees($form->applicant_id),
			'jamb_info' => $this->auth_model->getUserByJAMB($form->jamb_no),
			'schedule' => $this->applicant_model->getSchedule($form->facultyid, "2023/2024")

		];
		//var_dump($data);
		$this->load->view('applicant/printcpy', $data);
	}

	public function printcpy()
	{
		$hash = $this->uri->segment(3) ? $this->uri->segment(3) : false;

		if (!$hash) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$form = $this->form_model->getFormByHash($hash);
		if (!$form) {
			$this->session->set_flashdata('msg', 'Invalid Form. Please Try Again');
			redirect('applicant/index', 'refresh');
		}
		$_SESSION['activeForm'] = $form;

		$data = [
			'applicant' => $this->applicant_model->getBio($form->applicant_id),
			'olevels' => $this->applicant_model->getOlevel($form->applicant_id),
			'alevels' => $this->applicant_model->getAlevel($_SESSION['userid']),
			'uploads' => $this->applicant_model->getUploads($_SESSION['userid']),
			'referees' => $this->applicant_model->getReferees($form->applicant_id),
			'jamb_info' => $this->auth_model->getUserByJAMB($form->jamb_no),
			'schedule' => $this->applicant_model->getSchedule($form->facultyid, "2023/2024")

		];
		//var_dump($data);
		$this->load->view('applicant/printcpy', $data);
	}


	function checkPaymentStatus()
	{
		$rrr = $this->input->post('rrr', false);
		$formid = $this->input->post('form_id', false);
		$form_hash = $this->input->post('form_hash', false);

		!$rrr or !$formid or !$form_hash ? redirect('applicant/index', 'refresh') : null;

		$MERCHANTID = "578871000";
		$APIKEY = "105948";

		$apiHash = hash('SHA512',  $rrr . $APIKEY . $MERCHANTID);

		$url = "https://login.remita.net/remita/ecomm/578871000/" . $rrr . "/" . $apiHash . "/status.reg";
		$options = [
			'http' => [
				'method'  => 'GET',
				'header' =>  "Content-Type: application/json\r\n" .
					"Accept: application/json\r\n" .
					"Authorization:remitaConsumerKey=" . $MERCHANTID . ",remitaConsumerToken=" . $apiHash
			]
		];

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if (!$result) {
			$this->session->set_flashdata('msg', "Oops!!! Somthing went wrong, Please try Again");
			redirect('applicant/payment/' . $_SESSION['activeForm']->order_hash, 'refresh');
		}
		$result = json_decode($result, true);
        //var_dump($result); die;
		$data = [
			'status' => ($result['status'] == 00 || $result['status'] == 01) ? "PAID" : "PENDING",
			'rrr' => $result['RRR'],
			'orderid' => $result['orderId'],
		];
		
		$this->applicant_model->updatePaymentStatus($data);
		if ($data["status"] == "PAID") {
			$this->session->set_flashdata('msg', "Payment Status Updated Successfully");
		} else {
			$this->session->set_flashdata('msg', "Payment Not PAID");
		}
		redirect('applicant/payment/' . $_SESSION['activeForm']->order_hash, 'refresh');
	}

	public function sendReferenceEmail()
	{
		$data = [
			'data' => [
				'applicant_fullname' => "Tanko Almakura",
				'applicant_email' => "tank@mail.com",
				'applicant_hash' => md5(time())
			]
		];

		$this->load->view('applicant/sendRef', $data);
	}

	public function sendRefEmail($data)
	{

		$subject = "Recommendation Request for " . $data["applicant_fullname"];

		$headers = 'To:' . $data["referee_name"] . '<' . $data["referee_email"] . '>' . "\r\n";
		$headers .= 'From: FUBK Postgraduate School <pgs@fubk.edu.ng>' . "\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
		$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";

		$msg = "<html><head><title>Recommendation Request for " . $data["applicant_fullname"] . "</title><body style='padding:10px; text-align:justify; border:1px solid red'>";
		$msg .= "<div style='display:flex; justify-content:center;'><img style='width:110px' src='" . base_url('assets/images/fubk-icon.png') . "'/></div><br>";
		$msg .= "<div style='display:flex; justify-content:center;font-weight:900'>SCHOOL OF POSTGRADUATE STUDIES<br>FEDERAL UNIVERSITY BIRNIN-KEBBI</div><br><br>";
		$msg .= "<div>Dear " . $data["referee_name"] . ",<br><br>";
		$msg .= "You are receiving this email because " . $data["applicant_fullname"] . " is applying for " . $data["course_applied"] . " at Federal University Birnin-Kebbi, Nigeria and nominated you as a referee.<br><br>";
		$msg .= "We would be extremely obliged if you could kindly take some time from your busy schedule and submit an online recommendation form for the applicant as soon as possible.<br><br>";
		$msg .= "To make a recommendation, please follow the link below:<br><br><br><br>";
		$msg .= "<a href='https://eforms.fubk.edu.ng/referee/submit/." . $data["referee_hash"] . "' style='padding:10px; border:.1px solid darkgray; border-radius:10px; text-decoration:none; outline:none; background-color:#59bdeb; color:#fff'>Complete Reference</a><br><br><br>";

		$msg .= "After entering the recommendation area, please fill in all the necessary information and click “Submit”. If you wish to decline this recommendation request, please visit the link and click Decline at the bottom of the page.<br><br>
		In case you need to contact the applicant for more information, please feel free to contact through applicant's e-mail: <b><u>" . $data["applicant_email"] . ".</b></u><br><br>
		
		
		Thank you.<br><br>
		
		Best regards,<br>
		
		Admissions Office</br>
		Deanship of Postgraduate Studies</br>
		Federal University Birnin-Kebbi</br>
		Kebbi State, Nigeria</br>
		Email: pgs@fubk.edu.ng</br>
		Website: https://www.fubk.edu.ng/pgs  </br></br></br></div>
		<div style='color:red'>Note: We sincerely apologize if you have received this email more than once. Please ignore it if you have already filled the recommendation.<div>";
		$msg .= "</body></html>";
		
		//$msg = str_replace("<br>", "\n", $msg);
		//return mail($data["referee_email"], $subject, $msg, $headers);
		$mail = $this->phpmailer_lib->initialize();
		$mail->Subject = $subject;
		$mail->setFrom('pgs@fubk.edu.ng', 'FUBK School of Postgraduate Studies');
		$mail->addAddress($data["referee_email"]);
		$mail->msgHTML($msg);
		$mail->AltBody = $msg;
		return $mail->send();
	}

        public function reminder(){
            $id = $this->uri->segment(3);
            $ref_id = $this->uri->segment(4);
            $rec = $this->applicant_model->biodata($id);
            $ref = $this->applicant_model->get_referee_record($ref_id);
    
            $subject = "Referee  reminder in respect of " . $rec->firstname." ".$rec->surname;
            $headers = "MIME-Version: 1.0" . "\r\n";
    		$headers .= 'From: FUBK eForms <pgs@fubk.edu.ng>' . "\r\n";
    
    		$msg = "Dear " . $ref->referee_title." ".$ref->referee_name."<br><br><br>You are receiving this email because " . $rec->firstname." ".$rec->surname . " is applying for " .$rec->prog_abbr. " at Federal University Birnin-Kebbi, Nigeria and nominated you as a referee.<br><br>";
    		$msg .= "We would be extremely obliged if you could kindly take some time from your busy schedule and submit an online recommendation form for the applicant as soon as possible within the next 14 days to be able to process the application further.<br><br>";
    		$msg .= "To make a recommendation, please follow the link below.<br><br>";
    		$msg .= "<a href='https://eforms.fubk.edu.ng/auth/ref/".$rec->order_hash."/".$ref->referee_hash."' style=''padding:7px; width:30px; border:0.5px solid #000 >Complete Reference</a><br><br>";
    		$msg .= "After entering the recommendation area, please fill in all the necessary information and click <b>Submit</b>.<br><br>If you wish to decline this recommendation request, please visit the link and click Decline at the bottom of the page.<br><br>In case you need to contact the applicant for more information, please feel free to contact through applicant's e-mail: " .$_SESSION['email']."<br><br><br>";
    		$msg .= "In case you need more information, please feel free to contact us thorugh: pgs@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Admissions Office<br>Deanship of Postgraduate Studies<br>Federal University Birnin-Kebbi<br>Kebbi State, Nigeria<br>";
    		$msg .="Email: pgs@fubk.edu.ng<br>Website: https://www.fubk.edu.ng/pgs";
    		
		
		    //$mail = mail($ref->referee_email, $subject, $msg, $headers); 
		    $mail = $this->phpmailer_lib->initialize();
		    
		
    		$mail->Subject = $subject;
    		$mail->setFrom('pgs@fubk.edu.ng', 'FUBK School of Postgraduate Studies');
    		$mail->addAddress($ref->referee_email);
    		$mail->msgHTML($msg);
    		$mail->AltBody = $msg;
            $mail->send();
            
    		$this->session->set_flashdata('msg', 'Reminder sent Successfully');
    		redirect('applicant/index', 'refresh');
    	
		}
		
		public function getLGA(){
		    $state_id = $_POST['state_id'];
		    $lga = $this->applicant_model->getLGAs($state_id);
		    $res = "";
		    foreach($lga as $row){
		        $res .= "<option value='".$row->id."'>".$row->lga_name."</option>";
		    }
		    echo $res;
		}

	
}
