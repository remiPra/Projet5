<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script>
    <!-- For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics. -->
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>
    <!-- polices -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <!-- integration de la librairie axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <!-- librairie aos -->
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
    <link rel="manifest" href="./manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff"> 
    <meta name="msapplication-TileImage" content="./assets/icons/icon-128x128.png">
    <meta name="theme-color" content="#ffffff"> 
    <title>Ma ferme Bio</title>
</head>

<body>
    <div id="app">
        <template>
            <!-- header comprenant le logo et menu -->
            <header class="d-flex fixed-top justify-content-between">
                <div>
                    <a id="logo" class="pl-4 ">
                        Ma Ferme bio
                    </a>
                   


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
                            <li class=" nav-items">
                                <?php if (isset($_SESSION['name'])) {
                                    echo '
                                    <button @click="keyUserModal"> <i class="far fa-user"></i></button>
                                    <span>'.$_SESSION['name'].'</span>
                                    <template v-if="keyUserInfo">
                                        <div class="d-flex flex-column">
                                            <a href="index.php?action=deconnexion">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                            <button @click="userInfoShowCommand">Mon Compte</button>
                                        </div>
                                    </template>
                                                    '
                                    ;} else {
                                                        echo '<a class="nav-link" href="index.php?action=connexion">Connexion</a> ';
                                                                                                        
                                                    }
                                                        ?> 
                            
                            </li> 
                            
                        </ul>
                    </div>
                    <div id="togglecontainer">
                        <template v-if="keyToggle">
                        <button class="navbar-toggler navbar-light toggleMenu" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span class="navbar-toggler-icon text-light"></span>
                        </button>
                        <div id="collapseExample" class="collapse">
                            <div>

                            <a class="nav-link" href="index.php?action=index">Accueil</a>
                                
                            <a class="nav-link" href="index.php?action=contact">Contact</a>

                                <a class="nav-link" href="index.php?action=blog">Actualités</a>

                                <?php if (isset($_SESSION['name'])) {
                                    echo '
                                    <button @click="keyUserModal"> <i class="far fa-user"></i></button>
                                    <template v-if="keyUserInfo">
                                        <div class="d-flex flex-column">
                                            <a href="index.php?action=deconnexion">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                            <button @click="userInfoShowCommand">Mon Compte</button>
                                        </div>
                                    </template>
                                                    '
                                    ;} else {
                                                        echo '<a class="nav-link" href="index.php?action=connexion">Connexion</a> ';
                                                                                                        
                                                    }
                                                        ?>
                                  
                            </div>
                        </div>
                        </template>
                    </div>
                    <div>
                        <button id="btnCart" @click="modal()">
                            <i class="fas fa-shopping-cart">{{numberQuantityCart}}</i>
                        </button>
                        <div class=" arrowCartSlide">
                             <i :class="arrowSlide" class="fas fa-arrow-circle-up"></i>
                        </div>
                    </div>
                </nav>
            </header>
            <div v-if="router.main">
                <!-- partie principale de presentation du shop -->
                <section id="main">
                    <!-- selection d'image selon la résolution de l'ecran -->
                    <picture id="imageParrallax">
                        <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg" media="(max-width: 480px)">
                        <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg" media="(max-width: 800px)">
                        <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg" alt="panier en osier se situant sur la gauche dans un champ vert ">
                    </picture>
                    <div id="containerMain" class="row">
                        <main-container :namesession="nameSession"></main-container>
                        <slider-news :newsprops="newsProps"></slider-news>
                    </div>
                </section>
                <!-- section de la partie slider pour la version mobile -->
                <section>
                    <slider-new-mobile :newsprops="newsProps"></slider-new-mobile>
                </section>
                <!-- section de la partie des infos du magasin -->
                <section class="row">
                    <text-shop></text-shop>
                </section>
                <!-- separation utilisant un svg -->
                <section class="separation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#26802e" fill-opacity="1" d="M0,224L48,240C96,256,192,288,288,261.3C384,235,480,149,576,112C672,75,768,85,864,101.3C960,117,1056,139,1152,138.7C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </section>
                <!-- section de la partie de la categorie des produits -->
                <section id="products">
                    <shop-products 
                        @onshowcartoftheweek="showCartOfTheWeek">
                    </shop-products>
                </section>
                <!-- details des différents produits -->
                <section id="productsList">
                    <shop-products-details @liveslidenextproduct="liveSlideProductItemNext" @liveslidepreviousproduct="liveSlideProductItemPrevious" @searchproduct="searchProduct" @resetproduct="resetProduct" :elements="productsSelected" @onsubstractcart="substractCart" @onaddcart="addCart" @onselectedcategory="selectedCategory" @onsearchproductchange="changeProductSelected" @onseeproductdetail="seeProductDetail">
                    </shop-products-details>
                </section>
                <section class="classSlider">
                    <shop-products-details-mobile @liveslidenextproduct="liveSlideProductItemNext" @liveslidepreviousproduct="liveSlideProductItemPrevious" @searchproduct="searchProduct" @resetproduct="resetProduct" :elements="productsSelected" @onsubstractcart="substractCart" @onaddcart="addCart" @onselectedcategory="selectedCategory" @onsearchproductchange="changeProductSelected" @onseeproductdetail="seeProductDetail">
                    </shop-products-details-mobile>
                </section>
            </div>
            <!-- section du cart lorsque l'on clique sur l'icone cart -->
            <div id="cartDirection">
                <section id="overlay" title="Cliquez deux fois" v-if="router.showModal">
                    <div>
                        <button id="closeModal" @click="closeModal">fermer</button>
                    </div>
                    <cart-product @onscrollconfirmcart="_scrollToConfirmCart" :cartkeyweek="cartKeyWeek" :carts="carts" :showModal="router.showModal" @onaddcart="addCart" @onsubstractcart="substractCart"></cart-product>
                </section>
            </div>


            <!-- section faisant apparaitre les details de l'un des produits -->
            <transition name="fade">
                <template v-if="router.productDetail">
                    <div id="productDetailModal">
                        <productdetailview :currentarticle="productSelectedDetail" @oncloseproductdetail="closeProductDetail">
                        </productdetailview>
                    </div>
                </template>
            </transition>
            <!-- section de la partie des informations de l'user -->
            <div id="infoCommandUser">
            <transition name="fade">
                <template v-if="router.userInfo">
                    <div id="userInfoCommand">
                        <info-user-command
                            @oncartswitholdcommand="cartsWithOldCommand"
                            @onCloseInfoUserCommand="CloseInfoUserCommand"
                            :props="propsCompte"></info-user-command>
                    </div>
                </template>
            </transition>
            </div>
            


            

            <footer-component></footer-component>

           

        </template>
    </div>
   
    <!-- vue composant du header -->
    <script src="components/frontEnd/home/header-home.js"></script>
    <!-- vue composant des infos de slider  -->
    <script src="./components/frontEnd/home/slider-news.js"></script>
    <!-- vue composant pour la version mobile -->
    <script src="./components/frontEnd/home/slider-news-mobile.js"></script>
    <!-- vue composant de la presentation du site  -->
    <script src="./components/frontEnd/home/text-shop.js"></script>
    <!-- vue composant par catégories  -->
    <script src="./components/frontEnd/home/product-shop.js"></script>
    <!-- vue composant des differents produits -->
    <script src="./components/frontEnd/home/product-list.js"></script>
    <!-- vue composant du cart  -->
    <script src="./components/frontEnd/home/cart-product.js"></script>
    <!-- vue composant du detail d'un produit -->
    <script src="./components/frontEnd/home/product-detail.js"></script>
    <!-- vue composant des différents produits en version mobiles  -->
    <script src="./components/frontEnd/home/product-list-mobile.js"></script>
    <!-- vue composant du footer -->
    <script src="./components/frontEnd/footer-component.js"></script>
                                        
    <script>
        Vue.component('info-user-command',{
            props:['props'],
            data() {
                return {
                    details: [""],
                    keydetail:false,
                    numberCommandDetail:""
                }
            },
            template:`
            
            <article id="articleView">    
                    <div class="col-md-10 container text-center">
                      
                        <div class="text-light container px-md-3 shopTitle">
                            <h1>Info de l'utilisateur  </h1>
                            <button id="buttonCloseInfoUserCommand" @click="buttonCloseInfoUserCommand">Fermer la fenetre</button>
                        </div>
                    </div>

                    <div class="container-fluid row">
                        <div class="col-xl-3 col-sm-5 buttonBrown" id="imageArticle">
                            <h3>{{props[0].name}} {{props[0].nameUser}}</h3>
                            <p>{{props[0].adress}}</p>
                            <p>{{props[0].town}}</p>
                            <p>{{props[0].phone}}</p>
                            <p>{{props[0].email}}</p>
                        </div>
                        <div class="col-xl-9 col-sm-7 text-light" id="articleViewProductDetail">
                        <template v-if="keydetail == false">
                            <h3 class="marginTop">Commande en cours</h3>
                            <table class="infoUserTable">
                                <thead>
                                    <th>N°commande</th>
                                    <th>status</th>
                                    <th>Prix</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in props[1]">
                                        <td v-if="data.statusCommand==200">{{data.numberCommand}}</td>
                                        <td v-if="data.statusCommand==200">{{data.status}}</td>
                                        <td v-if="data.statusCommand==200">{{data.totalPrice}}</td>
                                        <td v-if="data.statusCommand==200"><button @click="detailProduct(data.numberCommand)">Voir détail</button></td>
                                    </tr>    
                                </tbody>
                            </table>
                            <h3 class="marginTop">Commande terminé</h3>
                            <table class="infoUserTable">
                                <thead>
                                    <th>N°commande</th>
                                    <th>status</th>
                                    <th>Prix</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in props[1]">
                                        <td v-if="data.statusCommand==400">{{data.numberCommand}}</td>
                                        <td v-if="data.statusCommand==400">{{data.status}}</td>
                                        <td v-if="data.statusCommand==400">{{data.totalPrice}}</td>
                                        <td v-if="data.statusCommand==400"><button @click="detailProduct(data.numberCommand)">Voir détail</button></td>
                                    </tr>    
                                </tbody>
                            </table>
                            <h3 class="marginTop">Commande non confirmé</h3>
                            <table class="infoUserTable">
                                <thead>
                                    <th>N°commande</th>
                                    <th>status</th>
                                    <th>Prix</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in props[1]">
                                        <td v-if="data.statusCommand==0">{{data.numberCommand}}</td>
                                        <td v-if="data.statusCommand==0">{{data.status}}</td>
                                        <td v-if="data.statusCommand==0">{{data.totalPrice}}</td>
                                        <td v-if="data.statusCommand==0"><button @click="detailProduct(data.numberCommand)">Voir détail</button></td>
                                    </tr>    
                                </tbody>
                            </table>
                                    
                    
                            
                            </template>

                            <template v-if="keydetail">
                            <h3> Commande : {{numberCommandDetail}}</h3>
                            <button class="ButtonGreen box-shadow marginAuto" @click="closeDetailProductName">revenir au tableau</button>
                            <table class="buttonBrown infoUserDetailTable">
                                <thead>
                                    <th>Nom du produit</th>
                                    <th>Quantité</th>
                                    <th>Type de Quantité</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in details.data">
                                            <td>{{data.productName}}</td>
                                            <td>{{data.productQuantity}}</td>
                                            <td>{{data.typeOfQuantity}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button @click="cartsReopen(details.data)" class="marginAuto ButtonGreen box-shadow">Reutiliser cette liste</button>
                                    
                            </template>



                        </div>
                    </div>
            </article>
            `,
            methods:{
                buttonCloseInfoUserCommand(){
                    this.$emit('oncloseinfousercommand')
                },
                detailProduct(data){
                    this.keydetail =! this.keydetail
                    this.props[2].forEach( (element) => {
                        if(element.numberCommand == data){
                            this.details = element.datas;
                            console.log(this.details)
                        }

                    })
                    this.numberCommandDetail = data;
                },
                closeDetailProductName(){
                    this.keydetail = false;
                    this.numberCommandDetail = "";
                },
                cartsReopen(data){
                    console.log(data);
                    this.$emit("oncartswitholdcommand",data)
                }
            }
        })
    
    </script>






    <script>
        // vue principale 
        let app = new Vue({
            el: "#app",
            //slide effect cart
            data: {
                //toggle close open
                keyToggle:true,
                arrowSlide:"displayNone",
                //Router de la page
                router: {
                    userInfo:false,
                    main: true,
                    //confirmation du cart
                    showModal: false,
                    blog: false,
                    productDetail: false,
                    cartOfTheWeek: false,
                },
                scroll: {
                    cartConfirm: 2780,
                },
                cartKeyWeek: false,
                duplicateCart: false,
                products: {
                    productList: [],
                    liveSlideProductItem: "0",
                    msgStock: "",
                },
                productsSelected: {},
                productSelectedDetail: [],
                memory: [],
                ///////info user///////////////
                propsCompte:[],
                /////news///////
                newsProps:{
                    news:{},
                    count:""
                }, 

                keyUserInfo:false,
                token:"",
                name:"unknow",
                nameSession:"<?php if(isset($_SESSION['name'])){echo  $_SESSION['name']; } else {echo "";}?>",
                //nombre de produit en cart
                numberQuantityCart: 0,
                //data du carts
                carts: [],
                quantityCart: "",

            },
            created() {
                window.addEventListener('scroll', this.handleScroll);
            },
            mounted: function() {
                //recuperation du nom
                this.userCommandAxios();
                //recuperation des news
                this.getAllNews();
                //nombre de news
                this.numberOfNews();

                //etudions la largeur de la fenetre
                this.$nextTick(function() {
                    window.addEventListener('resize', this.getWindowWidth);
                    window.addEventListener('resize', this.getWindowHeight);

                    //Init
                    this.getWindowWidth()
                    //this.getWindowHeight()

                })
                
                this.getAllProducts()
                this.products.liveSlideProductItem = 0
                this.productsSelected = this.products;
                if (JSON.parse(localStorage.getItem("carts")).length != 0) {
                    //recuperation du local storage
                    console.log(localStorage.getItem("carts").length)
                    let storageInit = JSON.parse(localStorage.getItem("carts"));
                    this.carts = storageInit;
                    console.log('preEnclencher')
                    // this.carts.forEach(cart => {
                    //     console.log('enclenher')
                    //     this.products.productList.forEach(product => {
                    //         console.log("probleme1")
                    //         if (product.title == cart.title) {
                    //             console.log("probelem2")
                    //             product.quantityCartProduct = cart.quantity
                    //             console.log(product.quantityCartProduct)
                    //             console.log("probleme avec le cart")
                    //         }
                    //         else {console.log("probleme")}
                    //     })

                    // })
                    console.log(this.products)
                    //console.log(this.productsSelected.productList)



                    this.numbersOfproducts()
                } else {
                    this.productsSelected = this.products
                    this.carts = []
                }

            },


            methods: {
                CloseInfoUserCommand(){
                    this.router.userInfo = false;
                    this.keyUserInfo = false;
                    this.keyToggle = true;
                    this.scrolling('app');
                },
                //ouverture du modal pour les infos de l'user
                userInfoShowCommand(){
                    this.router.userInfo = true;
                    this.keyUserInfo = false;
                    this.scrolling('infoCommandUser');
                    this.keyToggle = false;
                    setTimeout(()=>{this.keyToggle = true},1000)
                },
                // ouverture du modal 
                keyUserModal(){
                    console.log(this.keyUserInfo)
                    this.keyUserInfo =! this.keyUserInfo
                   
                },
                //commande avec une ancienne commande
                cartsWithOldCommand(lastCommand){
                    //vérifions si l'article existe
                    console.log(this.productsSelected.productList)
                    console.log(lastCommand)
                    let newCart = []
                    this.carts=[]
                    this.productsSelected.productList.forEach( (data) => {
                        lastCommand.forEach( (oldCart) => {
                            if(data.title == oldCart.productName){
                                newCart = data
                                newCart.title = oldCart.productName;
                                console.log(newCart.quantityStock)
                                console.log(oldCart.productQuantity)
                                //attention si la quantité est plus grande qu le stock
                                console.log(newCart.quantityStock + ">" + oldCart.productQuantity)
                                if(data.quantityStock > oldCart.productQuantity){
                                    newCart.quantity = newCart.quantityStock
                                    console.log(newCart.quantity)
                                } else if(data.quantityStock<oldCart.productQuantity){
                                    console.log(newCart.quantity)
                                    newCart.quantity = oldCart.productQuantity
                                }
                                newCart.totalPriceProduct = newCart.quantity * newCart.price
                                
                                this.carts.push(newCart)
                                
                            }
                        })
                        console.log(this.carts)
                    })
                    this.numbersOfproducts()
                    this.modal();
                },
                //
                userCommandAxios(){
                    console.log("users")
                    let name = this.nameSession;
                    console.log(name);
                    axios.get(`proceed.php?action=userCommand&name=${name}`).then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);
                            app.propsCompte = response.data;      
                            console.log("success");
                        }
                    });
                },
                // methode de recuperation des news
                getAllNews() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllNews").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);

                            app.newsProps.news = response.data
                            console.log(app.newsProps.news)
                            console.log("articles news");
                        }
                    });
                },
                numberOfNews(){
                    console.log("users")
                    axios.get("proceed.php?action=countNumberOfNews").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);

                            app.newsProps.count = response.data
                            console.log(app.newsProps.news)
                            console.log("articles news");
                        }
                    });

                },




                //methode de scroll 
                _scrollToConfirmCart(){
                    // console.log("succesScrollTO")
                    // window.scrollTo({
                    //     top:  this.scroll.cartConfirm,
                    //     behavior: 'smooth'
                    // })
                    this.scrolling('cartContainerModal')

                },
                //nous ecoutons le scroll
                getWindowWidth(event) {
                    this.windowWidth = document.documentElement.clientWidth;
                    if (this.windowWidth < 500) {
                        this.scroll.cartConfirm = 3943;
                        console.log("small");
                        console.log(this.scroll.cartConfirm)
                    } else {
                        this.scroll.cartConfirm = 2780;
                        console.log("large");
                        console.log(this.scroll.cartConfirm)
                    }
                },
                
                //voir le panier garni des produits
                showCartOfTheWeek() {
                    this.carts = [];
                    this.cartKeyWeek = true,
                        console.log(this.carts)
                    this.productsSelected.productList.forEach(element => {
                        if (element.productCartOfTheWeek == 1) {
                            this.carts.push(element)
                        }
                    });
                    this.router.cartOfTheWeek = true;
                    console.log("cartoftheweek")
                    this.numbersOfproducts();
                    this.modal();
                },
                //methode pour fermer le detail d'un produit
                closeProductDetail() {
                    this.cartKeyWeek = false;
                    this.router.main = true;
                    this.router.productDetail = false;
                    this.productSelectedDetail = "";
                    setTimeout(() => {
                        this.scrolling("scrollingProducts")
                    }, 100)
                },
                //methode pour afficher le detail d'un produit 
                seeProductDetail(data) {
                    console.log(data);

                    this.router.main = true;
                    this.router.productDetail = true;
                    this.productSelectedDetail = data;
                    setTimeout(() => {
                        this.scrolling("productDetailModal")
                    }, 100)
                },
                //methode pour recuperer les produits
                getAllProducts() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllProducts").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);
                            app.products.productList = response.data
                            app.productsSelected.productList = response.data
                            app.memory = response.data
                            console.log(app.products)
                            console.log("success");
                        }
                    });
                },

                searchProduct(data) {
                    if(data!=""){
                        document.getElementById("previousProduct").style.display = "none";
                        document.getElementById("nextProduct").style.display = "none";
                
                    } else {
                        document.getElementById("previousProduct").style.display = "block";
                        document.getElementById("nextProduct").style.display = "block";
                
                    }


                    // on cré un tableau avec tous les noms des produits
                    let products = this.products.productList;
                    let Word = data
                    //passage en minuscule
                    let word = Word.toLowerCase()
                    console.log(word)
                    this.productsSelected.productList.forEach(element => {
                        let nomProduit = element.title.toLowerCase()
                        // si la chaine inclut un des mots
                        if (nomProduit.includes(word)) {
                            element.visible = "displayFlex"
                            console.log(element)
                            //this.$emit("onsearchproductchange",element)
                            this.productsSelected.liveSlideProductItem = this.productsSelected.productList.indexOf(element);
                            console.log(this.products.liveSlideProductItem)
                            console.log("succes")
                        } else {
                            element.visible = "displayNone"
                            console.log("alert")
                        }
                    })
                },
                addCart(cart) {
                    
                    //verification si le produit existe deja
                    this.carts.forEach(element => {
                        if (element.title == cart.title) {
                            //stop si il n 'y a plus de stock'
                            element.quantity++;
                            this.productsSelected.productList.forEach(prod =>
                                //retrouvons le produit selectionné
                                {
                                    if (element.title == prod.title) {
                                        prod.keyChange = 1;
                                        // si le nombre demandé est trop grand
                                        if (element.quantity > prod.quantityStock) {
                                            element.quantity--;
                                            prod.msgStock = "quantité resté à " + element.quantity +
                                                "manque de stock"
                                        } else {
                                            prod.msgStock = "disponible"
                                        }

                                    }
                                }
                            )
                            this.productsSelected.productList.forEach(product => {
                                if (product.title == element.title) {
                                    product.quantityCartProduct = element.quantity
                                }
                            })
                            element.totalPriceProduct = element.quantity * element.price
                            this.duplicateCart = true




                        }

                    })
                    //si il est deja present on ne le rajoute pas
                    if (!this.duplicateCart) {
                        this.products.productList.forEach(product => {
                            if (product.title == cart.title) {
                                //booleen du panier
                                product.keyChange = 1
                                product.quantityCartProduct = 1
                            }
                        })
                        this.carts.push(cart)

                    }
                    // mise a jour du nombre de produit dans le cart
                    this.numbersOfproducts()
                    console.log(this.carts);
                    //on reinitialise le dupliateCart en false
                    this.duplicateCart = false;
                    localStorage.setItem("carts", JSON.stringify(this.carts));
                    let storage = JSON.parse(localStorage.getItem("carts"));
                    console.log(storage.length);
                    setTimeout(()=>{
                        this.arrowSlide = "displayNone";
                    },1000)
                    this.arrowSlide = "arrowCartSlideIcon";
                },
                substractCart(cart) {
                    // verification que le produit est present
                    this.carts.forEach(element => {
                        if (element.title == cart.title) {
                            element.quantity--;
                            this.products.productList.forEach(product => {
                                if (product.title == element.title) {
                                    product.keyChange = 1;
                                    product.msgStock = "stock disponible"
                                    product.quantityCartProduct = element.quantity
                                    console.log(product.quantityCartProduct)
                                }
                            })
                            //si quantity 0
                            if (element.quantity == 0) {
                                const deleteCart = this.carts.indexOf(element);
                                this.carts.splice(deleteCart, 1);
                                console.log(this.carts);
                                return;
                            }
                            element.totalPriceProduct = element.quantity * element.price
                        }
                    })
                    this.numbersOfproducts()
                    localStorage.setItem("carts", JSON.stringify(this.carts));
                    let storage = JSON.parse(localStorage.getItem("carts"));
                    console.log(storage);

                    setTimeout(()=>{
                        this.arrowSlide = "displayNone";
                    },500)
                    this.arrowSlide = "arrowCartSlideIcon";
                },
                //ouverture de la page du cart qui n'est plus un modal
                modal() {
                    this.router.main = true;
                    this.router.showModal = true;
                    console.log("true");
                    setTimeout(()=>{
                        this.scrolling("cartContainerModal")
                    },300) 
                    
                },
                //fonction pour assurer le scrolling
                scrolling(element) {
                    const id = element;
                    const yOffset = -100; 
                    const elements = document.getElementById(id);
                 const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
        
                    window.scrollTo({top: y, behavior: 'smooth'});
                    
                },
                // slider en version mobile pour les produits
                liveSlideProductItemNext() {
                    let numberOfFrames = 0
                    this.productsSelected.productList.forEach(
                        element => {
                            if (element.visible == "displayFlex") {
                                numberOfFrames++
                            }
                        }
                    )
                    console.log(numberOfFrames)
                    if (this.productsSelected.liveSlideProductItem == numberOfFrames - 1) {
                        this.productsSelected.liveSlideProductItem = 0
                    } else {
                        this.productsSelected.liveSlideProductItem++
                    }

                },
                liveSlideProductItemPrevious() {
                    if (this.productsSelected.liveSlideProductItem == 0) {
                        this.productsSelected.liveSlideProductItem = this.productsSelected.productList.length - 1
                    } else {
                        this.productsSelected.liveSlideProductItem--
                    };
                    console.log(this.productsSelected.liveSlideProductItem)
                },
                // fonction pour vider le search input
                resetProduct() {
                    console.log("resetproducts")
                    this.productsSelected.productList = this.products.productList
                    console.log(this.products.productList)
                    this.productsSelected.productList.forEach(element =>
                        element.visible = "displayFlex"
                    )
                    this.productsSelected.liveSlideProductItem = 0
                    console.log("resetproduct") 
                },
                changeProductSelected(data) {
                    console.log(data)
                    this.productsSelected.productList = data
                    console.log(this.productsSelected)
                },
                closeModal() {
                    this.cartKeyWeek = false,
                        this.router.showModal = false;
                    this.router.main = true;
                    console.log(this.router.showModal);
                    if (this.router.cartOfTheWeek) {
                        this.carts = JSON.parse(localStorage.getItem("carts"))
                        this.router.cartOfTheWeek = false
                    };
                    this.numbersOfproducts()
                    window.scrollTo(0, 0)
                },
                //fonction pour les categories
                selectedCategory(data) {
                    console.log(data)
                    this.productsSelected.productList = [...this.products.productList];
                    console.log(this.productsSelected.productList);
                    console.log(this.products.productList);
                    if (data == "Toutes catégories") {
                        this.productsSelected.productList = this.memory
                    } else {
                        let category = []
                        this.memory.forEach(element => {
                            if (element.category == data) {
                                category.push(element)
                                console.log(element)
                            }
                        })
                        console.log(category)
                        this.productsSelected.productList = category
                        console.log(this.products.productList)
                        //this.productsSelected.productList = category
                    }
                },
                //fonction pour publier le nombre de produit a coté du cart
                numbersOfproducts() {
                    if (this.carts == null) {
                        this.numberQuantityCart = 0
                    };
                    console.log(this.carts)
                    // somme des quantité
                    let result = 0
                    this.carts.forEach(somme => {
                        result = parseInt(result) + parseInt(somme.quantity)
                    })
                    this.numberQuantityCart = result
                    console.log(result)
                    ////////

                },

            },
            computed: {
                totalPriceCart() {
                    const totalPrice = this.carts.reduce((acc, curr) => {
                        return acc + curr.totalPriceProduct;
                    }, 0);
                    console.log(totalPrice)
                    return totalPrice;
                }
            },
            //detruisons le resize pour le reutiliser
            beforeDestroy() {
                window.removeEventListener('resize', this.getWindowWidth);
                window.removeEventListener('resize', this.getWindowHeight);
            }
        })
   










        //firebase config

        var config = {
            apiKey: "AIzaSyACBEl4RcIkJB7oy5X-zrOAcECPDvTH4hw",
            authDomain: "simply-notify-68b52.firebaseapp.com",
            databaseURL: "https://simply-notify-68b52.firebaseio.com",
            projectId: "simply-notify-68b52",
            storageBucket: "simply-notify-68b52.appspot.com",
            messagingSenderId: "838544611655",
            appId: "1:838544611655:web:ac89b5c2177b35eb8b1462",
            measurementId: "G-X58YBQG1EB"
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function() {
                // MsgElem.innerHTML = "Notification permission granted."
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                // TokenElem.innerHTML = "token is : " + token
                console.log(token)
                
                // recuperation du token qui est envoyé a la base de données
                ///////////////////////////////////////////////////////////
                ////APPEL AXIOS DES TOKENS/////////////////////////
                axios.get(`proceed.php?action=getthetoken&token=${token}`)
                    .then(function(response) {
                        if (response.data.error) {
                            //app.errorMsg = response.data.message;
                            console.log(response)
                        } else {
                            console.log(response.data)
                            console.log("success Token");
                        }
                    });
                

            })
            .catch(function(err) {
                //ErrElem.innerHTML = ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });
        console.log(navigator)
        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            const {
                title,
                ...options
            } = payload.notification;
            let titleR = payload.notification.title;
            let optionsR = {
                body: payload.notification.body,

            }
            new Notification(titleR, optionsR)

            navigator.serviceWorker.ready.then(registration => {
                console.log(registration)
                return registration.showNotification(title, options);
            });

        });


        </script>
       <script> AOS.init();</script>    
    <script src="app.js"></script>
</body>
<!-- script de la librairie d'animation aos -->
<!-- <script> AOS.init();</script> -->

</html>