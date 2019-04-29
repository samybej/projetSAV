<?PHP
include "../config.php";

class EventC {
function afficherEvent ($event){
		echo "Id: ".$event->getId()."<br>";
		echo "Nom: ".$event->getNom()."<br>";
		echo "La date de l'event JJ/MM/AAAA :".$event->getDate()."<br>";
		echo "Duree: ".$event->getDuree()."<br>";
		
	}
	
	function ajouterEvent($event){
		$sql="insert into event (id,nom,dateE,duree) values (:id,:nom,:dateE,:duree)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

       
		
        $id=$event->getId();
       # $s_id=(string)$id;
        $nom=$event->getNom();
        $dateE=$event->getDate();
        $duree=$event->getDuree();
        
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dateE',$dateE);
		$req->bindValue(':duree',$duree);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherEvents(){
	
		$sql="SELECT * From event";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEvent($id){
		$sql="DELETE FROM event where id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEvent($event,$id){
		$sql="UPDATE event SET id=:id_new, nom=:nom,dateE=:dateE ,duree=:duree WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_new=$event->getId();
        $nom=$event->getNom();
        $dateE=$event->getDate();
        $duree=$event->getDuree();
        
		$datas = array(':id_new'=>$id_new, ':id'=>$id, ':nom'=>$nom,':dateE'=>$dateE,':duree'=>$duree);
		$req->bindValue(':id_new',$id_new);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dateE',$dateE);
		$req->bindValue(':duree',$duree);
				
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererEvent($id){
		$sql="SELECT * from event where id=$id";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}




function rechercheDynamique($id){
		 $sql = "SELECT * FROM event WHERE id LIKE '$id%'";
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
		 $sql = "SELECT * FROM event WHERE nom LIKE '$nom%' LIMIT 5";
		 $db = config::getConnexion();
		 try {
   		$res = $db->query($sql);
   		return $res;
   		}
   		catch (Exception $e){
   			die('Erreur :'.$e->getMessage());
   		}

	}
	
	function rechercheDynamiqueParDuree($duree){
		 $sql = "SELECT * FROM event WHERE duree LIKE '$duree%' LIMIT 5";
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
		$sql="SELECT * FROM event ORDER BY $select ASC ";

		$db = config::getConnexion();

		try {
			$res = $db->query($sql);
			return $res;
		}
		catch (Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}
	
/*	function rechercherListeEmployes($duree){
		$sql="SELECT * from event where duree=$duree";
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