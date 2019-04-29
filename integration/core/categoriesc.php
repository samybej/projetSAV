
<?PHP
class CategoryC{
	function ajouterCategory($cat){
		$sql="insert into category (category) values (:category)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $category=$cat->getcategory();
		$req->bindValue(':category',$category);
		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCategory(){
		$sql="SElECT * From category";
		$db = config::getConnexion();
		try{
		$cat=$db->query($sql);
		return $cat;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function supprimercategory($id){
		$sql="DELETE FROM category where id= :id";
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

        function modifiercat($cat,$id)
        {
        $sql="UPDATE category SET  category=:category  WHERE id=:id";
        
        $db = config::getConnexion();
        try{        
        $req=$db->prepare($sql);
        $category=$cat->getcategory();
        $req->bindValue(':category',$category);
        $req->bindValue(':id',$id);

        $req->execute();
        }
        catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
        }
        }

        function remplircat($id)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT * from category where id=:id ");
        try{
        $select->bindParam (":id", $id, PDO::PARAM_INT);
        $select->execute();
        $s=$select->fetch(PDO::FETCH_OBJ); 
        return $s;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        function cherche($id)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT category from category where id=:id ");
        try{
        $select->bindParam (":id", $id, PDO::PARAM_INT);
        $select->execute();
        $s=$select->fetch(PDO::FETCH_OBJ);
        return $s;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function returnidcat($category)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT id from category where category=:category ");
        try{
        $select->bindParam (":category", $category, PDO::PARAM_INT);
        $select->execute();
        $s=$select->fetch(PDO::FETCH_OBJ);
        return $s;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

  }
		
?>