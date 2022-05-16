<?php
    include "config.php";

    redirectIfLogged();

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email= $_POST['email'];
        $password = $_POST['password'];
        $result = checkAndInsert($username, $email, $password, $db);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/master.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" id="myForm" onsubmit="return validateEmail() && validateUsername()">
            <center>TP PHP TDM</center>
            <center class="result"><?php echo isset($result) ? $result : ""; ?></center>
            <p class="ins">S'inscrire</p>
            <div>
                <div class="userInput">
                    <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required>
                    <span class="error" id="errorUser"></span>
                </div>
                <div class="emailInp">
                    <input type="text" name="email" id="email" placeholder="Email" required>
                    <span class="error" id="errorEmail"></span>
                </div>
                <div class="passInp">
                    <input type="password" id="password" name="password" placeholder="Mot de passe" autocomplete="off" required>
                    <div id="affBtn">afficher</div>
                </div>
                <input type="submit" id="submit" value="S'inscrire" name="submit" class="btn">
            </div>
            <div class="deja">
                <p>Deja inscrit ? <a href="login.php">Connecter-vous ici</a></p>
            </div>
        </form>
    </div>

    <script src="../js/validation.js"></script>
</body>
</html>