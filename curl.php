
<?php
// ennI-1K_UsFy4B7bnwzzUN:APA91bGJC5zeYLsRql6zWBhlybtqXEDB53YzBFFU24pA2Zme-JdLH2aE8mptNz8XxfdNhLCJEe4Cld5HiI_CW0jyKMJSYKn6ecbNZl0D1YiqToG_53T_zwsrCzOqf6kPYjIZ7cqiph0S
// "dX8EW9Q1MGW7p7dZXsVkBK:APA91bGHRB_gRL93v5SjM4AwEqaRSlKzWZpHEjelozokYbQJ5F9Y5F52FmVd6y0iILIzHbGOZZTAv01rGobb-2ERDwMPTNjiNTc_mhHkvno3RLIifeYqJZIDVhQCvdCj0tOP8XLQUMBR"    
// eZdsAJHUBbT8_yuOdP_5qH:APA91bEyw-3JIhyiLD0fOL6YbapjbqUpDoFMuuOe7r78K89LKTqgTo4rhNk3xpRUuIMmxT99yf-bkc90JoITwW97WpxhqtroyE1S18tCXR7e6bpBIQI1e-Xc4MiweC-liEkBfaElfFUv

for($i=0;$i<12;$i++){
$url = "https://fcm.googleapis.com/fcm/send";
    $token = 
    "chXygOsvheUvbwXZA9wyyl:APA91bFc1q7y9xxNd8EzwiyVSWLlJX4wosJoOMXXu6VSuMtHyGd6c0M_PRlMzN7ohtEMpfjiJ4wfO2X8R-x57Qm-qODVagCPJ13NNrbDwvdHkY07H5ZKk5y7AsaoA9U9I_pVeLNb3Nz1";
    $serverKey = 'AAAAwz0nWUc:APA91bHnhm0Ki9MDHkXkYBpjApwoZ8S2ynXhwTcd7USJTiRUq3w0gACRgFThFYgAcQpwAH5j7Sy_NXow5RKE2WDu6XqS2iV82j3n8wB18Tzr42X4qjKqikRgRIBJFotjtpcgE4nT_6kA';
    $title = "La ferme Bio vous attends";
    $body = "Cliquez sur ce message , de nouvelles promotions sont arrivés :-) ?";
    $notification = array('title' =>$title , 
                            'body' => $body, 
                            'sound' => 'default', 
                            'badge' => '1',
                            'click_action' =>'https://www.remi-pradere.com/projet5/index.php?action=index');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    $i++;
    sleep(500);
}
?>

