<?php 
session_start();
include "../entities/carte.php";
include "../core/carteC.php";
#

     
        
    

$sql="insert into carte_fidelite (nom_c_client) values (:nom_c_client)";
        
        $db=config::getConnexion();
        try {
            
             $req=$db->prepare($sql);
        
        
        $nom_c_client=$_SESSION['login'];
       
       

        $req->bindValue(':nom_c_client',$nom_c_client);
     
        
        
        $req->execute();
        }
         catch (Exception $e)
    { echo 'erreur:'.$e->getMessage();}
header('location:../views/profil.php');
     


?>

