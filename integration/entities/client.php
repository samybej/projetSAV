<?php


class Client { 

 private $id;
 private $nom_client;
 private $prenom_client;
 private $date_client;
 private $adress_client;
 private $mail_client;
 private $tel_client;
 private $nom_compte;
 private $mdp_compte;


 
function __construct($nom_client,$prenom_client,$date_client,$adress_client,$mail_client,$tel_client,$nom_compte,$mdp_compte)
    {
     $this->nom_client=$nom_client;
     $this->prenom_client=$prenom_client;
     $this->date_client=$date_client;
    
     $this->adress_client=$adress_client;
     $this->mail_client=$mail_client;
     $this->tel_client=$tel_client;
     $this->nom_compte=$nom_compte;
     $this->mdp_compte=$mdp_compte;

}
    
     function getId()
    { return  $this->id;}

     function getNom_client()
    { return  $this->nom_client;}
    
    function getprenom_client()
    { return  $this->prenom_client;}
        function getdate_client()
    { return  $this->date_client;}
   
        function getadress_client()
    { return  $this->adress_client;}
        function getmail_client()
    { return  $this->mail_client;}
        function gettel_client()
    { return  $this->tel_client;}
        function getnom_compte()
    { return  $this->nom_compte;}
        function getmdp_compte()
    { return  $this->mdp_compte;}
 
        

      


 function setId ($id)
 {$this->id=$id;}
 function setnom_client($nom_client)
 {$this->nom_client=$nom_client;}
      
 function setprenom_client($prenom_client)
 { $this->prenom_client=$prenom_client;}
 
 function setdate_client($date_client)
 { $this->date_client=$date_client;}
 

 
 function setadress_client($adress_client)
 {$this->adress_client=$adress_client;}
 
 function setmail_client($mail_client)
 {$this->mail_client=$mail_client;}

 function settel_client($tel_client)
 {$this->tel_client=$tel_client;}
 
 function setnom_compte($nom_compte)
 {$this->nom_compte=$nom_compte;}

 function setmdp_compte($mdp_compte)
 { $this->mdp_compte=$mdp_compte;}
 

      
      
   
}
?>