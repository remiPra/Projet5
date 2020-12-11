<?php
class ContactManager
{
    
    //function pour ajouter la commande 
    public function getAllMessages(){
        
        // possibilité de stocker dans la BDD
         global $bdd;
        $req = $bdd->prepare('SELECT * from contact');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
    // function pour supprimer le message
    public function deleteMessage($id){
        global $bdd;
        $req = $bdd->prepare('DELETE FROM contact WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));

    }
    public function changeStatusAnswer($id,$myAnswer){
        global $bdd;
        $req = $bdd->prepare('UPDATE contact 
        SET 
        answerStatus = :answerStatus,
        myAnswer = :myAnswer
        WHERE id = :id');
        $req->execute(array(
          
            "answerStatus" => "answer",
            "myAnswer" => $myAnswer,
            "id" => $id
        )) 
        or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));

    }
    //fonction pour rendre lu message 
    public function checkMessageRead($id){
        global $bdd;
        $req = $bdd->prepare('UPDATE contact 
        SET 
        status = :status
        WHERE id = :id');
        $req->execute(array(
            "status" => "read",
            "id" => $id
        )) 
        or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));

    }


    
}