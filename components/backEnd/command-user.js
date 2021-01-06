Vue.component('command-user', {
    props:['commandsprops'],  
    template: `
    <!-- section pour la partie des differentes categories de l'administration -->
    <section id="routageMenu">
        <div>
            <div class="container-fluid row ">
                <div @click="routageCommandLivraison" class="col-md-4">
                    <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                        <h4>Commandes a Livrer</h4>
                        <p>Commande a preparer a la livraison </p>
                       
                    </div>
                </div>

                <div class="col-md-4">
                    <div @click="routageCommandCollect" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">


                        <h4>Commandes en magasin</h4>
                        <p>Commandes qui doit etre prete a etre retirer</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div @click="routageCommandCollectLast"
                        class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                        <h4>Retraits prêts</h4>
                        <p>Commande faite pour le retrait</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div @click="routageCommandLivraisonLast"
                        class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                        <h4>Livraisons pretes</h4>
                        <p>Commande où la livraison est prête </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div @click="routageCommandCheck"
                        class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                        <h4>Commande effectué </h4>
                        <p>Commande terminé avec succées</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div @click="routageCommandProblem"
                        class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                        <h4>Commande problemes </h4>
                        <p>Commande problemes</p>
                    </div>
                </div>
            </div>
        </div>



        <div id="routerCommandAction"
            class="marginTopAdmin col-md-10 marginAuto text-center text-light tableAdministration">
            <div>
                <h2>Listes des différentes commandes </h2>
                <button @click="routageMenu"> Menu </button>
                <h3 class="text-alert">{{messageError}}</h3>

            </div>

            <div id="commandLivraison" class="marginTopAdmin">

                <template v-if="router.commandLivraison">

                    <h2>Commandes qui doivent etre préparer pour la livraison en 
                     magasin </h2>
                    <div class="col-lg-12 col-md-12 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>
                                <tr v-for="(data,index) in commandsprops.commands[0]">
                                    <td v-if="data.status=='livraison'">{{data.numberCommand}}</td>
                                    <td v-if="data.status=='livraison'">{{data.name}}</td>
                                    <td v-if="data.status=='livraison'">{{data.email}}</td>
                                    <td v-if="data.status=='livraison'">{{data.phone}}</td>
                                    <td v-if="data.status=='livraison'">{{data.deliveryDay}}</td>
                                    <td v-if="data.status=='livraison'">
                                        <div class="actionTableau">
                                            <button class="ButtonGreen"
                                                @click="onDetailCommandLivraison(data.numberCommand)">Voir </button>                                          
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </template>
            </div>

            <div id="commandCollect" class="marginTopAdmin">

                <template v-if="router.commandCollect">
                <h2>Commandes qui doivent etre préparer pour le retrait en magasin </h2>
                    <div class="col-lg-12 col-md-12 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>
                                <tr v-for="(data,index) in commandsprops.commands[0]" :key="data.id">
                                    <td v-if="data.status=='retrait'">{{data.numberCommand}}</td>
                                    <td v-if="data.status=='retrait'">{{data.name}}</td>
                                    <td v-if="data.status=='retrait'">{{data.email}}</td>
                                    <td v-if="data.status=='retrait'">{{data.phone}}</td>
                                    <td v-if="data.status=='retrait'">{{data.dateDeliveryOrder}}</td>
                                    <td v-if="data.status=='retrait'">
                                        <div class="actionTableau">
                                            <a class="LinkAdministration ButtonGreen"
                                                @click="onDetailCommandCollect(data.numberCommand)">Voir </a>
            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>

            </div>

            <div class="marginTopAdmin">
                <template v-if="router.commandLastCollect">
                <h2>Commandes pretes pour le retrait en 
                     magasin </h2>
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Jour</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>

                                <tr v-for="(data,index) in commandsprops.commands[0]" :key="data.name">
                                    <td v-if="data.status=='retraitPret'">{{data.numberCommand}}</td>
                                    <td v-if="data.status=='retraitPret'">{{data.name}}</td>
                                    <td v-if="data.status=='retraitPret'">{{data.deliveryDay}}</td>
                                    <td v-if="data.status=='retraitPret'">{{data.phone}}</td>
                                    <td v-if="data.status=='retraitPret'">{{data.dateDeliveryOrder}}</td>
                                    <td v-if="data.status=='retraitPret'">
                                        <div class="actionTableau">
                                            <a class="LinkAdministration ButtonGreen"
                                                @click="onDetailCommandCollect(data.numberCommand)">Voir </a>
                                          
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>
            </div>

            <div class="marginTopAdmin">
                <template v-if="router.commandLastLivraison">
                <h2>Commandes pretes a être livrés</h2>
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>
                                <tr v-for="(data,index) in commandsprops.commands[0]" :key="data.name">
                                    <td v-if="data.status=='livraisonPrete'">{{data.numberCommand}}</td>
                                    <td v-if="data.status=='livraisonPrete'">{{data.name}}</td>
                                    <td v-if="data.status=='livraisonPrete'">{{data.email}}</td>
                                    <td v-if="data.status=='livraisonPrete'">{{data.phone}}</td>
                                    <td v-if="data.status=='livraisonPrete'">{{data.deliveryDay}}</td>
                                    <td v-if="data.status=='livraisonPrete'">
                                        <div class="actionTableau">
                                            <a class="LinkAdministration"
                                                @click="onDetailCommandLivraison(data.numberCommand)">Voir </a>
                                            <a class="LinkAdministration">Effectué </a>
                                            <a class="LinkAdministration">Supprimer </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>
            </div>
            
            <div class="marginTopAdmin">
                <template v-if="router.commandCheck">
                <h2>Commandes livrées ou récupérées</h2>
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>
                                <tr v-for="(data,index) in commandsprops.commands[0]" :key="data.name">
                                    <td v-if="data.statusCommand=='400'">{{data.numberCommand}}</td>
                                    <td v-if="data.statusCommand=='400'">{{data.name}}</td>
                                    <td v-if="data.statusCommand=='400'">{{data.email}}</td>
                                    <td v-if="data.statusCommand=='400'">{{data.phone}}</td>
                                    <td v-if="data.statusCommand=='400'">{{data.deliveryDay}}</td>
                                    <td v-if="data.statusCommand=='400'">
                                        <div class="actionTableau">
                                            <a class="LinkAdministration ButtonGreen"
                                                @click="onDetailCommandLivraison(data.numberCommand)">Voir </a>
                                            <a class="LinkAdministration ButtonGreen">Supprimer </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>
            </div>
            
            <div class="marginTopAdmin">
                <template v-if="router.commandProblem">
                <h2>Commandes problèmes</h2>
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>N° commande</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>
                                <tr v-for="(data,index) in commandsprops.commands[0]" :key="data.name">
                                    <td v-if="data.statusCommand=='500'">{{data.numberCommand}}</td>
                                    <td v-if="data.statusCommand=='500'">{{data.name}}</td>
                                    <td v-if="data.statusCommand=='500'">{{data.email}}</td>
                                    <td v-if="data.statusCommand=='500'">{{data.phone}}</td>
                                    <td v-if="data.statusCommand=='500'">{{data.dateDeliveryOrder}}</td>
                                    <td v-if="data.statusCommand=='500'">
                                        <div class="actionTableau">
                                            <a class="LinkAdministration"
                                                @click="onDetailCommandLivraison(data.numberCommand)">Voir </a>
                                            <a class="LinkAdministration">Supprimer </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>
            </div>


            <div id="detailCommandCollect">
                <div v-if="router.detailCommandCollect" class="buttonBrown text-center">
                    <h3>Commande N° {{adminDetailCollect[0].numberCommand}} </h3>
                    <h4>{{adminDetailCollect[0].deliveryDay}}</h4>
                    <button @click="ClosedetailCommandCollect" class="ButtonGreen"> Fermer </button>

                    <p>Cette commande N° {{adminDetailCollect[0].numberCommand}} a été faite par
                        {{adminDetailCollect[0].surnameuser}} {{adminDetailCollect[0].nameUser}}.</p>
                    <p>Elle est en {{adminDetailCollect[0].status}} en magasin</p>
                    <p> Son adresse est
                        {{adminDetailCollect[0].adress}}{{adminDetailCollect[0].postalCode}}{{adminDetailCollect[0].town}}
                    </p>
                    <p> Vous pouvez joindre cette personne au {{adminDetailCollect[0].phone}}</p>
                    <table class="administrationFlex">
                        <thead>
                            <th>Nom du produit</th>
                            <th>Quantité </th>
                            <th>Type de quantite</th>
                            <th>Prix à l'unité</th>
                        </thead>
                        <tbody>
                            <tr v-for="(data,index) in orderDetailCollect" :id="data.productName">
                                <td>{{data.productName}}</td>
                                <td>{{data.productQuantity}}</td>
                                <td>{{data.typeOfQuantity}}</td>
                                <td>{{data.priceDetail}} €</td>
                                <td><button @click="color(data.productName)" class="onButtonGreen"> v</button> </td>
                            </tr>
                            <tr>
                                <td>Prix Total</td>
                                <td></td>
                                <td></td>
                                <td>{{orderProperty}} €</td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="adminDetailCollect[0].status == 'retrait'">
                        
                        <form class="formWithNoBorder" method="POST" action="proceed.php?action=validateCollectCommand">
                            <input hidden required name="numberCommand" :value="adminDetailCollect[0].numberCommand">
                            <button type="submit"> Command prete au retrait </button>
                        </form>
                      



                    </div>
                    <template v-if="adminDetailCollect[0].status == 'retraitPret'">
                        <form class="formWithNoBorder" method="POST" action="proceed.php?action=checkCommand">
                        <input hidden :value="adminDetailCollect[0].numberCommand" name="numberCommand" required>
                        <button type="submit">
                            Commande Récupéré
                        </button>
                        </form>
                        <button @click="onProblemCommand(adminDetailCollect[0].numberCommand)">Probleme Commande</button>
                    </template>
                </div>
            </div>

            <div id="detailCommandLivraison">
                <div v-if="router.detailCommandLivraison" class="buttonBrown text-center">
                    <h3>Commande N° {{adminDetailLivraison[0].numberCommand}}</h3>
                    <h4>{{adminDetailLivraison[0].deliveryDay}}</h4>
                    <button @click="ClosedetailCommandLivraison" class="ButtonGreen"> Fermer </button>
                    <p>Cette commande N° {{adminDetailLivraison[0].numberCommand}} a été faite par
                        {{adminDetailLivraison[0].surnameuser}} {{adminDetailLivraison[0].nameUser}}.</p>
                    <p>Elle est en {{adminDetailLivraison[0].status}} à cette adresse :<br>
                        {{adminDetailLivraison[0].adress}}{{adminDetailLivraison[0].postalCode}}{{adminDetailLivraison[0].town}}
                    </p>
                    <p> Vous pouvez joindre cette personne au {{adminDetailLivraison[0].phone}}</p>
                    <a class="ButtonGreen" :href="gmapsAdress" target="_blank"> itinéraire </a>
                    <table class="administrationFlex">
                        <thead>
                            <th>Nom du produit</th>
                            <th>quantité </th>
                            <th>Prix a l'unité</th>
                            <th>Total</th>

                        </thead>
                        <tbody>
                            <tr v-for="(data,index) in orderDetailLivraison" :key=data.productName
                                :id="data.productName">
                                <td>{{data.productName}}</td>
                                <td>{{data.productQuantity}}</td>
                                <td>{{data.typeOfQuantity}}</td>
                                <td>{{data.priceDetail}} €</td>
                                <td><button @click="color(data.productName)"> v </button> </td>
                            </tr>
                            <tr>
                                <td>Prix Total</td>
                                <td></td>
                                <td></td>
                                <td>{{orderProperty}} €</td>
                            </tr>
                        </tbody>
                    </table>
                    <template v-if="adminDetailLivraison[0].status == 'livraison'">
                            <form  class="formWithNoBorder" method="POST" action="proceed.php?action=validateLivraisonCommand">
                            <input hidden    :value="adminDetailLivraison[0].numberCommand" name="numberCommand" required>
                                <button type="submit">
                                Commande prete livraison
                                </button>
                            </form>
                    
                        </template>
                    <template v-if="adminDetailLivraison[0].status == 'livraisonPrete'">
                        

                    <form method="POST" action="proceed.php?action=checkCommand">
                        <input :value="adminDetailLivraison[0].numberCommand" name="numberCommand" required>
                        <button type="submit">
                            Commande Livré
                        </button>
                    </form>
                        <button @click="problemCommand">Probleme Commande</button>
                    </template>
                </div>
            </div>
        </div>
    </section>


     `
    ,
    data() {
        return {
            
                        //detail des livraisons
            adminDetailCollect:[],
            orderDetailCollect:[],
            adminDetailLivraison:[],
            orderDetailLivraison:[],
            memory:this.commandsprops,
            router: {
                commandLivraison: true,
                commandCollect: false,
                commandLastLivraison:false,
                commandLastCollect:false,
                commandCheck:false,
                commandProblem:false,

                detailCommandCollect:false,
                detailCommandLivraison:false,
            },
            messageError: "",
            //detail de la commande
            gmapsAdress : "",
            orderProperty:""
        }
    },
    mounted(){
        // this.commandsPropsLivraison = 
        // this.commandsPropsRetrait = this.commandsprops.commands[0].find(
        //     (data) => (data.status == "retrait")
        // )
    },
    methods: {
        color(element){
            if(document.getElementById(element).style.backgroundColor == "green"){
                document.getElementById(element).style.backgroundColor = "#d9a679"
            }
            else {
                document.getElementById(element).style.backgroundColor = "green"
            }
        },
        routageMenu(){
            this.scrolling("routerMain")
        },
        routageCommandLivraison(){
            this.router.commandLivraison = true,
            this.router.commandCollect = false,
            this.router.commandLastLivraison = false,
            this.router.commandLastCollect = false,
            this.router.commandCheck = false
            this.router.commandProblem = false
            this.scrolling("routerCommandAction")
        },
        routageCommandProblem(){
            this.router.commandLivraison = false,
            this.router.commandCollect = false,
            this.router.commandLastLivraison = false,
            this.router.commandLastCollect = false,
            this.router.commandCheck = false,
            this.router.commandProblem = true,
            this.scrolling("routerCommandAction")
        },
        routageCommandCollect(){
            this.router.commandLivraison = false
            this.router.commandCollect = true
            this.router.commandLastLivraison = false,
            this.router.commandLastCollect = false,
            this.router.commandCheck = false
            this.router.commandProblem = false
            this.scrolling("routerCommandAction")
        },
        routageCommandCollectLast(){
            this.router.commandLivraison = false
            this.router.commandCollect = false
            this.router.commandLastLivraison = false,
            this.router.commandLastCollect = true,
            this.router.commandProblem = false
            this.router.commandCheck = false
            this.scrolling("routerCommandAction")
        },
        routageCommandLivraisonLast(){
            this.router.commandLivraison = false
            this.router.commandCollect = false
            this.router.commandLastLivraison = true,
            this.router.commandLastCollect = false,
            this.router.commandCheck = false
            this.router.commandProblem = false
            this.scrolling("routerCommandAction")
        },
        routageCommandCheck(){
            this.router.commandLivraison = false
            this.router.commandCollect = false
            this.router.commandLastLivraison = false,
            this.router.commandLastCollect = false,
            this.router.commandCheck = true
            this.router.commandProblem = false
            this.scrolling("routerCommandAction")
        },
        onDetailCommandCollect(order){
            //on reinitialise 
            this.orderDetailCollect = []
            //on cré les différentes données 
            this.commandsprops.commands[1].forEach( (data) => {
                if(data.numberCommand == order){
                    this.orderDetailCollect.push(data)
                }
            })
            this.adminDetailCollect = []
            
            this.commandsprops.commands[0].forEach( (data) => {
                if(data.numberCommand == order){
                    this.adminDetailCollect.push(data)
                    this.orderProperty = data.totalPrice
                }
            })
            console.log(this.adminDetailCollect)
            
            



            this.router.detailCommandCollect = true;
            this.scrolling('detailCommandCollect');
            //findProductOfCommandUser
        },
        onDetailCommandLivraison(order){
            //on reinitialise 
            this.orderDetailLivraison = []
            //on cré les différentes données 
            this.commandsprops.commands[1].forEach( (data) => {
                if(data.numberCommand == order){
                    
                    this.orderDetailLivraison.push(data)
                    
                }
            })

            this.adminDetailLivraison = []
            this.commandsprops.commands[0].forEach( (data) => {
                if(data.numberCommand == order){
                    this.adminDetailLivraison.push(data)
                    this.orderProperty = data.totalPrice
                }
            })
           

            this.gmapsAdress=`https://www.google.com/maps/dir/43.9341582,0.6099069/${this.adminDetailLivraison[0].adress},+${this.adminDetailLivraison[0].postalCode}+${this.adminDetailLivraison[0].town}`

            console.log(this.adminDetailLivraison)
            this.router.detailCommandLivraison = true;
            this.scrolling('detailCommandLivraison');
            //findProductOfCommandUser
        },
        ClosedetailCommandCollect(){
            this.scrolling('commandCollect');
            //stockage pour le booleen
            this.orderProperty = "";
            this.router.detailCommandCollect = false;    
        },
        ClosedetailCommandLivraison(){
            this.scrolling('commandLivraison');
            //stockage pour le booleen
            this.orderProperty = "";
            this.router.detailCommandLivraison = false;    
        },
        scrolling(element) {
            setTimeout(()=>{

                const id = element;
                const yOffset = -100; 
                const elements = document.getElementById(id);
                const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
                
                window.scrollTo({top: y, behavior: 'smooth'});
            },500)
        },
   
        onProblemCommand(data){
            this.$emit('onproblemcommand',data)
        }
        // <div class="col-md-10 m-auto text-center m-auto text-light tableAdministration">
    },
    

    
})
