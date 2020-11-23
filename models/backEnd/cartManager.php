<?php
class CartManagerBack
{
    public function changeTime($numberCommand)
    {
     
        // $numberCommand = htmlspecialchars($_POST['numberCommand']);
        $status = htmlspecialchars($_POST['status']);
        $collectTime = htmlspecialchars($_POST['collectTime']);
        $collectTimeAndDay = htmlspecialchars($_POST['collectTimeAndDay']);
        $deliveryDay = htmlspecialchars($_POST['deliveryDay']);

        // creation de la date
        //$str = "Jeudi 11 Juin 2020";
        $f = explode(" ", $deliveryDay);

        $day = $f[1];
        $mois = array("data", "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
        $month = array_search($f[2], $mois);
        $year = $f[3];

        //$str = "18 : 00";
        $g = explode(" ", $collectTime);

        //si ce status="livraison" on met automatiquement midi
        if($status==="livraison"){
            $hour = 12;
            $minutes = 00;
            $secondes = 00;
        }
        else {
            $hour = $g[0];
        $minutes = $g[2];
        $secondes = 00;

        }
        
        $d = mktime($hour, $minutes, $secondes, $month, $day, $year);
     
        $dateDeliveryOrder = date("Y-m-d H:i:s", $d);
       


        global $bdd;
        $req = $bdd->prepare('UPDATE command SET status = :status,
        collectTime = :collectTime,
        collectTimeAndDay = :collectTimeAndDay,
        deliveryDay = :deliveryDay,
        dateDeliveryOrder = :dateDeliveryOrder
        WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'status' => $status,
            'collectTime' => $collectTime,
            'collectTimeAndDay' => $collectTimeAndDay,
            'deliveryDay' => $deliveryDay,
            'numberCommand' => $numberCommand,
            'dateDeliveryOrder'=> $dateDeliveryOrder
        ));
    }

    public function numberCommandPaiement($numberCommand){
        var_dump('numberCommandPaiement');
        var_dump($numberCommand);
        global $bdd;
        $req = $bdd->prepare('UPDATE command SET statusCommand = :statusCommand WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'statusCommand'=>200,
            'numberCommand'=>$numberCommand
        ));
        



    }

    public function findUserWithCommandNumberCommand($id){
        global $bdd;
        $req = $bdd->prepare('SELECT name ,status,collectTimeAndDay,totalPrice,dateDeliveryOrder FROM command WHERE numberCommand=?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data;
    }

    public function findCommandWithUserName($id){
        global $bdd;
        $req = $bdd->prepare('SELECT numberCommand ,statusCommand,status,collectTimeAndDay,totalPrice FROM command WHERE name=?');
        $req->execute(array($id));
        $data = $req->fetchAll();
        return $data;
    }

    public function getAllCommands(){
        global $bdd;
        $req = $bdd->prepare('SELECT command.dateDeliveryOrder,command.* ,user.* 
        FROM command 
        INNER JOIN user ON user.name = command.name
        ORDER BY command.dateDeliveryOrder
        ');
        $req->execute(array());
        $data = $req->fetchAll();
        return $data;
    }
    
    public function getAllRetraitCommands(){
        global $bdd;
        $req = $bdd->prepare('SELECT deliveryDay,collectTime 
        FROM command
        WHERE status = :status
        ');
        $req->execute(array(
            'status'=>'retrait'
        ));
        $data = $req->fetchAll();
        return $data;


    }

    public function updateStatusCollectReady($data){
        var_dump("function");
        global $bdd;
        $req = $bdd->prepare('UPDATE command SET status = :status
        WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'status' => "retraitPret",
            'numberCommand' => $data 
        ));        
    }
    public function updateStatusLivraisonReady($data){
        var_dump("function");
        global $bdd;
        $req = $bdd->prepare('UPDATE command SET status = :status
        WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'status' => "livraisonPrete",
            'numberCommand' => $data 
        ));        
    }

    public function updateStatusCheckCommand($data){
        var_dump("function");
        global $bdd;
        $req = $bdd->prepare('UPDATE command SET statusCommand = :statusCommand, status = :status
        WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'statusCommand' => 400,
            'status' => 'executer',
            'numberCommand' => $data 
        ));
    }

    public function updateStatusProblemCommand($data){
        var_dump("function");
        global $bdd;
        $req = $bdd->prepare('UPDATE command SET statusCommand = :statusCommand
        WHERE numberCommand =:numberCommand');
        $req->execute(array(
            'statusCommand' => 500,
            'numberCommand' => $data 
        ));
    }

}
