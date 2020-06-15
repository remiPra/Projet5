<?php
class productManagerBack
{
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
msgStock
        ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
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
            $msgStock


        )) or die(print_r($req->errorInfo(), TRUE));;
        var_dump('info produit envoyé');
        
    }
}
