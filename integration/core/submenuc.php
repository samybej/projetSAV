<?PHP
class SubmenuC{
	function ajoutersubmenu($menu){
		$sql="insert into submenu (id_category,nom) values (:id_category,:nom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$menu->getid();
        $nom=$menu->getnom();
		$req->bindValue(':id_category',$id_category);
        $req->bindValue(':nom',$nom);
		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	        function modifiersubmenu($sub,$id_category)
        {
        $sql="UPDATE submenu SET  nom=:nom  WHERE id_category=:id_category";
        
        $db = config::getConnexion();
        try{        
        $req=$db->prepare($sql);
        $category=$cat->getcategory();
        $req->bindValue(':nom',$nom);
        $req->bindValue(':id_category',$id_category);

        $req->execute();
        }
        catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
        }
        }
	function affichersubmenu(){
		$sql="SElECT * From submenu";
		$db = config::getConnexion();
		try{
		$menu=$db->query($sql);
		return $menu;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

        function remplirchamps($id_category)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT nom from submenu where id_category=:id_category ");
        try{
        $select->bindParam (":id_category", $id_category, PDO::PARAM_INT);
        $select->execute();
        $s=$select->fetch(PDO::FETCH_OBJ);
        return $select;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        
        function remplir($id_category)
        {
        $sql="SELECT * FROM submenu WHERE id_category=:id_category ";
        $db = config::getConnexion();
        try{
        $rech=$db->query($sql);
        return $rech;
        }
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
        }
        }
        
   

  }
		
?>