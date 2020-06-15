Vue.component('command-user', {
    data() {
        return {
            liveSlide: 0,
            slides: [{
                    title: "Commandes a livrer ",
                    paragraphe: "voici la liste des commandes a livrer ou collecter"
                },
                {
                    title: "Commandes collecter",
                    paragraphe: "Remplissez les différentes informations de la géolocalisation"
                }
            ],
            key: {
                livraisonCommand: true,
                collectCommand: true
            },
            messageError: "",
        }
    },
    methods: {
        sliderPrevious() {
            this.liveSlide--
            if (this.liveSlide == -1) {
                this.liveSlide = 1

            }
            console.log(this.key.collectCommand)
            console.log(this.liveSlide)
            this.routage();

        },
        sliderNext() {
            this.liveSlide++
            if (this.liveSlide == 2) {
                this.liveSlide = 0
                console.log(this.key.collectCommand)
            }
            this.routage();
        },
        routage() {
            if (this.liveSlide == 0) {
                this.key.collectCommand = false,
                    this.key.livraisonCommand = true
            } else if (this.liveSlide == 1) {
                this.key.collectCommand = true,
                    this.key.livraisonCommand = false
            }
            window.scrollTo(0, 0)
        },

    },
    template: `
     <div class="col-md-10 m-auto text-center m-auto text-light tableAdministration">
            <div>
            <h2>Listes des différentes commandes </h2>
            <h3>{{slides[liveSlide].title}}</h3>
                <h3 class="text-alert">{{messageError}}</h3>
                <p>ici va apparaitre les messages de notifications</p>
                <button @click="sliderPrevious">Etape précedente</button>
                <button @click="sliderNext">Etape suivante</button>
            </div>
                <template v-if="key.livraisonCommand">
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
                                            <a class="LinkAdministration">Effectué </a>
                                            <a class="LinkAdministration">Supprimer </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>   
                    </div>
                </template>

            <template v-if="key.collectCommand">
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
        </div>
     
     
     `,
    props: []
})
