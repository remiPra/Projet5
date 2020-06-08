<?php
if (!isset($_POST['name'])){
    var_dump("remi");
}
else if(!isset($_POST['name'])){
     //fonction d'envoie
     $name="unknow";
     $email="unknow";
     $token="il faut le definir";
     $date=time();
     global $bdd;
     $req = $bdd->prepare('INSERT INTO token (name,email,token) VALUES(?,?;?)');
     $req->execute(array($name,$email));    
     
}