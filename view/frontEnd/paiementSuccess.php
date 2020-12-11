<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script>
    <!-- For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics. -->
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>
    <!-- polices -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <!-- integration de la librairie axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <!-- librairie aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- integration de vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- integration de font-awesome -->
    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <link rel="manifest" href="./manifest.json">
    <title>Ma ferme Bio</title>
</head>

<body>
    <div id="app">
        
            <!-- section de l'header comprenant le logo et menu -->
            <header class="d-flex fixed-top justify-content-between">
                <div>
                    <a id="logo" class="pl-4 ">
                        Ma Ferme bio
                    </a>
                   


                </div>
                <nav class="d-flex navbar navbar-light pr-2">
                    <div id="navLargeScreen">
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="nav-items">
                                <a class="nav-link" href="index.php?action=index">Accueil</a>
                            </li>
                            <li class="nav-items">
                                <a class="nav-link" href="index.php?action=contact">Contact</a>
                            </li>
                            <li class="nav-items">
                                <a class="nav-link" href="index.php?action=blog">Actualités</a>
                            </li>
                            <li class="nav-items">
                                <a class="nav-link" <?php if (isset($_SESSION['name'])) {
                                                        echo 'href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i>';
                                                    } else {
                                                        echo 'href="index.php?action=connexion">Connexion';
                                                    }
                                                    ?> </a> 
                            </li> 
                            
                        </ul>
                    </div>
                    <div id="togglecontainer">
                        <button class="navbar-toggler navbar-light toggleMenu" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span class="navbar-toggler-icon text-light"></span>
                        </button>
                        <div id="collapseExample" class="collapse">
                            <div>

                            <a class="nav-link" href="index.php?action=index">Accueil</a>
                                
                            <a class="nav-link" href="index.php?action=contact">Contact</a>

                                <a class="nav-link" href="index.php?action=blog">Actualités</a>

                                <a class="nav-link" <?php if (isset($_SESSION['name'])) {
                                                        echo 'href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i>';
                                                    } else {
                                                        echo 'href="index.php?action=connexion">Connexion';
                                                    }
                                                    ?> </a> 
                            </div>
                        </div>
                    </div>
                    
                </nav>
            </header>
        
        <main>
            <!-- section principale de presentation du shop -->
            <section id="mainPositionAbsolute">
                <picture id="imageParrallax">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.mobile.jpg" media="(max-width: 480px)">
                    <source srcset="assets/images/basket-for-apple-picking-in-fruit-orchard.Ipad.jpg" media="(max-width: 1000px)">
                    <img src="assets/images/basket-for-apple-picking-in-fruit-orchard.jpg" alt="panier en osier se situant sur la gauche dans un champ vert ">
                </picture>
            </section>

            <section>
                <div class="col-md-6 container text-center text-light" id="presentationShopAdministration">
                    <div class="container px-md-3 shopTitle">
                        <h1 class="text-light">Ma ferme Bio</h1>
                        <h2>Paiement accepter </h2>
                        <p>Voici votre commande 
                            n° <?php echo $_GET['value']?>
                        </p>

                    </div>
                </div>
            </section>
            <section class="d-flex justify-content-center">
                <div class="col-lg-8 justify-content-center text center buttonBrown">
                    <p>
                       
                        <?php echo $info[1]['name']?>
                        <?php echo $info[1]['nameUser']?>
                    </p>
                    <p>
                        <?php echo $info[1]['adress']?>
                    </p>
                    <p>
                        <?php echo $info[1]['postalCode']?>
                        <?php echo $info[1]['town']?>
                    </p>
                    <p>
                        date de <?php echo $info[0]['status']?> : <?php echo $info[0]['collectTimeAndDay']?>
                    </p>
                    <p>
                        
                    <p> vous avez reçu un mail avec tous ce recapitulatif </p>
                                                    
                    <table class="table table-bordere">
            <thead>
                <th>Produit</th>
                <th>Q</th>
                <th>Type</th>
                <th>Prix</th>
            </thead>
            <tbody>
                <?php foreach($info[2] as $data) : ?>
                <tr >
                    <td><?php echo $data['productName'] ?></td>
                    <td><?php echo $data['productQuantity']?></td>
                    <td><?php echo $data['typeOfQuantity']?></td>
                    <td><?php echo $data['productQuantity'] * $data['price']?> €
                    </td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td>Prix total</td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo $info[0]['totalPrice'] ?>
                    </td>
                </tr>
            </tbody>
        </table>

                </div>
            </section>

            


        </main>                                      
        <footer>
            <div class="row introduction">
                <div class="col-md-4">
                    <h3 class="text-center ">Contactez-Nous</h3>
                    <div>
                        <div>
                            <div>
                                <i class="fas fa-home"></i>
                            </div>
                            <p>
                                La ferme Bio <br>

                                17 rue Alphonse Daudet <br>
                                82100 OOOOO
                            </p>
                        </div>
                        <i class="fas fa-phone"></i>
                    </div>
                    <p>
                        00000000000
                    </p>
                    <div>
                        <i class="fas fa-phone"></i>
                    </div>
                    <p>
                        xxxxxxxxx@gmail.com
                    </p>

                </div>
                <div class="col-md-4" id="">
                    <h3>Horaires d'ouverture</h3>
                    <div>
                        <ul>
                            <li>Lundi: 9h à 18h </li>
                            <li>Mardi: 9h à 18h</li>
                            <li>Mercredi: 9h à 18h</li>
                            <li>Jeudi: 9h à 18h</li>
                            <li>Vendredi: 9h à 18h</li>
                            <li>Samedi: 9h à 18h</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4" id="">
                    <h3>Réseaux Sociaux</h3>
                    <div>
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        new Vue({
            el:"#app",
            mounted(){

            },
            data:{    
                dat:[]
                }
        })

    </script>
</body>
</html>