Vue.component('command-user', {
    data() {
        return {           
            router: {
                commandLivraison: true,
                commandCollect: false,
                commandLast:false,
            },
            messageError: "",
        }
    },
    template: `
    <!-- section pour la partie des differentes categories de l'administration -->
        <section id="routageMenu">    
            <div>
                <div class="container-fluid row ">
                    <div @click="routageCommandLivraison" class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Commandes en magasin</h4>
                            <p>Commandes qui doit etre prete a etre retirer</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div @click="routageCommandCollect" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Commandes a Livrer</h4>
                            <p>Commande a preparer a la livraison </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Ancienne Commande</h4>
                            <p>Ancienne commande traiter</p>
                        </div>
                    </div>
                </div>
            </div>



            <div id="routerCommandAction" class="marginTopAdmin col-md-10 marginAuto text-center text-light tableAdministration">
                <div>
                    <h2>Listes des différentes commandes </h2>
                    <button @click="routageMenu"> Menu </button>
                    <h3 class="text-alert">{{messageError}}</h3>

                </div>

            <div class="marginTopAdmin">
                <transition name="fade">
                <template v-if="router.commandLivraison">
                    <div class="col-md-8 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Collect</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>

                                <tr>
                                    <td>22222</td>
                                    <td>xxxxxx</td>
                                    <td>xxxxxx</td>
                                    <td>xxxxxx</td>
                                    
                                    <td>
                                        <div class="actionTableau">
                                            <a class="LinkAdministration">Voir </a>
                                            <a class="LinkAdministration">Effectué </a>
                                            <a class="LinkAdministration">Supprimer </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>   
                    </div>
                </template>
                </transition>
                </div>

            <div class="marginTopAdmin">
            <transition name="fade">
            <template v-if="router.commandCollect">
                <div class="col-md-8 m-auto">
                    <table class="table table-bordere">
                        <thead>
                        <th>N° commande</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <!-- tableau des Chapters brouillon -->
                        <tbody>

                            <tr>
                                <td>22222</td>
                                <td>xxxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxxx</td>
                                <td>
                                    <div class="actionTableau">
                                        <a class="LinkAdministration">Voir </a>
                                        <a class="LinkAdministration">Effctué </a>
                                        <a class="LinkAdministration">Supprimer </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>   
                </div>
            </template>
            </transition>
            </div>

            <div class="marginTopAdmin">
            <transition name="fade">
            <template v-if="router.commandLast">
                <div class="col-md-8 m-auto">
                    <table class="table table-bordere">
                        <thead>
                        <th>N° commande</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <!-- tableau des Chapters brouillon -->
                        <tbody>

                            <tr>
                                <td>22222</td>
                                <td>xxxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxxx</td>
                                <td>
                                    <div class="actionTableau">
                                        <a class="LinkAdministration">Voir </a>
                                        <a class="LinkAdministration">Effctué </a>
                                        <a class="LinkAdministration">Supprimer </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>   
                </div>
            </template>
            </transition>
            </div>



            </div>
        </section>        
     
     
     `
    ,
    methods: {
        routageMenu(){
            this.scrolling("routageMenu")
        },
        routageCommandLivraison(){
            this.router.commandLivraison = true
            this.router.commandCollect = false
            this.router.commandLast = false
            this.scrolling("routerCommandAction")
        },        
        routageCommandCollect(){
            this.router.commandLivraison = false
            this.router.commandCollect = true
            this.router.commandLast = false
            this.scrolling("routerCommandAction")
        },
        scrolling(element) {
            document.getElementById(element).scrollIntoView(
                {
                    block: 'start',
                    behavior: 'smooth',
                }
            )
        },        

        // <div class="col-md-10 m-auto text-center m-auto text-light tableAdministration">
    },
    
    props: []
})
