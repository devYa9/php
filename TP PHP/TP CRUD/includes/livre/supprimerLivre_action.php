<?php
if(isset($_POST['codeLivSup'])){
    $codeLivSup = $_POST['codeLivSup'];
    $qryDel = "DELETE FROM livre WHERE codeLivre = '$codeLivSup'";
    $db->query($qryDel);
    
    // header() won't work  "Error: cannot modify header information..."
    echo "<script>document.location.replace('index.php')</script>";
    exit();
}

?>

<div class="supConfirm">

<?php    
    if(!isset($_POST['codeLivre'])){
        header("Location: index.php");
        exit();
    } else {
        $codeLiv = $_POST['codeLivre'];
        $qry = "SELECT * FROM livre WHERE codeLivre = '$codeLiv';";
        if($req = $db->query($qry)->fetch())
{ ?>

    <form action="" method="post" class="supprimerForm">
        <div class="resultAjouter">Voullez vous vraiment supprimer ce livre ?</div>
        <table class="etuTable">

            <thead>
                <tr>
                    <th>Code Livre</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date Edition</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $req['codeLivre'] ?></td>
                    <td><?php echo $req['titre'] ?></td>
                    <td><?php echo $req['auteur'] ?></td>
                    <td><?php echo $req['dateEdition'] ?></td>
                </tr>
            </tbody>
        </table>
        <input name="codeLivSup" class="d-none" value="<?php echo $req['codeLivre'] ?>">
        <div class="buttonContainer">

            <a class="submitButton annulerButton" href='<?php echo $url ?>' >Annuler</a>
            <button class="submitButton" type="submit">Supprimer</button>
        </div>
    </form>

    <?php
} else 
{ ?>
    <div class="resultAjouterFalse">Livre n'existe pas dans la base !</div>
    <?php
    include "includes/livre/supprimerLivre.php";
}
}
?>
</div>