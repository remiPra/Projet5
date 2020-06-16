        
        Vue.component('product-shop', {
            props:['productsprops'],
            template: `
            <section id="routageMenu">
            <div>
                <div class="container-fluid row ">
                    <div @click="routageProductList" class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Produits en magasin</h4>
                            <p>Trier selon le stock</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageProductTest" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Produits en brouillon</h4>
                            <p>Produits non mis en ligne </p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageProductNew" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Nouveau produit</h4>
                            <p>Ajouter un produit</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="routageProductUpdate" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Modifier un produit</h4>
                            <p>Faire la modification d'un produit</p>
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
                        <template v-if="router.productShopList">
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
                    </transition>
    
    
                    <transition name="fade">
                        <template v-if="router.productShopTest">
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
                    </transition>
    
                    <transition name="fade">
                        <template v-if="router.productShopNew">
                            <form class="col-md-8 text-light" enctype="multipart/form-data"
                                action="index.php?action=newProduct" method="POST">
                                <div class="form-group">
                                    <label for="title"> Nom du produit :
                                    </label>
                                    <input type="text" name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantityStock"> Stock a mettre en place :
                                    </label>
                                    <input type="text" name="quantityStock" id="quantityStock" required>
                                </div>
                                <div class="form-group">
                                    <label for="priceDetail"> Prix au Detail :
                                    </label>
                                    <input type="text" name="priceDetail" id="priceDetail" required>
                                </div>
                                <div class="form-group">
                                    <label for="typeOfQuantity"> Type de quantité :
                                    </label>
                                    <input type="text" name="typeOfQuantity" id="typeOfQuantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="cartOfTheWeek"> Voulez vous ajouter des quantités au panier du week end ? :
                                    </label>
                                    <input type="text" name="cartOfTheWeek" value="0" id="cartOfTheWeek" required>
                                </div>
                                <div class="form-group">
                                    <label for="category"> Rentrer la catégorie souhaitée :
                                    </label>
                                    <input type="text" name="category" value="0" id="category required">
                                </div>
                                <div class="form-group">
                                    <label for="description"> Décrivez le produit :
                                    </label>
                                    <textarea id="description" type="text" name="description" cols="300" rows="10"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="provenance"> décrivez la provenance :
                                    </label>
                                    <input type="text" name="provenance" id="provenance" required>
                                </div>
                                <div class="form-group">
                                    <label> Voulez vous le rajouter au cart of the week</label>
                                    <label for="productCartOfTheWeek"> Oui
                                        <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="1">
                                    </label>
                                    <label for="productCartOfTheWeek"> Non
                                        <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="0">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Voulez vous le mettre : </label>
                                    <label for="online"> Online
                                        <input type="radio" name="online" id="online" value="1">
                                    </label>
                                    <label for="productCartOfTheWeek"> Brouillon
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
                    </transition>
    
    
                    
                        <template v-if="router.productShopUpdate">
                            <div class="row text-center">
                                <div class="d-flex text-center marginAuto">
                                    <button @click="onPreviousUpdateProduct">
                                        <- </button>
                                            <p>{{productsprops.products[productsprops.liveUpdateProduct].title}}</p>
                                            <button @click="onNextUpdateProduct"> -> </button>
                                </div>
                            </div>
                            <p>{{productsprops.liveUpdateProduct}}</p>
                            <form class="col-md-8 text-light" enctype="multipart/form-data"
                                action="index.php?action=updateProduct" method="POST">
                                <div class="form-group">
                                    <label for="title"> Nom du produit :
                                    </label>
                                    <input type="text" name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantityStock"> Stock a mettre en place :
                                    </label>
                                    <input type="text" name="quantityStock" id="quantityStock" required>
                                </div>
                                <div class="form-group">
                                    <label for="priceDetail"> Prix au Detail :
                                    </label>
                                    <input type="text" name="priceDetail" id="priceDetail" required>
                                </div>
                                <div class="form-group">
                                    <label for="typeOfQuantity"> Type de quantité :
                                    </label>
                                    <input type="text" name="typeOfQuantity" id="typeOfQuantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="cartOfTheWeek"> Voulez vous ajouter des quantités au panier du week end ? :
                                    </label>
                                    <input type="text" name="cartOfTheWeek" value="0" id="cartOfTheWeek" required>
                                </div>
                                <div class="form-group">
                                    <label for="category"> Rentrer la catégorie souhaitée :
                                    </label>
                                    <input type="text" name="category" value="0" id="category required">
                                </div>
                                <div class="form-group">
                                    <label for="description"> Décrivez le produit :
                                    </label>
                                    <textarea id="description" type="text" name="description" cols="300" rows="10"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="provenance"> décrivez la provenance :
                                    </label>
                                    <input type="text" name="provenance" id="provenance" required>
                                </div>
                                <div class="form-group">
                                    <label> Voulez vous le rajouter au cart of the week</label>
                                    <label for="productCartOfTheWeek"> Oui
                                        <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="1">
                                    </label>
                                    <label for="productCartOfTheWeek"> Non
                                        <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="0">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Voulez vous le mettre : </label>
                                    <label for="online"> Online
                                        <input type="radio" name="online" id="online" value="1">
                                    </label>
                                    <label for="productCartOfTheWeek"> Brouillon
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
        </section>  
            `,
            data() {
                return {   
                    router: {
                        productShopList: true,
                        productShopTest: false,
                        productShopNew: false,
                        productShopUpdate:false
                    },
                    messageError: "",
                }
            },
            methods: {
                routageProductList(){
                    this.router.productShopList= true,
                    this.router.productShopTest= false,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= false,
                    this.scrolling("routerCommandAction")
                },
                routageProductTest(){
                    this.router.productShopList= false,
                    this.router.productShopTest= true,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= false,
                    this.scrolling("routerCommandAction")
                },
                routageProductNew(){
                    this.router.productShopList= false,
                    this.router.productShopTest= false,
                    this.router.productShopNew= true,
                    this.router.productShopUpdate= false,
                    this.scrolling("routerCommandAction")
                },
                routageProductUpdate(){
                    this.router.productShopList= false,
                    this.router.productShopTest= false,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= true,
                    this.scrolling("routerCommandAction")
                },
                routageMenu(){
                    this.scrolling("routageMenu")
                },
                scrolling(element) {
                    document.getElementById(element).scrollIntoView(
                        {
                            block: 'start',
                            behavior: 'smooth',
                        }
                    )
                },
                onPreviousUpdateProduct(){
                    this.$emit('onpreviousupdateproduct')
                },
                onNextUpdateProduct(){
                    this.$emit('onnextupdateproduct')
                }
            }
        })
