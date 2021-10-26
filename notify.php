<?php
function sendFCM($user) {
  // FCM API Url
  $url = 'https://fcm.googleapis.com/fcm/send';

  // Put your Server Key here
  $apiKey = "AAAA_Hn3LWg:APA91bE6XejurhoaP2TxFkkg0zr8oJlBvnblx7HW6i8WfvIEvcQw5X0PvtJtYGq_cfHzir1R3rh6wykVER52ytM5XoifpY_xEyK3JKLDx9sx1JmXioj1ldkGyOsNyJnZcZDlQsqVbs7M";

  // Compile headers in one variable
  $headers = array (
    'Authorization:key=' . $apiKey,
    'Content-Type:application/json'
  );

  // Add notification content to a variable for easy reference
  $notifData = [
    'title' => "ALERT!!!",
    'body' => "Water logging has been started, Be in office urgently",
    'image' => "https://wateralert.000webhostapp.com/water.jpg"
    //'click_action' => "activities.NotifHandlerActivity" //Action/Activity - Optional
  ];

  $dataPayload = ['to'=> 'My Name', 
  'points'=>80, 
  'other_data' => 'This is extra payload'
  ];

  // Create the api body
  $apiBody = [
    'notification' => $notifData,
    'data' => $dataPayload, //Optional
    'time_to_live' => 600, // optional - In Seconds
    //'to' => '/topics/mytargettopic'
    //'registration_ids' = ID ARRAY
    'to' => $user
  ];

  // Initialize curl with the prepared headers and body
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_POST, true);
  curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

  // Execute call and save result
  $result = curl_exec($ch);
  print($result);
  // Close curl after call
  curl_close($ch);

  return $result;
}

$atul = 'c_aRYRshQOGgQx7At2Iyuu:APA91bHfX9sKChX7mNjOGvfoRQuQmDLmuPJCOhpx-dFMqWiEeldjt0bplqRQjEtvlv0cPMwqQ7YKufN8KhFIywZdXyE3qYKubgSAWm9hXP3VWE9SQ0zt1udSQIm59vLHRGytCIRCHuTr';

$kale = 'd_YYXGwWSOqznslVkcdmCm:APA91bFFSLIKbhAoDIFjnt0aPUqBIHMIVa13_hnQKBCEpsYN0Tl-SftvL3xY4LgmE5GaKLjQjps1086qgGYHOA2nWdeLYmVbnes7TY5dJ8QbxLS6gz6Az380bzdX-1omg8jElrggcrxT';

$aniket = 'eogyy39lSw2JVx8OF2sIRq:APA91bHm5Sz54qgOxHpaOV9wVFeTYrS7py47PbkY2LBTAfMcbk-qnjYqdMXlWK1p-sLXUrnIU9q9eGPv0D_BLmSz-AAfqZOCS_v7SqkIoy-wk_1mq7HkHZ4i0npW_YshojTnjLaC0NoI';

//sendFCM($atul);

sendFCM($kale);

//sendFCM($aniket);
?>
