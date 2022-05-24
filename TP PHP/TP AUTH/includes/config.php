<?php

$dbname = "registration";
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
        // 
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
            header("location: ../index.php");
        }
        return "Mot de passe est incorrect !";
    }
}