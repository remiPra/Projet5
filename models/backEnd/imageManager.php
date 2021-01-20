<?php

class imageManager
{
	// fonction pour uploader l'image 
	public function uploadImage()
	{
        
		if (isset($_FILES['avatar'])) {

			
			// mise ne place du dossie et et du nom
			$dossier = './assets/images/fruitsEtLegumes/';
			$fichier = basename($_FILES['avatar']['name']);
            
			$taille_max = 1200000;
			$taille = filesize($_FILES['avatar']['tmp_name']);
			var_dump($taille);

			$extensions = array('png', 'gif', 'jpg', 'jpeg');
			$extension_fichier = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			if($taille == 0){
				return 'il n y a pas eu d\'upload de nouvelles images'; 
                
            }
			else if ($taille > $taille_max) {
                return 'Le fichier est trop gros...';
                
			}
			else if (!in_array($extension_fichier, $extensions)) {
				return "Vous devez transférer un fichier de type PNG, GIF, JPG ou JPEG";
                
			}
			else 
			{
				//On formate le nom du fichier ici...
				// $fichier = strtr(
				// 	$fichier,
				// 	'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
				// 	'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
				// );
				// $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			
                    
				$envoie = move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier);
				
                
				if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
                    return 'l\'image a bien été envoyé';
                   
				} 
				else //Sinon (la fonction renvoie FALSE).
				{
					return 'une erreur est survenu mais le fichier a été envoyé, veuillez verifier si l\'image a bien été uploader';
                    
                }
			
			} 
		}
		else {
			return 'erreur de fichier';
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
