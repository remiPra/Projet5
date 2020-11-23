
   <?php
    $host_name = 'localhost';
    $database = 'projet5';
    $user_name = 'root';
    $password = '';
    
    try {
        global $bdd;
        $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
      
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
      
        echo " ca marche pas";
    }
    // require 'models/frontEnd/productsManager.php';
    // $productsClass = new ProductsManager();
    // $products = $productsClass->getAllProducts();
    
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM products');
    $req->execute();
    $data = $req->fetchAll();
    $result = $data;
    echo json_encode($result);

    
    
    
    //echo json_encode($result[1]['title']);
    
   


    ?>
/////////////////////////////////////////////////////////////////////////////                
                // this.productsSelected.productList = [
                //     {
                //         title: "abricot",
                //         src: "./assets/images/fruitsEtLegumes/abricotFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         // booleen
                //         //utton: 1,
                //         //ityButton: 0,
                //         visible: "displayFlex",
                //         category: "fruits"
                //     },
                //     {
                //         title: "prune",
                //         src: "./assets/images/fruitsEtLegumes/pruneFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "fruits"
                //     },
                //     {
                //         title: "melon",
                //         src: "./assets/images/fruitsEtLegumes/melonFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "fruits"

                //     },
                //     {
                //         title: "cerise",
                //         src: "./assets/images/fruitsEtLegumes/ceriseFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg/Kilogramme",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "fruits"

                //     },
                //     {
                //         title: "haricots",
                //         src: "./assets/images/fruitsEtLegumes/haricotsFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "legumes"
                //     },
                //     {
                //         title: "framboise",
                //         src: "./assets/images/fruitsEtLegumes/framboiseFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 300g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "fruits"

                //     },
                //     {
                //         title: "aubergine",
                //         src: "./assets/images/fruitsEtLegumes/aubergineFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "legumes"
                //     },
                //     {
                //         title: "peche",
                //         src: "./assets/images/fruitsEtLegumes/pecheFormat.png",
                //         quantity: 1,
                //         quantityCartProduct: 0,
                //         typeOfQuantity: "barquette de 600g",
                //         priceDetail: "13.92kg",
                //         price: 32,
                //         totalPriceProduct: 32,
                //         visible: "displayFlex",
                //         //utton: 1,
                //         //ityButton: 0,
                //         category: "fruits"
                //     }

                // ];
                // this.products = this.productsSelected;
                // this.memory = this.productsSelected;
                ///////////////////////////////////////////////////////////////////
                //Appel Axios


                
