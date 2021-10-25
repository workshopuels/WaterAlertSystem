<?php
function sendNotif($to,$notif){
$apiKey = "server api key";

$ch = curl_init();

$url = "https://fcm.googleapis.com/v1/projects/myproject-b5ae1/messages:send";
$field = json_encode(array('to'->$to,'notification'->$notif));

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOP_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));l̥


$headers = array();
$headers[] =  'Authorization: key = '.$apikey;
$header[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)){
echo 'Error: ' . curl_error($ch);
}
curl_close($ch);
}

$to = 'user token';
$notif = array(
'title' => 'This is a title '
'body' => 'This is a body'
);

sendNotif($to, $notif);


?>
