<?php
    session_start();
    include "includes/config.php";

    // SCRIPT LOGOUT
    if(!isset($_SESSION['userInfo'])){
        header('Location: includes/login.php');
        // 
    } else {
        $data = $_SESSION['userInfo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Acceuil</title>
</head>
<body>

    <header>
        <div class="menu">
            <a href="">Acceuil</a>
            <span>TP PHP TDM</span>
        </div>
        <div class="account">
            <span>Bienvenue <b><?php echo $data['username'] ?></b> !</span>
            <a href="includes/logout.php">Déconnexion</a>
        </div>
    </header>
    <main>
        <p>C'est votre tableau de board !</p>
    </main>
</body>
</html>