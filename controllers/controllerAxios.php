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

 
    echo json_encode($data);




    

}

