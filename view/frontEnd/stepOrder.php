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
                            <a class="nav-link" href="
                            ">Connexion</a>
                        </li>
                        <li class="nav-items">
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

                            <a class="nav-link" href="connexion.html">Connexion</a>

                            <a class="nav-link" href="administrationConnexion.html">Administration</a>

                        </div>
                    </div>
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
        <section>
            <div class="col-md-6 container text-center text-light" id="presentationShopAdministration">
                <!-- section de routing de la single page -->
                <div class="container px-md-3 headerOrder">
                    <h1 class="text-light">Ma ferme Bio</h1>
                    <h2>{{slides[liveSlide].title}}</h2>
                    <h3 class="text-alert">{{messageError}}</h3>
                    <button @click="sliderPrevious">Etape précedente</button>
                    <button @click="sliderNext">Etape suivante</button>
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
                <command-order :datacart="dataCart" @onnextpaiement="nextPaiement"></command-order>
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
                                    <p>Vous pouvez vous faire livrer à domicile ,il ne vous reste plus qu'a choisir votre jour de retrait</p>
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
                            <section   id="slotHours" class="col-sm-10 m-auto text-center containerBrown">

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
                                        <button @click="slotConfirm(slot.hours,slot.minutes)">{{slot.hours}}:{{slot.minutes}}</button>
                                    </div>
                                    <button  v-if="keyCollect==false" @click=routageRecapDelivery> Valider </button>
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
                <paiement-component @onscrolling="scrolling" :typeofpaiement="typeOfPaiement"></paiement-component>
            </template>
        </transition>

    </div>

</body>
<script>
    Vue.component('paiement-component', {
        props: ['typeofpaiement'],
        template: ` <section class="col-sm-10 m-auto text-center">
                    <div   class="paypalContainer accordion">
                        <h3  :id="typeofpaiement[0].name" class="buttonBrown" @click="showEffect(0)">{{typeofpaiement[0].name}}</h3>
                        <div>
                            <form class="form-horizontal span6"  :class="typeofpaiement[0].effect">
                                <fieldset>
                                    <legend>Payment</legend>

                                    <div class="control-group">
                                        <label class="control-label">Card Holder's Name</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" pattern="\w+ \w+.*"
                                                title="Fill your first and last name" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Number</label>
                                        <div class="controls">
                                            <div class="row-fluid d-flex">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="First four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Second four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Third four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Fourth four digits"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Expiry Date</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span9">
                                                    <select class="input-block-level">
                                                        <option>January</option>
                                                        <option>...</option>
                                                        <option>December</option>
                                                    </select>
                                                </div>
                                                <div class="span3">
                                                    <select class="input-block-level">
                                                        <option>2013</option>
                                                        <option>...</option>
                                                        <option>2015</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card CVV</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="3" pattern="\d{3}"
                                                        title="Three digits at back of your card" required>
                                                </div>
                                                <div class="span8">
                                                    <!-- screenshot may be here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>

                    <div class="creditCardContainer accordion " :id="typeofpaiement[1].name">
                        <h3 class="buttonBrown" @click="showEffect(1)">{{typeofpaiement[1].name}}</h3>


                        <div>
                            <form class="form-horizontal span6" :class="typeofpaiement[1].effect">
                                <fieldset>
                                    <legend>Payment</legend>

                                    <div class="control-group">
                                        <label class="control-label">Card Holder's Name</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" pattern="\w+ \w+.*"
                                                title="Fill your first and last name" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Number</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="First four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Second four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Third four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Fourth four digits"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="p-2 control-label">Card Expiry Date</label>
                                        <div class="controls">
                                            <div class="d-flex row-fluid">
                                                <div class="span9">
                                                    <select class="input-block-level">
                                                        <option>January</option>
                                                        <option>...</option>
                                                        <option>December</option>
                                                    </select>
                                                </div>
                                                <div class="span3">
                                                    <select class="input-block-level">
                                                        <option>2013</option>
                                                        <option>...</option>
                                                        <option>2015</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card CVV</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="3" pattern="\d{3}"
                                                        title="Three digits at back of your card" required>
                                                </div>
                                                <div class="span8">
                                                    <!-- screenshot may be here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </section>`,      
        methods: {
           
            
            //routage des différentes étapes de reservations 
            showEffect(i) {

                for (let index = 0; index < this.typeofpaiement.length; index++) {

                    if (index == i && this.typeofpaiement[index].effect != "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowOpen";
                        let focus = document.getElementById(this.typeofpaiement[index].name);
                        console.log(this.typeofpaiement[index].name)
                        let positionHeader = document.getElementById("Paypal")
                        console.log(positionHeader)


                        setTimeout(() => {
                            this.$emit('onscrolling', this.typeofpaiement[index].name)
                        }, 200)



                        console.log("default" + index)
                    } else if (index == i && this.typeofpaiement[index].effect == "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowClose"
                        setTimeout(() => {
                            this.typeofpaiement[index].effect = "displayNone"
                        }, 300)
                        console.log("success" + index)
                    } else if (index != i && this.typeofpaiement[index].effect == "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowClose"
                        console.log("default" + index)
                    } else if (index != i) {
                        this.typeofpaiement[index].effect = "displayNone"
                        console.log("none" + index)
                    }
                }

            },
            destroyed() {
               //window.removeEventListener('scroll', this.handleDebouncedScroll);
            }
        }
    })
    Vue.component('information-user', {
        props:['memory'],
        template: `
        <section id="administrationShop" class="col-sm-10 m-auto text-center">
                    <form @submit.prevent="onNextGeolocalisation">
                        <p>Remplissez les différents champs demandées svp?</p>
                        <div class="form-group">
                            <label for="name"> Nom : 
                            </label>
                            <input type="text" v-model="memory[0].nameUser" class="form-control" name="name" id="name" require>
                        </div>
                        <div class="form-group">
                            <label for="surname"> Prenom : {{memory.surname}}
                            </label>
                            <input type="text" v-model="memory[0].surnameuser"class="form-control" name="surname" id="surname" require>
                        </div>
                        <div class="form-group">
                            <label for="address"> Adresse :
                            </label>
                            <textarea name="adress" v-model="memory[0].adress" id="adress" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Email :
                            </label for="email">
                            <input type="email" v-model="memory[0].email "name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label> Telephone :
                            </label for="telephone">
                            <input type="text" v-model="memory[0].phone" name="telephone" id="telephone" required>
                        </div>
                        <div class="form-group">
                            <input class="formButton" type="submit" value="Envoyer" name="btnContact">
                        </div>
                    </form>
                </section>
        
        `,
        methods: {
            onNextGeolocalisation() {
                this.$emit('onnextgeolocalisation')
            }
        }
    })


    Vue.component('command-order', {
        props:['datacart'],
        data() {
            return {
                cartList: {
                    head: ["Produit", "", "Description", "Prix"]
                }
            }
        },
        template: `
    <div>
        
        <div class="col-md-8 text-light buttonBrown m-auto cartConfirm">
            <h3 class="text-center pb-2">Recapitulatif de la commande </h3>
            <p>{{datacart.status}}</p>   
            <p>{{datacart.collectTimeAndDay}}</p>   
            <table class="table table-bordere">
                <thead>
                    <th v-for="(list,index) in cartList.head" :id="list" style="">{{list}}</th>
                </thead>
                <tbody>
                    <tr>
                        <td>banane</td>
                        <td>2</td>
                        <td>sachet de 600grammes </td>
                        <td>
                            12$
                        </td>
                    </tr>
                    <tr>
                        <td>Prix total</td>
                        <td></td>
                        <td></td>
                        <td>
                            123$
                        </td>
                    </tr>
                </tbody>
            </table>
            <button @click="onNextPaiement">Valider la commande</button>
        </div>
    </div>    
        `,
        methods: {
            scrolling(element) {
                document.getElementById(element).scrollIntoView({
                    block: 'start',
                    behavior: 'smooth',
                })
            },
            onNextPaiement() {
                this.$emit('onnextpaiement')
            }
        }
    })




   let app =  new Vue({
        el: "#app",
        data() {
            return {
                /////////////////////////////////////////////////////////////////////////////                
                name:"",
                memory:[],
                // Position au scroll
                scroll:{
                    slot:600,

                },
                
                // data des types de paiements 
                typeOfPaiement: [{
                        name: "Paypal",
                        effect: "displayNone"
                    },
                    {
                        name: "CreditCard",
                        effect: "displayNone"
                    }
                ],

                // data de slots 
                now: new Date().getTime(),
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
                //collectShop: false,
                livraison: false,
                onShop: false,
                keyCollect:false,
                //routage des étapes
                information: true,
                geolocalisation: false,
                paiement: false,
                ///key pour acceder pu non au slide
                nextStepGeolocalisation: true,
                orderCommandValidation: false,
                reservationShop: false,
                //////
                messageError: "",
                geolocateShow: false,
                inputAdressUser: false,
                /////route des slots 
                slotShow: false,
                ////route de orderCommand
                orderCommand: false,
                ///////
                liveSlide: 0,
                slides: [{
                        title: "Etape 1 Coordonnées",
                        paragraphe: "Remplissez les différents champs du forulaire"
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
                ///////data de l'envoie
                dataCart:{
                    deliveryDay:"",
                    //sacoir si collect ou delivery
                    deliveryStatus:"",
                    collectStatus:"",
                    // heure a laquelle chercher    
                    collectTime:"",
                    collectTimeAndDay:"",
                    status:"",

                }
            }
        },
        created(){
            window.addEventListener('scroll', this.handleScroll);
        },
        mounted: function() {
                this.name = "<?php echo $_SESSION['name'] ;?>";
                console.log(this.name);
                this.getCommand();
                //etudions la largeur de la fenetre
                this.$nextTick(function() {
                    window.addEventListener('resize', this.getWindowWidth);
                    window.addEventListener('resize', this.getWindowHeight);

                    //Init
                    this.getWindowWidth()
                    //this.getWindowHeight()

                })},  
        methods: {
            //appel axios pour recuperer la commande
            getCommand(){
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
            //evenemnt lorsqu'on resize
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
            _scroll(data){
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
                    this.orderCommand = false
                } else if (this.liveSlide == 1) {
                    if (this.nextStepGeolocalisation == false) {
                        this.liveSlide = 0;
                        this.messageError = "remplissez d'abord l'Etape1"
                    } else {
                        this.information = false;
                        this.geolocalisation = true;
                        this.paiement = false;
                        this.orderCommand = false
                    }
                } else if (this.liveSlide == 2) {
                    this.information = false;
                    this.geolocalisation = false;
                    this.paiement = false;
                    this.orderCommand = true
                } else if (this.liveSlide == 3) {
                    if (this.orderCommandValidation == false) {
                        this.liveSlide = 2
                        this.messageError = "il faut d'abord valider votre recapitulatif"
                        this.routage()
                    } else {
                        this.messageError = "il faut d'abord valider votre recapitulatif"
                        this.information = false;
                        this.geolocalisation = false;
                        this.paiement = true;
                        this.orderCommand = false
                    }
                }
                window.scrollTo(0, 0);
            },
            ///////////////////////////////////////////////////////////////////////////////////
            ////////////////// methode des coordonnées de l'utilisateur////////////////////////
            nextGeolocalisation() {
                this.nextStepGeolocalisation = true;
                this.liveSlide = 1;
                this.routage()
            },
            /////////méthode de routage pour aller au recapitulatif passant par delivery///////
            routageRecapDelivery(){
                
                ///data a paser 
                this.dataCart.deliveryStatus = true;
                this.dataCart.collectStatus = false;
                this.dataCart.status="livraison";
                this.dataCart.collectTimeAndDay = this.dataCart.deliveryDay
                console.log(this.dataCart.deliveryDay)
                ///routage
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
                setTimeout(()=>{this.scrolling("slotContainer")},300);
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
                this.orderCommandValidation = true
                this.liveSlide = 3
                console.log("vers paiement")
                this.routage()
            },
            cardShow() {
                this.inputAdressUser = true;
                this.geolocateShow = true;
                this.reservationShop = true;


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
                this.now = this.now + 86400000;
                this.today = new Date(this.now)
            },
            substract() {
                this.now = this.now - 86400000;
                this.today = new Date(this.now)
            },
            times() {
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

                    console.log(this.hoursString)
                    console.log(this.minutesString)
                    this.slots.push({
                        hours: this.hoursString,
                        minutes: this.minutesString
                    })
                    console.log(this.slots)
                }
            },
            scrolling(element) {
                document.getElementById(element).scrollIntoView({
                    block: 'start',
                    behavior: 'smooth',
                })
            },
            /////// Definition de l'horaire du slot /////
            slotConfirm(a,b){
                console.log(a);
                console.log(b);
                this.dataCart.collectTime = a + " : " + b; 
                this.dataCart.status= "retrait"
                console.log(this.dataCart.collectTime)
                this.cartDayAndHour();
                console.log(this.dataCart.collectTimeAndDay)
                //routage
               this.sliderNext();
            },
            /////defintion du jour et de l'heure
            cartDayAndHour(){
                this.dataCart.collectTimeAndDay = this.dataCart.deliveryDay + " " + 
                    this.dataCart.collectTime;    
            }
            //////////////////////////////////////////////////////////////////////////////////////////            
        },
        computed: {
            jour() {
                let jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
                return jours[this.today.getDay()];
            },
            mois() {
                let mois = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"]
                return mois[this.today.getMonth()]
            },
            // computed pour avoir le jour au recuperer ou etre livrer 
            cartDayComputed() {
                this.dataCart.deliveryDay = this.jour + " " + this.today.getDate() +
                    " " + this.mois + " " + this.today.getFullYear() ;
                return this.jour + " " + this.today.getDate() +
                    " " + this.today.getFullYear() + " " + this.mois;
            },
           
            

        }


    })
</script>

</html>