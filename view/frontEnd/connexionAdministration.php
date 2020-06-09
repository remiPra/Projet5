<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- polices -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <!-- integration de la librairie axios -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- integration de vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- integration de font-awesome -->
    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <title>Connexion au site</title>
</head>


<body>
    <div id="app">
        <header class="d-flex fixed-top justify-content-between">
            <div>
                <a id="logo" class="pl-4 ">
                    Ma Ferme bio
                </a>
                <span id="nameSession">
                    <?php if (isset($_SESSION['name'])) {
                        echo 'bienvenue ' . htmlspecialchars($_SESSION['name']) . '';
                    }; ?> </p>
                </span>


            </div>
            <nav class="d-flex navbar navbar-light pr-2">
                <div id="navLargeScreen">
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-items">
                            <a class="nav-link" href="index.php?action=index">Accueil</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" href="index.php?action=contact">Contact</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" href="index.php?action=blog">Actualités</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" <?php if (isset($_SESSION['name'])) {
                                                    echo 'href="index.php?action=deconnexion">Deconnexion';
                                                } else {
                                                    echo 'href="index.php?action=connexion">Connexion';
                                                }
                                                ?> </a> </li> <li class="nav-items">
                                <a class="nav-link" href="administrationConnexion.html">Administration</a>
                        </li>
                    </ul>
                </div>
                <div id="togglecontainer">
                    <button class="navbar-toggler navbar-light toggleMenu" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span class="navbar-toggler-icon text-light"></span>
                    </button>
                    <div id="collapseExample" class="collapse">
                        <div>

                            <a class="nav-link" href="index.php?action=index">Accueil</a>

                            <a class="nav-link" href="index.php?action=contact">Contact</a>

                            <a class="nav-link" href="index.php?action=blog">Actualités</a>

                            <a class="nav-link" <?php if (isset($_SESSION['name'])) {
                                                    echo 'href="index.php?action=deconnexion">Deconnexion';
                                                } else {
                                                    echo 'href="index.php?action=connexion">Connexion';
                                                }
                                                ?> </a> <a class="nav-link" href="administrationConnexion.html">Administration</a>

                        </div>
                    </div>
                </div>
                <div>
                    <button id="btnCart" @click="modal()">
                        <i class="fas fa-shopping-cart">{{numberQuantityCart}}</i>
                    </button>
                </div>
            </nav>
        </header>
        <!-- section principale de presentation du shop -->
        <section id="mainPositionAbsolute">
            <picture id="imageParrallax">
                <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg" media="(max-width: 480px)">
                <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg" media="(max-width: 1000px)">
                <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg" alt="panier en osier se situant sur la gauche dans un champ vert ">
            </picture>
        </section>
        <!-- section de presentation de la page -->
        <main>

            <section>
                <div class="col-md-9 container text-center text-light" id="presentationShopAdministration">
                    <div class="container px-md-3 shopTitle">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>Connexion</h2>
                        <p id="textIntroConnexion">Pour pouvoir passer une commande , connectez vous où inscrivez vous pour nous rejoindre </p>
                        <p><?php if (isset($_GET['msgError'])) {
                                echo htmlspecialchars($_GET['msgError']);
                            }; ?> </p>
                    </div>
                </div>
            </section>

            <!-- section formulaire de connexion a l'administration     -->
            <section id="administrationShop">
                <form-connexion-administration></form-connexion-administration>
                <div class="form-group">
                    <button @click="forgotPassword" class="buttonBrown">Mot de passe oublié?</button>
                </div>
                <transition name="fade">
                    <template v-if="sendNewPassword">
                        <form action="">
                            <div class="form-group">
                                <label>veuillez entrez votre email pour recuperer votre mot de passe?</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <input class="formButton" type="submit" value="Envoyer" name="btnGetPassword">
                            </div>
                        </form>
                    </template>
                </transition>
            </section>
        </main>
    </div>
    <script>
        Vue.component('form-connexion-administration', {
            data() {
                return {
                    sizeSignUp: "col-md-6",
                    connexion: true,
                    signInForm: false
                }
            },
            methods: {
                signIn() {
                    this.sizeSignUp = "col-md-8";
                    this.connexion = false;
                    this.signInForm = true
                }
            },
            template: `
        <div class="col-xl-8 m-auto d-flex flex-wrap justify-content-between">    
            <div class="m-auto text-light" :class="sizeSignUp">
                <div class="col-md-6">
                    <div class="introConnexion text-light text-center">
                        <H3>Connectez vous</H3>
                        <p>remplissez les différents champs</p>
                    </div>
                    <form action="index.php?action=checkPassword" method="POST">
                        <div class="form-group">
                            <label for="name"> Pseudo : 
                            </label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="password"> password :
                            </label>
                            <input type="password" name="password" id="subject">
                        </div>
                        <div class="form-group">
                            <input class="formButton" type="submit" value="Envoyer" name="btnContact">
                        </div>
                    </form>


                </div>
            </div>
        </div>`
        })

        new Vue({
            el: "#app",
            data:{
                sendNewPassword: false
            },
            methods:{
            forgotPassword(){
                //ouverture et fermeture
                this.sendNewPassword =! this.sendNewPassword;
            }
        }
    })

    </script>
</body>

</html>