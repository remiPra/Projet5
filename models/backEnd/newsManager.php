<?php
class newsManager{
    public function sendNewNewsModel(){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        
        $statusNews = htmlspecialchars(($_POST['statusNews']));
        
        

        $title=str_replace("'","\'",$title);
        $description=str_replace("'","\'",$description);
       
        
        $date = date("l j F Y");   
        
        
        global $bdd;
        $req = $bdd->prepare('INSERT INTO news (title,description,date,statusNews) VALUES(?,?,?,?)');
            $req->execute(array($title, $description,$date,$statusNews))or die(print_r($req->errorInfo(), TRUE));
    }

    public function getAllNews(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM news');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
}