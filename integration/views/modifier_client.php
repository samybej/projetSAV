<?php
include "../entities/client.php";
include "../core/clientC.php";

 
   
 
     $clientC=new clientC();
     
        
    
    
     $clientC->modifierClient($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['date_N'] ,$_POST['phone'],$_POST['nom_c'], $_POST['mdp']);
 
$sql="UPDATE  carte_fidelite set  nom_c_client=:nom_c_client";

$db=config::getConnexion();
       
            
             $req=$db->prepare($sql);
        $nom_c_client=$_POST['nom_c'];
        $req->bindValue(':nom_c_client',$nom_c_client);
        $req->execute();

        session_start();
		$_SESSION['login']=$_POST['nom_c'];
		$_SESSION['pass']=$_POST['mdp'];
		$_SESSION['nom']=$_POST['nom'];
        $_SESSION['prenom']=$_POST['prenom'];
                $_SESSION['date']=$_POST['date_N'];

        $_SESSION['mail']=$_POST['email'];
        $_SESSION['tel']=$_POST['phone'];
        $_SESSION['adress']=$_POST['adresse'];
    

    
    
    
    
    header('location:../views/profil.php');
     





?>
