<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <!-- polices -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <!-- integration de la librairie axios -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- integration de vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- integration de font-awesome -->
    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <title>Ma ferme Bio</title>
</head>


<body>
    <div id="app">
    <header class="d-flex fixed-top justify-content-between">
        <a id="logo" class="pl-4 ">
            Ma Ferme bio
        </a>
        <nav class="d-flex navbar navbar-light pr-2">
            <div id="navLargeScreen">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-items">
                        <a class="nav-link" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="sommaireArticle.html">Actualités</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="connexion.html">Connexion</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="administrationConnexion.html">Connexion</a>
                    </li>
                </ul>
            </div>
            <div id="togglecontainer">
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div id="collapseExample" class="collapse">
                    <div>
                        <a class="nav-link text-light">Boutique</a>
                        <a class="nav-link text-light">Boutique</a>
                        <a class="nav-link text-light">Boutique</a>
                        <a class="nav-link text-light">Boutique</a>
                    </div>
                </div>
            </div>
            <div>
                <button>
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </div>
        </nav>
    </header>
    <main>
    <!-- section principale de presentation du shop -->
    <section id="mainPositionAbsolute">
        <picture id="imageParrallax">
            <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg"
                media="(max-width: 480px)">
            <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg"
                media="(max-width: 1000px)">
            <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg"
                alt="panier en osier se situant sur la gauche dans un champ vert ">
        </picture>
    </section>

    <section>
        <div class="col-md-6 container text-center text-light" id="presentationShopAdministration">
            <div class="container px-md-3 shopTitle">
                <h1 class="text-light">Ma ferme Bio</h1>
                <h2>Contact </h2>
                <p>Si vous désirez nous contacter , vous pouvez remplir ce formulaire</p>
            </div>
        </div>
    </section>


    <section id="administrationShop" class="col-md-8 m-auto text-center paddingBottomFooter">
        <form class="col-md-8 text-light" action="" method="POST">



            <div class="form-group">
                <label> Pseudo :
                </label for="email">
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label> Mot de passe :
                </label for="email">
                <input type="email" name="email" id="email">
            </div>

            <div class="form-group">
                <input class="formButton" type="submit" value="Envoyer" name="btnContact">
            </div>


        </form>
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
                        <input class="formButton" type="submit" value="Envoyer" name="btnContact">
                    </div>
                </form>
            </template>
        </transition>
    </section>
</main>
    <footer>
        <div class="row introduction">
            <div class="col-md-4">
                <h3 class="text-center ">Contactez-Nous</h3>
                <div>
                    <div>
                        <div>
                            <i class="fas fa-home"></i>
                        </div>
                        <p>
                            La ferme Bio <br>

                            17 rue Alphonse Daudet <br>
                            82100 OOOOO
                        </p>
                    </div>
                    <i class="fas fa-phone"></i>
                </div>
                <p>
                    00000000000
                </p>
                <div>
                    <i class="fas fa-phone"></i>
                </div>
                <p>
                    xxxxxxxxx@gmail.com
                </p>

            </div>
            <div class="col-md-4" id="">
                <h3>Horaires d'ouverture</h3>
                <div>
                    <ul>
                        <li>Lundi: 9h à 18h </li>
                        <li>Mardi: 9h à 18h</li>
                        <li>Mercredi: 9h à 18h</li>
                        <li>Jeudi: 9h à 18h</li>
                        <li>Vendredi: 9h à 18h</li>
                        <li>Samedi: 9h à 18h</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4" id="">
                <h3>Réseaux Sociaux</h3>
                <div>
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-pinterest"></i></a>
                </div>
            </div>


        </div>
    </footer>
</div> 
<script>
    new Vue({
        el:"#app",
        data() {
            return {
                sendNewPassword: false
            }
        },
        methods:{
            forgotPassword(){
                this.sendNewPassword =! this.sendNewPassword;
            }
        }
    })
</script>
</script>
</body>




</html>