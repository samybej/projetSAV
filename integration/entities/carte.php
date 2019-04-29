<?php

class Carte {
    
    private $id_carte;
    private $nom_c_client;
    private $nb_point;
    private $date_creation;
    
    function __construct ($id_client)
    {
     $this->nom_c_client=$nom_c_client;
     


    }
    function getIDcarte() {return $this->id_carte;}
    function getIDclient() {return $this->nom_c_client;}
    function getNbpoint() {return $this->nb_point;}
    function getDate() {return $this->date_creation;}
    
    
    
    function setIDcarte ($id_carte) {$this->id_carte=$id_carte;}
    
    function setIDclient ($nom_c_client){$this->id_client=$nom_c_client;}
    
    function setNbpoint ($nb_point){$this->nb_point=$nb_point;}
    
    function setDate ($date_creation){$this->date_creation=$date_creation;}
    


}
?>