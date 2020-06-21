Vue.component('command-order', {
    props:['user'],
    data() {
        return {
            cartList: {
                head: ["Produit", "", "Description", "Prix"]
            }
        }
    },
    template: `
<div>
    
    <div class="col-md-8 text-light buttonBrown m-auto cartConfirm">
        <h3 class="text-center pb-2">Recapitulatif de la commande </h3>
        <p>{{user[0][0].nameUser}} {{user[0][0].name}}</p>
        <p>{{user[0][0].adress}}</p>
        <p>{{user[0][0].postalCode}} {{user[0][0].town}}</p>
        <p>Numéro de commande : {{user[0][1].numberCommand}}</p>
        <p>type de commande :{{user[1].status}}</p>   
        <p>Date de {{user[1].status}} de la commande : {{user[1].collectTimeAndDay}}</p>   
        <p>{{user[1].deliveryDay}}</p>
        <p>{{user[1].collectTime}}</p>
        <p></p>
        <p></p>
       
       
        <table class="table table-bordere">
            <thead>
                <th v-for="(list,index) in cartList.head" :id="list">{{list}}</th>
            </thead>
            <tbody>
                <tr v-for="(data,index) in user[0][2]" :id="data">
                    <td>{{data.productName}}</td>
                    <td>{{data.productQuantity}}</td>
                    <td>{{data.typeOfQuantity}}</td>
                    <td>{{data.productQuantity * data.price}} €
                    </td>
                </tr>
                <tr>
                    <td>Prix total</td>
                    <td></td>
                    <td></td>
                    <td>
                        {{user[0][1].totalPrice}} €
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="onNextPaiement">Valider la commande</button>
    </div>
</div>    
    `,
    methods: {
        scrolling(element) {
            const id = element;
            const yOffset = -100; 
            const elements = document.getElementById(id);
            const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
            
            window.scrollTo({top: y, behavior: 'smooth'});
            
        },
        onNextPaiement() {
            this.$emit('onnextpaiement')
        }
    }
})
