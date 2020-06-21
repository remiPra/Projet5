<?php
class ArticlesManager{
    public function sendNewArticleModel(){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $content = htmlspecialchars($_POST['content']);
        $statusArticles = htmlspecialchars(($_POST['statusArticles']));
        
        $data = basename($_FILES['avatar']['name']);
        $src = "./assets/images/fruitsEtLegumes/".$data;
        

        $title=str_replace("'","\'",$title);
        $description=str_replace("'","\'",$description);
        $content=str_replace("'","\'",$content);
        
        $date = date("l j F Y");   
        
        
        global $bdd;
        $req = $bdd->prepare('INSERT INTO articles (title,description,content,date,src,statusArticles) VALUES(?,?,?,?,?,?)');
            $req->execute(array($title, $description,$content,$date,$src,$statusArticles))or die(print_r($req->errorInfo(), TRUE));
    }

    public function getAllArticles(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM articles');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
}