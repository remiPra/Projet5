
        Vue.component('productdetailview',{
            props:['currentarticle'],
            template:`
            <article id="articleView">    
                    <div class="col-md-10 container text-center">
                      
                        <div class="text-light container px-md-3 shopTitle">
                            <h1>{{currentarticle.title}} </h1>
                            <button id="buttonCloseProductDetail" @click="onCloseProductDetail">Fermer la fenetre</button>
                        </div>
                    </div>

                    <div class="container-fluid row">
                        <div class="col-xl-3 col-sm-3 m-auto" id="imageArticle">
                            <figure class="imageProductDetail">
                                <img :src="currentarticle.src" alt="">
                                <figcaption>
                                    <h3>{{currentarticle.title}}</h3>
                                    <p>{{currentarticle.provenance}}</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-xl-9 col-sm-9 text-light" id="articleViewProductDetail">
                            <h2>{{currentarticle.title}}</h2>
                            <div v-html="currentarticle.description"></div>
                        </div>
                    </div>
            </article>
            `,
            methods:{
                onCloseProductDetail(){
                    this.$emit('oncloseproductdetail');
                }
            }
        })
