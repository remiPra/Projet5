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
