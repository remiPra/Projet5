
    Vue.component('paiement-component', {
        props: ['propspaiement'],
        template: ` <section class="col-sm-10 m-auto text-center">
                    <div   class="paypalContainer accordion">
                        <h3  :id="propspaiement[1][0].name" class="buttonBrown" @click="showEffect(0)">{{propspaiement[1][0].name}}</h3>
                        <div>
                        <form action="index.php?action=paiement" method="POST" 
                        class="form-horizontal span6"  :class="propspaiement[1][0].effect">
                        <fieldset>
                            <legend>Paiement</legend>

                            <div class="control-group">
                                <label class="control-label">Nom du titulaire de la carte</label>
                                <div class="controls">
                                    <input value="DUPONT JEAN" type="text" class="input-block-level" 
                                        title="tapez votre nom et prenom">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Numero de Carte Bancaire</label>
                                <div class="controls">
                                    <div class="row-fluid d-flex">
                                        <div class="span3">
                                            <input value="1234" type="text" class="input-block-level" autocomplete="off"
                                                 title="First four digits"
                                                >
                                        </div>
                                        <div class="span3">
                                            <input value="1234" type="text" class="input-block-level" autocomplete="off"
                                                 title="Second four digits"
                                                >
                                        </div>
                                        <div class="span3">
                                            <input value="1234" type="text" class="input-block-level" autocomplete="off"
                                                 title="Third four digits"
                                                >
                                        </div>
                                        <div class="span3">
                                            <input type="text" value="1234" class="input-block-level" autocomplete="off"
                                                 title="Fourth four digits"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Expiration de la carte Bancaire</label>
                                <div class="controls">
                                    <div class="row-fluid">
                                        <div class="span9">
                                            <select class="input-block-level">
                                                <option>January</option>
                                                <option>...</option>
                                                <option>December</option>
                                            </select>
                                        </div>
                                        <div class="span3">
                                            <select class="input-block-level">
                                                <option>2013</option>
                                                <option>...</option>
                                                <option>2015</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">numero CVV</label>
                                <div class="controls">
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <input type="text" class="input-block-level" autocomplete="off"
                                                    value="333"                                               
                                                title="Three digits at back of your card" >
                                        </div>
                                        <div class="span8">
                                            <!-- screenshot may be here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="input-block-level" hidden
                                        name="numberCommand" :value="propspaiement[0].numberCommand" required >
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Payer</button>
                                <button type="button" class="btn">Annuler</button>
                            </div>
                        </fieldset>
                    </form>   

                        </div>
                    </div>

                    <div class="creditCardContainer accordion " :id="propspaiement[1][1].name">
                        <h3 class="buttonBrown" @click="showEffect(1)">{{propspaiement[1][1].name}}</h3>
                        <form action="index.php?action=paiement" method="POST" 
                        class="form-horizontal span6"  :class="propspaiement[1][1].effect">
                        <fieldset>
                            <legend>Paiement</legend>

                            <div class="control-group">
                                <label class="control-label">Entrez votre adresse mail : </label>
                                <div class="controls">
                                    <input type="mail" class="input-block-level" value="remipradere@gmail.com" disabled 
                                        title="tapez votre email" required>
                                        <input hidden type="text" class="input-block-level" 
                                        name="numberCommand" :value="propspaiement[0].numberCommand" required >        
                                </div>        
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Payer</button>
                                <button type="button" class="btn">Annuler</button>
                            </div>
                        </fieldset>
                        </form>    

                        
                    </div>
                </section>`,      
        methods: {
           
            
            //routage des différentes étapes de reservations 
            showEffect(i) {

                for (let index = 0; index < this.propspaiement[1].length; index++) {

                    if (index == i && this.propspaiement[1][index].effect != "accordeonShowOpen") {
                        this.propspaiement[1][index].effect = "accordeonShowOpen";
                        let focus = document.getElementById(this.propspaiement[1][index].name);
                        console.log(this.propspaiement[1][index].name)
                        let positionHeader = document.getElementById("Paypal")
                        console.log(positionHeader)


                        setTimeout(() => {
                            this.$emit('onscrolling', this.propspaiement[1][index].name)
                        }, 200)



                        console.log("default" + index)
                    } else if (index == i && this.propspaiement[1][index].effect == "accordeonShowOpen") {
                        this.propspaiement[1][index].effect = "accordeonShowClose"
                        setTimeout(() => {
                            this.propspaiement[1][index].effect = "displayNone"
                        }, 300)
                        console.log("success" + index)
                    } else if (index != i && this.propspaiement[1][index].effect == "accordeonShowOpen") {
                        this.propspaiement[1][index].effect = "accordeonShowClose"
                        console.log("default" + index)
                    } else if (index != i) {
                        this.propspaiement[1][index].effect = "displayNone"
                        console.log("none" + index)
                    }
                }

            },
            destroyed() {
               //window.removeEventListener('scroll', this.handleDebouncedScroll);
            }
        }
    })


