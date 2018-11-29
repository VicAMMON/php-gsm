<?php

$port = $_POST['port'];
$number = $_POST['number'];
$message = $_POST['message'];

exec("MODE ".$port.": BAUD=115200 PARITY=N DATA=8 STOP=1", $output, $retval);

$fp = @fopen($port,"r+");

if(!$fp){

   echo json_encode(array('response' => 404, 'message' => $port." cant access."));

}else{

	fwrite($fp,"AT+CMGF=1\n\r");
	fwrite($fp, "AT+CMGS=\"".$number."\"\r");
	fwrite($fp, $message.chr(26));
	fclose($fp);

	echo json_encode(array('response' => 200));

}

