<?php
    $payerName = "Abu Bala Barau";
    $payerEmail = "abbala@fubk.edu.ng";
    $payerPhone = "07030883895";
    $description = "School Fees";

    $orderId = md5(rand());
    $totalAmount = "20000";

    $data = [
        "serviceTypeId" => 1099842539,
        "amount" => 5000,
        "orderId" => md5(rand()),
        "payerName" => $payerName,
        "payerEmail" => $payerEmail,
        "payerPhone" => $payerPhone,
        "description" => $description
    ];

    $data['apiHash']=hash('SHA512',"578871000".$data['serviceTypeId'].$data['orderId'].$data['amount']."105948");

    $url = "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit";
    $options = [
        'http' => [
          'method'  => 'POST',
          'content' => json_encode($data),
          'header'=>  "Content-Type: application/json\r\n".
                      "Accept: application/json\r\n".
                      "Authorization:remitaConsumerKey=578871000,remitaConsumerToken=".$data['apiHash']
        ]
    ];
      
    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result, true );
    var_dump($response);
    //echo $response['statuscode']." - ".$response['RRR'];

?>