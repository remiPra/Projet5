<?php
require 'controllers/controllerAxios.php';

switch (($_GET['action'])) {
    case 'getAllProducts':
        getAllProducts();
        break;
    case 'index':
        getAllProducts();
        break;
    case 'getthetoken':
        $id = $_GET['token'];
        getTheToken($id);
        break;
    case 'prepareOrder':
        $id = $_GET['value'];
        prepareOrderCommand($id);
        break;
    case 'updateOrder':
        updateOrder();
        break;
    case 'userCommand':
        userCommand();
        break;
        // recuperation de tous les articles
    case 'getAllArticles':
        getAllArticles();
        break;
        //recuperation de toutes les news
    case 'getAllNews':
        getAllNews();
        break;
        //recuperation du nombre de news publiées
    case 'countNumberOfNews':
        countNumberOfNews();
        break;
        //recuperation de toutes les commandes      
    case 'getAllCommands':
        getAllCommands();
        break;
        //recuperation de toutes les horaires reservées des commandes dans stepOrder
    case 'allRetraitCommand':
        allRetraitCommand();
        break;
        //validation d'une command a collecter        
    case 'validateCollectCommand':
        validateCollectCommand();
        break;

        //validation d'une command a livrer        
    case 'validateLivraisonCommand':
        validateLivraisonCommand();
        break;
        //valdation commande réussi
    case 'checkCommand':
        checkCommand();
        break;
        //updater un probleme commande        
    case 'problemCommand':
        problemCommand();
        break;
        //effacer définitivement un produit        
    case 'deleteProduct':
        deleteProduct();
        break;
        // passer dans la liste des produits supprimés
    case 'updateDeleteProduct':
        updateDeleteProduct();
        break;
    case 'updateTestProduct':
        updateTestProduct();
        break;
    case 'getAllMessages':
        getAllMessages();
        break;
    case 'checkMessageRead':
        checkMessageRead();
        break;
}
