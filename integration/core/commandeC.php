<?PHP
require_ONCE('../config.php');
class CommandeC {

	function ajouterCommande($commande){
    $address1=0;
    $address2=0;
    $ville=0;
    $zip=0;
    $phone=0;
    $mode_payement=0;
    
		$sql="insert into commande_det (address1,address2,ville,zip,phone,type_livraison,mode_payement) values (:address1,:address2,:ville,:zip,:phone,:type_livraison,:mode_payement)";
	      
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $address1=$commande->get_address1();
        $address2=$commande->get_address2();
        $ville=$commande->get_ville();
        $zip=$commande->get_zip();
        $phone=$commande->get_phone();
        $type_livraison=$commande->get_type();
        $mode_payement=$commande->get_mode_payement();

		
		$req->bindValue(':address1',$address1);
		$req->bindValue(':address2',$address2);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':zip',$zip);
		$req->bindValue(':phone',$phone);
		$req->bindValue(':type_livraison',$type_livraison);
        $req->bindValue(':mode_payement',$mode_payement);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherTouTCommande(){

		$sql="SElECT * From commande_det ORDER BY id_Commande DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		function afficherlast(){
		$sql="SELECT *  FROM commande_det ORDER BY id_Commande DESC LIMIT 1;";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		function afficherid(){

		$sql="SELECT 	id_Commande FROM commande_det ORDER BY id_Commande DESC LIMIT 1;";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function supprimercommande($id_Commande){
		$sql="DELETE FROM commande_det where id_Commande= :id_Commande";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_Commande',$id_Commande);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	    }

	function afficherCommandeEnCours($commande){

	  $idClient=0;
		$idClient=$commande->get_IDClient();

 		$sql="SELECT * FROM commande_det WHERE date_commande IN (SELECT max(date_commande) FROM commande  WHERE id_client=$idClient)";
 		$db = config::getConnexion();
 		try{
 		$liste=$db->query($sql);


		foreach($liste as $row){
		$datas = array(
		    ':address1'=>$row['address1'],
			':address2'=>$row['address2'],
			':ville'=>$row['ville'],
			':zip'=>$row['zip'],
			':phone'=>$row['phone']);
			//$liste=array($row['id_commande'],$row['date_commande'],$row['totalPrix_commande'],$row['nbProduit_commande'],$row['id_client']);
     
		 return $datas;
	 }
	}

         catch (Exception $e){
             die('Erreur: '.$e->getMessage());
         }


 	}



		function ajouterDetailsCommande($commande,$taille){
			 $IdCommande=0 ;
		   $IdProduit= 0;
			 $PrixProduits= 0;
		   $QTEProduits= 0;
			 $NomProduit= "";
			 $i=0;

for ($i=0; $i < $taille ; $i++) {

			$sql="INSERT INTO commande_details (id_Commande,Nom_Produit,id_produit,Qte_Produit,PRIX_Produit) VALUES (:IdCommande,:NomProduit,:IdProduit,:QTEProduits,:PrixProduits)";

			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
?><p>***************Fonction Ajouter commande detail***********</p><?php
          //$idCC=$commande->get_IdCommande();
	        $IdCommande=$commande->get_IdCommande();
					?><p>***************Class detail ID***********</p><?php
				var_dump($IdCommande);

					$NomProduit=$commande->get_NomProduit()[$i];
					?><p>***************Class detail NomProduit***********</p><?php
				var_dump($NomProduit);

					$IdProduit=$commande->get_IdProduit()[$i];
				var_dump($IdProduit);

					$PrixProduits=$commande->get_PrixProduits()[$i];
					?><p>***************Class detail PRIX***********</p><?php
				var_dump($PrixProduits);

					$QTEProduits=$commande->get_QTEProduits()[$i];
				var_dump($QTEProduits);


			$req->bindValue(':IdCommande',$IdCommande);
			$req->bindValue(':NomProduit',$NomProduit);
			$req->bindValue(':IdProduit',$IdProduit);
			$req->bindValue(':PrixProduits',$PrixProduits);
	    $req->bindValue(':QTEProduits',$QTEProduits);
	            $req->execute();

	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }


				var_dump($i);
		}

		}

		function afficherDetailsCommandeEnCours($Cid){



	 		$sql="SELECT Nom_Produit, Qte_Produit, PRIX_Produit , FORMAT(Qte_Produit*PRIX_Produit,2) TOTAL FROM commande_details WHERE id_Commande=$Cid";
	 		$db = config::getConnexion();
	 		try{
	 		$liste=$db->query($sql);

	/*
			foreach($liste as $row){
				?>
			<ul class="list-group list-group-flush">
			  <li class="list-group-item"><?PHP echo $row['id_commande']; ?></li>
			  <li class="list-group-item"><?PHP echo $row['date_commande']; ?></li>
			  <li class="list-group-item"><?PHP echo $row['totalPrix_commande']; ?></li>
			  <li class="list-group-item"><?PHP echo $row['nbProduit_commande']; ?></li>
			  <li class="list-group-item">client: <?PHP echo $row['id_client']; ?></li>

			</ul>
			<?PHP
		}*/
			return $liste;

	 		}
	         catch (Exception $e){
	             die('Erreur: '.$e->getMessage());
	         }
	 	}
		function afficherPTSFidelite($Cid){



	 		$sql="SELECT COUNT(MOD(totalPrix_commande,50)) PTS_FIDELITE FROM commande_det WHERE id_client=$Cid";
	 		$db = config::getConnexion();
	 		try{
	 		$liste=$db->query($sql);
			return $liste;

	 		}
	         catch (Exception $e){
	             die('Erreur: '.$e->getMessage());
	         }
	 	}

function SupprimerCommandeSesDetails($cin){



	$sql="DELETE FROM commande_details WHERE id_Commande=:cin";
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


function ModifierEtatCommande($cin,$etat){

$etat =(int)$etat;
if($etat == 1) $etat =0;
else if($etat == 0) $etat=1;
	$sql="update commande set etat_commande=:etat where id_commande=:cin";
	$db = config::getConnexion();
			$req=$db->prepare($sql);
	$req->bindValue(':cin',$cin);
	$req->bindValue(':etat',$etat);
	try{
					$req->execute();
				 // header('Location: index.php');
			}
			catch (Exception $e){
					die('Erreur: '.$e->getMessage());
			}
}

function RechercheCommande($haja){

	$sql="SELECT * FROM commande_det WHERE date_commande LIKE '%$haja%' OR id_commande=$haja OR id_client=$haja ORDER BY id_Commande DESC";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}
function ClientPlusFidele(){


	$sql="select id_client ,COUNT(id_commande)c FROM commande_det GROUP BY id_client ORDER BY c DESC LIMIT 1  ";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}
function ProduitBestSaler(){


	$sql="select Nom_Produit ,COUNT(id_commande) FROM commande_details GROUP BY id_produit ASC LIMIT 1   ";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}

function RevenueParJour(){


	$sql="SELECT FORMAT(SUM(totalPrix_commande),2) revenue FROM commande_det WHERE date_commande IN (SELECT date_commande FROM commande_det WHERE DATE(date_commande)=DATE(NOW()) ) and etat_commande=1  ";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}

function NombreDuCommandeNonPayees(){


	$sql="SELECT COUNT(id_commande) nbr FROM commande_det WHERE etat_commande=0 ";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}

function recupererNumC(){
		$sql="SELECT MAX(id_commande) from commande_det ";
		$db = config::getConnexion();
		//$num = array();
		$res=$db->query($sql);
		$rows = $res->fetch();
		//print_r($rows);
		$num = $rows['MAX(id_commande)'];
		//print_r($num);
		return $num;
	}

}

?>
