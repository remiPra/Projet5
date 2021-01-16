<?php
class ProductsManager
{
    //function pour obtenir le Last article qui a été publié 
    public function getAllProducts()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM products');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
        
    }

    public function getStockFromProduct($productName){    
            //verification des différentes variables
           
            //$productName = htmlspecialchars($_POST['productName'][$i], ENT_QUOTES, 'UTF-8', false);
        
            global $bdd;
            $req = $bdd->prepare('
            SELECT quantityStock 
            FROM products
            WHERE title = :title 
            ');
            $req->execute
                (array('title'=>$productName));
            $data = $req->fetchAll();
            echo '<br/>';
            echo '<br/>';
            //var_dump("31 productsmanager ".$data);
            echo '<br/>';
            echo '<br/>';
            //var_dump("32 productsmanager[0]['quantityStock'] ".$data[0]['quantityStock']);
            echo '<br/>';
            return $data[0]['quantityStock'];
    
}
  
}