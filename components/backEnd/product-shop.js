        
        Vue.component('product-shop', {
            props:['productsprops'],
            template: `
            <section id="routerMenu">
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
                    <button @click="routageMenu"> Menu produits  </button>
                    <h3 class="text-alert">{{messageError}}</h3>
    
                </div>
    
                <div>
                    <transition name="fade">
                        <template v-if="router.productShopList">
                            <div class="col-md-8 m-auto">
                                <table class="table table-bordere">
                                    <thead>
                                        <th>Produit</th>
                                        
                                        <th>Stock</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </thead>
                                    <!-- tableau des Chapters brouillon -->
                                    <tbody>
    
                                        <tr v-for="(data,index) in memory" :key="data.title" :id="index">
                                            <td v-if="data.online==1">{{data.title}}</td>
                                            
                                            <td v-if="data.online==1">
                                                <button @click="addStockProduct(data.title,data.quantityStock)">+</button>
                                                {{data.quantityStock}}
                                                <button @click="substractStockProduct(data.title,data.quantityStock)">-</button>
                                            </td>
                                            <td v-if="data.online==1">{{data.priceDetail}}</td>
                                            <td v-if="data.online==1">
                                                <div class="actionTableau">
                                                    <a @click="modifyProductView(index)" class="buttonAdministration LinkAdministration">Modifié </a>
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
                                
                                <th>Stock</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>

                                <tr v-for="(data,index) in productsprops.products" :key="data.title" :id="index">
                                    <td v-if="data.online==0">{{data.title}}</td>
                                    <td v-if="data.online==0">                                        
                                        {{data.quantityStock}}
                                    </td>
                                    <td v-if="data.online==0">{{data.priceDetail}} €</td>
                                    <td v-if="data.online==0">
                                        <div class="actionTableau">
                                            <a  @click="modifyProductView(index)" class="buttonAdministration LinkAdministration">Modifié </a>
                                            
                                                <form  class="formAdmin formWithNoBorder" action="proceed.php?action=deleteProduct" method="POST"> 
                                                    <input name="id" :value="data.id" hidden>   
                                                    <input name="title" :value="data.title" hidden>   
                                                    <button  class="buttonAdmin " type="submit">Supprimer definitivement</button>
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
                        <template v-if="router.productDelete">
                        <div class="col-md-8 m-auto">
                        <table class="table table-bordere">
                            <thead>
                                <th>Produit</th>
                                
                                <th>Stock</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </thead>
                            <!-- tableau des Chapters brouillon -->
                            <tbody>

                                <tr v-for="(data,index) in productsprops.products" :key="data.title" :id="index">
                                    <td v-if="data.online==2">{{data.title}}</td>
                                    <td v-if="data.online==2">                                        
                                        {{data.quantityStock}}
                                    </td>
                                    <td v-if="data.online==2">{{data.priceDetail}} €</td>
                                    <td v-if="data.online==2">
                                        <div class="actionTableau">
                                            <a  @click="updateTestProduct(data.id,data.title)" class="buttonAdministration LinkAdministration">Modifié </a>
                                            <a @click="deleteproduct(data.id,data.title)"  class="LinkAdministration">Liste supprimé </a>
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
                                    <textarea id="textareaNewProduct" type="text" name="description" cols="300" rows="10"
                                        ></textarea>
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
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].title"
                                    type="text" name="title" id="title" required>
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].id"
                                    type="text" name="id" id="id"  hidden required>
                                </div>
                                <div class="form-group">
                                    <label for="quantityStock"> Stock a mettre en place :
                                    </label>
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].quantityStock" type="text" name="quantityStock" id="quantityStock" required>
                                </div>
                                <div class="form-group">
                                    <label for="priceDetail"> Prix au Detail :
                                    </label>
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].priceDetail"  
                                    type="text" name="priceDetail" id="priceDetail" required>
                                </div>
                                <div class="form-group">
                                    <label for="typeOfQuantity"> Type de quantité :
                                    </label>
                                    <input  :value="productsprops.products[productsprops.liveUpdateProduct].typeOfQuantity" 
                                    type="text" name="typeOfQuantity" id="typeOfQuantity" required>
                                </div>

                                <div class="form-group">
                                    <label for="cartOfTheWeek"> Voulez vous ajouter des quantités au panier du week end ? :
                                    </label>
                                    <input  
                                    type="text" name="quantityProductCartOfTheWeek" :value="productsprops.products[productsprops.liveUpdateProduct].quantityProductCartOfTheWeek" id="cartOfTheWeek" required>
                                </div>
                                <div class="form-group">
                                    <label for="category"> Rentrer la catégorie souhaitée :
                                    </label>
                                    <input type="text" name="category" :value="productsprops.products[productsprops.liveUpdateProduct].category" id="category required">
                                </div>
                                <div class="form-group">
                                    <label for="description"> Décrivez le produit :
                                    </label>
                                    <textarea id="textareaUpdateProduct" type="text" name="description" cols="300" rows="10"
                                        ><div>{{productsprops.products[productsprops.liveUpdateProduct].description}} {{tinyTextarea}}</div></textarea>
                                </div>
                                <div class="form-group">
                                
                                    <label for="provenance"> décrivez la provenance :
                                    </label>
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].provenance"
                                    type="text" name="provenance" id="provenance" required>
                                </div>


                                <div class="form-group">
                                    <label> Voulez vous le rajouter au cart of the week</label>
                                    <label for="productCartOfTheWeek"> Oui
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].productCartOfTheWeek==1">
                                            <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="1" checked>
                                        </template>
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].productCartOfTheWeek==0">
                                            <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="1">
                                        </template>
                                    </label>
                                    <label for="productCartOfTheWeek"> Non
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].productCartOfTheWeek==0">
                                            <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="0" checked>
                                        </template>
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].productCartOfTheWeek==1">
                                            <input type="radio" name="productCartOfTheWeek" id="productCartOfTheWeek" value="0">
                                        </template>
                                    </label>
                                </div>



                                <div class="form-group">
                                    <label>Voulez vous le mettre : </label>
                                    <label for="online"> Online
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].online==1">
                                            <input type="radio" name="online" id="online" value="1" checked>  
                                        </template>
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].online==0">
                                            <input type="radio" name="online" id="online" value="1">
                                        </template>
                                    </label>
                                    <label for="online"> Brouillon
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].online==0">
                                            <input type="radio" name="online" id="online" value="0" checked>  
                                        </template>
                                        <template v-if="productsprops.products[productsprops.liveUpdateProduct].online==1">
                                            <input type="radio" name="online" id="online" value="0">
                                        </template>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="image"> Image en cours:
                                    </label>
                                    <img :src="productsprops.products[productsprops.liveUpdateProduct].src" style="width:300px"> 
                                    <input :value="productsprops.products[productsprops.liveUpdateProduct].src" id="src" type="text" name="src" hidden 
                                        required />
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
            mounted(){
                this.memory = this.productsprops.products
            },
            data() {
                return {
                    watchers:[],
                    //tinyTextarea:"this.productsprops.products[this.productsprops.liveUpdateProduct].description ",
                    memory:this.productsprops.products,   
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
                    this.router.productDelete= false,
                    this.scrolling("routerCommandAction")
                },
                routageProductTest(){
                    this.router.productShopList= false,
                    this.router.productShopTest= true,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= false,
                    this.router.productDelete= false,
                    this.scrolling("routerCommandAction")
                },
                routageProductNew(){
                    tinymce.remove();
                    this.router.productShopList= false,
                    this.router.productShopTest= false,
                    this.router.productShopNew= true,
                    this.router.productShopUpdate= false,
                    this.router.productDelete= false,  
                    setTimeout(()=>{tinymce.init({
                        selector: '#textareaNewProduct',
                    })
                },1000);
                    
                    this.scrolling("routerCommandAction")
                },
                routageProductUpdate(){
                    tinymce.remove();
                    this.router.productShopList= false,
                    this.router.productShopTest= false,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= true,
                    this.router.productDelete= false,
                    setTimeout(()=>{tinymce.init({
                        selector: '#textareaUpdateProduct'
                    })},1000);
                    
                    this.scrolling("routerCommandAction")
                },
                routageProductDelete(){
                    this.router.productShopList= false,
                    this.router.productShopTest= false,
                    this.router.productShopNew= false,
                    this.router.productShopUpdate= false,
                    this.router.productDelete= true,
                    this.scrolling("routerCommandAction")
                },
                routageMenu(){
                    this.scrolling("routerMain")
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
                //click pour modifier produit depuis la liste des produits 
                modifyProductView(data){
                    this.routageProductUpdate()
                    this.$emit("onmodifyproductview",data)
                },
                onPreviousUpdateProduct(){
                    //relance du tinymce
                    tinymce.remove();
                    
                    //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
                    setTimeout(()=>{tinymce.init({
                        selector: '#textareaUpdateProduct',
                    })
                    //on va inserer la nouvelle valeur recu par la props
                    tinymce.get('textareaUpdateProduct').setContent(this.productsprops.products[this.productsprops.liveUpdateProduct].description);
                    
                },1000);
                    this.$emit('onpreviousupdateproduct')
                },
                onNextUpdateProduct(){
                    //relance du tinymce
                    tinymce.remove();
                    
                    //on met un setTimeout pout etre sur qu'il soit appliqué en mem temps que les props
                    setTimeout(()=>{tinymce.init({
                        selector: '#textareaUpdateProduct',
                    })
                    //on va inserer la nouvelle valeur recu par la props
                    tinymce.get('textareaUpdateProduct').setContent(this.productsprops.products[this.productsprops.liveUpdateProduct].description);
                    
                },1000);
                    this.$emit('onnextupdateproduct')
                },
                //appel axios pour ajouter stock produit
                addStockProduct(data,stock){
                    // on utilise une data pas la props car trop rapide pour axios
                this.memory.forEach( (datas) => {
                    if(datas.title == data){
                        datas.quantityStock = parseInt(stock) + 1
                    }
                }
                )
                
                let product=[]
                product.push(data)    
                product.push(stock)    
                let name = this.toFormData(product)
                //let name = new FormData
                 
                axios.post("index.php?action=addStockProduct",name).then(function(response) {
                            if (response.data.error) {
                                
                                console.log(app.errorMsg)
                            } else {
                                console.log(response.data);
                                console.log("success");
                            }
                        });
                this.$emit('updateproducts')        
                },
                substractStockProduct(data,stock){
                    // on utilise une data pas la props car trop rapide pour axios
                this.memory.forEach( (datas) => {
                    if(datas.title == data){
                        datas.quantityStock = parseInt(stock) - 1
                    }
                }
                )
                
                let product=[]
                product.push(data)    
                product.push(stock)    
                let name = this.toFormData(product)
                //let name = new FormData
                 
                axios.post("index.php?action=substractStockProduct",name).then(function(response) {
                            if (response.data.error) {
                                
                                console.log(app.errorMsg)
                            } else {
                                console.log(response.data);
                                console.log("success");
                            }
                        });
                this.$emit('updateproducts')        
                },
                //fonction emit qui va delete definitivement le produit
                deleteproduct(data,name){
                    let post = ({id:data,title:name})
                    this.$emit('ondeleteproduct',post)
                },
                updateDeleteProduct(data,name){
                    let post = ({id:data,title:name})
                    console.log(post)
                    this.$emit('onupdatedeleteproduct',post)
                },
                updateTestProduct(data,name){
                    let post = ({id:data,title:name})
                    console.log(post)
                    this.$emit('onupdatetestproduct',post)
                },
                toFormData(obj) {
                    // conversion d'une données javascript 
                    let fd = new FormData();
                    console.log()
                    for (let i in obj) {
                        fd.append(i, obj[i]);
                    }
                    console.log(fd);
                    // retourne le resultat
                    return fd;
                },
            },
            computed:{
                textarea(){
                    return this.productsprops.products[this.productsprops.liveUpdateProduct].description
                }
            }
            ,
         
        })
