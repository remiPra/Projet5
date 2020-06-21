Vue.component('text-shop', {
    data() {
        return {
            fadeOne:"",
            fadeTwo:"",
            h2: "Ma ferme bio : un magasin a votre service",
            IntroTextShop: "Ma ferme bio vous propose un nouveau service pour faciliter vos courses : le Click and Collect",
            goals: [
                {
                    h3: "Choisissez tranquillement vos articles de votre magasin sur le site !!",
                    icon: "fas fa-carrot"
                },
                {
                    h3: "Acheter vos produits directement en ligne",
                    icon: "fas fa-apple-alt"
                },
                {
                    h3: `Vous avez ensuite deux possibilités :
                            soit cherchez votre commande en magasin ou soit vous faire livrer `,
                    icon: "fas fa-lemon"
                },
            ]
        }
    },
    template: `
<div id="textShop" >
    <div data-aos="fade-down" class="introduction col-lg-8 col-xm-10 text-center m-auto">
        <h2  class="p-2">{{h2}}</h2>
        <p>{{IntroTextShop}}</p>
    </div>
    <div class="d-flex flex-wrap container-fluid">
        <div id="goals" class="col-md-7 m-auto">
            <div id="goalContainer">
                <div :data-aos="fadeOne" v-for="text in goals" class="d-flex goalsItems">
                    <i :class="text.icon"></i><h3>{{text.h3}}</h3>
                </div>
            </div>    
        </div>
        <div class="col-md-5">
            <!-- mise en place du carroussel de news -->
            <div  :data-aos="fadeTwo" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"
                            src="./assets/images/sliderBoutique/a-man-stands-at-the-counter-of-a-coffee-shop.png"
                            alt="un homme qui se tient derrier le cointoir d'une boutique">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/images/sliderBoutique/a-woman-in-her-shop.png"
                            alt="une vedeuse se tenant de debout a la caisse">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/images/sliderBoutique/products-are-paid.png"
                            alt="transaction dans un magasin entre le client et la vendeuse">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    </div> 
    `,
    mounted() {
        //fonction pour ecouter la resize de la fenetre
        this.$nextTick(function () {
            window.addEventListener('resize', this.getWindowWidth);
            window.addEventListener('resize', this.getWindowHeight);

            //Init
            this.getWindowWidth()
            //this.getWindowHeight()
        })
    },

    methods: {

        getWindowWidth(event) {
            this.windowWidth = document.documentElement.clientWidth;
            if (this.windowWidth < 500) {
                this.fadeOne = "fade-down"
                this.fadeTwo = "fade-down"
            }
            else {
                this.fadeOne = "fade-left"
                this.fadeTwo = "fade-right"
            }
        },

        // getWindowHeight(event) {
        //     this.windowHeight = document.documentElement.clientHeight;
        // }
    },
    //detruisons le resize pour le reutiliser
    beforeDestroy() {
        window.removeEventListener('resize', this.getWindowWidth);
        window.removeEventListener('resize', this.getWindowHeight);
    }

})