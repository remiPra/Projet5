<?php
class userManager
{
    
    //function pour chercher l'id de l'user
    public function findUserId(){
        //différentes variables a rentrer
        $namePost=$_SESSION['name'];

        //on recupere l'id
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM user WHERE name=?');
        $req->execute(array($namePost));
        $data = $req->fetch();
        //var_dump($data['id']);
        return $data['id'];
    }
    public function findUser($id){
        //différentes variables a rentrer
        //$namePost=$_SESSION['name'];
        $namePost=$id;
        //on recupere l'id
        global $bdd;
        $req = $bdd->prepare('SELECT adress,email,name,nameUser,phone,postalCode,surnameuser,town FROM user WHERE name=?');
        $req->execute(array($namePost));
        $data = $req->fetch();
        
        return $data;
    }

    //recuperer l'email du paptient si il existe
    public function getEmailUser($id){
        //différentes variables a rentrer
        //$namePost=$_SESSION['name'];
        $namePost=$id;
        //on recupere l'id
        global $bdd;
        $req = $bdd->prepare('SELECT adress,email,name,nameUser,phone,postalCode,surnameuser,town FROM user WHERE email=?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data;
    }

    //creation d'un lien pour avoir un nouveau password envoyer par mail
    public function alertPassword($link,$firstname) {
        global $bdd;
        $req = $bdd->prepare('UPDATE user SET newPassword = :newPassword,link=:link WHERE name =:name');
        $req->execute(array(
            'newPassword' => 1 ,
            'link'=>$link,
            'name'=>$firstname
        ));
    }

    public function changePassword($password,$name){
        global $bdd;
        $req = $bdd->prepare('UPDATE user SET password = :password WHERE name =:name');
        $req->execute(array(
            'password'=>$password,
            'name'=>$name,
        ));
    }

    public function changeLinkProtect($name,$link){
        global $bdd;
        $req = $bdd->prepare('UPDATE user SET link = :link WHERE name =:name');
        $req->execute(array(
            'link'=>$link,
            'name'=>$name,
        ));
    }
   
}