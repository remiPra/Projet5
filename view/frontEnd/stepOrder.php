<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDpuFetv6IKNwoPt7kz--mVOsv4YIbGajs"></script>
    <!-- integration axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>


</head>


<body>
    <div id="app">
        <!-- menu -->
        <header class="d-flex fixed-top justify-content-between">
            <a id="logo" class="pl-4 ">
                Ma Ferme bio
            </a>
            <nav class="d-flex navbar navbar-light pr-2">
                <div id="navLargeScreen">
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-items">
                            <a class="nav-link" href="index.php?action=index">Accueil</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" href="">Contact</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" href="">Actualités</a>
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
                    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span class="navbar-toggler-icon text-light"></span>
                    </button>
                    <div id="collapseExample" class="collapse">
                        <div>

                            <a class="nav-link" href="index.html">Accueil</a>

                            <a class="nav-link" href="contact.html">Contact</a>

                            <a class="nav-link" href="sommaireArticle.html">Actualités</a>

                            <a class="nav-link" <?php if (isset($_SESSION['name'])) {
                                                    echo 'href="index.php?action=deconnexion">Deconnexion';
                                                } else {
                                                    echo 'href="index.php?action=connexion">Connexion';
                                                }
                                                ?> </a> <a class="nav-link" href="administrationConnexion.html">Administration</a>

                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <!-- section principale de presentation du shop -->
            <section id="mainPositionAbsolute">
                <picture id="imageParrallax">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg" media="(max-width: 480px)">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg" media="(max-width: 1000px)">
                    <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg" alt="panier en osier se situant sur la gauche dans un champ vert ">
                </picture>
            </section>
            <!-- section de presentation de la page -->
            <section>
                <div class="col-md-6 container text-center text-light" id="presentationShopAdministration">
                    <!-- section de routing de la single page -->
                    <div class="container px-md-3 headerOrder">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>{{slides[liveSlide].title}}</h2>
                        <h3 class="text-alert">{{messageError}}</h3>

                        <button v-if="previousSliderClass==true" @click="sliderPrevious">Etape précedente</button>
                        <button v-if="previousSliderClass==false" class="displayGrey">Etape précedente  </button>
                        
                        <button v-if="nextSliderClass==true"@click="sliderNext">Etape suivante</button>
                        <button v-if="nextSliderClass==false" class="displayGrey">Etape suivante</button>
                        <p>{{slides[liveSlide].paragraphe}}</p>

                    </div>
                </div>
            </section>
            <transition name="fade">
                <!-- etape 1 verification des informations -->
                <template v-if="information">
                    <information-user :memory=memory @onnextgeolocalisation="nextGeolocalisation"></information-user>
                </template>
            </transition>
            <!-- etape3 recapitulatif de la commande -->
            <transition name="fade">
                <template v-if="orderCommand">
                    <command-order :user="user" @onnextpaiement="nextPaiement"></command-order>
                </template>
            </transition>
            <!-- etape 2 geolocalisation qui est dans la vue générale -->
            <transition name="fade">
                <template v-if="geolocalisation">
                    <!-- formulaire de geolocalisation -->
                    <div>
                        <section id="administrationShop" class="col-sm-10 m-auto text-center">
                            <div class="form-group news">
                                <h3>Livraison ou Retrait en magasin</h3>
                                <div class="form-group padding-case">
                                    <p>Choississez entre le retrait en magasin ou vous faire livrer</p>
                                    <button @click="onShopRoutage">Retrait en magasin<i style="font-size: 30px" class="fas fa-map-marker-alt"></i></button>
                                    <button @click="onLivraisonRoutage">Livraison a Domicile<i style="font-size: 30px" class="fas fa-map-marker-alt"></i></button>
                                </div>
                                <div id="livraison">
                                    <div v-if="livraison">
                                        <div class="form-group padding-case">
                                            <p>Cliquez sur ce bouton pour vous géolocaliser</p>
                                            <button @click="getLocated">Se géolocaliser <i style="font-size: 30px" class="fas fa-map-marker-alt"></i></button>
                                            <button @click="cardShow">rentrer Son adresse <i style="font-size: 30px" class="fas fa-map-marker-alt"></i></button>
                                        </div>
                                        <div v-if="inputAdressUser" class="form-group padding-case" id="inputAdressUser">
                                            <p>Renter votre adresse , choisissez la bonne adresse et cliquez sur le bouton valider</p>
                                            <label for="">
                                                <input @click="cardShow" type="text" class="form-control" v-model="address" ref="autocomplete" name="pseudo" id="pseudo">
                                            </label>
                                            <button @click="autocompleteShow"> Valider cette adresse </button>
                                        </div>
                                        <div v-if="mapShow" class="form-group m-auto" id="mymap">
                                        </div>
                                    </div>
                                </div>
                                <div id="resultDistance">
                                    <div v-if="this.distanceValue <= 3 && this.reservationShop==true" class="form-group padding-case">
                                        <p v-if="keyCollect==false">Vous pouvez vous faire livrer à domicile ,il ne vous reste plus qu'a choisir votre jour de retrait</p>
                                        <!-- <button @click="onShopRoutage"> Choisir Le jour </button> -->
                                    </div>
                                    <div v-if="this.distanceValue >= 3 && this.reservationShop==true" class="form-group padding-case">
                                        <p>Vous ne pouvez pas etre livré a domicile mais vous pouvez venir chercher à un horaire
                                            précis
                                            la commande en magasin</p>
                                        <button @click="onShopRoutage">Retirer en magasin</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div id="slotContainer">
                            <div v-if="slotShow">
                                <section id="slotHours" class="col-sm-10 m-auto text-center containerBrown">

                                    <div class="form-group row justify-content-center col-md-8  h-10 m-auto row align-items-center ">

                                        <button class="ButtonGreen" @click="substract">-</button>
                                        <p class="align-items-center p-3">
                                            {{jour}} <br>

                                            {{today.getDate()}}

                                            {{mois}}

                                            {{today.getFullYear()}}
                                        </p>
                                        <input class="displayNone" type="text" :value="cartDayComputed">
                                        <button class="ButtonGreen" @click="addDay">+</button>
                                        <button v-if="keyCollect==false" @click=routageRecapDelivery> Valider </button>
                                    </div>
                                    <!-- separation car pas d'horaires si on est livré  -->
                                    <div v-if="keyCollect==true">
                                        <button @click="times">Voir les horaires</button>


                                        <div class="d-flex flex-wrap" id="containerSlot">
                                            <div class="form-group p-2" v-for="slot in slots">
                                                <button @click="slotConfirm(slot.hours,slot.minutes)" :class="slot.class">{{slot.hours}}:{{slot.minutes}}</button>
                                            </div>
                                            <button v-if="keyCollect==false" @click=routageRecapDelivery> Valider </button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </template>
            </transition>
            <transition name="fade">
                <template v-if="paiement">
                    <paiement-component @onscrolling="scrolling" :propspaiement="propsPaiement"></paiement-component>
                </template>
            </transition>
        </main>
    </div>

</body>

    <script src="./components/frontEnd/stepOrder/command-order.js"></script>
    <!-- //composant local pour la partie des paiements pour etape 4  -->

<script src="./components/frontEnd/stepOrder/paiement-component.js"></script>
<script>
    // composant pour les informations de l'utilisateur etape 1
</script>
<script src="./components/frontEnd/stepOrder/information-user.js"></script>
<script>



    ////////////composant global associant la geolocalisation et les slots
    let app = new Vue({
        el: "#app",
        data() {
            return {
                /////////////////////////////////////////////////////////////////////////////                
                //data de l'utilsateur et des infos récupéré lors de la commande
                order:[],
                user: [],
                name: "",
                memory: [],
                // Position au scroll
                scroll: {
                    slot: 600,
                },
                // data des types de paiements 
                typeOfPaiement: [{
                        name: "CreditCard",
                        effect: "displayNone"
                    },
                    {
                        name: "Paypal",
                        effect: "displayNone"
                    }
                ],

                // data de slots 
                //heure du moment a laisser
                nowMemory: new Date().getTime(),
                now: new Date().getTime(),
                //booleen pour stopper 
                dateStop: false,
                dateyesterday: parseInt(this.nowMemory) - 86400000,
                today: new Date(new Date().getTime()),
                minutes: 00,
                hours: 9,
                interval: 30,
                hoursString: 0,
                minutesString: 0,
                slots: [],
                //data de la geolocalisation
                map: "null",
                coords: {
                    lat: 43.4,
                    lng: 1.52
                },
                shopCoords: {
                    lat: 43.52,
                    lng: 1.3815835
                },
                positionNow: "",
                shopCoordsMarker: "",
                address: "",
                autocomplete: "",
                place: "",
                distanceValue: "",
                ///////////////////////////////////////////////////////////////////////////
                //routage
                ////livraison ou retrait
                livraison: false,
                onShop: false,
                keyCollect: false,
                //routage des étapes
                information: true,
                geolocalisation: false,
                paiement: false,
                //class des boutons
                previousSliderClass:false,
                nextSliderClass:false,
                ///key pour acceder ou  non au slide
                nextStepGeolocalisation: false,
                orderCommandValidation: false,
                reservationShop: false,
                routageRecapValidation: false,
                //////
                messageError: "",
                geolocateShow: false,
                inputAdressUser: false,
                /////route des slots 
                slotShow: false,
                ////route de orderCommand
                orderCommand: false,
                /////// data des slides de navigation des differentes etapes
                liveSlide: 0,
                slides: [{
                        title: "Etape 1 Coordonnées",
                        paragraphe: "Remplissez les différents champs du formulaire"
                    },
                    {
                        title: "Etape 2 Livraison ou Retrait du panier",
                        paragraphe: "Remplissez les différentes informations de la géolocalisation"
                    },
                    {
                        title: "Etape 3 Recapitulatif de votre commande ",
                        paragraphe: "Confirmer les différentes informations de votre commande "
                    },
                    {
                        title: "Etape 4 Paiement ",
                        paragraphe: "Remplissez les différentes informations de paiement "
                    },
                ],
                ///////data de l'envoie des informations 
                dataCart: {
                    //savoir si collect ou delivery(collecte ou livraison)
                    deliveryStatus: "",
                    collectStatus: "",
                    //jour de 
                    deliveryDay: "",
                    // heure a laquelle chercher    
                    collectTime: "",
                    //
                    collectTimeAndDay: "",
                    status: "",
                },
                ////data props pour le paiement
                propsPaiement:[]
            }
        },
        //nous creeons une ecoute d'un evenement du scroll lors de l'initialisation de la vue
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        mounted: function() {
            //integration en php du pseudo de l'user
            this.name = "<?php echo $_SESSION['name']; ?>";
            console.log(this.name);
            this.getCommand();
            //etudions la largeur de la fenetre
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                window.addEventListener('resize', this.getWindowHeight);

                //fonction a executer si la fenetre change
                this.getWindowWidth()
                //this.getWindowHeight()

            })
        },
        methods: {
            //appel axios pour recuperer la commande
            getCommand() {
                //on recupere le nom de session
                let name = this.name;
                axios.get(`proceed.php?action=prepareOrder&value=${name}`).then(function(response) {
                    if (response.data.error) {
                        app.errorMsg = response.data.message;
                        console.log(app.errorMsg)
                    } else {
                        console.log(response.data);
                        app.memory = response.data
                        console.log(app.memory)
                        console.log("success");
                    }
                });
            },
            //evenement lorsque la largeur de fenetre change
            getWindowWidth(event) {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth < 500) {

                    console.log("small");

                } else {

                    console.log("large");
                    console.log(this.scroll.cartConfirm)
                }
            },
            //evenement au scroll
            handleScroll(event) {
                console.log(window.scrollY)
                // Any code to be executed when the window is scrolled
            },
            //scroll
            _scroll(data) {
                window.scrollTo({
                    top: data,
                    behavior: 'smooth'
                })
                console.log("effect")

            },
            /////////////////////////methode du routage///////////////////////////////
            sliderPrevious() {
                this.liveSlide--
                if (this.liveSlide == -1) {
                    this.liveSlide = 0
                }
                this.routage();

            },
            sliderNext() {
                this.liveSlide++
                if (this.liveSlide == 4) {
                    this.liveSlide = 3
                }
                this.routage();

            },
            routage() {
                if (this.liveSlide == 0) {
                    this.information = true;
                    this.geolocalisation = false;
                    this.paiement = false;
                    this.orderCommand = false;
                    console.log('O')
                    console.log(this.nextStepGeolocalisation)
                    if(this.nextStepGeolocalisation  == true){
                            this.nextSliderClass = true
                            this.previousSliderClass = false
                        } else {
                            this.nextSliderClass = false
                            this.previousSliderClass = false;
                        }

                } else if (this.liveSlide == 1) {
                    if (this.nextStepGeolocalisation == false) {
                        this.liveSlide = 0;
                        this.messageError = "Remplissez d'abord l'Etape1"
                    } else {
                        this.messageError = "Vos informations ont été validé";
                        this.information = false;
                        this.geolocalisation = true;
                        this.paiement = false;
                        this.orderCommand = false;
                        this.previousSliderClass = true;
                        if(this.routageRecapValidation == true){
                            this.nextSliderClass = true
                            this.previousSliderClass = true
                        } else {
                            this.nextSliderClass = false
                            this.previousSliderClass = true;
                        }
                    }
                } else if (this.liveSlide == 2) {
                    if(this.routageRecapValidation == true){
                        this.information = false;
                        this.geolocalisation = false;
                        this.paiement = false;
                        this.orderCommand = true;
                        this.messageError = ""
                        if(this.orderCommandValidation == true){
                            this.nextSliderClass = true
                            this.previousSliderClass = true
                        } else {
                            this.nextSliderClass = false
                            this.previousSliderClass = true
                        }
                    } else {
                        window.scrollTo(0,0);
                        this.liveSlide = 1;
                        this.messageError = "valider d'abord les infos de geolocalisation"
                    }
                } else if (this.liveSlide == 3) {
                    if (this.orderCommandValidation == false) {
                        this.liveSlide = 2
                        this.messageError = "Il faut d'abord valider votre recapitulatif"
                        this.routage()
                    } else {
                        this.messageError = "Vous avez validé la commande maintenant il ne reste plus que le paiement"
                        this.information = false;
                        this.geolocalisation = false;
                        this.paiement = true;
                        this.orderCommand = false
                        this.nextSliderClass = false
                    }
                }
                window.scrollTo(0, 0);
            },
            ///////////////////////////////////////////////////////////////////////////////////
            ////////////////// methode des coordonnées de l'utilisateur////////////////////////
            nextGeolocalisation(data) {
                this.nextStepGeolocalisation = true;
                // recuperation de la data du composant global
                this.memory = data;
                this.liveSlide = 1;
                this.routage()
            },
            //////livraison///méthode de routage pour aller au recapitulatif passant par delivery///////
            routageRecapDelivery() {
                ///data a passer 
                this.dataCart.deliveryStatus = true;
                this.dataCart.collectStatus = false;
                this.dataCart.status = "livraison";
                //on ne recuperer que le jour
                this.dataCart.collectTimeAndDay = this.dataCart.deliveryDay
                console.log(this.dataCart.deliveryDay)
                ///routage
                //cle de routage
                this.routageRecapValidation = true ;
                this.user.push(this.memory)
                this.user.push(this.dataCart)
                this.sliderNext()

            },
            ///////////////// methode de la geolocalisation////////////////////////////////////:
            ////methde de routage de geolocalisation////////
            onShopRoutage() {
                this.onShop = true;
                this.livraison = false;
                this.geolocateShow = false;
                // if (this.distanceValue > 3) {
                //     this.collectShop = true
                // }
                ////on active les slots d'horaires 
                this.keyCollect = true
                this.slotShow = true
                let show = this.scroll.slot
                //setTimeout(this.scrolling("slotContainer"), 1000)
                setTimeout(() => {
                    this.scrolling("slotContainer")
                }, 300);
                console.log(this.scroll.slot)
                console.log("Go")

            },
            onLivraisonRoutage() {
                //setTimeout(this.scrolling("livraison"), 1000)
                this.keyCollect = false;
                this.onShop = false;
                this.slotShow = true;
                this.livraison = true
            },
            nextPaiement() {
                //this.orderCommand=true
                // let cron = {name:12,to:2};
                // console.log(cron);
                //////////////////////////////////
                //creation des modifications de la commande

                let order = {
                    name: this.user[0][0].name,
                    adress: this.user[0][0].adress,
                    postalCode: this.user[0][0].postalCode,
                    town: this.user[0][0].town,
                    numberCommand: this.user[0][1].numberCommand,
                    status: this.user[1].status,
                    collectTime: this.user[1].collectTime,
                    deliveryDay: this.user[1].deliveryDay,
                    collectTimeAndDay: this.user[1].collectTimeAndDay
                }
                this.order = order;
                let orderJSON = JSON.stringify(order);
                console.log(orderJSON);

                let formData = this.toFormData(order) 

                axios.post("https://www.remi-pradere.com/projet5/proceed.php?action=updateOrder", formData).then(function(response) {

                    if (response.data.error) {
                        console.log(response.data.message);
                    } else {
                        console.log(response)
                    }
                });

                this.propsPaiement.push(this.order);
                this.propsPaiement.push(this.typeOfPaiement);
                console.log(this.propsPaiement)
                this.orderCommandValidation = true
                this.liveSlide = 3
                console.log("vers paiement")
                this.routage()
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
            //fonction pour montrer la carte
            cardShow() {
                //routage 
                this.inputAdressUser = true;
                this.geolocateShow = true;
                this.reservationShop = true;
                //

                this.mapShow()
                // this.positionNow = new google.maps.Marker({ position: this.coords, map: this.map });
                this.shopCoordsMarker = new google.maps.Marker({
                    position: this.shopCoords,
                    map: this.map
                });
                this.autocomplete = new google.maps.places.Autocomplete(
                    //this.$refs["autocomplete"]
                    document.getElementById("pseudo"), {
                        bounds: new google.maps.LatLngBounds(
                            new google.maps.LatLng(43.5591193000000, 1.3815835)
                        )
                    });
                console.log(this.autocomplete)
            },
            // initialisation de la carte
            mapShow() {
                this.map = new google.maps.Map(document.getElementById("mymap"), {
                    center: {
                        lat: this.coords.lat,
                        lng: this.coords.lng
                    },
                    zoom: 13
                })
            },
            // geolocalisation
            getLocated() {
                this.reservationShop = true;
                this.geolocateShow = true;
                this.inputAdressUser = false;
                if (navigator.geolocation) {
                    console.log("geolocate")
                    navigator.geolocation.getCurrentPosition(pos => {
                        console.log("geolocateNewMark")

                        this.coords.lat = pos.coords.latitude
                        this.coords.lng = pos.coords.longitude

                        console.log(this.coords.lat)
                        console.log(this.coords.lng)

                        this.getAdressFrom(this.coords.lat, this.coords.lng)
                        this.mapShow()
                        this.positionNow = new google.maps.Marker({
                            position: this.coords,
                            map: this.map
                        });
                        this.shopCoordsMarker = new google.maps.Marker({
                            position: this.shopCoords,
                            map: this.map
                        });




                        //on dessine la ligne
                        var line = new google.maps.Polyline({
                            path: [this.coords, this.shopCoords],
                            map: this.map
                        });

                        this.distance();
                        this.circleDraw()
                        console.log(this.autocomplete)

                    })
                    this.scrolling("resultDistance")
                } else {
                    console.log("pas supporter")
                }
            },
            // distance a vol d'oiseau entre deux coordonnées 
            distance() {
                let mk1 = new google.maps.Marker({
                    position: this.coords,
                    map: this.map
                });
                let mk2 = new google.maps.Marker({
                    position: this.shopCoords,
                    map: this.map
                });
                var R = 3958.8; // Radius of the Earth in miles
                var rlat1 = mk1.position.lat() * (Math.PI / 180); // Convert degrees to radians
                var rlat2 = mk2.position.lat() * (Math.PI / 180); // Convert degrees to radians
                var difflat = rlat2 - rlat1; // Radian difference (latitudes)
                var difflon = (mk2.position.lng() - mk1.position.lng()) * (Math.PI / 180); // Radian difference (longitudes)

                var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
                console.log(d)
                this.distanceValue = d;
                return d;
            },
            // dessin  d'un cercle sur la carte selon la zone suggéré
            circleDraw() {
                var cityCircle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: this.map,
                    center: {
                        lat: this.shopCoords.lat,
                        lng: this.shopCoords.lng
                    },
                    radius: Math.sqrt(2) * 6000
                });
            },
            //methodes pour transformer une adresse en coordonnées gps
            getAdressFrom(latAdress, lngAdress) {
                console.log("erer")
                axios.get("https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
                        latAdress +
                        "," +
                        lngAdress +
                        "&key=AIzaSyDpuFetv6IKNwoPt7kz--mVOsv4YIbGajs")
                    .then(response => {
                        if (response.data.error_message) {
                            this.error = response.data.error_message;
                            console.log(response.data.error_message);
                        } else {
                            this.address = response.data.results[0].formatted_address;

                            console.log(response.data.results[0].formatted_address);
                        }
                    })
            },
            //methode pour le dessin du cercle selon la distance 
            autocompleteShow() {
                console.log(this.autocomplete)
                this.place = this.autocomplete.getPlace();
                this.coords.lat = this.place.geometry.location.lat();
                this.coords.lng = this.place.geometry.location.lng();
                this.mapShow();
                this.positionNow = new google.maps.Marker({
                    position: this.coords,
                    map: this.map
                });
                this.distance();
                this.circleDraw();
                console.log(this.coords)
                var line = new google.maps.Polyline({
                    path: [this.coords, this.shopCoords],
                    map: this.map
                });
                document.getElementById("mymap").scrollIntoView({
                    block: 'start',
                    behavior: 'smooth',
                })
            },
            ////////////////fonction des slots de reservation
            addDay() {
                if (this.now == this.nowMemory) {
                    console.log("egal")
                } else {
                    console.log(this.nowMemory)
                }

                this.dateStop = false;
                this.now = this.now + 86400000;
                this.today = new Date(this.now);
                if (this.keyCollect == true) {
                    this.times();
                    this.slotConfirmation()
                }
            },
            substract() {

                if (this.now == this.nowMemory) {
                    console.log("egal")
                } else {
                    console.log(this.nowMemory)
                }


                if (this.dateStop == false) {
                    let yesterday = this.nowMemory - 86400000;
                    console.log(yesterday);
                    this.now = this.now - 86400000;
                    if (this.now != yesterday) {
                        this.today = new Date(this.now);
                        // on ajoute times ssi on est en livraison
                        if (this.keyCollect == true) {
                            this.times();
                            this.slotConfirmation()
                        }
                    } else {
                        this.dateStop = true;
                    }
                }
            },
            times() {
                //on inititialise les slots
                this.slots = [];
                while (this.hours < 18) {
                    this.minutes = this.minutes + this.interval
                    if (this.minutes > 59) {
                        this.hours = this.hours + 1
                        this.minutes = 60 - this.minutes
                    }
                    if (this.minutes < 10) {
                        this.minutesString = "0" + this.minutes
                    } else {
                        this.minutesString = this.minutes
                    }
                    if (this.hours < 10) {
                        this.hoursString = "0" + this.hours
                    } else {
                        this.hoursString = this.hours
                    }

                    this.slots.push({
                        hours: this.hoursString,
                        minutes: this.minutesString,
                        class: "displayFlex"
                    })
                    //console.log(this.slots)

                    ////////////////////////////////////
                    /////// Verification des slots //////////
                    //console.log(this.now)
                    //console.log(this.nowMemory)
                    this.slotConfirmation()

                }
                // on redéfini this.hours
                this.hours = 9
            },
            //méthode pour eviter des slots en fonction de l'heure
            slotConfirmation() {
                if (this.now == this.nowMemory) {
                    this.slots.forEach(element => {
                        //let d = new Date().getHours();
                        if (element.hours < 16) {
                            element.class = "displayNone"
                        } else {
                            //console.log(new Date().getHours)
                        }
                    })

                }
            },
            scrolling(element) {
                document.getElementById(element).scrollIntoView({
                    block: 'start',
                    behavior: 'smooth',
                })
            },
            /////// Definition de l'horaire du slot /////
            slotConfirm(a, b) {
                console.log(a);
                console.log(b);
                this.dataCart.collectTime = a + " : " + b;
                this.dataCart.status = "retrait"
                console.log(this.dataCart.collectTime)
                this.cartDayAndHour();
                console.log(this.dataCart.collectTimeAndDay)
                //routage
                this.routageRecapValidation= true;
                this.user.push(this.memory)
                this.user.push(this.dataCart)
                this.sliderNext();
            },
            /////defintion du jour et de l'heure
            cartDayAndHour() {
                this.dataCart.collectTimeAndDay = this.dataCart.deliveryDay + " " +
                    this.dataCart.collectTime;
            }
            //////////////////////////////////////////////////////////////////////////////////////////            
        },
        computed: {
            jour() {
                let jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", ];
                return jours[this.today.getDay()];
            },
            mois() {
                let mois = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"]
                return mois[this.today.getMonth()]
            },
            // computed pour avoir le jour au recuperer ou etre livrer 
            cartDayComputed() {
                this.dataCart.deliveryDay = this.jour + " " + this.today.getDate() +
                    " " + this.mois + " " + this.today.getFullYear();
                return this.jour + " " + this.today.getDate() +
                    " " + this.today.getFullYear() + " " + this.mois;
            },



        }


    })
</script>

</html>