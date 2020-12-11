<?php
session_start();
require 'controllers/controllerRouter.php';


if ($_SESSION == false and isset($_GET['action'])) {
    ////////////////////////////////////////////////////
    ///////////Partie Frond-end///////////////////////
    //////////////////////////////////////////////////
    // redirection page d'accueil

    switch (($_GET['action'])) {


        case 'contact':
            contact();
            break;
        case 'contactSend':
            contactSend();
            break;
        case 'test':
            test();
            break;
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
        case 'newPassword':
            administrationPasswordForgotCheck();
            break;
        case 'curl':
            curl();
            break;
        case 'administration':
            administration();
            break;
        case 'initializePassword':
            initializePassword();
            break;
        case 'administrationCheck':
            administrationCheck();
            break;
        default:
            index();
            break;
    }
} else if (isset($_SESSION) and isset($_GET['action']) and ($_SESSION['name'] != "administration")) {
    switch (($_GET['action'])) {

        case 'home':
            index();
            break;
        case 'blog':
            blog();
            break;
        case 'contact':
            contact();
            break;
        case 'cart':
            cart();
            break;
        case 'paiement':
            paiement();
            break;
        case 'paiementSuccess':
            paiementSuccess();
            break;



        case 'stepOrder':
            stepOrder();
            break;
        case 'stepOrderAxios':
            echo "<script type='text/javascript'>document.location.replace('proceed.php?action=prepareOrder&value=" . $_SESSION['name'] . "');</script>";
            break;
        case 'newPasswordValue':
            newPasswordValue();
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
} else if (
    isset($_SESSION) and isset($_GET['action'])
    and ($_SESSION['name'] == "administration")
) {
    switch (($_GET['action'])) {

        case 'administrationHome':
            administrationHome();
            break;
        case 'home':
            index();
            break;
        case 'deconnexion':
            deconnexion();
            break;
        case 'updateProduct':
            updateProduct();
            break;
        case 'newProduct':
            newProduct();
            break;


            // administration des articles 
        case 'sendNewArticle':
            sendNewArticle();
            break;
        case 'deleteArticle':
            deleteArticle();
            break;


        case 'sendNewNews':
            sendNewNews();
            break;
        case 'updateNews':
            updateNews();
            break;
        case 'deleteNews':
            deleteNews();
            break;

        case 'addStockProduct':
            addStockProduct();
            break;
        case 'substractStockProduct':
            substractStockProduct();
            break;
        case 'validateCollectCommand':
            validateCollectCommand();
            break;
        case 'updateCommand':
            updateCommand();
            break;
            //administration des messages
        case 'deleteMessage':
            deleteMessage();
            break;
        case 'sendAnswer':
            sendAnswer();
            break;

        default:
            index();
            break;
    }
} else {
    index();
}
