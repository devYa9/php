<?php

$dbname = "biblio";
$server = "localhost";
$port = "3306"; 
$user = "root";
$password = "";
$dsn = "mysql:dbname=" . $dbname .";host=" . $server . ";port=" . $port . ";charset=utf8";

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


function redirectIfLogged(){
    session_start();
    if(isset($_SESSION['userInfo'])) {
        header("Location: ../index.php");
        exit();
    }
}

function checkAndInsert($username, $email, $password, $db){
    $qryEmail = "SELECT * FROM users WHERE email = '$email'";
    $qryUsername = "SELECT * FROM users WHERE username = '$username'";
    $req1 = count($db->query($qryEmail)->fetchAll());
    $req2 = count($db->query($qryUsername)->fetchAll());
    if ($req1 > 0) {
        return "Email est deja exist !";
    }   elseif ($req2 > 0) {
        return "Username est deja exist !";
    } else {
        $username = trim($username);
        $email = trim($email);
        $id = $db->query("select id from users order by id desc limit 1")->fetch()['id']  ?? 0;
        $id++;
        $qry3 = "INSERT INTO users(id, username, email, password) values ('$id', '$username', '$email', '$password')";
        $db->query($qry3);
        return "Inscription a été effectué avec succès.";
    }
};

function loginCheck($username, $password, $db){
    $qry1 = "SELECT * FROM users WHERE email = '$username' OR username = '$username'";
    $req = $db->query($qry1);
    $tuple = $req->fetch();
    if (!$tuple){
        return "Il y a pas d'utilisateur avec ces informations";
    } else {
        $pass = $tuple['password'];
        if ($password == $pass){
            session_start();
            $_SESSION['userInfo'] = $tuple;
            header("Location: ../index.php");
            exit();
        }
        return "Mot de passe est incorrect !";
    }
}

function getDashboardData(&$nbEtu, &$nbLiv, &$nbEmp, $db){
    $nbEtu = count($db->query("select * from etudiant")->fetchAll());
    $nbLiv = count($db->query("select * from livre")->fetchAll());
    $nbEmp = count($db->query("select * from emprunter")->fetchAll());
    
}

function modifierEtudiant($code, $nom, $prenom, $classe, $adresse, $db){
    $queryEtu = "UPDATE etudiant SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', classe = '$classe' WHERE  codeEtudiant = '$code';";
        try {
            $db->query($queryEtu);
            return true;
        } catch (PDOException $e){
            echo "Error : " . $e->getMessage();
            return false;
        }
}

function modifierLivre($code, $titre, $auteur, $date, $db){
    $queryLiv = "UPDATE livre SET titre = '$titre', auteur = '$auteur', dateEdition = '$date' WHERE  codeLivre = '$code';";
        try {
            $db->query($queryLiv);
            return true;
        } catch (PDOException $e){
            echo "Error : " . $e->getMessage();
            return false;
        }
}

function listeEtudiants(){
    global $db;
    $queryList = "select * from etudiant group by codeEtudiant asc";
    $list = $db->query($queryList)->fetchAll();
    foreach($list as $etudiant){
        $code = $etudiant['codeEtudiant'];
        $nom = $etudiant['nom'];
        $prenom = $etudiant['prenom'];
        $adresse = $etudiant['adresse'];
        $classe = $etudiant['classe'];
        echo "<tr><td>$code</td><td>$nom</td><td>$prenom</td><td>$adresse</td><td>$classe</td></tr>";
    }
}

function listeLivres(){
    global $db;
    $queryList = "select * from livre group by codeLivre asc";
    $list = $db->query($queryList)->fetchAll();
    foreach($list as $livre){
        $code = $livre['codeLivre'];
        $titre = $livre['titre'];
        $auteur = $livre['auteur'];
        $dateE = $livre['dateEdition'];
        echo "<tr><td>$code</td><td>$titre</td><td>$auteur</td><td>$dateE</td></tr>";
    }
}