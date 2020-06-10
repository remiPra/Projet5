Vue.component('information-user', {
    props:['memory'],
    template: `
    <section id="administrationShop" class="col-sm-10 m-auto text-center">
                <form @submit.prevent="onNextGeolocalisation">
                    <p>Remplissez les différents champs demandées svp?</p>
                    <div class="form-group">
                        <label for="name"> Nom : 
                        </label>
                        <input type="text" v-model="memory[0].nameUser" class="form-control" name="name" id="name" require>
                    </div>
                    <div class="form-group">
                        <label for="surname"> Prenom : {{memory.surname}}
                        </label>
                        <input type="text" v-model="memory[0].surnameuser"class="form-control" name="surname" id="surname" require>
                    </div>
                    <div class="form-group">
                        <label for="address"> Adresse :
                        </label>
                        <textarea name="adress" v-model="memory[0].adress" id="adress" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Email :
                        </label for="email">
                        <input type="email" v-model="memory[0].email "name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label> Telephone :
                        </label for="telephone">
                        <input type="text" v-model="memory[0].phone" name="telephone" id="telephone" required>
                    </div>
                    <div class="form-group">
                        <input class="formButton" type="submit" value="Envoyer" name="btnContact">
                    </div>
                </form>
            </section>
    
    `,
    methods: {
        // on va envoyer si il y a des modifications au composant global
        onNextGeolocalisation() {
            this.$emit('onnextgeolocalisation',this.memory)
        }
    }
})
