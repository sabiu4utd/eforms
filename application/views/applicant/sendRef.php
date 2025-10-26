<?php

$subject = "Account Activation Email for ".$data["applicant_fullname"];

$headers = 'To:' . $data["applicant_fullname"].'<'.$data["applicant_email"].'>'."\r\n";
$headers .= 'From: FUBK eForms <pgs@fubk.edu.ng>'."\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";

$msg = "<html><head><title>Account Activation for ".$data["applicant_fullname"]."</title><body style='padding:10px;'>";
$msg .= "<div style='display:flex; justify-content:center;'><img style='width:110px' src='".base_url('assets/images/fubk-icon.png')."'/></div><br>";
$msg .= "<div style='display:flex; justify-content:center;font-weight:900'>FEDERAL UNIVERSITY BIRNIN-KEBBI</div><br><br>";
$msg .= "<div>Dear ".$data["applicant_fullname"].",<br><br>";
$msg .= "You are receiving this email because you created an account on the e-Forms portal of Federal University Birnin-Kebbi, Nigeria.<br><br>";
$msg .= "To activate your account, please follow the link below:<br><br><br><br>";
$msg .= "<a href='https://forms.fubk.edu.ng/auth/activate/.".$data["applicant_hash"]."' style='padding:10px; border:.1px solid darkgray; border-radius:10px; text-decoration:none; outline:none; background-color:#59bdeb; color:#fff'>Activate Account</a><br><br><br>";
 
$msg .= "In case you need more information, please feel free to contact us thorugh: <b><u>mis@fubk.edu.ng</b></u><br><br>


Thank you.<br><br>

Best regards,<br><br>

Cloud ID Unit</br>
Management Information Systems Directorate</br>
Federal University Birnin-Kebbi</br>
Kebbi State, Nigeria</br>
Email: mis@fubk.edu.ng</br>
Website: https://www.fubk.edu.ng/mis  </br></br></br></div>";
$msg .= "</body></html>";
echo $msg;
//$mail = mail($referee_email, $subject, $msg, $headers);
//var_dump($mail);
