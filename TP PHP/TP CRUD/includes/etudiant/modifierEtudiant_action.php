<?php
    include "../config.php";

    if(isset($_POST['codeEtudiantM'])) {
        $codeE = $_POST['codeEtudiantM'];
        $queryMod = "SELECT * FROM etudiant WHERE codeEtudiant = '$codeE'";

            $etu = $db->query($queryMod)->fetch();
            if($etu){
                session_start();
                $nEtu = $etu['nom'];
                $pEtu = $etu['prenom'];
                $cEtu = $etu['classe'];
                $aEtu = $etu['adresse'];
                $_SESSION['modEtu'] = [$nEtu, $pEtu, $cEtu, $aEtu,$codeE];
                header("Location: ../../index.php?dashboard=modEduForm");
                exit();
                // header("Location: ../../index.php");
            } else {
                echo "not found";
            }
    }
?>