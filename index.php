<?php
    //Reads the variables sent via post from AT gateway

    $sessionId = $_POST["sessionId"];
    $serviceCode =  $_POST["serviceCode"];
    $phoneNumber = ["phoneNumber"];
    $text = $_POST["text"];
    
    if($text ==""){
        //this is the firt request from. Note how to star the response wit CON
        $response = "CON What would you want to check \n";
        $response .= "1. My account No \n";
        $response .= "2. My phone No";
    }
    else if($text =="1"){
        //Business logic for the first level response   
        $response = "CON Choose account information you want to view \n";
        $response .= "1. Account Number \n";
        $response .= "2. Account Balance";

    }
    else if($text =="2"){
        //Business logic for the first level response   
        //This is terminal request. Note how we start with END
        $response = "END Your phone number is ".$phoneNumber;
    }
    else if($text == "1*1"){
        //This is second level response whre the user spelected 1 in first instance
        $accountNumber = "ACC1001"

        //This is terminal request. Note how we start with END
        $response = "END Your account Number is ".$accountNumber;

    }elseif($text = "1*2"){
        //This is second level response whre the user spelected 1 in first instance
        $balance = "KES 10,000"

        //This is terminal request. Note how we start with END
        $response = "END Your balance is  ".$balance    ;
    }
//echo the response to the API. The response ends on the statement that is fulfilled in each instance
header('Content-type; text/plain');
echo $response;

?>