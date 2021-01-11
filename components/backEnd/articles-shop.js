Vue.component('articles-shop', {
    props: ['articlesprops'],
    template: `
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
                <h2>Listes des différents articles publiés </h2>
                <button @click="routageMenu"> Menu </button>
                <h3 class="text-alert">{{messageError}}</h3>

            </div>

            <div>
                <transition name="fade">
                    <template v-if="router.shopArticleList">
                        <div class="col-md-11 m-auto">
                            <table class="table table-bordere">
                                <thead>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <!-- tableau des articles publiés -->
                                <tbody>

                                    <tr v-for="(data,index) in articlesprops.articles">
                                        <td>{{data.title}}</td>
                                        <td>{{data.description}}</td>
                                        <td>{{data.date}}</td>
    
                                        <td>
                                            <div class="actionTableau">
                                                <a @click="emitMofifyArticleView(index)" class="LinkAdministration ButtonGreen">Modifié </a>  
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
                    
                        <div class="col-md-11 m-auto">
                            <table class="table table-bordere">
                                <thead>

                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>
                                </thead>
                                <!-- tableau des articles en brouillon -->
                                <tbody>

                                    <tr v-for="(data,index) in articlesprops.articles">
                                        <td>{{data.title}}</td>
                                        <td>{{data.description}}</td>
                                        <td>{{data.date}}</td>
                                        <td>
                                            <div class="actionTableau">
                                                <a @click="emitMofifyArticleView(index)" class="LinkAdministration ButtonGreen">Modifié </a>
                                                <form class="formWithNoBorder formButton" method="POST" action="index.php?action=deleteArticle">
                                                    <input required hidden name="id" :value="data.id">
                                                    <button type="submit"> Supprimer</button>    
                                                </form>    
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
                        <form class="col-md-11 text-light" enctype="multipart/form-data"
                            action="index.php?action=sendNewArticle" method="POST">
                            <div class="form-group">
                                <label for="title"> Titre de l'article :
                                </label>
                                <input type="text" name="title" id="title" maxlength="30" required>
                            </div>
                            <div class="form-group"> 
                                <label for="description"> Décrivez le produit :
                                </label>
                                <input type="text" name="description" id="description" maxlength="60" required>
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
                            <textarea name="content" class="tinymce" id="textareaNewArticle" cols="300" rows="10" ></textarea>
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
                                        <p class="articleTitle">{{articlesprops.articles[articlesprops.liveUpdateArticles].title}}</p>
                                        <button @click="onNextUpdateArticle"> -> </button>
                            </div>
                        </div>
                        <p>{{articlesprops.liveUpdateArticles}}</p>
                        <form class="col-md-11 text-light" enctype="multipart/form-data"
                            action="index.php?action=updateCommand" method="POST">
                            
                            <div class="form-group">
                                <label for="title"> Titre de l'article :
                                </label>
                                <input :value="articlesprops.articles[articlesprops.liveUpdateArticles].id" name="id" hidden required>
                                <input :value="articlesprops.articles[articlesprops.liveUpdateArticles].title" 
                                type="text" name="title" id="title"  maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="description"> Décrivez le produit :
                                </label>
                                <input :value="articlesprops.articles[articlesprops.liveUpdateArticles].description" 
                                type="text" name="description" id="description" maxlength="60" required>
                            </div>
                            
                            <div class="form-group">
                                <label> Voulez vous publier cet article ?</label>
                                <label for="statusArticle"> Oui
                                    <template v-if="articlesprops.articles[articlesprops.liveUpdateArticles].statusArticles == 1">
                                        <input type="radio" name="statusArticles" id="statusArticle" value="1" checked>
                                    </template>
                                    <template v-if="articlesprops.articles[articlesprops.liveUpdateArticles].statusArticles == 0">
                                        <input type="radio" name="statusArticles" id="statusArticle" value="1">
                                    </template>    
                                </label>
                                <label for="statusArticle"> Non
                                <template v-if="articlesprops.articles[articlesprops.liveUpdateArticles].statusArticles == 1">
                                        <input type="radio" name="statusArticles" id="statusArticle" value="0">
                                </template>
                                <template v-if="articlesprops.articles[articlesprops.liveUpdateArticles].statusArticles == 0">
                                        <input type="radio" name="statusArticles" id="statusArticle" value="0" checked>
                                </template>
                                </label>
                            </div>
                            
                            <textarea name="content" class="tinymce" id="textareaUpdateArticle" cols="300" rows="10" >
                                <div>{{this.articlesprops.articles[this.articlesprops.liveUpdateArticles].content}}</div>
                            </textarea>

                            <div class="form-group">
                                <label>Uploader le fichier image:</label>
                                <input name="avatar" type="file" />
                            </div>

                            <div class="form-group">
                                <label for="image"> Image en cours:
                                </label>
                                <img :src="articlesprops.articles[articlesprops.liveUpdateArticles].src" style="width:300px"> 
                                <input :value="articlesprops.articles[articlesprops.liveUpdateArticles].src" id="src" type="text" name="src" hidden 
                                    required />
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
                shopArticleUpdate: false
            },
            messageError: "",
        }
    },
    methods: {
        routageArticleList() {
            this.router.shopArticleList = true,
                this.router.shopArticleTest = false,
                this.router.shopArticleNew = false,
                this.router.shopArticleUpdate = false,
                this.scrolling("routerCommandAction")

        },
        routageArticleTest() {
            this.router.shopArticleList = false,
                this.router.shopArticleTest = true,
                this.router.shopArticleNew = false,
                this.router.shopArticleUpdate = false,
                this.scrolling("routerCommandAction")
        },
        routageArticleNew() {
            this.router.shopArticleList = false,
                this.router.shopArticleTest = false,
                this.router.shopArticleNew = true,
                this.router.shopArticleUpdate = false,
                this.scrolling("routerCommandAction"),
            
                //relance du tinymce
                tinymce.remove();
                    
                //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
                setTimeout(()=>{tinymce.init({
                    selector: '#textareaNewArticle',
                })
                
            },1000);

        },
        routageArticleUpdate() {
                tinymce.remove();
                this.router.shopArticleList = false,
                this.router.shopArticleTest = false,
                this.router.shopArticleNew = false,
                this.router.shopArticleUpdate = true,
                this.scrolling("routerCommandAction"),
                //relance du tinymce
                    
                //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
                setTimeout(()=>{tinymce.init({
                    selector: '#textareaUpdateArticle',
                })
                //on va inserer la nouvelle valeur recu par la props
                //tinymce.get('textareaUpdateArticle').setContent(this.articlesprops.articles[this.articlesprops.liveUpdateArticles].content);
                console.log(this.articlesprops.articles[this.articlesprops.liveUpdateArticles].content)
            },1000);
        },
        routageMenu() {
            this.scrolling("routageMenu")
        },
        scrolling(element) {
            setTimeout(()=>{

                const id = element;
                const yOffset = -100; 
                const elements = document.getElementById(id);
                const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
                
                window.scrollTo({top: y, behavior: 'smooth'});
            },200)
        },
        // modifier un article 
        emitMofifyArticleView(index){
            this.routageArticleUpdate()
            console.log(index);
            this.$emit('onmodifyarticleview',index)
        },
        onPreviousUpdateArticle() {
            tinymce.remove();
                    
            //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
            setTimeout(()=>{tinymce.init({
              selector: '#textareaUpdateArticle'
            })
            //on va inserer la nouvelle valeur recu par la props
            tinymce.get('textareaUpdateArticle').setContent(this.articlesprops.articles[this.articlesprops.liveUpdateArticles].content);
        },1000);
 
            this.$emit('onpreviousupdatearticle')
        },
        onNextUpdateArticle() {
            tinymce.remove();
                    
            //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
            setTimeout(()=>{tinymce.init({
              selector: '#textareaUpdateArticle'
            })
            //on va inserer la nouvelle valeur recu par la props
            tinymce.get('textareaUpdateArticle').setContent(this.articlesprops.articles[this.articlesprops.liveUpdateArticles].content);
        },1000);
            this.$emit('onnextupdatearticle')
        }
    }
})