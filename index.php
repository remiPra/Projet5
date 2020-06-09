<?php
session_start();
require 'controllers/controllerRouter.php';


if ($_SESSION == false and isset($_GET['action'])) {
    ////////////////////////////////////////////////////
    ///////////Partie Frond-end///////////////////////
    //////////////////////////////////////////////////
    // redirection page d'accueil

    switch (($_GET['action'])) {
        
        case 'home':
            index();
            break;
        case 'cart':
        case 'connexion':
            connexion();
            break;
        case 'blog':
            blog();
            break;
        case 'signIn':
            signIn();  
            break;
        case 'checkPassword':
            checkPassword();
            break;
        case 'curl':
            curl();
            break;
        case 'administration':
            administration();
            break;
        default:
            index();
            break;
    }
} else if (isset($_SESSION) and isset($_GET['action'])) {
    switch (($_GET['action'])) {
        case 'home':
            index();
            break;
        case 'cart':
            cart();
            break;
        case 'stepOrder':
            stepOrder();
            break;
        case 'stepOrderAxios':
            echo "<script type='text/javascript'>document.location.replace('proceed.php?action=prepareOrder&value=".$_SESSION['name']."');</script>";
            break;
        case 'deconnexion':
            deconnexion();
            break;
        case 'curl':
            curl();
            break;
        default:
            index();
            break;
    }
} else {
    index();
}
