<?php
if(isset($_POST['codeEtuSup'])){
    $codeEtuSup = $_POST['codeEtuSup'];
    $qryDel = "DELETE FROM etudiant WHERE codeEtudiant = '$codeEtuSup'";
    $db->query($qryDel);
    
    // header() ne marche pas :(
    echo "<script>document.location.replace('index.php')</script>";
    exit();
}

?>

<div class="supConfirm">

<?php    
    if(!isset($_POST['codeEtudiant'])){
        header("Location: index.php");
        exit();
    } else {
        $codeEtu = $_POST['codeEtudiant'];
        $qry = "SELECT * FROM etudiant WHERE codeEtudiant = '$codeEtu';";
        if($req = $db->query($qry)->fetch())
{ ?>

    <form action="" method="post" class="supprimerForm">
        <div class="resultAjouter">Voullez vous vraiment supprimer cet étudiant ?</div>
        <table class="etuTable">

            <thead>
                <tr>
                    <th>Code Etudiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Classe</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $req['codeEtudiant'] ?></td>
                    <td><?php echo $req['nom'] ?></td>
                    <td><?php echo $req['prenom'] ?></td>
                    <td><?php echo $req['adresse'] ?></td>
                    <td><?php echo $req['classe'] ?></td>
                </tr>
            </tbody>
        </table>
        <input name="codeEtuSup" class="d-none" value="<?php echo $req['codeEtudiant'] ?>">
        <div class="buttonContainer">

            <a class="submitButton annulerButton" href='<?php echo $url ?>' >Annuler</a>
            <button class="submitButton" type="submit">Supprimer</button>
        </div>
    </form>

    <?php
} else 
{ ?>
    <div class="resultAjouterFalse">Etudiant n'existe pas dans la base !</div>
    <?php
    include "includes/etudiant/supprimerEtudiant.php";
}
}
?>
</div>