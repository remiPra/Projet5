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
        }
    
    