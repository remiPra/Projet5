<?php
class CartManager
{
    
    //function pour ajouter la commande 
    public function cartAddList($idUser){
        //différentes variables a rentrer
        $namePost=$_SESSION['name'];


        //variable a verifier
        $date=time();
        $name = htmlspecialchars($namePost, ENT_QUOTES, 'UTF-8', false);
        $totalPrice=htmlspecialchars($_POST['totalPrice'], ENT_QUOTES, 'UTF-8', false);
        $numberCommand=$date;
        $dateDeliveryOrder= date("Y-m-d H:i:s");
        $statusCommand=0;
        $status = "unknow";
        $collectTime = "00 : 00";
        $deliveryDay= "unknow";
        $collectTimeAndDay="unknow";
        //inserer les infos de la commande
        global $bdd;
        $req = $bdd->prepare('INSERT INTO command (status,collectTime,deliveryDay,collectTimeAndDay,idClient ,name,dateCommand,numberCommand,dateDeliveryOrder,statusCommand,totalPrice)
         VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $req->execute(array($status,$collectTime,$deliveryDay,$collectTimeAndDay,$idUser,$name,$date,$numberCommand,$dateDeliveryOrder,$statusCommand,$totalPrice)) or die(print_r($req ->errorInfo(), TRUE));    
        return $numberCommand;
    }
    
    //function pour ajouter les produits de la commande 
    public function cartAddProduct($orderNumberCommand)
    {
        //var_dump($_POST);
       
        for($i=0;$i < count($_POST['productName']);$i++){
           
            
            $namePost=$_SESSION['name'];
           

            //verification des différentes variables
            $name = htmlspecialchars($namePost, ENT_QUOTES, 'UTF-8', false);
            $productName = htmlspecialchars($_POST['productName'][$i], ENT_QUOTES, 'UTF-8', false);
            $productQuantity = htmlspecialchars($_POST['productQuantity'][$i], ENT_QUOTES, 'UTF-8', false);
           
            //fonction d'envoie
            global $bdd;
            $req = $bdd->prepare('INSERT INTO cartproduct (name,productName,productQuantity,numberCommand) VALUES(?,?,?,?)');
            $req->execute(array($name,$productName,$productQuantity,$orderNumberCommand)) or die(print_r($req->errorInfo(), TRUE));    
            //var_dump($orderNumberCommand);
        }    
    }

    //fonction pour enlever les produits du stock
    public function substractProductFromCartToStock($productName,$quantityStock){
        for($i=0;$i < count($_POST['productName']);$i++){
            //différentes variables a rentrer
            echo '<br/>';
            //var_dump($_POST['productName'][$i]);
            echo '<br/>';
            //var_dump($quantityStock);
            echo '<br/>';
            echo '<br/>';
            echo '82';
            
            //verification des différentes variables
            $productQuantity = htmlspecialchars($_POST['productQuantity'][$i], ENT_QUOTES, 'UTF-8', false);
            $Stock = $quantityStock - $productQuantity;
            

            global $bdd;
            $req = $bdd->prepare('UPDATE products 
            SET 
            quantityStock = :quantityStock
            WHERE title =:title');
            $req->execute(array(
            'title'=> $productName,   
            'quantityStock' => $Stock,
           
        ));



        }
    }



    public function findCommandUser($namePost){
        //on utilise la session pour retrouvr l'user
        //$namePost=$_SESSION['name'];

        //on recupere l'id
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM command WHERE name=? ORDER BY dateCommand DESC');
        $req->execute(array($namePost));
        $data = $req->fetch();
        return $data;
    }

    public function findProductOfCommandUser($id){
        //on utilise la session pour retrouvr l'user
        //$namePost=$_SESSION['name'];

        //on recupere l'id
        global $bdd;
        //$req = $bdd->prepare('SELECT productName,productQuantity FROM cartproduct WHERE numberCommand=?');
        
        $req = $bdd->prepare('
            SELECT cartproduct.productName,cartproduct.productQuantity,cartproduct.numberCommand,
                    products.typeOfQuantity,products.price 
            FROM cartproduct
            INNER JOIN products ON products.title = cartproduct.productName
            WHERE numberCommand=?
            ');
        
        
        $req->execute(array($id));
        $data = $req->fetchAll();
        return $data;
    }





}