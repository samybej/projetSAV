<?PHP
include "../config.php";

class AvisC {
function afficherAvis ($avis){
		echo "Num avis: ".$avis->getNumAvis()."<br>";
		echo "num produit: ".$avis->getNum_p()."<br>";
		echo "Id client: ".$avis->getId_client()."<br>";
		echo "Vote sur 5: ".$avis->getVote()."<br>";
		echo "Commentaire: ".$avis->getCommentaire()."<br>";
	}
	
	function ajouterVote($id_client,$vote,$num_p){
	$sql="INSERT INTO avis (num_p,id_client,vote) VALUES (:num_p,:id_client,:vote)";
//var_dump($sql);
$db = config::getConnexion();
try{
$req=$db->prepare($sql);

$req->bindValue(':id_client',$id_client);
$req->bindValue(':vote',$vote);
$req->bindValue(':num_p',$num_p);

$req->execute();

}
catch(Exception $e){
	 echo 'Erreur: '.$e->getMessage();
}		
	}

	function ajouterCommentaire($id_client,$messages,$num_p){
		$sql="INSERT INTO avis (num_p,id_client,commentaire) VALUES (:num_p,:id_client,:messages)";
//var_dump($sql);
$db = config::getConnexion();
try{
$req=$db->prepare($sql);

$req->bindValue(':id_client',$id_client);
$req->bindValue(':messages',$messages);
$req->bindValue(':num_p',$num_p);

$req->execute();

}
catch(Exception $e){
	 echo 'Erreur: '.$e->getMessage();
}
	}


	function afficherAviss(){
		
		$sql="SElECT * From avis";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function recupererAvis($id_client,$num_p){
		$sql="SELECT vote from avis where id_client=$id_client AND num_p=$num_p";
			$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

			}


		function recupererCommentaire($id_client,$num_p){
		$sql="SELECT commentaire from avis where id_client=$id_client AND num_p=$num_p";
			$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

			}

	/*function supprimerReclamation($num_r){
		$sql="DELETE FROM reclamation where num_r= :num_r";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':num_r',$num_r);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
*/
	function modifierAvis($id_client,$num_p,$vote)
	{
		$sql="UPDATE avis SET vote=:vote WHERE id_client=$id_client AND num_p=$num_p AND commentaire IS NULL";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

        $req->bindValue(':vote',$vote);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
	}

	function modifierCommentaire($id_client,$num_p,$commentaire)
	{
		$sql="UPDATE avis SET commentaire=:commentaire WHERE id_client=$id_client AND num_p=$num_p AND vote IS NULL";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

        $req->bindValue(':commentaire',$commentaire);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
	}

	function supprimerCommentaire($id_client){
		$sql="DELETE from avis WHERE id_client=$id_client AND vote IS NULL";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try{		
        $req=$db->prepare($sql);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
	}
	
	function recupererReclamationParId($id_client){
		$sql="SELECT * from reclamation where id_client=$id_client";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererReclamation($num_r){
		$sql="SELECT * from reclamation where num_r=$num_r";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function verifierAvis($id_client,$num_p){
		//$id_client=$_SESSION['client'];

		$sql="SELECT vote FROM avis where id_client=$id_client AND num_p=$num_p AND vote IS NOT NULL";
		$db = config::getConnexion();

		$res=$db->query($sql);
		$etat = $res->rowCount();
		if ($etat ==0) 
		{
			$ajout=true;
		}
		else if ($etat > 0)
		{
			$ajout=false;
		}

		return $ajout;
	}
	
	function verifierCommentaire($id_client,$num_p){
		//$id_client=$_SESSION['client'];

		$sql="SELECT commentaire FROM avis where id_client=$id_client AND num_p=$num_p AND commentaire IS NOT NULL";
		$db = config::getConnexion();

		$res=$db->query($sql);
		$etat = $res->rowCount();
		if ($etat ==0) 
		{
			$ajout=true;
		}
		else if ($etat > 0)
		{
			$ajout=false;
		}

		return $ajout;
	}

	function verifierExistAvis($num_p){
		$sql="SELECT SUM(vote) FROM avis where num_p=$num_p AND commentaire IS NULL ";
		$db = config::getConnexion();

		$res=$db->query($sql);

		$rows = $res->fetch();

		$total = $rows['SUM(vote)'];
		//var_dump($total);
		if ($total == '0'){
			return false;
		}
		else {
			return true;
		}
	}
	function countAvis($num_p){
		$sql="SELECT COUNT(vote) FROM avis where num_p=$num_p AND commentaire IS NULL ";
		$db = config::getConnexion();

		$res=$db->query($sql);

		$rows = $res->fetch();

		$total = $rows['COUNT(vote)'];
		//var_dump($total);
		return $total;
	}

	function moyenneAvis($num_p){
		$sql="SELECT SUM(vote) FROM avis where num_p=$num_p AND commentaire IS NULL ";
		$db = config::getConnexion();

		$res=$db->query($sql);

		$rows = $res->fetch();

		$total = $rows['SUM(vote)'];
		$total2 = AvisC::countAvis($num_p);
		
		$resultat_final = $total / $total2;

		return $resultat_final;
	}
	
}
?>