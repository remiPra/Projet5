
    Vue.component('paiement-component', {
        props: ['typeofpaiement'],
        template: ` <section class="col-sm-10 m-auto text-center">
                    <div   class="paypalContainer accordion">
                        <h3  :id="typeofpaiement[0].name" class="buttonBrown" @click="showEffect(0)">{{typeofpaiement[0].name}}</h3>
                        <div>
                            <form class="form-horizontal span6"  :class="typeofpaiement[0].effect">
                                <fieldset>
                                    <legend>Payment</legend>

                                    <div class="control-group">
                                        <label class="control-label">Card Holder's Name</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" pattern="\w+ \w+.*"
                                                title="Fill your first and last name" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Number</label>
                                        <div class="controls">
                                            <div class="row-fluid d-flex">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="First four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Second four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Third four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Fourth four digits"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Expiry Date</label>
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
                                        <label class="control-label">Card CVV</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="3" pattern="\d{3}"
                                                        title="Three digits at back of your card" required>
                                                </div>
                                                <div class="span8">
                                                    <!-- screenshot may be here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>

                    <div class="creditCardContainer accordion " :id="typeofpaiement[1].name">
                        <h3 class="buttonBrown" @click="showEffect(1)">{{typeofpaiement[1].name}}</h3>


                        <div>
                            <form class="form-horizontal span6" :class="typeofpaiement[1].effect">
                                <fieldset>
                                    <legend>Payment</legend>

                                    <div class="control-group">
                                        <label class="control-label">Card Holder's Name</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" pattern="\w+ \w+.*"
                                                title="Fill your first and last name" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Card Number</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="First four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Second four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Third four digits"
                                                        required>
                                                </div>
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="4" pattern="\d{4}" title="Fourth four digits"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="p-2 control-label">Card Expiry Date</label>
                                        <div class="controls">
                                            <div class="d-flex row-fluid">
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
                                        <label class="control-label">Card CVV</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <input type="text" class="input-block-level" autocomplete="off"
                                                        maxlength="3" pattern="\d{3}"
                                                        title="Three digits at back of your card" required>
                                                </div>
                                                <div class="span8">
                                                    <!-- screenshot may be here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </section>`,      
        methods: {
           
            
            //routage des différentes étapes de reservations 
            showEffect(i) {

                for (let index = 0; index < this.typeofpaiement.length; index++) {

                    if (index == i && this.typeofpaiement[index].effect != "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowOpen";
                        let focus = document.getElementById(this.typeofpaiement[index].name);
                        console.log(this.typeofpaiement[index].name)
                        let positionHeader = document.getElementById("Paypal")
                        console.log(positionHeader)


                        setTimeout(() => {
                            this.$emit('onscrolling', this.typeofpaiement[index].name)
                        }, 200)



                        console.log("default" + index)
                    } else if (index == i && this.typeofpaiement[index].effect == "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowClose"
                        setTimeout(() => {
                            this.typeofpaiement[index].effect = "displayNone"
                        }, 300)
                        console.log("success" + index)
                    } else if (index != i && this.typeofpaiement[index].effect == "accordeonShowOpen") {
                        this.typeofpaiement[index].effect = "accordeonShowClose"
                        console.log("default" + index)
                    } else if (index != i) {
                        this.typeofpaiement[index].effect = "displayNone"
                        console.log("none" + index)
                    }
                }

            },
            destroyed() {
               //window.removeEventListener('scroll', this.handleDebouncedScroll);
            }
        }
    })


