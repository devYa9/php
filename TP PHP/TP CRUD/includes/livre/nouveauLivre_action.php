<?php
    function ajouterLivre($code, $titre, $auteur, $date, $db){
        $queryLiv = "INSERT INTO livre VALUES ('$code','$titre', '$auteur', '$date');";
        $checkQuery = "SELECT * FROM livre WHERE codeLivre = '$code';";
        if(!$db->query($checkQuery)->fetch()){
            try {
                $db->query($queryLiv);
                return true;
            } catch (PDOException $e){
                echo "Error : " . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }
    
?>