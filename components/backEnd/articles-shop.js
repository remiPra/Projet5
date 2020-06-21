Vue.component('articles-shop',{
    props:['articlesprops'],
    template:`
    <section id="routageMenu">
            <div>
                <div class="container-fluid row ">
                    <div @click="routageArticleList" class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Articles publiées</h4>
                            <p>Liste des articles publiés sur le site</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageArticleTest" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Articles en Brouillon</h4>
                            <p>Liste des articles publiés sur le site</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageArticleNew" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Nouvel Article</h4>
                            <p>Ajouter un article</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageArticleUpdate" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Modifier un Article</h4>
                            <p>Faire la modification d'un article</p>
                        </div>
                    </div>
                </div>
            </div>    
            <div id="routerCommandAction"
            class="marginTopAdmin col-md-10 marginAuto text-center text-light tableAdministration">
            <div>
                <h2>Listes des différents Produits </h2>
                <button @click="routageMenu"> Menu </button>
                <h3 class="text-alert">{{messageError}}</h3>

            </div>

            <div>
                <transition name="fade">
                    <template v-if="router.shopArticleList">
                        <div class="col-md-8 m-auto">
                            <table class="table table-bordere">
                                <thead>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <!-- tableau des Chapters brouillon -->
                                <tbody>

                                    <tr>
                                        <td>fraise </td>
                                        <td>xxxxxx</td>
                                        <td>xxxxxx</td>
                                    
                                        <td>
                                            <div class="actionTableau">
                                                <a class="LinkAdministration">Modifié </a>
                                                <a class="LinkAdministration">Brouillon </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </transition>


                <transition name="fade">
                    <template v-if="router.shopArticleTest">
                        <div class="col-md-8 m-auto">
                            <table class="table table-bordere">
                                <thead>

                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>
                                </thead>
                                <!-- tableau des Chapters brouillon -->
                                <tbody>

                                    <tr>
                                        <td>22222</td>
                                        <td>xxxxxx</td>
                                        <td>xxxxxx</td>
                                        <td>
                                            <div class="actionTableau">
                                                <a class="LinkAdministration">Valider </a>
                                                <a class="LinkAdministration">Supprimer </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </transition>

                <transition name="fade">
                    <template v-if="router.shopArticleNew">
                        <form class="col-md-8 text-light" enctype="multipart/form-data"
                            action="index.php?action=sendNewArticle" method="POST">
                            <div class="form-group">
                                <label for="title"> Titre de l'article :
                                </label>
                                <input type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group"> 
                                <label for="description"> Décrivez le produit :
                                </label>
                                <input type="text" name="description" id="description" required>
                            </div>
                            
                            <div class="form-group">
                                <label> Voulez vous publier cet article ?</label>
                                <label for="statusArticle"> Oui
                                    <input type="radio" name="statusArticle" id="statusArticle" value="1">
                                </label>
                                <label for="statusArticle"> Non
                                    <input type="radio" name="statusArticle" id="statusArticle" value="0">
                                </label>
                            </div>

                            <div class="form-group">
                            <label>Rediger ici votre article:</label>
                            <textarea name="content" class="tinymce" id="" cols="300" rows="10" ></textarea>
                            </div>

                            <div class="form-group">
                                <label>Uploader le fichier image:</label>
                                <input name="avatar" type="file" />
                            </div>

                            <div class="form-group">
                                <input class="formButton" type="submit" value="Valider" name="btnContact">
                            </div>


                        </form>
                    </template>
                </transition>


                
                    <template v-if="router.shopArticleUpdate">
                        <div class="row text-center">
                            <div class="d-flex text-center marginAuto">
                                <button @click="onPreviousUpdateArticle">
                                    <- </button>
                                        <p>{{articlesprops.articles[articlesprops.liveUpdateArticles].title}}</p>
                                        <button @click="onNextUpdateArticle"> -> </button>
                            </div>
                        </div>
                        <p>{{articlesprops.liveUpdateArticles}}</p>
                        <form class="col-md-8 text-light" enctype="multipart/form-data"
                            action="index.php?action=updateProduct" method="POST">
                            
                            <div class="form-group">
                                <label for="title"> Titre de l'article :
                                </label>
                                <input type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description"> Décrivez le produit :
                                </label>
                                <input type="text" name="description" id="description" required>
                            </div>
                            
                            <div class="form-group">
                                <label> Voulez vous publier cet article ?</label>
                                <label for="statusArticle"> Oui
                                    <input type="radio" name="statusArticle" id="statusArticle" value="1">
                                </label>
                                <label for="statusArticle"> Non
                                    <input type="radio" name="statusArticle" id="statusArticle" value="0">
                                </label>
                            </div>
                            
                            <textarea name="content" class="tinymce" id="" cols="300" rows="10" ></textarea>

                            <div class="form-group">
                                <label>Uploader le fichier image:</label>
                                <input name="avatar" type="file" />
                            </div>

                            <div class="form-group">
                                <input class="formButton" type="submit" value="Valider" name="btnContact">
                            </div>

                            

                        </form>
                    </template>
                
            </div>
        </div>
    </section>
   `,
   data() {
    return {   
        router: {
            shopArticleList: true,
            shopArticleTest: false,
            shopArticleNew: false,
            shopArticleUpdate:false
        },
        messageError: "",
    }
},
methods: {
    routageArticleList(){
        this.router.shopArticleList= true,
        this.router.shopArticleTest= false,
        this.router.shopArticleNew= false,
        this.router.shopArticleUpdate= false,
        this.scrolling("routerCommandAction")
    },
    routageArticleTest(){
        this.router.shopArticleList= false,
        this.router.shopArticleTest= true,
        this.router.shopArticleNew= false,
        this.router.shopArticleUpdate= false,
        this.scrolling("routerCommandAction")
    },
    routageArticleNew(){
        this.router.shopArticleList= false,
        this.router.shopArticleTest= false,
        this.router.shopArticleNew= true,
        this.router.shopArticleUpdate= false,
        this.scrolling("routerCommandAction")
    },
    routageArticleUpdate(){
        this.router.shopArticleList= false,
        this.router.shopArticleTest= false,
        this.router.shopArticleNew= false,
        this.router.shopArticleUpdate= true,
        this.scrolling("routerCommandAction")
    },
    routageMenu(){
        this.scrolling("routageMenu")
    },
    scrolling(element) {
        const id = element;
        const yOffset = -100; 
        const elements = document.getElementById(id);
        const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
        
        window.scrollTo({top: y, behavior: 'smooth'});
    },
    onPreviousUpdateArticle(){
        this.$emit('onpreviousupdatearticle')
    },
    onNextUpdateArticle(){
        this.$emit('onnextupdatearticle')
    }
}
})