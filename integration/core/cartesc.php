<?PHP
include "../config.php";
class CartesC {

	function ajouterCartes($carte){

    
		$sql="insert into cartes (nom_titulaire,num_carte,year,month,code) values (:nom_titulaire,:num_carte,:year,:month,:code)";

		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $nom_titulaire=$carte->getnom_titulaire();
        $num_carte=$carte->getnum_carte();
        $year=$carte->getyear();
        $month=$carte->getmonth();
        $code=$carte->get_code();

		
		$req->bindValue(':nom_titulaire',$nom_titulaire);
		$req->bindValue(':num_carte',$num_carte);
		$req->bindValue(':year',$year);
		$req->bindValue(':month',$month);
		$req->bindValue(':code',$code);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherTouTcartes(){

		$sql="SElECT * From cartes ORDER BY num DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

}