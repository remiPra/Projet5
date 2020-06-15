<?php
class TokenManager
{
    public function gettheToken($id)
    {
       
            //fonction d'envoie
            $name = "unknow";
            $email = "unknow";
            $token = $id;
            $date = time();
        
            global $bdd;
            $req = $bdd->prepare('INSERT INTO token (name,email,token,date) VALUES(?,?,?,?)');
            $req->execute(array($name, $email,$token,$date))or die(print_r($req->errorInfo(), TRUE));
            return $token;
    }

    public function getAllTokens()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT token FROM token');
        $req->execute();
        $data = $req->fetchAll();
        $result=[];
        for($i=0;$i<count($data);$i++){
            array_push($result,$data[$i]['token']);
            //var_dump($data[0]['token']);
        }
       // var_dump($result);
      
        //$data[0]['token'];
        return $result;
    }
}
