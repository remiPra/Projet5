Vue.component('shop-products', {
    data() {
        return {
            h2: "Faites vos courses en ligne",
            IntroTextShop: "Deux choix s'offrent à vous : vous pouvez sélectionner vos propres produits ou choisir le panier garni de la semaine choisie par votre magasin préfèré",          
        }
    },
    template: `
<div>
<div  data-aos="fade-down" class="introduction col-lg-8 col-xm-10 text-center m-auto">
    <h2 class="p-2">{{h2}}</h2>
    <p>{{IntroTextShop}}</p>
</div>
<div class="col-lg-10 col-md-12 m-auto categoryContainer row">
    <div>
        <h3 class="text-center mt-5">Accedez aux produits</h3>
    <div  data-aos="zoom-in" class="box box-shadow">
      
        <div class="imgBx">
            <img src="assets/images/category/fresh-vegetables-flatlay.jpg">
        </div>
        <div class="content">
            <h2>Produits Bio</h2>
            <p class="cardColor">Selection des produits
            <p class="contentShow">Cliquez sur le bouton pour pouvoir decouvrir nos différents produits disponible en magasin</p>
            <button  class="buttonBrown" @click="scrolling('goShop')">Commencez votre Sélection</button>
        </div>
        
    </div>
    </div>

    <div>
        <h3 class="text-center mt-5">Accedez aux produits</h3>
    <div data-aos="zoom-in" class="box box-shadow">
        <div class="imgBx">
            <img src="assets/images/category/vertical-citrus-fruit-pile.jpg">
        </div>
        <div class="content">
            <h2>Panier Garni</h2>
            <p class="cardColor">Panier garni</p>
            <p class="contentShow">Votre magasin vous propose une selection de produits choisis dans ce panier garni.</p>
            <button class="buttonBrown" @click="onShowCartOfTheWeek()" href="#">Voir le panier</button>
        </div>
    </div>
    </div>
</div>
</div>`,
        methods:{
            onShowCartOfTheWeek(){
                this.$emit('onshowcartoftheweek')
                console.log("ok")
            },
            scrolling(element){
                const id = element;
                const yOffset = -100; 
                const elements = document.getElementById(id);
                const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
                
                window.scrollTo({top: y, behavior: 'smooth'});
                
            }
        }        


})