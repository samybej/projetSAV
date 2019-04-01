<?PHP
include "../config.php";

class LivreurC {
function afficherLivreur ($livreur){
		echo "Cin: ".$livreur->getCin()."<br>";
		echo "Nom: ".$livreur->getNom()."<br>";
		echo "Prénom: ".$livreur->getPrenom()."<br>";
		echo "La destination : ".$livreur->getDestination()."<br>";
		echo "Disponibilité : ".$livreur->getDispo()."<br>";
		echo "La date de livraison JJ/MM/AAAA :".$livreur->getDateLivraison()."<br>";
	}

	
	function ajouterLivreur($livreur){
		$sql="insert into livreur (cin,nom,prenom,destination,dispo,date_livraison) values (:cin, :nom,:prenom,:des,:dispo,:date_livraison)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $cin=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $destination=$livreur->getDestination();
        $dispo=$livreur->getDispo();
        $date_livraison=$livreur->getDateLivraison();

		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':des',$destination);
		$req->bindValue(':dispo',$dispo);
		$req->bindValue(':date_livraison',$date_livraison);
		
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
		$sql="UPDATE livreur SET cin=:cin_new, nom=:nom,prenom=:prenom,destination=:des,dispo=:dispo,date_livraison=:date_livraison WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

		$cin_new=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $destination=$livreur->getDestination();
        $dispo=$livreur->getDispo();
        $date_livraison=$livreur->getDateLivraison();

		$datas = array(':cin_new'=>$cin_new, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':des'=>$destination,':dispo'=>$dispo, ':date_livraison'=>$date_livraison);

		$req->bindValue(':cin_new',$cin_new);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':des',$destination);
		$req->bindValue(':dispo',$dispo);
		$req->bindValue(':date_livraison',$date_livraison);
		
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
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