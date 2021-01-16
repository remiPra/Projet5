Vue.component('news-shop',{
    props:['newsprops'],
    template:`
    <section id="routageMenu">
            <div>
                <div class="container-fluid row ">
                    <div @click="onGetAllNews();routageNewsList()" class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Promotions publiées</h4>
                            <p>Liste des promotions publiés sur le site</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="onGetAllNews(),routageNewsTest()" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Promotions en Brouillon</h4>
                            <p>Liste des promotions publiés sur le site</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="onGetAllNews(),routageNewsNew()" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Nouvelle promotion</h4>
                            <p>Ajouter une nouvelle promotion</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="onGetAllNews(),routageNewsUpdate()" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Modifier une Promotion</h4>
                            <p>Faire la modification d'une promotion</p>
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
                    <template v-if="router.shopNewsList">
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

                                    <tr v-for="(data,index) in newsprops.news">
                                        <td>{{data.title}}</td>
                                        <td>{{data.description}}</td>
                                        <td>{{data.date}}</td>
                                    
                                        <td>
                                            <div class="actionTableau">
                                                <a @click="emitModifyNewView(index)" class="LinkAdministration buttonAdministration">Modifié </a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </transition>


                <transition name="fade">
                    <template v-if="router.shopNewsTest">
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

                                <tr v-for="(data,index) in newsprops.news">
                                <template v-if="data.statusNews == 1">
                                <td>{{data.title}}</td>
                                <td>{{data.description}}</td>
                                <td>{{data.date}}</td>
                                        <td>
                                            <div class="actionTableau">
                                                <a @click="emitModifyNewView(index)" class="LinkAdministration buttonAdministration">Modifié </a>
                                                
                                                <form class="formWithNoBorder" method="POST" action="index.php?action=deleteNews">
                                                    <input required hidden name="id" :value="data.id">
                                                    <button  type="submit"> Supprimer</button>    
                                                </form>    
                                            </div>
                                        </td>
                                    </template>    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </transition>

                <transition name="fade">
                    <template v-if="router.shopNewsNew">
                        <form class="col-md-8 text-light" enctype="multipart/form-data"
                            action="index.php?action=sendNewNews" method="POST">
                            <div class="form-group">
                                <label for="title"> Titre de la promotion :
                                </label>
                                <input type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group"> 
                                <label for="description"> Décrivez le produit :
                                </label>
                                <input type="text" name="description" id="description" required>
                            </div>
                            
                            <div class="form-group">
                                <label> Voulez vous publier cette promotion ?</label>
                                <label for="statusNews"> Oui
                                    <input type="radio" name="statusNews" id="statusNews" value="1">
                                </label>
                                <label for="statusNews"> Non
                                    <input type="radio" name="statusNews" id="statusNews" value="0">
                                </label>
                            </div>

                            
                           
                            <div class="form-group">
                                <input class="formButton" type="submit" value="Valider" name="btnContact">
                            </div>


                        </form>
                    </template>
                </transition>


                
                    <template v-if="router.shopNewsUpdate">
                        <div class="row text-center">
                            <div class="d-flex text-center marginAuto">
                                <button @click="onPreviousUpdateNews">
                                    <- </button>
                                        <p>{{newsprops.news[newsprops.liveUpdateNews].title}}</p>
                                        <button @click="onNextUpdateNews"> -> </button>
                            </div>
                        </div>
                        <p>{{newsprops.liveUpdateNews}}</p>
                        <form class="col-md-8 text-light" enctype="multipart/form-data"
                            action="index.php?action=updateNews" method="POST">
                            
                            <div class="form-group">
                                <label for="title"> Titre de la promotion :
                                </label>
                                <input :value="newsprops.news[newsprops.liveUpdateNews].title" type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description"> Décrivez la promotion :
                                </label>
                                <input :value="newsprops.news[newsprops.liveUpdateNews].description" type="text" name="description" id="description" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label> Voulez vous publier cette promotion ?</label>
                                <label for="statusNews"> Oui
                                    <input type="radio" name="statusNews" id="statusNews" value="1">
                                </label>
                                <label for="statusNews"> Non
                                    <input type="radio" name="statusNews" id="statusNews" value="0">
                                </label>
                            </div>
                            <div class="form-group">
                            <input name="id" :value="newsprops.news[newsprops.liveUpdateNews].id" hidden required> 
                            
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
            shopNewsTest: false,
            shopNewsNew: false,
            shopNewsUpdate:false
        },
        messageError: "",
    }
},
methods: {
    routageNewsList(){
        this.router.shopNewsList= true,
        this.router.shopNewsTest= false,
        this.router.shopNewsNew= false,
        this.router.shopNewsUpdate= false,
        this.scrolling("routerCommandAction")
        console.log("routageNewsList")
        console.log(this.newsprops)
    },
    routageNewsTest(){
        this.router.shopNewsList= false,
        this.router.shopNewsTest= true,
        this.router.shopNewsNew= false,
        this.router.shopNewsUpdate= false,
        this.scrolling("routerCommandAction")
    },
    routageNewsNew(){
        this.router.shopNewsList= false,
        this.router.shopNewsTest= false,
        this.router.shopNewsNew= true,
        this.router.shopNewsUpdate= false,
        this.scrolling("routerCommandAction")
    },
    routageNewsUpdate(){
        this.router.shopNewsList= false,
        this.router.shopNewsTest= false,
        this.router.shopNewsNew= false,
        this.router.shopNewsUpdate= true,
        this.scrolling("routerCommandAction")
    },
    routageMenu(){
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
    onPreviousUpdateNews(){
        this.$emit('onpreviousupdatenews')
    },
    onNextUpdateNews(){
        this.$emit('onnextupdatenews')
    },
    emitModifyNewView(index){
        this.routageNewsUpdate()
        console.log(index);
        this.$emit('onmodifynewview',index)
    },
    //emit pour les props des news
    onGetAllNews(){
        console.log('onGetAllNews')
        this.$emit('ongetallnews')
    }

    
}
})