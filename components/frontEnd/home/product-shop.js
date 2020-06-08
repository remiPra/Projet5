Vue.component('shop-products', {
    data() {
        return {
            h2: "Faites vos courses en ligne",
            IntroTextShop: "Deux choix s'offrent à vous: vous pouvez selectionner vos propres produits ou choisir le panier garni de la semaine choisi par votre magasin preféré",
          
        }
    },
    template: `
<div>
<div  data-aos="fade-down" class="introduction col-lg-8 col-xm-10 text-center m-auto">
    <h2 class="p-2">{{h2}}</h2>
    <p>{{IntroTextShop}}</p>
</div>
<div class="col-lg-10 col-md-12 m-auto categoryContainer row">

    <div  data-aos="zoom-in" class="box box-shadow">
        <div class="imgBx">
            <img src="assets/images/category/fresh-vegetables-flatlay.jpg">
        </div>
        <div class="content">
            <h2>Title</h2>
            <p class="cardColor">Cliquez ici</p>
            <p class="contentShow">Cliquez sur le bouton pour pouvoir decouvrir nos différents produits disponible en magasin</p>
            <button  class="buttonGreen" href="#searchInput">Commencez votre Sélection</button>
            
        </div>
    </div>
    <div data-aos="zoom-in" class="box box-shadow">
        <div class="imgBx">
            <img src="assets/images/category/vertical-citrus-fruit-pile.jpg">
        </div>
        <div class="content">
            <h2>Panier Garni</h2>
            <p class="cardColor">Cliquez ici</p>
            <p class="contentShow">Votre magasin vous propose une selection de produits choisis dans ce panier garni.</p>
            <button class="buttonGreen" @click="onShowCartOfTheWeek()" href="#">Voir le panier</button>
        </div>
    </div>
</div>
</div>`,
        methods:{
            onShowCartOfTheWeek(){
                this.$emit('onshowcartoftheweek')
                console.log("ok")
            }
        }        


})