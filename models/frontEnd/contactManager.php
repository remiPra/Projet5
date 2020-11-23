<?php
class ContactManager
{
    
    //function pour ajouter la commande 
    public function contactForm(){
        $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES, 'UTF-8', false);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8', false);
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8', false);
        $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8', false);
        
        // possibilité de stocker dans la BDD
         global $bdd;
        $req = $bdd->prepare('INSERT INTO contact (pseudo,subject, email,message) VALUES(?, ?, ?, ?)');
        $req->execute(array($pseudo, $email, $message, $subject));
        //possibilité d'enovoyer par mail
        $email = $_POST['email'];
        $firstname = $_POST['pseudo'];
        $message = $_POST['message'];
        

        
        $message = '<h1>ma ferme Bio </h1>
        <p> Mon tres cher amis vous a recu un email envoyé par: ' . $firstname . ' <p>
        <p> Voici son mail : <br/> ' . $email.' </>';
        // ENVOYER UN EMAIL
        mail('remipradere@gmail.com', 'On me contact sur mon site', $message);
    }


    
}