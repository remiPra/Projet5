<?php
require 'models/connect.php';
$connectManager =  new ConnectManager();
$bdds = $connectManager->connect();

// SOMMAIRE
// routage de la page index
// routage de la page des connexion
// routage de la page de Blog
// routage de la page index
function deconnexion()
{
    session_destroy();
    //$notification = '<p class="success"vous etes déconnecté</p>';
    echo "<script type='text/javascript'>document.location.replace('index.php?action=home');</script>";
    exit();
}
function index(){
    
    require 'view/frontEnd/home.php';
}
// routage en connexion lors de la demande d'accession au cart
// routage de la page des connexion
function connexion(){
    require 'view/frontEnd/connexion.php';
}
// routage de la page de Blog
function blog(){
    require 'view/frontEnd/blog.php';
}
function signIn(){
    require 'models/frontEnd/connexionManager.php';

    $connexionManager = new ConnexionManager();
    //double sécurité au niveau des mails et des pseudos
    $checkUser= $connexionManager->checkIfUserExist();
    $error=0;
    //verification si un mail existe deja
    foreach($checkUser as $user) {
        if($user['email'] == $_POST['email']){
            $error=1;
        }
    }
    foreach($checkUser as $user) {
        if($user['name'] == $_POST['name']){
            $error=2;
        }
    }
        if($error==1){
        $errorMsg = "ce mail est deja utilisé";
        var_dump("ouf");
        // require "view/frontEnd/connexion.php";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=".$errorMsg."');</script>";     
    }
        else if($error==2){
        $errorMsg = "ce pseudo est deja utilisé";
        var_dump("ouf");
        // require "view/frontEnd/connexion.php";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=".$errorMsg."');</script>";     
    }
    else {
    //validation de l'inscription
    $postUser = $connexionManager->signIn();
    $errorMsg = "vous avez valide votre inscription ".htmlspecialchars($_POST['name']).", maintenant connectez vous";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=".$errorMsg."');</script>";     
    }

    
}
//routage de connexion
function checkPassword(){
    //verifions si l'user existe
    require 'models/frontEnd/connexionManager.php';

    $connexionManager = new ConnexionManager();
    //verification en recherchant le pseudo
    $checkUser= $connexionManager->selectAllUser();
    // Booleen pour la verification
    $error=0;
    $userChecked=0;
    $userFind=[];
    foreach($checkUser as $user){
        if($user['name'] != $_POST['name']){
            $error=1;
        }
        else {
            $userChecked=1;
            $userFind = $user;
        }        
    }
    //l'user a été trouvé
    if($userChecked == 1) {
    //maintenant on verifie le password
    $isPasswordCorrect = password_verify($_POST['password'], $userFind['password']);
        if($isPasswordCorrect==true){
            var_dump("connexion assurée");
            $_SESSION['connect'] = true;
            echo $_SESSION['connect'];
            $_SESSION['name'] = $userFind['name'];
            echo $_SESSION['name'];  
            echo "<script type='text/javascript'>document.location.replace('index.php?action=home');</script>";
        }
        else {
            $errorMsg="erreur dans les indentifiants de connexion!";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=".$errorMsg."');</script>";
        }
    }
    //l'user n'a pas été trouvé
    else if($error == 1){
        $errorMsg="erreur dans les indentifiants!";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=".$errorMsg."');</script>";     
    }
}

function cart(){
    var_dump($_POST);
    $dataReceive = $_POST;
    var_dump($dataReceive);
    var_dump($_SESSION['name']);

    //recherche de l'id de l'user
    require "models/frontEnd/userManager.php";
    $userManager = new userManager();
    $userId=$userManager->findUserId();

     //enregistrement  de toutes les infos du cart
     require "models/frontEnd/cartManager.php";
     $cartManager = new CartManager();
    $orderNumberCommand=$cartManager->cartAddList($userId);

   //enregistrement de toute la lliste des produits
    $cart = $cartManager->cartAddProduct($orderNumberCommand);

    echo "<script type='text/javascript'>document.location.replace('index.php?action=stepOrder');</script>";

}
//fonction pour aller vers les etapes de commande 
function stepOrder(){
     require "view/frontEnd/stepOrder.php";
}
//page de connexion de l'adminstration 
function administration(){
     require "view/frontEnd/connexionShop.php";
} 

// function d'appel des curls pour les promotions
function curl(){
    require 'models/frontEnd/tokenManager.php';
    $tokenManager = new TokenManager();
    $Alltokens = $tokenManager->getAllTokens();
    
    require 'models/frontEnd/curlManager.php';
    $curlManager = new CurlManager();
    $curlPromotion = $curlManager->sendPromotionsAllTokens($Alltokens);
} 