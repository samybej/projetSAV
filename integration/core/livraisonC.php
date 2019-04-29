<?PHP
//include "config.php";

class LivraisonC {
	
	function ajouterLivraison($livraison,$num_c,$id_client){
		$sql="insert into livraison (num_c,cin,address1,address2,ville,zip,id_client) values (:num_c, :cin, :address1, :address2, :ville, :zip, :id_client)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$num_c=$livraison->getNum_c();
        $cin=$livraison->getCin();
        $address1=$livraison->getAddress1();
        $address2=$livraison->getAddress2();
        $ville=$livraison->getVille();
        $zip=$livraison->getZip();
   
        $req->bindValue(':num_c',$num_c);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':address1',$address1);
		$req->bindValue(':address2',$address2);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':zip',$zip);
		$req->bindValue(':id_client',$id_client);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivraisons($id_client){
		
		$sql="SElECT * From livraison where id_client=$id_client";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivraison($id_client,$num_c){
		$sql="DELETE FROM livraison where id_client=:id_client AND num_c=:num_c";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
       

		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':num_c',$num_c);
		 var_dump($req);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	
	function modifierLivreur($livreur,$cin){
		$sql="UPDATE livreur SET cin=:cin_new, nom=:nom,prenom=:prenom,dispo=:dispo WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

		$cin_new=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $dispo=$livreur->getDispo();

		$req->bindValue(':cin_new',$cin_new);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':dispo',$dispo);
		
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
		
	}
	
	function recupererLivreur($cin){
		$sql="SELECT * from livreur where cin=$cin";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercheDynamique($cin){
		 $sql = "SELECT * FROM livreur WHERE cin LIKE '$cin%'";
		 $db = config::getConnexion();
		 try {
   		$res = $db->query($sql);
   		return $res;
   		}
   		catch (Exception $e){
   			die('Erreur :'.$e->getMessage());
   		}

	}
	
	function rechercheDynamiqueParNom($nom){
		 $sql = "SELECT * FROM livreur WHERE nom LIKE '$nom%' OR prenom LIKE '$nom%' LIMIT 5";
		 $db = config::getConnexion();
		 try {
   		$res = $db->query($sql);
   		return $res;
   		}
   		catch (Exception $e){
   			die('Erreur :'.$e->getMessage());
   		}

	}
	

	
	function rechercheDynamiqueParDispo($dispo){
		 $sql = "SELECT * FROM livreur WHERE dispo LIKE '$dispo%' LIMIT 5";
		 $db = config::getConnexion();
		 try {
   		$res = $db->query($sql);
   		return $res;
   		}
   		catch (Exception $e){
   			die('Erreur :'.$e->getMessage());
   		}

	}

	function trier($select){
		$sql="SELECT * FROM livreur ORDER BY $select ASC ";

		$db = config::getConnexion();

		try {
			$res = $db->query($sql);
			return $res;
		}
		catch (Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}


		function updateDispo($cin,$dispo){
			$sql="UPDATE livreur SET dispo=:dispo WHERE cin=$cin";

			$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	try{		
        $req=$db->prepare($sql);
        //var_dump($dispo);
		$req->bindValue(':dispo',$dispo);
			
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

	}
		function dispo_Livreur($cin){
		$sql="SELECT date_livraison from livraison where cin=$cin";

		$db=config::getConnexion();
		try {
			$res=$db->query($sql);
			$week = date('Y/m/d' , strtotime('+ 7 days'));
			$nbr_livraisons=0;
			foreach($res as $row){
				if ($row < $week){
					$nbr_livraisons++;
				}
			}
			if ($nbr_livraisons <= 5){
				return true;
			}
			else {
				$livreurC = new LivreurC();
				$update = $livreurC->updateDispo($cin);
			}
			return false;
		}
		catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function getInfoLivreur($cin){
		$sql="SELECT nom,prenom from livreur where cin=$cin LIMIT 1";
		$db = config::getConnexion();

		try {
			$res = $db->query($sql);
			$arr = array();
			$rows = $res->fetch(PDO::FETCH_ASSOC);

			$arr = $rows;

			$nom = implode(" ", $arr);
			//var_dump($nom);
			return $nom;
		}
		catch (Exception $e){
			die('Erreur : '.$e->getMessage());
		}

	}
	
	function AutoMSGifDispo($dispo,$id_client){
		
			$sql= "INSERT INTO MESSAGES(id_client,message,admin,livraison) values(:id_client , :message , :admin , :livraison)";
			$db = config::getConnexion();

		try{

        $req=$db->prepare($sql);
        if ($dispo == NULL){
		$message = 'Votre livraison a été mise dans la liste d attente . Un livreur vous contactera le plutot possible .';
   		$admin = '2';
   		$livraison = '0';
        $req->bindValue(':id_client',$id_client);
		$req->bindValue(':message',$message);
		$req->bindValue(':admin',$admin);
		$req->bindValue(':livraison',$livraison);
		}
		else {
			//$nom = LivraisonC:: getInfoLivreur($cin);
		$message = 'Ceci est un message automatique .Votre livraison arrivera dans environ 48heures. Merci de cliquer sur Reçue lors de la reception de votre commande. Si vous avez un probleme cliquez sur Reclamer';
   		$admin = '2';
   		$livraison = '1';
        $req->bindValue(':id_client',$id_client);
		$req->bindValue(':message',$message);
		$req->bindValue(':admin',$admin);
		$req->bindValue(':livraison',$livraison);
		}
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function recupMSGLivraison($id_client,$livraison){
		$sql="SELECT message FROM messages where id_client=$id_client AND livraison=$livraison AND num_r IS NULL";

		$db = config::getConnexion();

		try {
			$res = $db->query($sql);
			$arr = array();
			$rows = $res->fetch(PDO::FETCH_ASSOC);

			$message = $rows['message'];

			//$message = implode("|",$arr);
			//var_dump($message);
			return $message;
		}
		catch (Exception $e){
			die('Erreur : '.$e->getMessage());
		}

	}

	/*function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}


?>