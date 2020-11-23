<?php
class productManagerBack
{

    public function getAllProducts()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM products');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
        
    }





    public function addNewProduct()
    {
        $data = basename($_FILES['avatar']['name']);
        $src = "./assets/images/fruitsEtLegumes/".$data;
        
        $title = $_POST['title'];
        $quantity = 1;
        $quantityStock = $_POST['quantityStock'];
        $typeOfQuantity = $_POST['typeOfQuantity'];
        $priceDetail = $_POST['priceDetail'];
        $price = $priceDetail;
        $totalPriceProduct = $priceDetail;
        $productCartOfTheWeek = $_POST['productCartOfTheWeek'];
        $quantityProductCartOfTheWeek = $productCartOfTheWeek;
        //$quantityProductCartOfTheWeek = $_POST['quantityProductCartOfTheWeek,'];
        $visible="displayFlex";
        $category = $_POST['category'];
        $description = $_POST['description'];
        $provenance = $_POST['provenance'];
        $quantityCartProduct = 0;
        $msgStock = "disponible";
        $keyChange = 0;
        $online = $_POST['online'];
        //$src = "./assets/images/fruitsEtLegumes/abricotFormat.png";

        global $bdd;
        $req = $bdd->prepare('INSERT INTO products (
title,
quantity,
quantityStock,
typeOfQuantity,
priceDetail,
price,
totalPriceProduct,
visible,
productCartOfTheWeek,
quantityProductCartOfTheWeek,
category,
description,
provenance,
src,
quantityCartProduct,
keyChange,
msgStock,
online
        ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $req->execute(array(
            $title,
            $quantity,
            $quantityStock,
            $typeOfQuantity,
            $priceDetail,
            $price,
            $totalPriceProduct,
            $visible,
            $productCartOfTheWeek,
            $quantityProductCartOfTheWeek,
            $category,
            $description,
            $provenance,
            $src,
            $quantityCartProduct,
            $keyChange,
            $msgStock,
            $online
 

        )) or die(print_r($req->errorInfo(), TRUE));;
        var_dump('info produit envoyé');
        
    }
    //function pour adapteR  modifier  un produit dans l'administration
    public function updateProduct()
    {
        $data = basename($_FILES['avatar']['name']);
        $src=$_POST['src'];
        
        if($data == null){
            $GLOBALS['src'] = $_POST['src']; 
        }
        else {
            $GLOBALS['src'] = "./assets/images/fruitsEtLegumes/".$data;
        }
        
            $src = $GLOBALS['src'];
            $title = $_POST['title'];
            $quantity = 1;
            $quantityStock = $_POST['quantityStock'];
            $typeOfQuantity = $_POST['typeOfQuantity'];
            $priceDetail = $_POST['priceDetail'];
            $price = $priceDetail;
            $totalPriceProduct = $priceDetail;
            $productCartOfTheWeek = $_POST['productCartOfTheWeek'];
            $quantityProductCartOfTheWeek = $productCartOfTheWeek;
            //$quantityProductCartOfTheWeek = $_POST['quantityProductCartOfTheWeek,'];
            $visible="displayFlex";
            $category = $_POST['category'];
            $description = $_POST['description'];
            $provenance = $_POST['provenance'];
            $quantityCartProduct = 0;
            $msgStock = "disponible";
            $keyChange = 0;
            $online = $_POST['online'];
            $id=$_POST['id'];

            global $bdd;
            $req = $bdd->prepare('UPDATE products SET
                    title = :title,
                    quantity = :quantity,
                    quantityStock = :quantityStock,
                    typeOfQuantity = :typeOfQuantity,
                    priceDetail = :priceDetail,
                    price = :price,
                    totalPriceProduct = :totalPriceProduct,
                    visible = :visible,
                    productCartOfTheWeek = :productCartOfTheWeek,
                    quantityProductCartOfTheWeek = :quantityProductCartOfTheWeek,
                    category = :category,
                    description = :description,
                    provenance = :provenance,
                    src = :src,
                    quantityCartProduct = :quantityCartProduct,
                    keyChange = :keyChange,
                    msgStock = :msgStock,
                    online = :online
            WHERE id = :id
            ');
            $req->execute(array(
                    "title" => $title,
                    "quantity" => $quantity,
                    "quantityStock" => $quantityStock,
                    "typeOfQuantity" => $typeOfQuantity,
                    "priceDetail" => $priceDetail,
                    "price" => $price,
                    "totalPriceProduct" => $totalPriceProduct,
                    "visible" => $visible,
                    "productCartOfTheWeek" => $productCartOfTheWeek,
                    "quantityProductCartOfTheWeek" => $quantityProductCartOfTheWeek,
                    "category" => $category,
                    "description" => $description,
                    "provenance" => $provenance,
                    "src" => $src,
                    "quantityCartProduct" => $quantityCartProduct,
                    "keyChange" => $keyChange,
                    "msgStock" => $msgStock,
                    "online" => $online,
                    "id" => $id

            )) or die(print_r($req->errorInfo(), TRUE));;    ;
            
        
        
    }


    public function findAllProductOfNumberCommandUser(){
        global $bdd;
        $req = $bdd->prepare('
        SELECT cartproduct.*,products.*
        FROM cartproduct
        INNER JOIN  products ON cartproduct.productName = products.title  
        ') or die(print_r($req->errorInfo(), TRUE));;
        $req->execute();
        $data = $req->fetchAll();
       
        return $data;
    }
    // ajouter dynamiquement en incrementation le nombre de produit en stock 
    public function addStockProduct($data,$stock){
        var_dump("on y est");
        global $bdd;
        $req = $bdd->prepare('UPDATE products SET quantityStock = :quantityStock
        WHERE title = :title');
        $req->execute(array(
            'title'=>$data,
            'quantityStock'=> $stock 
        ));
    }


    public function substrackStockProduct($data,$stock){
        var_dump("on y est");
        global $bdd;
        $req = $bdd->prepare('UPDATE products SET quantityStock = :quantityStock
        WHERE title = :title');
        $req->execute(array(
            'title'=>$data,
            'quantityStock'=> $stock 
        ));
    }

    // fonction qui supprime définitivement un produit 
    public function deleteProduct($id){
        global $bdd;
        $req = $bdd->prepare('DELETE FROM products WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));

    }

    // fonction qui modifie dans la liste des produits supprimés
    public function updateDeleteProduct($id){
        global $bdd;
        var_dump($id);
        $req = $bdd->prepare('UPDATE products SET online = :online
        WHERE id = :id');
        $req->execute(array(
            'online'=> 2, 
            'id'=> $id
        ));
    }

    public function updateTestProduct($id){
        global $bdd;
        var_dump($id);
        $req = $bdd->prepare('UPDATE products SET online = :online
        WHERE id = :id');
        $req->execute(array(
            'online'=> 0, 
            'id'=> $id
        ));
    }
}
