<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->model(['form_model', 'auth_model', 'applicant_model', 'utility_model']);
	}

	public function index(){
	}

	public function getDepartmentByFacultyID(){
		$facultyid = $this->input->post("facultyid");
		
		$depts = $this->utility_model->getDepartmentByFacultyID($facultyid);
		$result = "<option value='-1' selected disabled>Please choose</option>";
		foreach($depts as $row){
		    if($row->id == 4 && $_SESSION['form_id'] == 1){} else {
			$result .= "<option value='".$row->id."'>".$row->department."</option>";
		    }
		}
		echo $result;
	}

	public function getProgrammeByDeptID(){
		$departmentid = $this->input->post("departmentid");
	//	echo $departmentid; exit;
		$formid = $this->input->post("form_id");
		$programmes = $this->utility_model->getProgrammeByDeptID($departmentid, $formid);
		$result = "<option value='-1' selected disabled>Please choose</option>";
// 		echo $programmes; 
		foreach($programmes as $row){
			$result .= "<option value='".$row->id."'>".$row->program."</option>";
		}
		echo $result;
	}
	public function order(){
		$_SESSION['pageTitle'] = 'Order form';
		$formid = $this->input->post("form_type");
		$_SESSION['form_id'] = 	$formid;
		!$formid ? redirect('applicant/index', 'refresh'): null;
		//echo $formid; exit;
		$putme_search = false;
		
		$jamb_no = $this->input->post("jamb_no");
		$jamb_info = false;
		
		if($jamb_no){
		    $jamb_info = $this->auth_model->getUserByJAMB($jamb_no);
		    $putme_search = true;
		}
		
		$form = $this->form_model->getFormByID($formid);
		
        //var_dump($this->utility_model->getFaculties($formid)); exit;
		$data = [
			'form' => $form,
			'applicant'=> $this->auth_model->getUser($_SESSION['userid']),
			'faculties' => $this->utility_model->getFaculties($formid),
			'jamb_info' => $jamb_info,
			'putme_search' => $putme_search
		];
		//var_dump($data);
		return $this->load->view('form/order', $data);
	}
    public function process(){
		$formid = $this->input->post("form_id");
		$hash = $this->input->post("order_hash");
		$rrr = $this->input->post("rrr");
		$programme = $this->input->post("programme");
		$jamb_no = $this->input->post("jamb_no");
		
		!$formid or !$hash or !$rrr ? redirect('applicant/index', 'refresh'): null;
		
		$data = [
			'form_id' => $formid,
			'applicant_id'=> $_SESSION['userid'],
			'program_id' => $programme,
			'order_hash' => $hash,
            'rrr' => $rrr,
            'jamb_no' => $jamb_no,
            'nin_verified' => false,
            'referee_status' => $formid == 1 ? false : true,
            'session_applied' => date('Y') - 1 ."/".date('Y')
		];
        
		$response = $this->form_model->processOrder($data);
		if($response){
			$this->session->set_flashdata('msg', 'Form ordered successfully. Please confirm payment');
		}else{
			$this->session->set_flashdata('msg', 'Something went wrong. Please try again');
		}
		return redirect('applicant/index', 'refresh');
	}
	
	public function getRemitaRRR(){
        
		$applicant = $this->auth_model->getUser($_SESSION['userid'] ?? 3397673);
        $form_type = $_POST["form_type"]  ;
    	$amount = $_POST["amount"];
    	
		if (!in_array($form_type, ["Part time Degees", "Diploma Forms", "Certificate Forms"])) { 
		    
		    $MERCHANTID = "578871000";
        	$APIKEY = "105948";
        	$description = "";
        	$serviceTypeId = ""; 
        	
        	if($form_type == "PG Form"){
        	    $serviceTypeId = "10137790880"; //PG Application form
        	    $description = 'POST GRADUATE PROGRAM ADMISSION FORM for '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename));
        	}else if($form_type == "SBS Form"){
        	    $serviceTypeId = "1961563813"; //SBS REMEDIAL PROGRAM ADMISSION FORM
        	    $description = 'SBS REMEDIAL PROGRAM ADMISSION FORM for '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename));
        	}else if($form_type == "PUTME Form"){
        	    $description = 'PUTME SCREENING FORM for '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename));
        	    $serviceTypeId = "577287903"; //PUTME FORM
        	}else if($form_type == "Inter University Transfer"){
        	    $description = 'Inter University Transfer form for '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename));
        	    $serviceTypeId = "3820246302"; //Inter University Transfer FORM
        	}else if($form_type == "Accommodation"){
        	    $description = 'College of Health Science Accomodation '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename));
        	    $serviceTypeId = "577213877"; //Inter University Transfer FORM
        	}
        	
            $data = [
                "serviceTypeId" => $serviceTypeId,
                "amount" => $amount,
                "orderId" => md5(time().mt_rand()),
                "payerName" => trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename)),
                "payerEmail" => strtolower($applicant->email),
                "payerPhone" => "0700 000 0000",
                "description" => $description
            ];
    
            $data['apiHash'] = hash('SHA512', $MERCHANTID . $data['serviceTypeId'] . $data['orderId'] . $data['amount'] .$APIKEY);
            $url = "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit";
            $options = [
                'http' => [
                    'method'  => 'POST',
                    'content' => json_encode($data),
                    'header' =>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n" .
                        "Authorization:remitaConsumerKey=".$MERCHANTID.",remitaConsumerToken=" . $data['apiHash']
                ]
            ];
    
            try {
                $result = json_decode(file_get_contents($url, false, stream_context_create($options)));
                echo isset($result->RRR) ? json_encode([
                        "orderId" => $data["orderId"],
                        "rrr" => $result->RRR
                    ]): false;
            } catch (Exception $e) {
                echo $e->getMessage();
            }        
		}else{
		    //code for paystack payment

		    $data = [
                "amount" => $amount,
                "metadata" => [
                    "payerName" => trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename)),
                    "description" => 'UNDERGRADUATE PART-TIME DEGREES ADMISSION FORM for '.trim(strtoupper($applicant->surname). ', '.ucwords($applicant->firstname. ' '.$applicant->middlename)),
                    "cancel_action" => "https://eforms.fubk.edu.ng/applicant/index",
                    "orderId" => md5(time().mt_rand()),
                ],
                "email" => strtolower($applicant->email),
                "callback_url" => "https://eforms.fubk.edu.ng/applicant/index"
            ];
           
            $url = "https://api.paystack.co/transaction/initialize";
            $options = [
                'http' => [
                    'method'  => 'POST',
                    'content' => json_encode($data),
                    'header' =>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n" .
                        "Cache-Control: no-cache\r\n" .
                        "Authorization: Bearer sk_test_e5d8f49417598b3afa4ba92718d357525f75a20b\r\n"
                ]
            ];
    
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            //{"status":true,"message":"Authorization URL created","data":{"authorization_url":"https://checkout.paystack.com/p04yd4d1wl727mv","access_code":"p04yd4d1wl727mv","reference":"s821y66ur2"}}
            $result = json_decode($result);
		    echo $result->status ? json_encode([
                "orderId" => $result->data->access_code,
                "rrr" => $result->data->reference,
                "authorization_url" => $result->data->authorization_url
            ]) : false;
		}
    }



    public function init(){
        $student = $this->student_model->getBio($_SESSION['userid']);
        $contact = $this->student_model->getContactInfo($_SESSION['userid']);
        
        $rrr_invoice_amount = $_SESSION['rrr_invoice_amount'];
        $rrr_invoice_description = $_SESSION['rrr_invoice_description'];
        $rrr_invoice_type = $_SESSION['rrr_invoice_type']; 
        
        $name = strtoupper($student->surname).", ".ucwords(strtolower($student->firstname." ".$student->othername))." - ".substr($student->username, 0, 10)." - ".$student->current_level.'L';
        $phone = $contact->phone ? $contact->phone : "0700 000 0000";
        $email = $contact->email ? $contact->email : "collections@fubk.edu.ng";
       
        $payerInfo = [
            "service_type" => $rrr_invoice_type,
            "amount" => $rrr_invoice_amount,
            "name" => $name,
            "email" => strtolower($email),
            "phone" => $phone,
            "description" => $rrr_invoice_description
        ];
        
        $rrr_response = $this->getRemita_RRR($payerInfo);
        if(!$rrr_response || !$rrr_response['RRR']){
            $this->session->set_flashdata('msg', "Oops!!! Somthing went wrong, Please generate the Invoice Again");
            redirect('payment/paymentPage/'.md5(time()), 'refresh');
        }
        
        $data = [
            'user_id' => $_SESSION['userid'],
            'rrr' => $rrr_response['RRR'],
            'type' => $rrr_invoice_type == "TUITION" ? "School Fees" : $rrr_invoice_type,
            'orderid' => md5(time()),
            'amount' => $rrr_invoice_amount,
            'level' => $student->current_level,
            'session' => $_SESSION['active_session']
        ];
        $res = $this->payment_model->registerPayment($data);
        if($res){
            $this->session->set_flashdata('msg', "Payment Generated Successfully");
            redirect('payment/history', 'refresh');
        }else{
            $this->session->set_flashdata('msg', "Payment Generation Failed. Please Try Again");
            redirect('payment/paymentPage/'.$rrr_invoice_type, 'refresh');
        }

    }

}
