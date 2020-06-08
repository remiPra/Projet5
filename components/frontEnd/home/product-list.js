Vue.component('shop-products-details', {
    props: ["elements"],
    data() {
        return {
            keyChange:true,
            category: [{ name: "all" }, { name: "legumes" }, { name: "fruits" }],
            h2: "Selection des produits",
            text: "Retouvez la selection de nos plus beaux produits disponible dans notre magasin",
            searchProduct: "",
            productsListShow: true,
            liveCategory: 0,
            error: "",
            classButton: "buttonAdd",
            //on garde le total du depart
            searchClass: "displayFlex"
        }
    },
    template: `
<div id="goShop">
<div data-aos="zoom-in" class="introduction col-lg-8 col-xm-10 text-center m-auto">
    <h2 id="scrollingProducts"class="p-2">{{h2}}</h2>
    <h3>{{text}}</h3>   
    <p>Parourez les categories</p>    
   <div class="pb-3">
        <button @click="liveCategoryPrevious"><i class="fas fa-chevron-circle-left"></i></button>            
        <button class="buttonBrown w-50" >{{category[liveCategory].name}}</button>
        <button @click="liveCategoryNext"><i class="fas fa-chevron-circle-right"></i></button>
    </div>
    
    <div class="m-auto containerInput" :class="searchClass" >
    <input  id="searchInput" type="text" v-model="searchProduct" @keyup="search">
    <div><i class="fas fa-search"></i></div>
    </div>
</div>
<div class="justify-content-flex-start flex-wrap categoryContainer productListGrid">
    <div class=" box-shadow ProductImage text-center box" v-for="(product,index) in elements.productList" :key="product.name"
        :id="product.title" :class="product.visible">
        <div class="imgBx">
            <img :src="product.src">
        </div>
        <div class="content">
            <h3>{{product.title}}</h3>
            <p class="contentShow"> {{product.typeOfQuantity}} <br>{{product.priceDetail}} $</p>
            <p class="contentShow"> {{product.msgStock}}
            <i  @click="onSeeProductDetail(product)" class="fas fa-info-circle"></i>
            
            </p>
            
            <p class=" cardColor"> cliquez pour selectionner</p>
              
            <div class="d-flex m-auto buttonShop">
                    <button   @click="onAddCart(product)" class="buttonAdd">+</button>
                    <p v-if="product.keyChange == 0" class="contentShow contentQuantity">
                        article</p>
                    <p v-if="product.keyChange == 1" class="contentShow contentQuantity">{{
                        product.quantityCartProduct}}</p>
                    <button  @click="onSubstractCart(product)" class="buttonAdd">-</button>
            </div>
            
            
        </div>
    </div>    
</div>

</div>


   
    

</div>`,
    methods: {
        //methode pour engager la page du produit détaillé
        onSeeProductDetail(data) {
            console.log("seeproductdetail")
            this.$emit('onseeproductdetail', data)
        },
        search() {
            console.log(this.searchProduct)
            this.$emit("searchproduct", this.searchProduct)
        },
        liveCategoryPrevious() {
            this.$emit("resetproduct")

            this.searchProduct = "";
            console.log(this.elements)
            if (this.liveCategory == 0) {
                this.liveCategory = this.category.length - 1
            } else {
                this.liveCategory--
            }
            console.log(this.liveCategory)
            // if(this.category[this.liveCategory].name =="all") {
            //     this.searchClass ="displayFlex"
            // } else {
            // this.searchClass = "displayNone"
            // }
            this.onSelectedCategory(this.category[this.liveCategory].name)

        },
        liveCategoryNext() {
            this.$emit("resetproduct")
            this.searchProduct = ""
            console.log(this.elements)
            // this.fullElements.forEach(element => {
            //     document.getElementById(element.title).style.display = "block"
            // })
            if (this.liveCategory == this.category.length - 1) {
                this.liveCategory = 0
            } else {
                this.liveCategory++
            }
            console.log(this.liveCategory)

            // if(this.category[this.liveCategory].name =="all") {
            //     this.searchClass ="displayFlex"
            // } else {
            // this.searchClass = "displayNone"
            // }
            this.onSelectedCategory(this.category[this.liveCategory].name)
        },
        //evenment de selection de category vers parent

        onSelectedCategory(category) {
            this.searchProduct = "";
            this.elements.productList.forEach(element => {
                document.getElementById(element.title).style.display = "block"
            })
            console.log(this.category[this.liveCategory].name)
            this.$emit("onselectedcategory", category);
            console.log(category)
        },
        onAddCart(product) {
            //document.getElementById('messageShowAddProduct').style.animation = "showMessage 4s"
            //this.product.keyChange=false;
            this.$emit("onaddcart", product);
            console.log(product)
        },
        onSubstractCart(product) {
            //this.produc.keyChan=false
            this.$emit('onsubstractcart', product)
        },

        nextProduct() {
            this.$emit("liveslidenextproduct")
        },
        previousProduct() {
            this.$emit("liveslidepreviousproduct")

        },

    },
   
})

