<?PHP
include "../config.php";

class reclamationC {
function afficherReclamation ($reclamation){
		echo "Num reclamation: ".$reclamation->getNum_r()."<br>";
		echo "num produit: ".$reclamation->getNum_p()."<br>";
		echo "Id client: ".$reclamation->getId_client()."<br>";
		echo "Vote sur 5: ".$reclamation->getVote()."<br>";
		echo "Commentaire: ".$reclamation->getCommentaire()."<br>";
		echo "Reclamation: ".$reclamation->getReclame()."<br>";
	}
	
	function ajouterVote($reclamation){
		$sql="insert into reclamation (num_p,id_client,vote) values (:num_p,:id_client,:vote)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $num_p=$reclamation->getNum_p();
        $id_client=$reclamation->getId_client();
        $vote=$reclamation->getVote();
     

		$req->bindValue(':num_p',$num_p);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':vote',$vote);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function ajouterCommentaire($reclamation){
		$sql="insert into reclamation (num_p,id_client,commentaire) values (:num_p,:id_client,:commentaire)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $num_p=$reclamation->getNum_p();
        $id_client=$reclamation->getId_client();
        $commentaire=$reclamation->getCommentaire();
     

		$req->bindValue(':num_p',$num_p);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':commentaire',$commentaire);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}

	function ajouterReclamation($reclamation){


		$sql="insert into reclamation (num_p,id_client,reclame) values ( :num_p , :id_client , :reclamation )";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $num_p=$reclamation->getNum_p();
        $id_client=$reclamation->getId_client();
        $reclamation=$reclamation->getReclame();

     

		$req->bindValue(':num_p',$num_p);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':reclamation',$reclamation);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function afficherReclamations(){
		
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerReclamation($num_r){
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

	function modifierReclamation($reclamation,$num_r){
		$sql="UPDATE reclamation SET num_p=:num_p , reclame=:reclamation WHERE num_r=:num_r";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $num_p=$reclamation->getNum_p();
        $reclamation=$reclamation->getReclame();
 

		//$datas = array(':num_rn'=>$num_rn, ':num_r'=>$num_r, ':num_p'=>$num_p,':id_client'=>$id_client,':vote'=>$vote,':commentaire'=>$commentaire,':reclamation'=>$reclamation);
		$req->bindValue(':num_p',$num_p);
		$req->bindValue(':reclamation',$reclamation);
		$req->bindValue(':num_r',$num_r);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  // echo " Les datas : " ;
  //print_r($datas);
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

	function verifierReclam($id_client){

	}
	

}

?>