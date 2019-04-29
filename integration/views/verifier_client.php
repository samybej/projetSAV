<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php
include "../entities/client.php";
include "../core/clientC.php";


     
     $c=new config();
     $conn=$c->getConnexion();
     $user=new ClientC();
     $u=$user->Logedin($conn,$_POST['nom'],$_POST['mdp']);
     
     $vide=false;
     if (!empty($_POST['nom']) && !empty($_POST['mdp'])){
	
	foreach($u as $t){
		$vide=true;
       
	
		session_start();
		$_SESSION['login']=$_POST['nom'];
		$_SESSION['pass']=$_POST['mdp'];
		$_SESSION['nom']=$t['nom_client'];
        $_SESSION['prenom']=$t['prenom_client'];
                $_SESSION['date']=$t['date_client'];

        $_SESSION['mail']=$t['email_client'];
        $_SESSION['tel']=$t['tel_client'];
        $_SESSION['adress']=$t['adress_client'];
        $_SESSION['id']=$t['id_client'];
        
      
        
		
	
} 
if ($vide==true) { 
         
    
 header('Location:login.php');

      } 
         else if ($vide==false)
    {
    
       
         header('Location: login.html');

         // puis on le redirige vers la page d'accueil
      } 
}
    
    

    
     
  


?>
</body>
</html>