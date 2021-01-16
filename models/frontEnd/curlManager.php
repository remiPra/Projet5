<?php
class CurlManager
{
    public function sendPromotionsAllTokens($token,$articles)
    {            
            // url de l'envoie de firebase cloud mesaging
            $url = "https://fcm.googleapis.com/fcm/send";
         
            
            $serverKey = 'AAAAwz0nWUc:APA91bHnhm0Ki9MDHkXkYBpjApwoZ8S2ynXhwTcd7USJTiRUq3w0gACRgFThFYgAcQpwAH5j7Sy_NXow5RKE2WDu6XqS2iV82j3n8wB18Tzr42X4qjKqikRgRIBJFotjtpcgE4nT_6kA';
            if($articles['title']!=null){
                $title = $articles['title'];
                $body = $articles['description'];
            } 
            else {
                $title = "La ferme Bio vous attends";
                $body = "Cliquez sur ce message , de nouvelles promotions sont arrivés :-) ?";
            }
            $notification = array(
                'title' => $title,
                'body' => $body,
                'sound' => 'default',
                'icon' => 'https://www.remi-pradere.com/projet5/assets/icons/icon-72x72.png',
                'badge' => '1',
                'click_action' => 'https://www.remi-pradere.com/projet5/index.php?action=index'
            );
            $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key=' . $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            //envoie de la réponse
            $response = curl_exec($ch);
            //message d'erreur 
            if ($response === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }        
    }

    public function sendNewsAllTokens($token,$news)
    {
            $url = "https://fcm.googleapis.com/fcm/send";
          
            
            $serverKey = 'AAAAwz0nWUc:APA91bHnhm0Ki9MDHkXkYBpjApwoZ8S2ynXhwTcd7USJTiRUq3w0gACRgFThFYgAcQpwAH5j7Sy_NXow5RKE2WDu6XqS2iV82j3n8wB18Tzr42X4qjKqikRgRIBJFotjtpcgE4nT_6kA';
            if($news['title']!=null){
                $title = $news['title'];
                $body = $news['description'];
            } 
            else {
                $title = "La ferme Bio vous attends";
                $body = "Cliquez sur ce message , de nouvelles promotions sont arrivés :-) ?";
            }
            $notification = array(
                'title' => $title,
                'body' => $body,
                'sound' => 'default',
                'icon' => 'https://www.remi-pradere.com/projet5/assets/icons/icon-72x72.png',
                'badge' => '1',
                'click_action' => 'https://www.remi-pradere.com/projet5/index.php?action=index'
            );
            $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key=' . $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            //envoie de la réponse
            $response = curl_exec($ch);
            //message d'erreur 
            if ($response === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }        
    }
}
