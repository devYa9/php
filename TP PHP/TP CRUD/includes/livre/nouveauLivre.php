<?php
if(isset($_POST['submit'])){
    include "nouveauLivre_action.php";
    $livCode = $_POST['livCode'];
    $livTitre = ucfirst(trim($_POST['livTitre'])); 
    $livAuteur = ucfirst(trim($_POST['livAuteur']));
    $dateEdition = $_POST['dateEdition'];

    $resultAjouter = ajouterLivre($livCode, $livTitre, $livAuteur, $dateEdition, $db);

    if($resultAjouter){
        $class = "resultAjouter";
        $msg = "'" . $livTitre . "' a été ajouté a la base !";
    } else {
        $class = "resultAjouterFalse";
        $msg = "Code Livre déja existe !";
    }
}
?>
<div class="formContainer">

    <?php echo (isset($_POST['submit'])) ? "<div class='$class'>$msg</div>" : '' ?>

    <form action="" method="post" class="etuForm">
        <div class="inpPlace">
            <div class="inpTitle">Code</div>
            <div class="inp">
                <input name="livCode" type="text" placeholder="Saisir Code.." required>
            </div>
        </div>
        <div class="inpPlace">
            <div class="inpTitle">Titre</div>
            <div class="inp">
                <input name="livTitre" type="text" placeholder="Saisir Titre.." required>
            </div>
        </div>
        <div class="inpPlace">
            <div class="inpTitle">Auteur</div>
            <div class="inp">
                <input name="livAuteur" type="text" placeholder="Saisir Auteur.." required>
            </div>
        </div>
        <div class="inpPlace">
            <div class="inpTitle">Date Edition</div>
            <div class="inp">
                <input name="dateEdition" type="date" placeholder="Saisir Date Edition.." required>
            </div>
        </div>
        <div class="inpPlace">
            <div class="subPlace">
                <a class="submitButton annulerButton" href="<?php echo $url ?>">Annuler</a>
                <button class="submitButton" type="submit" name="submit">Créer</button>
            </div>
        </div>
    </form>
</div>