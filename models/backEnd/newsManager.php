<?php
class newsManager{
    public function sendNewNewsModel(){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $statusNews = htmlspecialchars(($_POST['statusNews']));
                
        $date = date("l j F Y");   
    
        global $bdd;
        $req = $bdd->prepare('INSERT INTO news (title,description,date,statusNews) VALUES(?,?,?,?)');
            $req->execute(array($title, $description,$date,$statusNews))or die(print_r($req->errorInfo(), TRUE));
    }

    public function updateNewsModel(){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $id= $_POST['id'];        
        $statusNews = htmlspecialchars(($_POST['statusNews']));
                
        $date = date("l j F Y");   
    
        global $bdd;
        $req = $bdd->prepare('UPDATE news 
        SET 
        title = :title,
        description = :description,
        date = :date,
        statusNews = :statusNews
        WHERE id = :id');
        $req->execute(array(
            "title" => $title,
            "description" => $description,
             "date"=> $date,
            "statusNews" => $statusNews,
            "id" => $id
        )) or die(print_r($req->errorInfo(), TRUE))  ;        
    }



    public function getAllNews(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM news ORDER BY id DESC');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
    //fonction reprenant le nombre de news
    public function countNews()
    {
        global $bdd;
       $req = $bdd->prepare('SELECT COUNT(*) FROM news');
       $req->execute();
       $data = $req->fetchAll();
       return $data; 
    }

     //supprimer une news 
     public function deleteNewsModel($id){
        global $bdd;
        $req = $bdd->prepare('DELETE FROM news WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
}