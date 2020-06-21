    Vue.component('shop-products-details-mobile', {
        props: ['elements'],
        data() {
            return {

                error: "",
                classButton: "buttonAdd",
            }
        },
        template: `
        <div class="justify-content-flex-start flex-wrap categoryContainer cartSlider">
    <div id="previousProduct">
        <button class="buttonAdd" @click="previousProduct"><i class="fas fa-chevron-circle-left"></i> </button>
    </div>

    <div class="ProductImage text-center box" :class="elements.productList[elements.liveSlideProductItem].visible"
        :id="elements.productList[elements.liveSlideProductItem].title">
        <div class="imgBx">
            <img :src="elements.productList[elements.liveSlideProductItem].src">
        </div>
        <div class="content">
            <h3 >{{elements.productList[elements.liveSlideProductItem].title}}</h3>
            <p  class="contentShow"> {{elements.productList[elements.liveSlideProductItem].typeOfQuantity}}
                <br>{{elements.productList[elements.liveSlideProductItem].priceDetail }} €</p>
            <div class="d-flex m-auto buttonShop">
                <button @click="onAddCart(elements.productList[elements.liveSlideProductItem])"
                    class="buttonAdd">+</button>
                
                    <p v-if="elements.productList[elements.liveSlideProductItem].keyChange == 0" class="contentShow contentQuantity">
                        <i class="fas fa-shopping-basket"></i>
                    </p>
                    <p v-if="elements.productList[elements.liveSlideProductItem].keyChange == 1" class="contentShow contentQuantity">
                        {{elements.productList[elements.liveSlideProductItem].quantityCartProduct}}
                    </p>


                <button @click="onSubstractCart(elements.productList[elements.liveSlideProductItem])"
                    class="buttonAdd">-</button>
            </div>
            <p class="cardColor">Cliquez pour ajouter</p>
            <p class="contentShow">{{elements.productList[elements.liveSlideProductItem].quantityCart}}</p>
            <p class="contentShow">{{elements.productList[elements.liveSlideProductItem].msgStock}}
                <i @click="onSeeProductDetail(elements.productList[elements.liveSlideProductItem])"
                    class="fas fa-info-circle"></i>

            </p>


        </div>
    </div>


    <div id="nextProduct">
        <button class="buttonAdd" @click="nextProduct"><i class="fas fa-chevron-circle-right"></i></button>
    </div>
</div>

        `,
        methods: {
            onSeeProductDetail(data) {
                console.log("seeproductdetail")
                this.$emit('onseeproductdetail', data)
            },
            onSubstractCart(product) {
                this.$emit('onsubstractcart', product)
            },

            nextProduct() {
                this.$emit("liveslidenextproduct")
            },
            previousProduct() {
                this.$emit("liveslidepreviousproduct")

            },
            onAddCart(product) {
                //document.getElementById('messageShowAddProduct').style.animation = "showMessage 4s"
                this.$emit("onaddcart", product);
                console.log(product)
            },
            onSubstractCart(product) {
                this.$emit('onsubstractcart', product)
            },
        }
    })

