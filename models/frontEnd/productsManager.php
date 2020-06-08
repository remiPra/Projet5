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
}