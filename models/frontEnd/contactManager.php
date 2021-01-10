<?php
class ContactManager
{
    
    //function pour ajouter la commande 
    public function contactForm(){
        $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES, 'UTF-8', false);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8', false);
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8', false);
        $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8', false);
        $status = "noRead";
        $answerStatus = "notAnswer";
        $myAnswer = "unknow";
        // possibilité de stocker dans la BDD
         global $bdd;
        $req = $bdd->prepare('INSERT INTO contact (pseudo, email,message,subject,status,answerStatus,myAnswer) VALUES(?, ?, ?, ?,?,?,?)');
        $req->execute(array($pseudo, $email, $message, $subject,$status,$answerStatus,$myAnswer));
        //possibilité d'enovoyer par mail
        $email = $_POST['email'];
        $firstname = $_POST['pseudo'];
        $message = $_POST['message'];
        // Headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: remipradere@gmail.com\r\n";
        

        
        $messageMail = '
        <html>
        <body>
        <header style="text-align: center;
        background-color: green;
        width: 259px;
        color: white;
        padding: 11px;
        margin: 20px auto;
        border: 2px solid white;
        border-radius: 39px;">
            <h1>Ma ferme Bio</h1>
            <p>12 impasse octave sage</p>
            <p>31100 TOULOUSE</p>
            <p>06.06.06.06.06</p>
        </header>

        <div style="
            border: 6px solid green;
            border-radius: 19px;
            background-color: #d9a679;
            border: 2px solid green;
            color : white;
            padding: 20px">
        <p> Mon tres cher amis vous a recu un email envoyé par: ' . $firstname . ' <p>
        <p> Voici son mail : <br/> ' . $email.' </>
        <p> Voici son message : <br/> ' . $message.' </>
        </div>
        </body>
        </html>
        ';
        // ENVOYER UN EMAIL
        mail('remipradere@gmail.com', 'On me contact sur mon site', $messageMail,$headers);
    }


    
}