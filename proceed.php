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
            $id=$_GET['token'];
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
        //recuperation de toutes les commandes      
        case 'getAllCommands':
            getAllCommands();
            break;      
            //recuperation de toutes les horaires reservées des commandes dans stepOrder
            case 'allRetraitCommand':
                allRetraitCommand();
                break;        
            }
    