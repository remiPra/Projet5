Vue.component('product-shop-new'),{
    template:`
    <form class="col-md-8 text-light" action="index.php?action=administrationCheck" method="POST">



                    <div class="form-group">
                        <label> Pseudo :
                        </label for="name">
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label> Mot de passe :
                        </label for="password">
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <input class="formButton" type="submit" value="Envoyer" name="btnContact">
                    </div>


                </form>
    
    
    
    `
}