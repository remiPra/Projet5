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
        var_dump($data['id']);
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
   
}