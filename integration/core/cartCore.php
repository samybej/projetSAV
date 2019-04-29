<?PHP
//include "../config.php";
include "../entities/cartClasse.php" ;
class CartCore {
function affichercart ($cart){
		echo "id_cart: ".$cart->getid_cart()."<br>";
        echo "id_user: ".$cart->getid_user()."<br>";
        echo "id_prod: ".$cart->getid_prod()."<br>";
		echo "quantite: ".$cart->getquantite()."<br>";
	}
	function ajoutercart($cart){
		$sql="insert into cart (id_cart,id_user,id_prod,quantite) values (:id_cart,:id_user,:id_prod,:quantite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_cart=$cart->getid_cart();
        $id_user=$cart->getid_user();
        $id_prod=$cart->getid_prod();
        $quantite=$cart->getquantite();
		$req->bindValue(':id_cart',$id_cart);
        $req->bindValue(':id_user',$id_user);
        $req->bindValue(':id_prod',$id_prod);
		$req->bindValue(':quantite',$quantite);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercarts(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.idUser= a.idUser";
		$sql='SELECT * FROM cart W, produit P WHERE id_user=id_user AND W.id_prod = P.numero';
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercart($id_prod){
		$sql="DELETE FROM cart WHERE id_prod = :id_prod";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_prod',$id_prod);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
/*	function modifiercartt($cart,$id_prod){
		$sql="UPDATE cart SET quantite=:quantite WHERE id_prod=:id_prod";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_cart=$cart->getid_cart();
        $quantite=$cart->getquantite();
		$datas = array(':id_cart'=>$id_cart, ':id_user'=>$id_user, ':id_prod'=>$idprod,':quantity'=>$quantity);
		$req->bindValue(':idUsern',$idUsern);
		$req->bindValue(':idUser',$idUser);
		$req->bindValue(':quantity',$quantity);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
}
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererwishlist($idUser){
		$sql="SELECT * from wishlist where idUser=$idUser";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
	   //rechercher les carts qui contiennet un tel produit : 
	function rechercherListecart($id_prod){
		$sql="SELECT * from cart where id_prod=$id_prod";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    } 
    function recuperer_cart_selon_user($id_user){
        $sql="SELECT * from cart where id_user =:id=user "; 
        //$sql='SELECT * FROM cart W, products P WHERE id_user=id_user AND W.id_prod = P.id';
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->bindValue(':id_user',$id_user);
            $sth->execute();
            $liste = $sth->fetchAll();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}

?>