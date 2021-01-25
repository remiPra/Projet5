Vue.component('cart-product', {
    template:
        `
<div id="cartContainerModal">     
<div>
   
        <h3 class="text-light">Votre Commande  </h3>
    
</div>
<form  action="index.php?action=cart" id="cart" class="col-md-8 text-light"  method="POST">
    <div>
        <div class="form-group">
            <h3 v-if="cartkeyweek==false">Votre Panier </h3>
            <h3 v-if="cartkeyweek==true">Voici le panier préparé que vous pouvez commander : </h3>
        </div>
    </div>
    
    <template v-if='this.carts==""'>
    <div class="d-flex" >
        <div id="formCart" class="form-group">
        Vous n'avez pas d'articles dans votre panier
        </div>
    </div>    
    </template>
<div id="containerCart">

<div class="form-group" v-for="(cart,index) in carts">
    <div class="align-items-center" >
        <div class="form-group">
            <label for="productName">
            <input type="text" :value="cart.title"  name="productName[]" class="productName">
            </label>
        </div>
        <div id="formCart" class="form-group">

            <label for="productQuantity">
            <button v-if="cartkeyweek==false" type="button" @click="onAddCart(cart),totalPrice()">+</button>
            <span class="productQuantity">{{cart.quantity}}</span>
            <input type="text" :value="cart.quantity" name="productQuantity[]" class="displayNone">
            <button v-if="cartkeyweek==false" type="button" @click="onSubstractQuantity(cart),totalPrice()">-</button>
            </label>
   
            <label for="priceProduct"> 
            Prix: {{cart.totalPriceProduct}} €
            </label>
            <input  class="displayNone" type="text" :value="cart.totalPriceProduct"  name="totalPriceProduct[]">
            
            <div class="horizontalLine"></div> 
   
        </div>
    </div>
</div>   
<div class="form-group">
    <label for="totalPrice"> <h4>Prix Total :</h4> 
    {{totalPriceCart}} €
    </label>
    <input  class="displayNone" type="text" :value="totalPriceCart"  name="totalPrice" id="totalPrice">
</div>     

</div>



<div class="form-group">
    <template v-if='totalPriceCart > 0'>
        <input class="formButton" @click="confirmationShow" type="button" value="Passez la commande" name="btnContact">
    </template>
</div>
<div id="confirmationModal" v-if="confirmationModal">
    <div class="form-group">
        <h3>Voulez vous confirmez votre choix?</h3>
        <button @click="localStorage.clear()" type="submit">Oui</button>  
        <button @click="confirmationModal=false">Non</button>  
    </div>
</div>
</form>
</div>
`,
    props: ['carts','cartkeyweek'],
    mounted(){
        this.totalPrice();
    },
    data() {
        return {
            confirmationModal: false,
            name: name,
            totalPriceCart:"",
        }
    },
    created(){
        window.addEventListener('scroll', this.handleScroll);
    },
    filters: {
        currency(valeur, pays, devise) {
            return valeur.toLocaleString(pays, {
                style: 'currency',
                currency: devise
            });
        }
    },
    methods: {
        onAddCart(cart) {
            console.log(cart);
            this.$emit('onaddcart', cart)
        },
        onSubstractQuantity(cart) {
            this.$emit('onsubstractcart', cart)
        },
        confirmationShow() {
            this.confirmationModal = true;
            console.log(this.confirmationModal);
            this.$emit("onscrollconfirmcart")
            //window.scrollTo({top:2780,behavior:'smooth'})
        },
        totalPrice(){
            let result=0
            console.log(this.carts);
                    this.carts.forEach(somme => {
                        result = parseInt(result) + parseInt(somme.totalPriceProduct)
                    })
                    this.totalPriceCart = result;
        }

    },
    
        
    
})



