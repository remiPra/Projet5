<?php
require 'models/connect.php';
$connectManager =  new ConnectManager();
$bdds = $connectManager->connect();

// controller de la page d'accueil
////////////////////////
function getAllProducts()
{
    require 'models/frontEnd/productsManager.php';
    $productsClass = new ProductsManager();
    $products = $productsClass->getAllProducts();
    echo json_encode($products);
}

function prepareOrderUser(){
    require "models/frontEnd/userManager.php";
    $userManager = new userManager();
    $user=$userManager->findUserId();
    echo json_encode($user);
}
//focntion pour preparer les infos pour passer la commande lors de la validation du cart
function prepareOrderCommand($id){
    $data=array();
    require "models/frontEnd/userManager.php";
    $userManager = new userManager();
    $user=$userManager->findUser($id);
    $userId=$user['name'];

    //$commandId = $user['numberCommand'];
   
    array_push($data,$user);
    
    //echo json_encode($user);

    require "models/frontEnd/cartManager.php";
    $cartManager = new CartManager();
    $cartUser=$cartManager->findCommandUser($userId);
    $cartCommand=$cartUser['numberCommand'];
 
    array_push($data,$cartUser);
    

    $cartProduct=$cartManager->findProductOfCommandUser($cartCommand);

    array_push($data,$cartProduct);

    //on reformate en json
    echo json_encode($data);
}

function getTheToken($id){
    require "models/frontEnd/tokenManager.php";
    $tokenManager =  new TokenManager();
    $allTokens = $tokenManager->getAllTokens();
    //var_dump($id);
    //var_dump($Alltokens);
    //mise en place d'une super variable si deja token
    $GLOBALS['count'] = 0;
    for($i=0;$i<count($allTokens);$i++){
        if($allTokens[$i] == $id){
            //var_dump("remi");
            $GLOBALS['count'] = 2;
            //var_dump($count);
        }
    }
    //verification si il n'existe pas , on envoie
    //var_dump($GLOBALS['count']);
    if($GLOBALS['count']<1){
        $tokenPost = $tokenManager->getTheToken($id);        
    } else {
       // var_dump("pas envoyé");
    }
}

