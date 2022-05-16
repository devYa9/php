<?php
    include "../config.php";

    if(isset($_POST['codeLivreM'])) {
        $codeL = $_POST['codeLivreM'];
        $queryMod = "SELECT * FROM livre WHERE codeLivre = '$codeL'";

            $liv = $db->query($queryMod)->fetch();
            if($liv){
                session_start();
                $tLiv = $liv['titre'];
                $aLiv = $liv['auteur'];
                $dLiv = $liv['dateEdition'];
                $_SESSION['modLiv'] = [$tLiv, $aLiv, $dLiv, $codeL];
                header("Location: ../../index.php?dashboard=modLivForm");
                exit();
                // header("Location: ../../index.php");
            } else {
                echo "not found";
            }
    }
?>