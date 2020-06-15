        
        Vue.component('product-shop', {
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
                        <template v-if="key.productShopOnline">
                            <div class="col-md-8 m-auto">
                                <table class="table table-bordere">
                                    <thead>
                                        <th>Produit</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </thead>
                                    <!-- tableau des Chapters brouillon -->
                                    <tbody>

                                        <tr>
                                            <td>fraise </td>
                                            <td>xxxxxx</td>
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

                    <template v-if="key.productShopTest">
                        <div class="col-md-8 m-auto">
                            <table class="table table-bordere">
                                <thead>
                                
                                        <th>Produit</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Prix</th>
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
                                                <a class="LinkAdministration">Valider </a>
                                                <a class="LinkAdministration">Supprimer </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </template> 
                    <template v-if="key.productShopNew">
                        <form class="col-md-8 text-light" 
                        enctype="multipart/form-data" 
                        action="index.php?action=newProduct" method="POST"
                        >
                            <div class="form-group">
                                <label for="title"> Nom du produit :
                                </label >
                                <input type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="quantityStock"> Stock a mettre en place :
                                </label >
                                <input type="text" name="quantityStock" id="quantityStock" required>
                            </div>
                            <div class="form-group">
                                <label  for="priceDetail"> Prix au Detail :
                                </label>
                                <input type="text" name="priceDetail" id="priceDetail" required>
                            </div>
                            <div class="form-group">
                                <label  for="typeOfQuantity"> Type de quantité :
                                </label>
                                <input type="text" name="typeOfQuantity" id="typeOfQuantity" required>
                            </div>
                            <div class="form-group">
                                <label  for="cartOfTheWeek"> Voulez vous ajouter des quantités au panier du week end ? :
                                </label>
                                <input type="text" name="cartOfTheWeek" value="0" id="cartOfTheWeek" required>
                            </div>
                            <div class="form-group">
                                <label  for="category"> Rentrer la catégorie souhaitée :
                                </label>
                                <input type="text" name="category" value="0" id="category required">
                            </div>
                            <div class="form-group">
                                <label  for="description"> Décrivez le produit :
                                </label>
                                <textarea id="description" type="text" name="description" cols="300" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <label  for="provenance"> décrivez la provenance :
                                </label>
                                <input type="text" name="provenance" id="provenance" required>
                            </div>
                            <div class="form-group">
                                <label> Voulez vous le rajouter au cart of the week</label>
                                <label  for="productCartOfTheWeek"> Oui
                                <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="1">
                                </label>
                                <label  for="productCartOfTheWeek"> Non
                                <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="0">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Voulez vous le mettre : </label>
                                <label  for="online"> Online
                                <input type="radio" name="online" id="online" value="1">
                                </label>
                                <label  for="productCartOfTheWeek"> Brouillon
                                <input type="radio" name="online" id="online" value="0">
                                </label>
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
                    </div>
                </div>
            `,
            data() {
                return {
                    liveSlide: 0,
                    slides: [{
                            title: "Produits dans le magasin",
                            paragraphe: "voici la liste des commandes a livrer ou collecter"
                        },
                        {
                            title: "Produits en Brouillon",
                            paragraphe: "Remplissez les différentes informations de la géolocalisation"
                        },
                        {
                            title: "Nouveau Produit",
                            paragraphe: "Remplissez les différentes informations de la géolocalisation"
                        },
                        // {
                        //     title: "Nouveau Produit",
                        //     paragraphe: "Remplissez les différentes informations de la géolocalisation"
                        // }
                    ],
                    key: {
                        productShopOnline: true,
                        productShopTest: false,
                        productShopNew: false,
                    },
                    messageError: "",
                }
            },
            methods: {
                sliderPrevious() {
                    this.liveSlide--
                    if (this.liveSlide == -1) {
                        this.liveSlide = 2

                    }
                    //console.log(this.key.collectCommand)
                    console.log(this.liveSlide)
                    this.routage();

                },
                sliderNext() {
                    this.liveSlide++
                    if (this.liveSlide == 3) {
                        this.liveSlide = 0
                      //  console.log(this.key.collectCommand)
                    }
                    this.routage();
                },
                routage() {
                    if (this.liveSlide == 0) {
                        this.key.productShopOnline = false,
                            this.key.productShopTest = true,
                            this.key.productShopNew = false
                            
                    } else if (this.liveSlide == 1) {
                        this.key.productShopOnline = true,
                            this.key.productShopTest = false,
                            this.key.productShopNew = false
                    } else if (this.liveSlide == 2) {
                        this.key.productShopOnline = false,
                            this.key.productShopTest = false,
                            this.key.productShopNew = true
                    }
                    //window.scrollTo(0, 0)
                }
            }
        })
