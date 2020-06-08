<?php
require 'controllers/controllerAxios.php';

    switch (($_GET['action'])) {
        case 'getAllProducts':
            getAllProducts();
            break;
        case 'index':
            getAllProducts();
            break;
        case 'index':
            getAllProducts();
            break;
        case 'prepareOrder':
            $id = $_GET['value'];
            prepareOrderCommand($id);
            break;
            
        }
    
    