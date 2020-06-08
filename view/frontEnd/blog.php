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
    <title>Actualités</title>
</head>


<body>
    <div id="app">
        <template>
        <header class="d-flex fixed-top justify-content-between">
                <div>
                    <a id="logo" class="pl-4 ">
                        Ma Ferme bio
                    </a>
                    <p id="nameSession">
                        <?php if (isset($_SESSION['name'])) {
                            echo 'bienvenue ' . htmlspecialchars($_SESSION['name']) . '';
                        }; ?> </p>
                    </p>


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




        <!-- blog -->
        <template v-if="sommaire">
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
                <div class="col-md-12 container text-center" id="presentationShopAdministration">
                    <div class="text-light container px-md-3 shopTitle">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>Contact </h2>
                        <p>Si vous désirez nous contacter , vous pouvez remplir ce formulaire</p>
                    </div>
                </div>
            </section>


            <section>
                <div class="container" id="listArticles">
                    <div v-for="(article,i) in articles.data" :key="i" class="row col-md-9 news">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <h3>{{article.title}}</h3>

                            <h4>{{article.date}}</h4>
                            <p>{{article.sentence}}</p>
                            <button @click="articleView=true;sommaire=false;showArticle(i)">Lire la suite</button>
                        </div>
                    </div>
                </div>
            </section>
        </template>

        <transition name="fade">
            <template v-if="articleView">
                <article id="articleView">
                    <div class="col-md-10 container text-center">
                        <div class="text-light container px-md-3 shopTitle">
                            <h1>{{currentArticle.title}} </h1>
                        </div>
                        <div>
                            <button class="buttonCloseArticle" @click="articleView=false;sommaire=true; window.scrollTo(0, 0)">Fermer</button>
                        </div>
                    </div>

                    <div class="container-fluid row">
                        <div class="col-xl-6 col-sm-6 m-auto" id="imageArticle">
                            <figure>
                                <img src="./assets/images/sliderBoutique/a-woman-in-her-shop.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </div>
                        <div class="col-xl-6" id="articleViewtext">
                            <h2>{{currentArticle.title}}</h2>
                            <p>{{currentArticle.content}}</p>
                        </div>
                    </div>
                </article>
            </template>
        </transition>

        </template>
    </div>

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
            <div class="col-md-4" >
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
            <div class="col-md-4" >
                <h3>Réseaux Sociaux</h3>
                <div>
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-pinterest"></i></a>
                </div>
            </div>


        </div>
    </footer>

    <script>
        // Définition d'un nouveau composant appelé `button-counter`
        Vue.component('button-counter', {
            props:{
                tire:{
                    type:Object
                }
            },
            data() {
                return {
                    remi: "pradere"
                }
            },
            template: `<h2><p>{{remi}}</p>
            nouvel article <p v-for="t in tire">{{t.title}}</p> </h2>`
        })

        Vue.component('menu-article',{
            template:`
        <div>
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
                <div class="col-md-12 container text-center" id="presentationShopAdministration">
                    <div class="text-light container px-md-3 shopTitle">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>Contact </h2>
                        <p>Si vous désirez nous contacter , vous pouvez remplir ce formulaire</p>
                    </div>
                </div>
            </section>


            <section>
                <div class="container" id="listArticles">
                    <div class="row col-md-9 news">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <h3>la recette des bannanes</h3>

                            <h4>Publié le 12-12-2019</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus corporis cum nesciunt
                                rerum
                                consectetur debitis, perferendis quae maiores quisquam culpa harum autem iusto
                                voluptate,
                                deserunt quidem sunt distinctio nostrum inventore.</p>
                            <button @click="articleView=true;
                                            sommaire=false";
                                            pageDetail()
                                                            >Lire la suite</button>
                        </div>
                    </div>
                </div>
            </section>
        <div>`,
        })


        new Vue({
            el: '#app',
            data: {
                sommaire: true,
                articleView: false,
                currentIndex:0,
                tire:[
                    {
                    title:"remi",
                    rmc:2
                    },
                    {
                    title:"fast",
                    rmc:4
                    },
                    ]
                ,
                articles:{
                    data:[{
                        id:"1",
                        title:"la recette des bananes",
                        date:"11-04_1890",
                        sentence:"la fabuleuse recette des bananes flambées avec nos produits",
                        content:`
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus repellendus
                                temporibus
                                omnis
                                aliquid ipsum quod esse dolor! Debitis accusantium corporis velit fuga dicta delectus,
                                veritatis hic
                                provident consectetur necessitatibus ratione.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus repellendus
                                temporibus
                                omnis
                                aliquid ipsum quod esse dolor! Debitis accusantium corporis velit fuga dicta delectus,
                                veritatis hic
                                provident consectetur necessitatibus ratione.
                            `
                    },
                    {
                        id:"1",
                        title:"la recette des pommes",
                        date:"11-04_1890",
                        sentence:"la fabuleuse recette des pommes flambées avec nos produits",
                        content:`
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus repellendus
                                temporibus
                                omnis
                                aliquid ipsum quod esse dolor! Debitis accusantium corporis velit fuga dicta delectus,
                                veritatis hic
                                provident consectetur necessitatibus ratione.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus repellendus
                                temporibus
                                omnis
                                aliquid ipsum quod esse dolor! Debitis accusantium corporis velit fuga dicta delectus,
                                veritatis hic
                                provident consectetur necessitatibus ratione.
                            `
                    }]
                }
            }
            ,
            computed:{
                currentArticle(){
                    return this.articles.data[this.currentIndex]
                }
            },
            methods:{
                showArticle(id){
                    window.scrollTo(0, 0);
                    this.currentIndex = id;
                }
            }
        })

          </script>


</body>



</html>