<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model(['auth_model', 'applicant_model']);
		$this->load->library('phpmailer_lib');
	}

	public function index(){
		redirect("auth/login", 'refresh');
	}

	public function register(){
		$this->load->view("register");
	}
	public function login()
	{
		$_SESSION['pageTitle'] = 'eForms Welcome';
		return $this->load->view('login');
	}
	
	public function testMail(){
	    return $this->sendMail();
	}
	
	public function sendMail(){
	   // $data['email'] = "abdulhakeembrhm@gmail.com";
	    
	    $subject = "Account Activation Email";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        // $headers .= "From: FUBK eForms Portal <mis@fubk.edu.ng>\r\n";
        // $headers .= "Reply-To: mis@fubk.edu.ng\r\n";

		$msg = "Dear Hakeem,\n\n\nYou are receiving this email because you created an account on the e-Forms portal of Federal University Birnin-Kebbi, Nigeria.\n\n";
		$msg .= "To activate your account, please follow the link below\n\n";
		$msg .= "https://eforms.fubk.edu.ng/auth/activate/".md5(time())."\n\n";
		$msg .= "In case you need more information, please feel free to contact us thorugh: mis@fubk.edu.ng\n\nThank you.\n\nBest regards,\n\n\n\nCloud ID Unit\nManagement Information Systems Directorate\nFederal University Birnin-Kebbi\nKebbi State, Nigeria\n";
		$msg .="Email: mis@fubk.edu.ng\nWebsite: https://www.fubk.edu.ng/mis";
		
		$mail = mail($data["email"], $subject, $msg, $headers);
		var_dump($mail); die;
	}
	
	public function signup()
	{
		if ($this->input->post('password') != $this->input->post('cpassword')){
			$this->session->set_flashdata('msg', 'Password mismatch');
			redirect('auth/register', 'refresh');
		}

        $hash = hash('sha512', time());
		$data = [
			'email' => $this->input->post('email'),
			'firstname' => $this->input->post('firstname'),
			'surname' => $this->input->post('surname'),
			'dob' => $this->input->post('dob'),
			'gender' => $this->input->post('gender'),
			'password' => hash('sha512', $this->input->post('password')),
			'user_hash' => $hash,
			'temp_hash' => md5($hash),
			'hash_generated' => 'now()'
		];
		$response = $this->auth_model->register($data);
		
		$subject = "Account Activation Email for " . $data["firstname"];

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        // $headers .= "From: FUBK eForms Portal <mis@fubk.edu.ng>\r\n";
        // $headers .= "Reply-To: mis@fubk.edu.ng\r\n";

		$msg = "Dear " . $data["firstname"]."<br><br><br>You are receiving this email because you created an account on the e-Forms portal of Federal University Birnin-Kebbi, Nigeria.<br><br>";
		$msg .= "To activate your account, please follow the link below<br><br>";
		$msg .= "https://eforms.fubk.edu.ng/auth/activate/". $data['temp_hash'] . "<br><br>";
		$msg .= "In case you need more information, please feel free to contact us thorugh: mis@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Cloud ID Unit\nManagement Information Systems Directorate\nFederal University Birnin-Kebbi\nKebbi State, Nigeria\n";
		$msg .="Email: mis@fubk.edu.ng\nWebsite: https://www.fubk.edu.ng/mis";
		
		$msg = str_replace("<br>", "\n", $msg);
		$mail = mail($data["email"], $subject, $msg, $headers);
		//var_dump($mail); die;
	//	$mail = $this->phpmailer_lib->initialize();
		
		
// 		$mail->Subject = $subject;
// 		$mail->setFrom('noreply@fubk.edu.ng', 'FUBK Cloud Identity');
// 		$mail->addAddress($data["email"]);
// 		$mail->msgHTML($msg);
// 		$mail->AltBody = $msg;
// 		$mail->send();
        
        //var_dump($mail); die;
        
		if($response == "success" && $mail){
			$this->session->set_flashdata('msg', 'Account created. Please check your email (including spam/junk) to activate your account');
			redirect('auth/login', 'refresh');
		}else if($response == "exists"){
			$this->session->set_flashdata('msg', "Account already exists with these credentials. Try resetting password");
			$response = $this->auth_model->deregister($data);
		}else {
		    
			$this->session->set_flashdata('msg', "Something went wrong. Try again");
		}
		redirect('auth/register', 'refresh');
	}
	
	public function authenticate(){
		//echo "Yes"; die;
		$secretKey = "6Lc-pgseAAAAAFwC1zhb-009eLUfx2balnWnfoSp";
		$token = trim($this->input->post('g-token'));
		$ip = $this->input->ip_address();
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $token . "&remoteip=" . $ip;
		$verification = json_decode(file_get_contents($url));
		if (isset($verification->success) && $verification->success == true) {
			$data = [
				'email' => trim($this->input->post('email')),
				'password' => hash('sha512', trim($this->input->post('password')))
			];
			
			$result = $this->auth_model->authenticate($data);
			//var_dump($result); die;
			if ($result) {
				$_SESSION['loginStatus'] = true;
				$_SESSION['email'] = $result->email; 
				$_SESSION['theme_mode'] = '  offcanvas-active ';
				$_SESSION['schoolName'] = "Central eForms University Portal - FUBK";
				$_SESSION['shortName'] = "FUBK eForms Portal";
				$_SESSION['last_activity'] = $_SERVER['REQUEST_TIME'];
				$_SESSION['userid'] = $result->id;
				$_SESSION['user_hash'] = $result->user_hash;
				$_SESSION['firstname'] = $result->firstname;
				$_SESSION['surname'] = $result->surname;
				$_SESSION['passport'] = $result->passport;
				$_SESSION['accountStatus'] = $result->status;
				
				$url = "applicant/index";
				$_SESSION['home_url'] = $url;
				return redirect($url, 'refresh');
			} else {
				$this->session->set_flashdata('msg', 'Invalid Username/Password');
				return redirect('auth/login', 'refresh');
			}
		}else{
			$this->session->set_flashdata('msg', 'Security Captcha Failed. Please try again');
			return redirect('auth/login', 'refresh');
		}
	}
	public function lock_screen()
	{
		if (!isset($_SESSION['username'])) {
			redirect('auth/logout', 'refresh');
		}
		$_SESSION['pageTitle'] = 'Lock Screen .::. FUBK-University Portal';
		$data = [];
		return $this->load->view('lock', $data);
	}
	public function reset()
	{
		$_SESSION['pageTitle'] = 'Reset Password .::. FUBK-University Portal';
		return $this->load->view('reset');
	}
	public function activate()
	{
		$hash = $this->uri->segment(3);
		$this->auth_model->activateUser($hash);
		$this->session->set_flashdata('msg', 'Account Activated Successfully');
		return redirect('auth/login', 'refresh');
	}
	public function resetPassword()
	{
		$_SESSION['pageTitle'] = 'Reset Password .::. FUBK-University Portal';
		$hash = $this->uri->segment(3, false);
		$user = $this->auth_model->getUserByHash($hash);
		if ($user) {
			$_SESSION['resetUserID'] = $user->email;
			$this->session->set_flashdata('msg', 'Please provide a secure password below');
			return $this->load->view('change_password', ['resetHash' => $hash]);
		} else {
			$this->session->set_flashdata('msg', 'Invalid Request Link. Please Try Again');
			return redirect('auth/login', 'refresh');
		}
	}
	public function changepass()
	{
	    
		$hash = $this->input->post('resetHash');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		if ($password != $cpassword) {
			$this->session->set_flashdata('msg', 'Password Mismatch. Please Try Again');
			return $this->load->view('change_password', ['resetHash' => $hash]);
		} else {
			$data = [
				'reset_hash' => $hash,
				'password' => hash('sha512', $password)
			];
			$user = $this->auth_model->changeUserPassword($data);
			$this->session->set_flashdata('msg', 'Password Changed Successfully. Please Login');
			return redirect('auth/login', 'refresh');
		}
	}
	public function resspswd()
	{
		$username = $_SESSION['username'];
		$hash = hash('sha512', $username . date('YmdHis') . rand());
		$this->auth_model->setResetHash(['reset_hash' => $hash, 'username' => $username]);
		$_SESSION['resetUserID'] = $username;
		return $this->load->view('change_password', ['resetHash' => $hash]);
	}
	public function resetpass()
	{
		$username = trim($this->input->post('username'));
		/*if (!(substr($username, strpos($username, 'fubk.edu.ng')) == "fubk.edu.ng")) {
			$this->session->set_flashdata('msg', 'Only Registred University Emails are Allowed');
			return redirect('auth/reset', 'refresh');
		}*/
		$user = $this->auth_model->getUserByEmail($username);
		
		if($user){
		    $hash = hash('sha512', time().$username.rand());
		    $this->auth_model->setResetHash(['reset_hash' => $hash, 'username' => $username]);
		
    		$subject = "Password reset for " . $user->firstname;
    		
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    		$msg = "Dear " . $user->firstname."<br><br><br>You are receiving this email because you requested for password reset on the e-Forms portal of Federal University Birnin-Kebbi, Nigeria.<br><br>";
    		$msg .= "To reset your account, please follow the link below<br><br>";
    		$msg .= "https://eforms.fubk.edu.ng/auth/resetpassword/". $hash. "<br><br>";
    		$msg .= "In case you did not request for this, contact us immediately via: mis@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Cloud ID Unit<br>Management Information Systems Directorate<br>Federal University Birnin-Kebbi<br>Kebbi State, Nigeria<br>";
    		$msg .="Email: mis@fubk.edu.ng<br>Website: https://www.fubk.edu.ng/mis";
    		
    		$msg = str_replace("<br>", "\n", $msg);
    		$mail = mail($user->email, $subject, $msg, $headers);
    		
		}
		
		$this->session->set_flashdata('msg', 'If the details are correct, we have sent a reset link to your registered email address. Please check your email to proceed');
		return redirect('auth', 'refresh');
	}
	public function activateacct()
	{
		$username = $this->input->post('sims_username');
		if (!(substr($username, strpos($username, '.fubk')) == ".fubk.edu.ng")) {
			$this->session->set_flashdata('msg', 'Only Registred University Emails are Allowed');
			return redirect('auth/reset', 'refresh');
		}
		$this->auth_model->setResetHash(['reset_hash' => hash('sha512', $username . date('YmdHis') . rand()), 'username' => $username]);
		$user = $this->auth_model->getUserByEmail($username);
		if ($user) {
			$odds = array("0", "o", "O", "i", "I", "1", "C", "c", "J", 'j');
			$password = hash('sha512', date("YmdHis") . $user->username . $user->user_hash);
			$password = str_replace($odds, "", $password);
			$password = substr($password, rand(0, 8), 8);
			$msg = "<h1>MIS IT Account</h1><br>";
			$msg = "<h2>PRIVATE AND CONFIDENTIAL</h2><br><br><br>";
			$msg = "Hello " . trim(ucfirst(strtolower($user->firstname))) . ",<br><br>";
			$msg .= "You have requested to activate your access to the Staff Portal. Your login details are as below: <br><br><br>";
			$msg .= "<em>Username:</em> " . $username . "<br>";
			$msg .= "<em>Password:</em> " . $password . "<br><br><br>";
			$msg .= "Visit <a target='_blank' href='https://staffportal.fubk.edu.ng'>https://staffportal.fubk.edu.ng</a> to login with these details. ";
			$msg .= "At the first opportunity, you must change your password by logging in to <a target='_blank' href='https://staffportal.fubk.edu.ng/auth/resetPassword/" . $user->password_reset_hash . "'>Password Reset</a>. ";
			$msg .= "Disclosing your network account login and password is a serious breach of University security policies and could result in disciplinary procedures.";
			$msg .= "<br><br><br>Kind regards,<br>Cloud Identity Unit<br>E: mis@fubk.edu.ng";
			try {
				// $mail = $this->phpmailer_lib->initialize();
				// $mail->Subject = "FUBK Human Resource";
				// $mail->setFrom('noreply@fubk.edu.ng', 'Password Reset Manager');
				// $mail->addAddress($user->username);
				// $mail->Body    = $msg;
				// $mail->AltBody = $msg;
				// $mail->send();
				$data = [
					'password' => hash('sha512', $password),
					'username' => $user->username
				];
				$this->auth_model->setPassword($data);
			} catch (Exception $e) {
				log_message('error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
			}
		}
		$this->session->set_flashdata('msg', 'If the details are correct, we have sent an activate email to your registered email address. Please check your email to proceed');
		return redirect('auth/activate', 'refresh');
	}
	public function change_theme()
	{
		$_SESSION['theme_mode'] = ($_SESSION['theme_mode'] == "dark-mode offcanvas-active") ? " offcanvas-active " :  "dark-mode offcanvas-active";
		redirect($this->uri->segment(3) . '/' . $this->uri->segment(4), 'refresh');
	}
	public function logout()
	{
		$_SESSION['pageTitle'] = 'Please Login .::. FUBK-University Portal';
		$this->session->set_flashdata('msg', 'Logout Successful, Bye!');
		$_SESSION['loginStatus'] = false;
		$_SESSION['userid'] = false;
		$_SESSION['msg'] = false;
		unset($_SESSION);
		session_destroy();
		redirect('auth/login', 'refresh');
	}
	
	public function send_activation_link(){
	    $result =  $this->applicant_model->getBio($_SESSION['userid']);
	   // var_dump($_SESSION); die;
	    $subject = "Account Activation Email for " . $result->firstname;
        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= 'From: FUBK eForms <pgs@fubk.edu.ng>' . "\r\n";

		$msg = "Dear " . $result->firstname."<br><br><br>You are receiving this email because you created an account on the e-Forms portal of Federal University Birnin-Kebbi, Nigeria.<br><br>";
		$msg .= "To activate your account, please follow the link below<br><br>";
		$msg .= "https://eforms.fubk.edu.ng/auth/activate/". md5($result->user_hash) . "<br><br>";
		$msg .= "In case you need more information, please feel free to contact us thorugh: mis@fubk.edu.ng<br><br>Thank you.<br><br>Best regards,<br><br><br>Cloud ID Unit\nManagement Information Systems Directorate\nFederal University Birnin-Kebbi\nKebbi State, Nigeria\n";
		$msg .="Email: mis@fubk.edu.ng\nWebsite: https://www.fubk.edu.ng/mis";
		
		$msg = str_replace("<br>", "\n", $msg);
		$mail = mail($result->email, $subject, $msg, $headers);
		if($mail){ $this->session->set_flashdata('msg', "Please check your Email to activate your account"); redirect('auth/login', 'refresh'); }
		
	}
		public function ref(){
		$referee_hash = $this->uri->segment(4);
		$form_hash = $this->uri->segment(3);
		$referee = $this->auth_model->getRefereeByHash($referee_hash);
		$form = $this->auth_model->getFormByHash($form_hash);
		$data = ['form'=>$form, 'referee'=>$referee];
		//var_dump($data); exit;
		$this->load->view("ref_details", $data);
	}
	public function referee_update(){
		if(isset($_POST['decline'])){
			echo "<script>alert('Thank you for your time');</script>";
			$headers = 'From: FUBK eForms <pgs@fubk.edu.ng>' . "\r\n";
			$subject ="FUBK Postgraduate Application Referee Response";
			$msg ="Hi,".$this->input->post('firstname')." This is to notify you that ".$this->input->post('referee_name')." has declined your refree request and therefore you may login to you account and send another refree request to different person. Thank you";
			$mail = mail($_POST['email'], $subject, $msg, $headers);
			if($mail){
				redirect('auth/login', 'refresh');
				$this->session->set_flashdata("Thank you for your time, Good Bye");
			}

		}else {
			$data = $_POST;
			$result = $this->auth_model->updateRef($data);
			if($result){
				$data = array('refree_hash'=>$_POST['referee_hash']);
				$this->load->view("referee_form", $data);
			} 
		}
	}
	public function referee_report(){
		if($this->auth_model->referee_response($_POST)){
			echo "<script>alert('Your Response has been sent, Thank you for your time');</script>";
			redirect('auth/login', 'refresh');
			$this->session->set_flashdata("Thank you for your time, Good Bye");
		}
	}
	public function sendEmail(){
	    
        $mail = $this->phpmailer_lib->initialize();
        
        $receipient = "abdulhakeembrhm@gmail.com";
        
        $mail->setFrom('noreply@fubk.edu.ng', 'FUBK Auth');
        $mail->addReplyTo('noreply@fubk.edu.ng', 'FUBK Auth');
        $mail->addAddress($receipient, 'Abdulhakeem Ibrahim');
        
        $mail->Subject = 'PHPMailer GMail SMTP test';
        
        $mail->msgHTML("Hello World");
        
        
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
       
	}
	public function sendEmail2(){
	    $to      = "abdulhakeembrhm@gmail.com";
        $subject = "The Subject";
        $message = "Testing email";
        
        $e = new Exception();


        $headers = 'From:user@example.com';
        $mail = mail($to, 'TEST', 'TEST', $headers);
        
		var_dump($mail); 
       
	}
	
	public function sendEmail3(){
	    $e = new Exception();
	    $to      = "abdulhakeembrhm@gmail.com";
	    
	    $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($to);
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');
        
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        
        if (!$this->email->send(false)){
            print_debugger();
        }
        
        // var_dump($this->email);
        // echo "<hr>";
        // var_dump( $e->getTraceAsString()); 
	}
}
