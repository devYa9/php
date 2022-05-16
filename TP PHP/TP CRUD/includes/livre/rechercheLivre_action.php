<?php 
    function rechercheLivre(){
        global $db;
        $critiere = $_POST['critiere'];
        $searchTerm = $_POST['search-term'];
        $recherche = "select * from livre where $critiere = '$searchTerm'";
        
        $result = $db->query($recherche)->fetchAll() ?? 0;
        return $result;
    }
    


?>