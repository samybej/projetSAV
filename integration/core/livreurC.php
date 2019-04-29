<?PHP
require_once (dirname(__FILE__).'/../config.php');

class LivreurC {
function afficherLivreur ($livreur){
		echo "Cin: ".$livreur->getCin()."<br>";
		echo "Nom: ".$livreur->getNom()."<br>";
		echo "Prénom: ".$livreur->getPrenom()."<br>";
		
	}

	
	function ajouterLivreur($livreur){
		$sql="insert into livreur (cin,nom,prenom) values (:cin, :nom,:prenom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $cin=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
   

		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurs(){
		
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivreur($cin){
		$sql="DELETE FROM livreur where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
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


		function updateDispo($cin){
			$sql="UPDATE livreur SET dispo=:dispo WHERE cin=$cin";

			$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	try{		
        $req=$db->prepare($sql);

        $dispo="0";
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
	
	function checkIfDispo(){
		$sql="SELECT cin from livreur where dispo=1 order by RAND() LIMIT 1 ";
		$db = config::getConnexion();

		try {
			$res = $db->query($sql);
			$rows = $res->fetch();
			$count = $res->rowCount();
			if ($count == 0){
				return -1;
			}
			else 
			{
				$cin = $rows['cin'];
				return $cin;
			}
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