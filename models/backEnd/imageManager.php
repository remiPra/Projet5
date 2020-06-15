<?php

class imageManager
{
	// fonction pour uploader l'image 
	public function uploadImage()
	{
        var_dump("imageUpload");
		if (isset($_FILES['avatar'])) {

			//print_r($_FILES['avatar']);
			// mise ne place du dossie et et du nom
			$dossier = './assets/images/fruitsEtLegumes/';
			$fichier = basename($_FILES['avatar']['name']);
            var_dump($fichier);
			$taille_max = 10000000;
			$taille = filesize($_FILES['avatar']['tmp_name']);

			$extensions = array('png', 'gif', 'jpg', 'jpeg');
			$extension_fichier = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            var_dump('on va entré dans l upload');
			global $Error;
			if($taille == 0){
				return $Error = 'il n y a pas eu d\'upload de nouvelles images'; 
                var_dump("pas de taille");
            }
			else if ($taille > $taille_max) {
                return $Error = 'Le fichier est trop gros...';
                var_dump('fichier trop gros');
			}
			else if (!in_array($extension_fichier, $extensions)) {
				return $Error = "Vous devez transférer un fichier de type PNG, GIF, JPG ou JPEG";
                var_dump("pas la bonne extension");
			}
			else 
			{
				//On formate le nom du fichier ici...
				$fichier = strtr(
					$fichier,
					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
				);
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
				var_dump('on est juste avant l envoie');
                //on fait un essai
                var_dump($_FILES['avatar']['tmp_name']);
                echo "<br>";
                echo "<br>";
                echo "<br>";
                var_dump($dossier);
                echo "<br>";
                echo "<br>";
                var_dump($fichier);
                echo "<br>";
                echo "<br>";
                    
				$envoie = move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier);
				var_dump($envoie);
				if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
                    return 'l\'image a bien été envoyé';
                    var_dump("envoyé");
				} 
				else //Sinon (la fonction renvoie FALSE).
				{
					return 'un erreur est survenu mais le fichier a été envoyé, veuillez verifier si l\'image a bien été uploader';
                    var_dump('un erreur est survenu mais le fichier a été envoyé'); 
                }
			
			} 
		}
		else {
			return $Error = 'erreur de fichier';
            var_dump($Error);
		};
	}

	// fonction pour supprimer l'image uploader
	public function deleteImageSrc($id)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT imageChapter FROM Chapters  WHERE id = ?');
		$req->execute(array($id));
		$data = $req->fetch();

		$repertoire = 'images/' . $data[0] . '';

		unlink($repertoire);
	}
}
