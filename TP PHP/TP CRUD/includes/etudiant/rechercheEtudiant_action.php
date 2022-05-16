<?php 
    function rechercheEtudiant(){
        global $db;
        $critiere = $_POST['critiere'];
        $searchTerm = $_POST['search-term'];
        $recherche = "select * from etudiant where $critiere = '$searchTerm'";
        
        $result = $db->query($recherche)->fetchAll() ?? 0;
        return $result;
    }
    


?>