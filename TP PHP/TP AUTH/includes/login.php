<?php
    include "config.php";

    redirectIfLogged();

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = loginCheck($username, $password, $db);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/master.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <center>TP PHP TDM</center>
            <center class="result"><?php echo isset($result) ? $result : ""; ?></center>
            <p class="ins">Connexion</p>
            <div>
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
                <div class="passInp">
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                    <div id="affBtn">afficher</div>
                </div>
                <input type="submit" value="Connexion" name="submit" class="btn">
            </div>
            <div class="deja">
                <p>Vous etes nouveau ici ? <a href="register.php">S'inscrire</a></p>
            </div>
        </form>
    </div>
    
    <script>
        var affBtn = document.getElementById('affBtn');
        var passInp = document.getElementById("password");
        affBtn.addEventListener("click", function() {
            affBtn.innerText == "afficher" ? affBtn.innerText = "masquer" : affBtn.innerText = "afficher"; 
            passInp.getAttribute("type") == "password" ? passInp.setAttribute("type", "text") : passInp.setAttribute("type", "password"); 

        })
    </script>
</body>
</html>