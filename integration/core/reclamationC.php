<?PHP
include "config.php";

class reclamationC {
function afficherReclamation ($reclamation){
		echo "Num reclamation: ".$reclamation->getNum_r()."<br>";
		echo "num produit: ".$reclamation->getNum_c()."<br>";
		echo "Id client: ".$reclamation->getId_client()."<br>";
		echo "Reclamation: ".$reclamation->getReclame()."<br>";
	}
	
	function ajouterReclamation($reclamation){

		$sql="insert into reclamation (num_c,id_client,reclame) values ( :num_c , :id_client , :reclamation )";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $num_c=$reclamation->getNum_c();
        $id_client=$reclamation->getId_client();
        $reclamation=$reclamation->getReclame();

     

		$req->bindValue(':num_c',$num_c);
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
		$sql="UPDATE reclamation SET num_c=:num_c , reclame=:reclamation WHERE num_r=:num_r";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $num_c=$reclamation->getNum_c();
        $reclamation=$reclamation->getReclame();
 

		//$datas = array(':num_rn'=>$num_rn, ':num_r'=>$num_r, ':num_p'=>$num_p,':id_client'=>$id_client,':vote'=>$vote,':commentaire'=>$commentaire,':reclamation'=>$reclamation);
		$req->bindValue(':num_c',$num_c);
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


	function msgAuto($id_client,$num_r){
		$sql="INSERT INTO messages (id_client,message,admin,num_r) VALUES(:id_client,:message,:admin,:num_r)";
		$db= config::getConnexion();

	try {
		 $req=$db->prepare($sql);
		 $msg=" Votre reclamation a ete envoye . Un admin vous contactera le plutot possible , merci de votre patience ";
		 $admin="2";

		 $req->bindValue(":admin",$admin);
		 $req->bindValue(":id_client",$id_client);
		 $req->bindValue(":message",$msg);
		  $req->bindValue(":num_r",$num_r);
		  $s=$req->execute();
		}
		catch (Exception $e){
			 die('Erreur: '.$e->getMessage());
		}
	}

	function repondreReclam($id_client,$message){
		$sql="INSERT INTO messages (id_client,message,admin) VALUES (:id_client,:message,:admin)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
  
        $admin="1";

		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':message',$message);
		$req->bindValue(':admin',$admin);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function verifierExistReclamation($id_client){
		$sql="SELECT * from reclamation where id_client=$id_client";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		$etat = $res->rowCount();
		if ($etat ==0) 
		{
			$verif=true;
		}
		else if ($etat > 0)
		{
			$verif=false;
		}
		return $verif;
	}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererNumRec($id_client){
		$sql="SELECT num_r from reclamation WHERE id_client=$id_client ORDER BY num_r DESC LIMIT 1 ";
		$db = config::getConnexion();
		//$num = array();
		$res=$db->query($sql);
		$rows = $res->fetch();
		$num = $rows['num_r'];

		return $num;
	}
	function recupererNumC($id_client){
		$sql="SELECT num_c from reclamation WHERE id_client=$id_client ORDER BY num_r DESC LIMIT 1 ";
		$db = config::getConnexion();
		//$num = array();
		$res=$db->query($sql);
		$rows = $res->fetch();
		$num = $rows['num_c'];

		return $num;
	}

	function recupererMessages($id_client,$livraison){
		$sql="SELECT message,admin From messages where id_client=$id_client AND livraison=$livraison";
	$db = config::getConnexion();

	
	$res=$db->query($sql);

		return $res;
	}

	function insererMessages($id_client,$messages){
		$sql="INSERT INTO messages (id_client,message) VALUES (:id_client,:messages)";
//var_dump($sql);
$db = config::getConnexion();
try{
$req=$db->prepare($sql);

$req->bindValue(':id_client',$id_client);
$req->bindValue(':messages',$messages);

$req->execute();

}
catch(Exception $e){
	 echo 'Erreur: '.$e->getMessage();
}
}
else {
	echo "erreuuuur";
}
	}

}
?>