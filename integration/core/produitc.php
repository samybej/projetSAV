<?PHP
include "../config.php";
class ProduitC {
	function ajouterProduit($produit){
		$sql="insert into produit (first_name,product_title,price,tax,quantity,descreption,sale,category,size_xs,size_S,size_M,size_L,final_price,img_localisation,img_details1_localisation,img_details2_localisation) values (:first_name,:product_title,:price,:tax,:quantity,:descreption,:sale,:category,:size_xs,:size_S,:size_M,:size_L,:final_price,:img_localisation,:img_details1_localisation,:img_details2_localisation)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $first_name=$produit->getfirstname();
        $product_title=$produit->getTitle();
        $price=$produit->getPrice();
        $tax=$produit->getTax();
        $quantity=$produit->getQuantity();
        $descreption=$produit->getDescreption();
        $sale=$produit->getSale();
        $category=$produit->getCategory();
        $size_xs=$produit->getSize_xs();
        $size_S=$produit->getSize_S();
        $size_M=$produit->getSize_M();
        $size_L=$produit->getSize_L();
        $final_price=$produit->getfinalprice();
        $img_localisation=$produit->getlocal();
        $img_details1_localisation=$produit->getlocal1();
        $img_details2_localisation=$produit->getlocal2();

		$req->bindValue(':first_name',$first_name);
		$req->bindValue(':product_title',$product_title);
		$req->bindValue(':price',$price);
		$req->bindValue(':tax',$tax);
		$req->bindValue(':quantity',$quantity);
		$req->bindValue(':descreption',$descreption);
		$req->bindValue(':sale',$sale);
		$req->bindValue(':category',$category);
		$req->bindValue(':size_xs',$size_xs);
		$req->bindValue(':size_S',$size_S);
		$req->bindValue(':size_M',$size_M);
		$req->bindValue(':size_L',$size_L);
		$req->bindValue(':final_price',$final_price);
		$req->bindValue(':img_localisation',$img_localisation);
        $req->bindValue(':img_details1_localisation',$img_details1_localisation);
        $req->bindValue(':img_details2_localisation',$img_details2_localisation);
		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProduits(){
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherseloncat($category){
        $sql="SElECT * From produit where category=:category";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function supprimerproduit($numero){
		$sql="DELETE FROM produit where numero= :numero";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':numero',$numero);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	    }
        function modifierproduit($produit1,$numero)
        {
        $sql="UPDATE produit SET  first_name=:first_name,product_title=:product_title,price=:price,tax=:tax,quantity=:quantity,descreption=:descreption,sale=:sale,category=:category,size_xs=:size_xs,size_S=:size_S,size_M=:size_M, size_L=:size_L,final_price=:final_price WHERE numero=:numero";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);

        $first_name=$produit1->getfirstname();
        $product_title=$produit1->getTitle();
        $price=$produit1->getPrice();
        $tax=$produit1->getTax();
        $quantity=$produit1->getQuantity();
        $descreption=$produit1->getDescreption();
        $sale=$produit1->getSale();
        $category=$produit1->getCategory();
        $size_xs=$produit1->getSize_xs();
        $size_S=$produit1->getSize_S();
        $size_M=$produit1->getSize_M();
        $size_L=$produit1->getSize_L();
        $final_price=$produit1->getfinalprice();
        $req->bindValue(':first_name',$first_name);
        $req->bindValue(':product_title',$product_title);
        $req->bindValue(':price',$price);
        $req->bindValue(':tax',$tax);
        $req->bindValue(':quantity',$quantity);
        $req->bindValue(':descreption',$descreption);
        $req->bindValue(':sale',$sale);
        $req->bindValue(':category',$category);
        $req->bindValue(':size_xs',$size_xs);
        $req->bindValue(':size_S',$size_S);
        $req->bindValue(':size_M',$size_M);
        $req->bindValue(':size_L',$size_L);
        $req->bindValue(':final_price',$final_price);
        $req->bindValue(':numero',$numero);

        $req->execute();
        }
        catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
        }
        }
		function remplirchamps($numero)
		{
        
		$db = config::getConnexion();
		$select=$db->prepare("SELECT * from produit where numero=:numero ");
		try{
        $select->bindParam (":numero", $numero, PDO::PARAM_INT);
        $select->execute();
        $s=$select->fetch(PDO::FETCH_OBJ); 
        return $s;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        function remplirsize($numero)
        {
        $db = config::getConnexion();
		$select=$db->prepare("SELECT * from produit where numero=:numero ");
		try{
		$select->bindParam (":numero", $numero, PDO::PARAM_INT);
        $select->execute();
        $data=$select->fetch(PDO::FETCH_OBJ); 
        $val="";
        
        $selected_val = $_POST['select'];  // Storing Selected Value In Variable
        // echo "You have selected :" .$selected_val;  // Displaying Selected Value
        if ($selected_val=="opt1")
        {
        $val="please select a size"; 
        }
        if($selected_val=="xs")
        {
        $val=$data->size_xs;
        }
        if($selected_val=="S")
        {
        $val=$data->size_S;
        }
        if($selected_val=="M")
        {
        $val=$data->size_M;
        }
        if($selected_val=="L")
        {
        $val=$data->size_L;
        }
        return $val;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
    
    function rechercherproduit($recherche){

        $sql="SELECT * from produit where first_name='$recherche' OR product_title='$recherche' OR category='$recherche'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function low(){

        $sql="SELECT * from produit  ORDER BY (price+tax) ";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function high(){

        $sql="SELECT * from produit  ORDER BY (price+tax) DESC";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function filtresize($size){
        $sql="SELECT * from produit   where $size>0";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }        
    }
        function remplir($category)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT first_name from produit where category=:category ");
        try{
        $select->bindParam (":category", $category, PDO::PARAM_INT);
        $select->execute();
        return $select;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function image($category)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT img_localisation from produit where category=:category ");
        try{
        $select->bindParam (":category", $category, PDO::PARAM_INT);
        $select->execute();
        return $select;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function price($category)
        {
        
        $db = config::getConnexion();
        $select=$db->prepare("SELECT price from produit where category=:category ");
        try{
        $select->bindParam (":category", $category, PDO::PARAM_INT);
        $select->execute();
        return $select;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function pagetotale($prodparpage)
        {
        $db = config::getConnexion();
        $prodsTotalesReq = $db->query('SELECT numero FROM produit');
        $prodsTotales = $prodsTotalesReq->rowCount();
        $prodsTotales = ceil($prodsTotales/$prodparpage);
        return $prodsTotales;
        }
        function pagination($prodparpage,$depart)
        {
        $db = config::getConnexion();
        $produit = $db->query('SELECT * FROM produit ORDER BY numero DESC LIMIT '.$depart.','.$prodparpage);
        return $produit;
        }
  }
		
?>