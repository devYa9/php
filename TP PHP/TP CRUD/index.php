<?php
    session_start();
    include "includes/config.php";

    if(!isset($_SESSION['userInfo'])){
        header('Location: includes/login.php');
        // 
    } else {
        $data = $_SESSION['userInfo'];
    }

    $include = 'includes/home.php';
    $page = 'Acceuil';
    $active = 0;

    if(isset($_GET['dashboard'])){
        $dashboard = $_GET['dashboard'];
        switch ($dashboard) {
            case "newEtu":
                $include = 'includes/etudiant/nouveauEtudiant.php';
                $page = 'Nouveau Etudiant';
                $active = 1;
            break;
            case "supEtu":
                $include = 'includes/etudiant/supprimerEtudiant.php';
                $page = 'Supression Etudiant';
                $active = 2;
            break;
            case "modEtu":
                $include = 'includes/etudiant/modifierEtudiant.php';
                $page = 'Modification Etudiant';
                $active = 3;
                break;
            case "rechEtu":
                $include = 'includes/etudiant/rechercheEtudiant.php';
                $page = 'Recherche Etudiant';
                $active = 4;
            break;
            case "listEtu":
                $include = 'includes/etudiant/listeEtudiants.php';
                $page = 'Liste Etudiants';
                $active = 5;
            break;
            case "modEduForm":
                $include = 'includes/etudiant/modifierEtudiant_form.php';
                $page = 'Modification Etudiant';
                $active = 3;
            break;
            case "supEtuForm":
                $include = "includes/etudiant/supprimerEtudiant_action.php"; 
                $page = 'Supression Etudiant';
                $active = 2;
            break;

            // Livre
            case "newLiv":
                $include = 'includes/livre/nouveauLivre.php';
                $page = 'Nouveau Livre';
                $active = 6;
            break;
            case "supLiv":
                $include = 'includes/livre/supprimerLivre.php';
                $page = 'Supression Livre';
                $active = 7;
            break;
            case "modLiv":
                $include = 'includes/livre/modifierLivre.php';
                $page = 'Modification Livre';
                $active = 8;
                break;
            case "rechLiv":
                $include = 'includes/livre/rechercheLivre.php';
                $page = 'Recherche Livre';
                $active = 9;
            break;
            case "listLiv":
                $include = 'includes/livre/listeLivres.php';
                $page = 'Liste Livres';
                $active = 10;
            break;
            case "modLivForm":
                $include = 'includes/livre/modifierLivre_form.php';
                $page = 'Modification Livre';
                $active = 8;
            break;
            case "supLivForm":
                $include = "includes/livre/supprimerLivre_action.php"; 
                $page = 'Supression Livre';
                $active = 7;
            break;
        } 
    }
        
    

    $nbEtu = 0;
    $nbLiv = 0;
    $nbEmp = 0;
    getDashboardData($nbEtu, $nbLiv, $nbEmp, $db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title><?php echo explode(' ', $page)[0] ?></title>
</head>
<body>
    <header>
        <div class="logo">
            TP PHP CRUD
        </div>
        <div class="nav">
            <div class="title"><?php echo $page ?></div>
            <div class="account">
                <div class="avatar"><?php echo strtoupper($data['username'][0]) ?></div>
                <div class="name"><?php echo ucfirst($data['username']) ?></div>
                <div class="account-menu">
                    <div class="account-menu-icon" onclick="showMenu()"><img id="arrow" src="img/down-arrow.svg" alt="" /></div>
                    <div class="account-menu-list" id="account-menu">
                        <div class="logout"><a href="includes/logout.php">Déconnexion</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        <?php include 'includes/menu.php'?>
        
        <div class="dashboard">
            <?php isset($include) ? include $include : ''; ?>

            
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>