<?PHP
include "C:/wamp64/www/nouveau dossier/config.php";
class RemiseC {
function afficherRemise ($remise){
		echo "Id_remise: ".$remise->getId_remise()."<br>";
		echo "Id_event: ".$remise->getId_event()."<br>";
		echo "pourcentage: ".$remise->getPourcentage()."<br>";
		echo "num_produit: ".$remise->getNum_p()."<br>";
		
	}
	
	function ajouterRemise($remise){
		$sql="insert into remise (id_remise,id_event,pourcentage,num_p) values (:id_r,:id_e,:pourcentage,:num_p)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

       
		
        $id_remise=$remise->getId_remise();
       # $s_id=(string)$id;
        $id_event=$remise->getId_event();
        $pourcentage=$remise->getPourcentage();
        $num_p=$remise->getNum_p();
        
		$req->bindValue(':id_r',$id_remise);
		$req->bindValue(':id_e',$id_event);
		$req->bindValue(':pourcentage',$pourcentage);
		$req->bindValue(':num_p',$num_p);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherRemises(){
	
		$sql="SELECT * From remise";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerRemise($id_remise){
		$sql="DELETE FROM remise where id_remise=:id_r";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_r',$id_remise);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierRemise($remise,$id_remise){
		$sql="UPDATE remise SET id_remise=:idremise_new, id_event=:id_event,pourcentage=:pourcentage ,num_p=:num_p WHERE id_remise=:idremise";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idremise_new=$remise->getId_remise();
        $id_event=$remise->getId_event();
        $pourcentage=$remise->getPourcentage();
        $num_p=$remise->getNum_p();
        
		$datas = array(':idremise_new'=>$idremise_new, ':idremise'=>$id_remise, ':id_event'=>$id_event,':pourcentage'=>$pourcentage,':num_p'=>$num_p);
		$req->bindValue(':idremise_new',$idremise_new);
		$req->bindValue(':idremise',$id_remise);
		$req->bindValue(':id_event',$id_event);
		$req->bindValue(':pourcentage',$pourcentage);
		$req->bindValue(':num_p',$num_p);
				
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererRemise($id_remise){
		$sql="SELECT * from remise where id_remise=$id_remise";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
/*	function rechercherListeRemise($id_remise){
		$sql="SELECT * from remise where id_remise=$id_remise";
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