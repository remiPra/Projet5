<?php
class ArticlesManager{
    public function sendNewArticleModel(){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $content = $_POST['content'];
        $statusArticles = htmlspecialchars(($_POST['statusArticles']));
        
        $data = basename($_FILES['avatar']['name']);
        $src = "./assets/images/fruitsEtLegumes/".$data;
        
        $date = date("l j F Y");   
        
        
        global $bdd;
        $req = $bdd->prepare('INSERT INTO articles (title,description,content,date,src,statusArticles) VALUES(?,?,?,?,?,?)');
            $req->execute(array($title, $description,$content,$date,$src,$statusArticles))or die(print_r($req->errorInfo(), TRUE));
    }



    // recuperer tous les articles
    public function getAllArticles(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM articles');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    //supprimer un article 
    public function deleteArticle($id){
        global $bdd;
        $req = $bdd->prepare('DELETE FROM articles WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
    //modifié un article 
    public function updateCommand($id){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $content = $_POST['content'];
        $statusArticles = htmlspecialchars(($_POST['statusArticles']));
        
        $data = basename($_FILES['avatar']['name']);
        if($data != null){
            $GLOBALS['src'] = "./assets/images/fruitsEtLegumes/".$data;
        } else {
            $GLOBALS['src'] = $_POST['src'];
        }
        
        $src= $GLOBALS['src'];
        //var_dump("on y est dans articlesmanager update");
        $date = date("l j F Y");       
      

        global $bdd;
        $req = $bdd->prepare('UPDATE articles 
        SET 
        title = :title,
        description = :description,
        content = :content,
        statusArticles = :statusArticles,
        src = :src
        WHERE id = :id');
        $req->execute(array(
            "title" => $title,
            "description" => $description,
            "content" => $content,
            "statusArticles" => $statusArticles,
            "src" => $src,
            "id" => $id
        )) or die(print_r($req->errorInfo(), TRUE))  ;        
    }
}