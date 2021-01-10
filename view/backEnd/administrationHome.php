<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/6ztoevx7at9ej6dibcvmhjeda1slkeqw64zucs9bcodphk4p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <!-- polices -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <!-- integration de la librairie axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <!-- integration de la librairie aos -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script> -->
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- integration de vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- integration de font-awesome -->
    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <script src="https://cdn.tiny.cloud/1/6ztoevx7at9ej6dibcvmhjeda1slkeqw64zucs9bcodphk4p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   
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
                            <a class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-items">
                            <a href="#routerCommand" @click="routageCommand" class="nav-link">Commandes</a>
                        </li>
                        <li class="nav-items">
                            <a href="#routerProduct" @click="routageProduct" class="nav-link">Produits</a>
                        </li>
                        <li class="nav-items">
                            <a href="#routerArticles" @click="routageArticles" class="nav-link">Articles</a>
                        </li>
                        <li class="nav-items">
                            <a  @click="routageNews" class="nav-link">News</a>
                        </li>
                        <li class="nav-items">
                            <a @click="routageMessage" class="nav-link">Messages</a>
                        </li>
                        <li class="nav-items">
                            <a href="index.php?action=administrationHome"class="nav-link">Administration</a>
                        </li>
                    </ul>
                </div>
                <div id="togglecontainer">
                    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span class="navbar-toggler-icon text-light"></span>
                    </button>
                    <div id="collapseExample" class="collapse">
                        <div>
                            <a href="#routerCommand" @click="routageCommand" class="nav-link text-light">Commandes</a>
                            <a href="#routerProduct" @click="routageProduct" class="nav-link text-light">Produits</a>
                            <a href="#routerArticles" @click="routageArticles" class="nav-link text-light">Articles</a>
                            <a  @click="routageNews" class="nav-link text-light">News</a>
                            <a @click="routageMessage" class="nav-link text-light">Messages</a>
                        </div>
                    </div>
                </div>
                
            </nav>
        </header>
        <main>
            <section id="mainPositionAbsolute">
                <picture id="imageParrallax">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg" media="(max-width: 480px)">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg" media="(max-width: 1000px)">
                    <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg" alt="panier en osier se situant sur la gauche dans un champ vert ">
                </picture>
            </section>


            <section>
                <div class="col-md-6 container text-center text-light" id="presentationShopAdministration">
                    <!-- section de routing de la single page -->
                    <div class="container px-md-3 headerOrder">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>Administration</h2>
                        <h3 id="Message" class="text-danger">{{messageError}}</h3>
                        <h3 id="Message" class="text-success">{{messageSuccess}}</h3>
                        <h3 class="text-success">
                            <?php if(isset($_GET['message']))
                                    {echo htmlspecialchars($_GET['message']);}
                                    else {echo "";}
                            ?>
                        </h3>


                        
                        <h3 class="text-success"><?php echo $msg;?></h3>
                    </div>
                </div>
            </section>
            <section class="buttonBrown" id="routerMain">
                <h3 class="text-center mt-3"> {{name}} Retrouvez toutes les sections de l'administration</h3>
                <!-- section pour la partie des differentes categories de l'administration -->       
                <div class=" container-fluid marginTop row ">
                    <div @click="routageCommand" class="col-lg-3 col-md-6">
                        <div class="contentCategory text-center ButtonGreen marginAuto col-md-10 ml-auto mr-auto">
                            <h4>
                                <a class="text-dark" href="#routerCommand">
                                    Commandes
                                </a>
                            </h4>

                        </div>
                    </div>
                    <!-- si on est dans l'administration -->
                    <template v-if="name=='administration'">
                    <div @click="routageProduct" class="col-lg-3 col-md-6">
                        <div class="contentCategory ButtonGreen text-center marginAuto marginAuto col-md-10 ml-auto mr-auto">
                            <h4>
                        <a class="text-dark">
                            Produits
                        </a>
                            </h4>

                        </div>
                    </div>

                    <div @click="routageArticles" class="col-lg-3 col-md-6">
                        <div class="contentCategory text-center ButtonGreen marginAuto col-md-10 ml-auto mr-auto">
                            <h4>Articles</h4>

                        </div>
                    </div>

                    <div @click="routageNews" class="col-lg-3 col-md-6">
                        <div class="contentCategory text-center ButtonGreen marginAuto col-md-10 ml-auto mr-auto">
                            <h4>Promos</h4>

                        </div>
                    </div>
                    <div @click="routageMessage" class="col-lg-3 col-md-6">
                        <div class="contentCategory text-center ButtonGreen marginAuto col-md-10 ml-auto mr-auto">
                            <h4>Messages</h4>

                        </div>
                    </div>
                    </template>
                </div>
            </section>

            <section class="marginTopAdmin" id="routerCommand">
                <template v-if="router.command">
                    <div class="traitSeparation"></div>
                    <command-user @onproblemcommand="problemCommand"  :commandsprops="commandsProps"></command-user>
                </template>
            </section>
            <section class="marginTopAdmin">
                <div class="marginTopAdmin" id="routerProduct">

                    <template v-if="router.product">
                        <div class="traitSeparation"></div>
                        <product-shop @onupdatedeleteproduct="updateDeleteProduct" @onupdatetestproduct="updateTestProduct" @ondeleteproduct="deleteProduct" @onmodifyproductview="modifyProductView" @updateproducts="getAllProducts" @onpreviousupdateproduct="previousUpdateProduct" @onnextupdateproduct="nextUpdateProduct" :productsprops="productsProps"></product-shop>
                    </template>
                </div>
            </section>
            <section class="marginTopAdmin" id="routerArticles">
                <template v-if="router.articles">
                    <div class="traitSeparation"></div>

                    <articles-shop :articlesprops="articlesProps"
                    @onmodifyarticleview="modifyArticleView"
                    @onpreviousupdatearticle="previousUpdateArticle" 
                    @onnextupdatearticle="nextUpdateArticle"></articles-shop>
                </template>
            </section>
            <section class="marginTopAdmin" id="newsArticles">
                <template v-if="router.news">
                    <div class="traitSeparation"></div>
                    <news-shop 
                    :newsprops="newsProps" 
                    @ongetallnews = "getAllNews"
                    @onpreviousupdatenews=previousUpdateNews 
                    @onnextupdatenews=nextUpdateNews
                    @onmodifynewview =modifyNewView
                    ></news-shop>
                </template>
                

            </section>

            <section>
                <template v-if="router.message">
                <div class="traitSeparation"></div>
                <message-shop @ongetallmessages="getAllMessages" @oncheckreadmessage="checkMessageRead" :messagesprops="messageProps"></message-shop>
                </template>
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
    <script src="./components/backEnd/message-shop.js"></script>
    <script src="./components/backEnd/command-user.js"></script>
    <script src="./components/backEnd/product-shop.js"></script>
    <script src="./components/backEnd/articles-shops.js"></script>
    <script src="./components/backEnd/news-shops.js"></script>
    <script>
        let vm = new Vue({
            el: "#app",
            data: {
                form: {
                    head: ["N° Commande",
                        "Nom",
                        "Email",
                        "Adresse",
                        "Action"
                    ]
                },
                //passage de post avec axios
                post: "",
                //data des commandes
                test: "test",
                //data des produits
                memory: [],
                productsSelected: [],
                commandsProps: {
                    commands: [],
                    liveUpdateCommand: "0",
                    name:"<?php if(isset($_SESSION['name'])){echo  $_SESSION['name']; } else {echo "";}?>"
                },
                //props a passer dasn product-shop
                productsProps: {
                    products: [],
                    liveUpdateProduct: "0"
                },
                articlesProps: {
                    articles: [],
                    liveUpdateArticles: "0"
                },
                newsProps: {
                    news: [],
                    liveUpdateNews: "0"
                },
                messageProps:[],
                //info des sliders 

                messageError: "",
                messageSuccess: "",
                ///////////routage//////////
                router: {
                    main: true,
                    //categorie
                    product: false,
                    command: false,
                    articles: false,
                    news: false,
                    message:false,
                },
                name:"<?php if(isset($_SESSION['name'])){echo  $_SESSION['name']; } else {echo "";}?>"

            },
            mounted() {
                this.getAllCommands();
                this.getAllProducts();
                this.getAllArticles();
                this.getAllNews();
                this.getAllMessages();
                
            },
            methods: {

            
                //methode pour recuperer les produits
                getAllCommands() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllCommands").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);
                            vm.commandsProps.commands = response.data
                            vm.memory = response.data
                            console.log(vm.commandsProps.commands)
                            console.log("commands yes");
                        }
                    });
                },
                getAllProducts() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllProducts").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);
                            vm.productsSelected = response.data
                            vm.productsProps.products = response.data
                            vm.memory = response.data
                            console.log(app.products)
                            console.log("products");
                        }
                    });
                    console.log(this.commandsProps.commands)
                },

                //axios pour recuperer tous les messages
                getAllMessages(){
                    console.log("users")
                    axios.get("proceed.php?action=getAllMessages").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);

                            vm.messageProps = response.data
                            console.log(vm.messageProps)
                            console.log("articles get");
                        }
                    });
                },
                getAllArticles() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllArticles").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);

                            vm.articlesProps.articles = response.data
                            console.log(vm.articlesProps.articles)
                            console.log("articles get");
                        }
                    });
                },
                getAllNews() {
                    console.log("users")
                    axios.get("proceed.php?action=getAllNews").then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data);

                            vm.newsProps.news = response.data
                            console.log(vm.newsProps.news)
                            console.log("promos news");
                        }
                    });
                },
                routageReset(){
                    this.router.product = false
                    this.router.command = false
                    this.router.articles = false
                    this.router.news = false
                    this.router.message = false
                },
                routageProduct() {
                    this.router.product = true
                    this.router.command = false
                    this.router.articles = false
                    this.router.news = false
                    this.router.message = false
                    // setTimeout(this.scrolling("routerProduct"),500)      
                },
                routageCommand() {
                    this.router.product = false
                    this.router.command = true
                    this.router.articles = false
                    this.router.news = false
                    this.router.message = false
                    // this.scrolling("routerCommand")      
                },
                routageArticles() {
                    this.router.product = false
                    this.router.command = false
                    this.router.articles = true
                    this.router.news = false
                    this.router.message = false
                    this.scrolling("routerArticles")
                },
                routageNews() {
                    this.router.product = false
                    this.router.command = false
                    this.router.articles = false
                    this.router.news = true
                    this.router.message = false

                    this.scrolling("routerArticles")
                },
                routageMessage() {
                    this.router.product = false
                    this.router.command = false
                    this.router.articles = false
                    this.router.news = false
                    this.router.message = true
                    console.log('ggj')
                    this.scrolling("routerArticles")
                    
                },
                //changement du liveSlideupdateProduct depuis la liste des produits 
                modifyProductView(data) {
                    this.productsProps.liveUpdateProduct = data
                },
                //changement du liveArticle depuis la liste des articles 
                modifyArticleView(data){
                    this.articlesProps.liveUpdateArticles = data
                },
                //changement du live New depuis la liste des news
                modifyNewView(data){
                    this.newsProps.liveUpdateNews = data
                },
                //changement du productsProps.liveUpdateProduct pour l'update
                nextUpdateProduct() {
                    this.productsProps.liveUpdateProduct++
                    if (this.productsProps.liveUpdateProduct == this.productsProps.products.length) {
                        this.productsProps.liveUpdateProduct = 0
                    }
                },
                //changement du productsProps.liveUpdateProduct pour l'update
                previousUpdateProduct() {
                    this.productsProps.liveUpdateProduct--
                    if (this.productsProps.liveUpdateProduct == -1) {
                        this.productsProps.liveUpdateProduct = this.productsProps.products.length - 1
                    }
                },
                nextUpdateArticle() {
                    this.articlesProps.liveUpdateArticles++
                    if (this.articlesProps.liveUpdateArticles == this.articlesProps.articles.length) {
                        this.articlesProps.liveUpdateArticles = 0
                    }
                },
                previousUpdateArticle() {
                    this.articlesProps.liveUpdateArticles--
                    if (this.articlesProps.liveUpdateArticles == -1) {
                        this.articlesProps.liveUpdateArticles = this.articlesProps.articles.length - 1
                    }
                },
                nextUpdateNews() {
                    this.newsProps.liveUpdateNews++
                    if (this.newsProps.liveUpdateNews == this.newsProps.news.length) {
                        this.newsProps.liveUpdateNews = 0
                    }
                },
                previousUpdateNews() {
                    this.newsProps.liveUpdateNews--
                    if (this.newsProps.liveUpdateNews == -1) {
                        this.newsProps.liveUpdateNews = this.newsProps.news.length - 1
                    }
                },

                //methode pour passer un message en lu par requette http
                checkMessageRead(id){
                    console.log(id);
                    let message=[]
                    message.push(id)    
                    let messageId = this.toFormData(message)
                    axios.post("proceed.php?action=checkMessageRead",messageId).then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log(app.errorMsg)
                        } else {
                            console.log(response.data)
                            console.log("message read");
                        }
                    });

                },



                toFormData(obj) {
                    // conversion d'une données javascript 
                    let fd = new FormData();
                    for (let i in obj) {
                        fd.append(i, obj[i]);
                    }
                    console.log(fd);
                    // retourne le resultat
                    return fd;
                },
           
                deleteProduct(data) {
                    let post = data
                    this.post = post.title
                    console.log(post)
                    post = this.toFormData(post)
                    axios.post("proceed.php?action=deleteProduct", post).then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log()
                            vm.messageError = "probleme d'execution"
                            vm.messageSuccess = `votre produit ${vm.post} a été supprimé`

                        } else {
                            console.log(response.data);
                            console.log("problemeCommand");
                            vm.scrolling("Message")
                            vm.messageError = ""
                            vm.messageSuccess = `votre produita été déplacé dans les commandes ou il y a un problème`
                        }
                    });
                    this.routageReset();
                    this.getAllProducts();
                    
                },
                updateDeleteProduct(data) {
                    let post = data
                    this.post = post.title
                    console.log(post)
                    post = this.toFormData(post)
                    axios.post("proceed.php?action=updateDeleteProduct", post).then(function(response) {
                        if (response.data.error) {

                            console.log(post)
                            vm.messageError = "probleme d'execution"

                        } else {
                            console.log(response.data);
                            console.log("problemeCommand");
                            vm.scrolling("Message")
                            vm.messageError = ""
                            vm.messageSuccess = `votre produit ${vm.post} a été placé dans les produits supprimés`
                        }
                    });
                    this.routageReset();
                    this.getAllProducts();
                },
                updateTestProduct(data) {
                    let post = data
                    this.post = post.title
                    console.log(post)
                    post = this.toFormData(post)
                    axios.post("proceed.php?action=updateTestProduct", post).then(function(response) {
                        if (response.data.error) {

                            console.log(post)
                            vm.messageError = "probleme d'execution"

                        } else {
                            console.log(response.data);
                            console.log("problemeCommand");
                            vm.scrolling("Message")
                            vm.messageError = ""
                            vm.messageSuccess = `votre produit ${vm.post} a été placé dans les produits en brouillon`
                        }
                    });
                    this.getAllProducts();
                },
                problemCommand(data) {
                    let post = {
                        numberCommand: data,
                        status: "problemCommand"
                    }
                    this.post = post
                    console.log(post)
                    post = this.toFormData(post)
                    axios.post("index.php?action=problemCommand", post).then(function(response) {
                        if (response.data.error) {
                            app.errorMsg = response.data.message;
                            console.log()
                            vm.messageError = "probleme d'execution"
                            vm.messageSuccess = ""

                        } else {
                            console.log(response.data);
                            console.log("problemeCommand");
                            vm.scrolling("Message")
                            vm.messageError = ""
                            vm.messageSuccess = `votre commande ${vm.post.numberCommand} a été déplacé dans les commandes ou il y a un problème`
                        }
                    });
                },
                scrolling(element) {
                    const id = element;
                    const yOffset = -100;
                    const elements = document.getElementById(id);
                    const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;

                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                },

            }

        })
    </script>
    
</body>

</html>