<?php

class ConnexionManager{
    public function signIn(){
        // verification des variables transmises
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8', false);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8', false);
        $adress = htmlspecialchars($_POST['adress'], ENT_QUOTES, 'UTF-8', false);
        $postalCode = htmlspecialchars($_POST['postalCode'], ENT_QUOTES, 'UTF-8', false);
        $town = htmlspecialchars($_POST['town'], ENT_QUOTES, 'UTF-8', false);
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8', false);
        $nameUser = htmlspecialchars($_POST['nameUser'], ENT_QUOTES, 'UTF-8', false);
        $surnameUser = htmlspecialchars($_POST['surnameUser'], ENT_QUOTES, 'UTF-8', false);
        $newPassword = 0;
        $link = "azerty";
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        // envoie du nouveau inscrit
        global $bdd;
        $req = $bdd->prepare('INSERT INTO user (name,nameUser,surnameUser,email,password,adress,postalCode,town,phone,newPassword,link) VALUES(?,?,?, ?,?,? ,?, ? ,? ,? ,?)');
        $req->execute(array($name,$nameUser,$surnameUser, $email,$password, $adress, $postalCode,$town,$phone,$newPassword,$link));
    }
    // fonction pour voir si l'user n'est pas deja inscrit
    public function checkIfUserExist(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $data = $req->fetchAll();
        
        return $data;
    }
    public function selectAllUser(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $data = $req->fetchAll();
        
        return $data;
    }
}