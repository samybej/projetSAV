
<?PHP
include "C:/wamp64/www/test/config.php";
include "C:/wamp64/www/test/entities/categories.php";
include "C:/wamp64/www/test/core/categoriesc.php";
include "C:/wamp64/www/test/entities/submenu.php";
include "C:/wamp64/www/test/core/submenuc.php";
if (isset($_POST['submit']))
{ 
  if (isset($_POST['category']))
   {
      $cat=new Category($_POST['category']);
      $cat1c=new CategoryC();
      $cat1c->ajoutercategory($cat);
      $number=$_POST["name"];
       if($number > 0)  
      {  
      for($i=0; $i<$number; $i++) 
      {  
           if(trim(@$_POST["name"][$i] != ''))  
           {  
      $menu=new Submenu(@$_POST['category'],@$_POST["name"][$i]);
      $menu1c=new SubmenuC();
      $menu1c->ajoutersubmenu($menu);
           }  
      }  
      echo "Data Inserted";  
      }  
      header('Location: ./product-list.php');
   }
  else
   {
  echo "vérifier les champs";
   }
}

?>
