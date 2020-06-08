<?php
class ConnectManager
{

    public function connect()
    {
        //  $host_name = 'db5000508567.hosting-data.io';
        // $database = 'dbs488109';
        // $user_name = 'dbu628629';
        // $password = 'Tfctfc3131@';
        
        $host_name = 'localhost';
        $database = 'projet5';
        $user_name = 'root';
        $password = '';



        $bdd= "";
        try {
            global $bdd;
            $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
           
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
          
            echo " ca marche pas";
        }
    }
}
