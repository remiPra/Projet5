<?php
require 'models/connect.php';
$connectManager =  new ConnectManager();
$bdds = $connectManager->connect();

// SOMMAIRE
// routage de la page index
// routage de la page des connexion
// routage de la page de Blog
// routage de la page index
function deconnexion()
{
    session_destroy();
    //$notification = '<p class="success"vous etes déconnecté</p>';
    echo "<script type='text/javascript'>document.location.replace('index.php?action=home');</script>";
    exit();
}
function index()
{

    require 'view/frontEnd/home.php';
}
// routage en connexion lors de la demande d'accession au cart
// routage de la page des connexion
function connexion()
{
    require 'view/frontEnd/connexion.php';
}
// routage de la page de Blog
function blog()
{
    require 'view/frontEnd/blog.php';
}

//routage de la page du formulaire de contact
function contact()
{
    require 'view/frontEnd/contact.php';
}
//routage de l'envoie d'un message de contact
function contactSend()
{
    // Controlleur de la page de l'envoie d'un message contact si envoyé

    if (($_POST['pseudo'] != null) and ($_POST['email'] != null)
        and ($_POST['message'] != null) and ($_POST['subject'] != null)
    ) {

        //appel de la méthode contact pur recuperer le message
        require 'models/frontEnd/contactManager.php';
        $ContactManager = new ContactManager();
        $contactForm = $ContactManager->contactForm();
        $message = 'Votre message a bien été envoyé';
        //affichag de la page qui montre que le contact est recu
        echo "<script type='text/javascript'>document.location.replace('index.php?action=contact&messageSuccess=" . $message . "');</script>";
    } else {

        $message = 'vous n\'avez pas remplis tous les champs';
        echo "<script type='text/javascript'>document.location.replace('index.php?action=contact&messageError=" . $message . "');</script>";
    }
}


function signIn()
{
    require 'models/frontEnd/connexionManager.php';

    $connexionManager = new ConnexionManager();
    //double sécurité au niveau des mails et des pseudos
    $checkUser = $connexionManager->checkIfUserExist();
    $error = 0;
    //verification si un mail existe deja
    foreach ($checkUser as $user) {
        if ($user['email'] == $_POST['email']) {
            $error = 1;
        }
    }
    foreach ($checkUser as $user) {
        if ($user['name'] == $_POST['name']) {
            $error = 2;
        }
    }
    if ($error == 1) {
        $errorMsg = "ce mail est deja utilisé";
        //var_dump("ouf");
        // require "view/frontEnd/connexion.php";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
    } else if ($error == 2) {
        $errorMsg = "ce pseudo est deja utilisé";
        //var_dump("ouf");
        // require "view/frontEnd/connexion.php";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
    } else {
        //validation de l'inscription
        $postUser = $connexionManager->signIn();
        $errorMsg = "vous avez valide votre inscription " . htmlspecialchars($_POST['name']) . ", maintenant connectez vous";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
    }
}
//routage de connexion
function checkPassword()
{
    //verifions si l'user existe
    require 'models/frontEnd/connexionManager.php';

    $connexionManager = new ConnexionManager();
    //verification en recherchant le pseudo
    $checkUser = $connexionManager->selectAllUser();
    // Booleen pour la verification
    $error = 0;
    $userChecked = 0;
    $userFind = [];
    foreach ($checkUser as $user) {
        if ($user['name'] != $_POST['name']) {
            $error = 1;
        } else {
            $userChecked = 1;
            $userFind = $user;
        }
    }
    //l'user a été trouvé
    if ($userChecked == 1) {
        //maintenant on verifie le password
        $isPasswordCorrect = password_verify($_POST['password'], $userFind['password']);
        if ($isPasswordCorrect == true) {
            //var_dump("connexion assurée");
            $_SESSION['connect'] = true;
            echo $_SESSION['connect'];
            $_SESSION['name'] = $userFind['name'];
            echo $_SESSION['name'];
            echo "<script type='text/javascript'>document.location.replace('index.php?action=home');</script>";
        } else {
            $errorMsg = "erreur dans les indentifiants de connexion!";
            echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
        }
    }
    //l'user n'a pas été trouvé
    else if ($error == 1) {
        $errorMsg = "erreur dans les indentifiants!";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
    }
}

function cart()
{
    //var_dump($_POST);
    $dataReceive = $_POST;
    var_dump($dataReceive);
    var_dump($_SESSION['name']);

    //recherche de l'id de l'user
    require "models/frontEnd/userManager.php";
    $userManager = new userManager();
    $userId = $userManager->findUserId();
    echo '<br/>';
    var_dump($userId);
    echo '<br/>';

    //enregistrement  de toutes les infos du cart
    require "models/frontEnd/cartManager.php";
    $cartManager = new CartManager();
    $orderNumberCommand = $cartManager->cartAddList($userId);

    require 'models/frontEnd/productsManager.php';
    $productsManager = new ProductsManager();

    //modification des stocks dans la data
    for ($i = 0; $i < count($_POST['productName']); $i++) {

        $productName = htmlspecialchars($_POST['productName'][$i], ENT_QUOTES, 'UTF-8', false);
        echo '<br/>';
        echo '<br/>';
        //var_dump("148 " . $productName);
        echo '<br/>';
        echo '<br/>';


        $stock = $productsManager->getStockFromProduct($productName);
        $updateStock = $cartManager->substractProductFromCartToStock($productName, $stock);
    }
    //enregistrement de toute la lliste des produits
    $cart = $cartManager->cartAddProduct($orderNumberCommand);

    echo "<script type='text/javascript'>document.location.replace('index.php?action=stepOrder');</script>";
}
//fonction pour aller vers les etapes de commande 
function stepOrder()
{
    require "view/frontEnd/stepOrder.php";
}
//page de connexion de l'adminstration 
function administration()
{
    require "view/frontEnd/connexionShop.php";
}

// function d'appel des curls pour les promotions
function curl()
{
    require 'models/frontEnd/tokenManager.php';
    $tokenManager = new TokenManager();
    $Alltokens = $tokenManager->getAllTokens();

    require 'models/frontEnd/curlManager.php';
    $curlManager = new CurlManager();
    for ($i = 0; $i < count($Alltokens); $i++) {
        $curlPromotion = $curlManager->sendPromotionsAllTokens($Alltokens[$i], $articles);
    }
}

//fonction pour les passwords oubliées 
function administrationPasswordForgotCheck()
{
    if ($_POST['email'] != null) {
        //var_dump($_POST['email']);
        require 'models/frontEnd/userManager.php';
        $userManager = new userManager();
        $pseudoMail = $_POST['email'];
        $user = $userManager->getEmailUser($pseudoMail);

        if ($pseudoMail == $user['email']) {

            $to = $user['email'];
            $pseudo = $user['name'];
            $firstname = $pseudo;
            //mise en place d'un lien aléatoire
            $v = rand(1, 10);
            $link = password_hash($v, PASSWORD_DEFAULT);
            //var_dump($firstname);
            $userLinkCode = $userManager->alertPassword($link, $firstname);
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "From: remipradere@gmail.com\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers

            $subject = "lien pour vous reconnecter";


            $message = '
            <html>
                <body>
                    <header style="text-align: center;
                        background-color: green;
                        width: 259px;
                         color: white;
                        padding: 11px;
                        margin: 20px auto;
                        border: 2px solid white;
                        border-radius: 39px;">
                            <h1>Ma ferme Bio</h1>
                            <p>12 impasse octave sage</p>
                            <p>31100 TOULOUSE</p>
                            <p>06.06.06.06.06</p>
                    </header>

            <div class="d-flex justify-content-center" style="
            border: 6px solid green;
            border-radius: 19px;
            background-color: #d9a679;
            border: 2px solid green;
            color : white;
            padding: 20px">
                <h1> ' . $firstname . ' </h1>
                    <p> veuillez cliquez sur ce lien 
                        <a href="http://www.remi-pradere.com/projet5/index.php?action=initializePassword&name=' . $firstname . '&link=' . $link . '"> 
                        cliquez ici
                    <p>

            </div>
                </body>
            </html>
            ';
            mail($to, $subject, $message, $headers);

            // ENVOYER UN EMAIL

            $messageMail =  'votre mot de passe vous a été envoyé sur votre mail ' . $to . '';
            echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&mailPassword=" . $messageMail . "');</script>";
        } else {
            $notificationError = "name invalid";
            //var_dump($notificationError);
            //require 'views/frontEnd/administrationPasswordForgotView.php';
        }
    } else {
        $notificationError = "vous n'avez pas rempli tous les champs";
        // require 'views/frontEnd/administrationPasswordForgotView.php';
        //var_dump($notificationError);
    }
}

//fonction pour réinitialiser le password
function initializePassword()
{
    $name = extract($_GET['name']);
    $link = extract($_GET['link']);

    require 'models/frontEnd/userManager.php';

    $userManager = new userManager();
    $user = $userManager->findUser($name);
    if ($name == $user['name'] and $link == $user['link']) {

        $_SESSION['connect'] = true;
        echo $_SESSION['connect'];
        $_SESSION['name'] = $user['name'];
        echo $_SESSION['name'];

        $v = rand(1, 10);
        $link = password_hash($v, PASSWORD_DEFAULT);
        $user = $userManager->changeLinkProtect($name, $link);

        //var_dump("reinitilaisation link réussi");
        require 'view/frontEnd/newPasswordUser.php';
    } else {
        echo "<script type='text/javascript'>document.location.replace('index.php?action=index.php');</script>";
    }
}

function newPasswordValue()
{
    $_SESSION['name'] = $_POST['name'];
    var_dump($_SESSION['name']);
    $name = $_SESSION['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    var_dump($name);
    var_dump($password);
    //var_dump($_SESSION['connect']);
    require 'models/frontEnd/userManager.php';
    $userManager = new userManager();
    $user = $userManager->changePassword($name, $password);

    echo "<script type='text/javascript'>document.location.replace('index.php?action=home');</script>";
    //require "view/frontEnd/home.php";   

}

//function pour arriver a la page administration
function administrationCheck()
{
    //verifions si l'user existe
    require 'models/frontEnd/connexionManager.php';

    $connexionManager = new ConnexionManager();
    //verification en recherchant le pseudo
    $checkUser = $connexionManager->selectAllUser();
    // Booleen pour la verification
    $error = 0;
    $userChecked = 0;
    $userFind = [];
    foreach ($checkUser as $user) {
        if ($user['name'] != $_POST['name']) {
            $error = 1;
        } else {
            $userChecked = 1;
            $userFind = $user;
        }
    }
    //l'user a été trouvé
    if ($userChecked == 1) {
        //maintenant on verifie le password
        $isPasswordCorrect = password_verify($_POST['password'], $userFind['password']);
        if ($isPasswordCorrect == true) {
            //var_dump("connexion assurée");
            $_SESSION['connect'] = true;
            echo $_SESSION['connect'];
            $_SESSION['name'] = $userFind['name'];
            echo $_SESSION['name'];
            //var_dump($_SESSION['name']);
            echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome');</script>";
        } else {
            $errorMsg = "erreur dans les indentifiants de connexion!";
            echo "<script type='text/javascript'>document.location.replace('index.php?action=connexion&msgError=" . $errorMsg . "');</script>";
        }
    }
    //l'user n'a pas été trouvé
    else if ($error == 1) {
        $errorMsg = "erreur dans les indentifiants!";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administration&msgError=" . $errorMsg . "');</script>";
    }
}

function administrationHome()
{
    require 'view/backEnd/administrationHome.php';
}

function paiement()
{

    $numberCommand = $_POST['numberCommand'];

    //var_dump($numberCommand);
    require 'models/backEnd/cartManager.php';
    $cartManager = new CartManagerBack();
    $paiement = $cartManager->numberCommandPaiement($numberCommand);

    echo "<script type='text/javascript'>document.location.replace('index.php?action=paiementSuccess&value=" . $numberCommand . "');</script>";
}
function paiementSuccess()
{
    $numberCommand = $_GET['value'];
    $info = [];
    require 'models/backEnd/cartManager.php';
    $cartManager = new CartManagerBack();
    $commandInfo = $cartManager->findUserWithCommandNumberCommand($numberCommand);

    array_push($info, $commandInfo);

    //nom de l'user récupéré
    $nameUser = $commandInfo['name'];
    require 'models/frontEnd/userManager.php';
    $userManager = new userManager();
    $userInfo = $userManager->findUser($nameUser);


    array_push($info, $userInfo);
    require 'models/frontEnd/cartManager.php';
    $cartManagerFront = new CartManager();
    $productsOrder = $cartManagerFront->findProductOfCommandUser($numberCommand);
    array_push($info, $productsOrder);





    // EMAIL
    /////////Variables
    $status = $info[0]['status'];
    $dateDeliveryOrder = $info[0]['dateDeliveryOrder'];
    $date = strtotime($dateDeliveryOrder);
    $format = date("Ymd", $date);
    //booleen pour verifier si retrait date a les heures
    if ($status == "retrait") {
        global $formatA;
        $formatA = date("His", $date);
    } else {
        global $formatA;
        $format = "120000";
    }




    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: remipradere@gmail.com\r\n";


    $subject = "Votre commande" . $numberCommand . " a été validé ";
    $to = $info[1]['email'];

    $message = '
    <html>
    <style>
    td {
        border:1px solid white
    }
    </style>
    <body>
    <header style="text-align: center;
    background-color: green;
    width: 259px;
    color: white;
    padding: 11px;
    margin: 20px auto;
    border: 2px solid brown;
    border-radius: 39px;">
        <h1>Ma ferme Bio</h1>
        <p>12 impasse octave sage</p>
        <p>31100 TOULOUSE</p>
        <p>06.06.06.06.06</p>
    </header>
    
    <div class="d-flex justify-content-center" style="
    border: 6px solid green;
    border-radius: 19px;
    background-color: #d9a679;
    border: 2px solid green;
    color : white;
    padding: 20px">
    
    <div>
        <h1> ' . $info[1]['name'] . ' </h1>
        <h2>' . $info[0]['dateDeliveryDay'] . '</h2>
    <div>
    <div>
        <p>
        ' . $info[1]['name'] . '
        ' . $info[1]['nameUser'] . '
        </p>
        <p>
        ' . $info[1]['adress'] . '
        </p>
        <p>
        ' . $info[1]['postalCode'] . '
        ' . $info[1]['town'] . '
        </p>
        <p>
        date de ' . $info[0]['status'] . ' : ' . $info[0]['collectTimeAndDay'] . '
        </p>
    <p>
    <p> creer un rappel sur votre google agenda? <p>
    <button style="background-color: green;
    border: 2px solid brown;
    font-size: 25px;
    border-radius: 16px;">
    <a style="text-decoration: none;
            color: white;
            font-size: 20px;
            display: flex;" 
    
    href="https://calendar.google.com/calendar/r/eventedit?text=Ma+Ferme+Bio' . $status . '+de+la+commande+n°' . $numberCommand . '&dates=' . $format . 'T' . $formatA . '/' . $format . 'T' . $formatA . '&details&location=12+impasse+octave+sage+31100+TOULOUSE&ctz=Europe/Brussels&trp=false">button</a>
    
    </button>

    <p> vous avez reçu un mail avec tous ce recapitulatif </p>
    <table style="
    border: 3px solid white;
    padding: 6px;"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Part Number</th>
            <th>Description</th>
            <th>Quantity</th>
        </tr>    
    </thead>
    <tbody>
    ';
    // utilisaton de foreach
    foreach ($info[2] as $data) {
        $message .=
            "<tr>
                            <td>" . $data['productName'] . "</td>
                            <td>" . $data['productQuantity'] . "</td>
                            <td>" . $data['typeOfQuantity'] . "</td>
                            <td>" . $data['productQuantity'] * $data['price'] . "</td>
        </tr>";
    }
    $message .= "</tbody>
    </table>
    </div>
    </body>
        </html>";




    mail($to, $subject, $message, $headers);




    ////var_dump($info);
    require 'view/frontEnd/paiementSuccess.php';
}

function newProduct()
{
    // mise en place de la fonction pour envoyer l'image
    require  'models/backEnd/imageManager.php';
    $imagemanager =  new imageManager();
    $imageUpload = $imagemanager->uploadImage();

    //mise en place pour creer le nouveau produit
    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack;
    $newProduct = $productManagerBack->addNewProduct();

    //notifications $get msg bien rajouté
    $msg = "Votre produit a bien été créé ";
    require 'view/backEnd/administrationHome.php';
}
function updateProduct()
{
    $data = basename($_FILES['avatar']['name']);
    if ($data != null) {
        require  'models/backEnd/imageManager.php';
        $imagemanager =  new imageManager();
        $imageUpload = $imagemanager->uploadImage();
    }

    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack;
    $updateProduct = $productManagerBack->updateProduct();

    //notifications $_GET msg bien rajouté
    $message = $imageUpload;
    require 'view/backEnd/administrationHome.php';
}

function deleteProduct()
{

    // require  'models/backEnd/imageManager.php';
    // $imagemanager =  new imageManager();
    // $imageUpload = $imagemanager->uploadImage();
    $id = $_POST['id'];
    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack;
    $deleteProduct = $productManagerBack->deleteProduct($id);

    require 'models/backEnd/imageManager.php';
    $imagemanager = new imageManager;
    $deleteImage = $imagemanager->deleteImageSrc($id);
}

function updateDeleteProduct()
{
    $id = $_POST['id'];
    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack;
    $deleteProduct = $productManagerBack->updateDeleteProduct($id);
}





// controller qui envoie le nouvel article 
function sendNewArticle()
{
    require 'models/backEnd/articlesManager.php';
    $articlesManager = new ArticlesManager();
    $sendArticle = $articlesManager->sendNewArticleModel();

    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $articles['title'] = str_replace("'", "\'", $title);
    $articles['description'] = str_replace("'", "\'", $description);

    require 'models/frontEnd/tokenManager.php';
    $tokenManager = new TokenManager();
    $Alltokens = $tokenManager->getAllTokens();


    require 'models/frontEnd/curlManager.php';
    $curlManager = new CurlManager();


    require  'models/backEnd/imageManager.php';
    $imagemanager =  new imageManager();
    $imageUpload = $imagemanager->uploadImage();


    // //annulation car je ne comprends pourquoi il y a un var dump
    // for ($i = 0; $i < count($Alltokens); $i++) {
    //     $curlPromotion = $curlManager->sendPromotionsAllTokens($Alltokens[$i], $articles);
    // }

    $message =  $imageUpload;
    require 'view/backEnd/administrationHome.php';
}

//router pour supprimer un article
function deleteArticle()
{

    // require  'models/backEnd/imageManager.php';
    // $imagemanager =  new imageManager();
    // $imageUpload = $imagemanager->uploadImage();
    $id = $_POST['id'];


    require 'models/backEnd/articlesManager.php';
    $articlesManagerBack = new ArticlesManager;
    $deleteArticle = $articlesManagerBack->deleteArticle($id);
    $message = 'l\'article ' . $id . ' a bien été supprimé';


    require 'view/backEnd/administrationHome.php';

    // echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}




//router pour envoyer une nouvelle promo ou news
function sendNewNews()
{
    // envoie du nouvel article
    require 'models/backEnd/newsManager.php';
    $newsManager = new newsManager();
    $sendnews = $newsManager->sendNewNewsModel();
    //on recupere l'ensemble des tokens
    require 'models/frontEnd/tokenManager.php';
    $tokenManager = new TokenManager();
    $Alltokens = $tokenManager->getAllTokens();


    $news['title'] = htmlspecialchars($_POST['title']);
    $news['description'] = htmlspecialchars($_POST['description']);
    require 'models/frontEnd/curlManager.php';
    $curlManager = new CurlManager();


    for ($i = 0; $i < count($Alltokens); $i++) {
        $curlPromotion = $curlManager->sendNewsAllTokens($Alltokens[$i], $news);
    }

    $message = "votre news a bien été publié";

    echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}
//router pour modifier une promo ou news existante 
function updateNews()
{
    require 'models/backEnd/newsManager.php';
    $newsManager = new newsManager();
    $sendnews = $newsManager->updateNewsModel();
    $message = "votre news a bien été modifier";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}

function deleteNews()
{
    $id = $_POST['id'];
    //var_dump($id);
    require 'models/backEnd/newsManager.php';
    $newsManager = new newsManager();
    $sendnews = $newsManager->deleteNewsModel($id);
    $message = "votre news a bien été supprimer";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}

function test()
{
    require 'models/backEnd/productManager.php';
    $productManager = new productManagerBack();
    $cartUser = $productManager->findAllProductOfNumberCommandUser();
}
//function pour ajouter ou supprime du stock depuis l'adminitration
function addStockProduct()
{
    $data = $_POST[0];
    $stock = $_POST[1] + 1;
    //var_dump($stock);
    //var_dump($data);

    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack();
    $addStock = $productManagerBack->addStockProduct($data, $stock);
}
function substractStockProduct()
{
    $data = $_POST[0];
    $stock = $_POST[1] - 1;
    //var_dump($stock);
    //var_dump($data);

    require 'models/backEnd/productManager.php';
    $productManagerBack = new productManagerBack();
    $substractStock = $productManagerBack->substrackStockProduct($data, $stock);
}

function validateCollectCommand()
{
    $post = json_decode($_POST);
    //var_dump($post['numberCommand']);
    $numberCommand = $post['numberCommand'];
    require 'models/backEnd/cartManager.php';
    $cartManagerBack = new CartManagerBack();
    $updateStatusCollectReady = $cartManagerBack->updateStatusCollectReady($numberCommand);


    // require 'models/backEnd/cartManager.php';
    // $cartManagerBack = new CartManagerBack();

}

function updateCommand()
{
    $id = $_POST['id'];
    $data = basename($_FILES['avatar']['name']);

    if ($data != null) {
        require  'models/backEnd/imageManager.php';
        $imagemanager =  new imageManager();
        $imageUpload = $imagemanager->uploadImage();
    }

    require 'models/backEnd/articlesManager.php';
    $articlesManager = new ArticlesManager;
    $updateCommand = $articlesManager->updateArticle($id);
    $message =  $imageUpload;
    require 'view/backEnd/administrationHome.php';
    //echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $imageUpload . "');</script>";
}
//fonction pour effacer definitivement une commande 
function deleteCommand()
{
    $id = $_POST['id'];
    require "models/backEnd/cartManager.php";
    $cartManager = new CartManagerBack();
    $deleteCommand = $cartManager->deleteCommandClient($id);
    $message = "votre commande a bien été supprimer";
    //var_dump($id);
    //echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";


}



//fonction pour effacer le message 
function deleteMessage()
{
    $id = $_POST['id'];
    require 'models/backEnd/contactManager.php';
    $ContactManager = new ContactManager;
    $deleteMessage = $ContactManager->deleteMessage($id);
    $message = "votre message a bien été supprimer";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}

// fonction pour envoyer une reponse a un utilisateur 
function sendAnswer()
{
    $id = $_POST['id'];
    $myAnswer = $_POST['myAnswer'];
    $lastMessage = $_POST['lastMessage'];
    require 'models/backEnd/contactManager.php';
    $ContactManager = new ContactManager;
    $changeStatusAnswer = $ContactManager->changeStatusAnswer($id, $myAnswer);
    // envoyer les mails
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: remipradere@gmail.com\r\n";
    // More headers

    $subject = $_POST['subject'];
    $to = "remipradere@gmail.com";
    $myAnswer = $_POST['myAnswer'];
    $message = ' 
    <html>
    <body>
    <header style="text-align: center;
        background-color: green;
        width: 259px;
        color: white;
        padding: 11px;
        margin: 20px auto;
        border: 2px solid white;
        border-radius: 39px;">
            <h1>Ma ferme Bio</h1>
            <p>12 impasse octave sage</p>
            <p>31100 TOULOUSE</p>
            <p>06.06.06.06.06</p>
    </header>

    <div style="
    border: 6px solid green;
    border-radius: 19px;
        background-color: #d9a679;
        border: 2px solid green;
        color : white;
        padding: 20px">
        <h2>' . $subject . ' </h2>
        <h3> Message d origine : ' . $lastMessage . '  </h3>
        <h3
            style="
                margin-top: 37px;
            "
        >  Madame Monsieur </h3>
        <p>' . $myAnswer . '</p>
    </div>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
    $message = "votre message a bien été envoyé";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome&message=" . $message . "');</script>";
}
