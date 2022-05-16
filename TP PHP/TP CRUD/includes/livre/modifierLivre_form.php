<?php
if(!isset($_SESSION['modLiv'])){
    // header("Location: index.php");
    echo "Hello again";
} else {
    $modInfo = $_SESSION['modLiv'];
}


if(isset($_POST['submit'])){
    $livCode = $_POST['livCode'];
    $livTitre = ucfirst(strtolower($_POST['livTitre'])); 
    $livAuteur = ucfirst(strtolower($_POST['livAuteur']));
    $dateEdition = $_POST['dateEdition'];

    // Declared in config.php
    $resultAjouter = modifierLivre($livCode, $livTitre, $livAuteur, $dateEdition, $db);
    
    
}
?>
<div class="formContainer">

    <?php echo (isset($_POST['submit'])) ? "<div class='resultAjouter'>Informations a été modifié  avec succès</div>" : '' ?>

    <form action="" method="post" class="etuForm <?php echo (isset($_POST['submit'])) ? "d-none" : '' ?>">

        <div class="inpPlace">
            <div class="inpTitle">Code</div>
                    <div class="inp">
                        <input name="livCodeE" type="text" value='<?php echo isset($_POST['submit']) ? '' :$modInfo[3] ?>' placeholder="Saisir Code.." required disabled>
                        <input name="livCode" class="d-none" value='<?php echo isset($_POST['submit']) ? '' :$modInfo[3] ?>'>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Titre</div>
                    <div class="inp">
                        <input name="livTitre" type="text" value='<?php echo isset($_POST['submit']) ? '' : $modInfo[0] ?>' placeholder="Saisir Nom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Auteur</div>
                    <div class="inp">
                        <input name="livAuteur" type="text" value='<?php echo isset($_POST['submit']) ? '' :  $modInfo[1] ?>' placeholder="Saisir Prénom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Date Edition</div>
                    <div class="inp">
                        <input name="dateEdition" date-formant="YYYY MM DD" type="date" value='<?php echo isset($_POST['submit']) ? '': $modInfo[2] ?>' placeholder="Saisir Classe.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="subPlace">
                        <a class="submitButton annulerButton" href="<?php echo $url ?>">Annuler</a>
                        <button class="submitButton" type="submit" name="submit">Modifier</button>
                    </div>
                </div>
            </form>
            </div>