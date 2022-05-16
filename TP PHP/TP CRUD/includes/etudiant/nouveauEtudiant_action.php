<?php
    function ajouterEtudiant($code, $nom, $prenom, $classe, $adresse, $db){
        $queryEtu = "INSERT INTO etudiant VALUES ('$code','$nom', '$prenom', '$adresse', '$classe');";
        $checkQuery = "SELECT * FROM etudiant WHERE codeEtudiant = '$code';";
        if(!$db->query($checkQuery)->fetch()){
            try {
                $db->query($queryEtu);
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