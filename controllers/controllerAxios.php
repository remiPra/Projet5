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

function updateOrder(){

    
    // $name = htmlspecialchars($_POST['name']);
    // $adress = htmlspecialchars($_POST['adress']);
    // $postalCode = htmlspecialchars($_POST['postalCode']);
    // $town = htmlspecialchars($_POST['town']);
    
    $numberCommand = htmlspecialchars($_POST['numberCommand']);
    // $status = htmlspecialchars($_POST['status']);
    // $collectTime = htmlspecialchars($_POST['collectTime']);
    // $collectTimeAndDay = htmlspecialchars($_POST['collectTimeAndDay']);
    // $deliveryDay = htmlspecialchars($_POST['deliveryDay']);
    

    require 'models/backEnd/cartManager.php';
    $cartManager = new CartManagerBack();
    $change = $cartManager->changeTime($numberCommand);
    
}

function userCommand(){
    $name = $_GET['name']; 
    
    $data=[];
    
    require "models/frontEnd/userManager.php";
    $userManager = new userManager();
    $user=$userManager->findUser($name);
    
    array_push($data,$user);
    

    require "models/backEnd/cartManager.php";
    $cartManagerBack = new CartManagerBack();
    $command=$cartManagerBack->findCommandWithUserName($name);


    
    $listCommand = [];
    
    for($i=0;$i<count($command);$i++){
        array_push($listCommand,$command[$i]['numberCommand']);
    };


    array_push($data,$command);
  
    //fonction pour appeler tous les produits et leur quantité de la commande
    require "models/frontEnd/cartManager.php";
    $cartManager = new CartManager();
    $productDetailCommand=[];
    for($i=0;$i<count($listCommand);$i++){
        $cartProduct=$cartManager->findProductOfCommandUser($listCommand[$i]);
        array_push($productDetailCommand,(object)array(
            'numberCommand'=> $listCommand[$i],
            'datas' =>(object)array('data' => $cartProduct)
        ));
    };
    
    array_push($data,$productDetailCommand);
    $data=json_encode($data);
    echo $data;
    //var_dump($data);
}

