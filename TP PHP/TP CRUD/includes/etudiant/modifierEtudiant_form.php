<?php
if(!isset($_SESSION['modEtu'])){
    // header("Location: index.php");
    echo "Hello again";
} else {
    $modInfo = $_SESSION['modEtu'];
}

if(isset($_POST['submit'])){
    $etuCode = $_POST['etuCode'];
    $etuNom = ucfirst(strtolower($_POST['etuNom'])); 
    $etuPrenom = ucfirst(strtolower($_POST['etuPrenom']));
    $etuClasse = strtoupper($_POST['etuClasse']);
    $etuAdresse = ucfirst(strtolower($_POST['etuAdresse']));

    // declared in config.php
    $resultAjouter = modifierEtudiant($etuCode, $etuNom, $etuPrenom, $etuClasse, $etuAdresse, $db);
    
    
}
?>
<div class="formContainer">

    <?php echo (isset($_POST['submit'])) ? "<div class='resultAjouter'>Informations a été modifié  avec succès</div>" : '' ?>

    <form action="" method="post" class="etuForm <?php echo (isset($_POST['submit'])) ? "d-none" : '' ?>">

        <div class="inpPlace">
            <div class="inpTitle">Code</div>
                    <div class="inp">
                        <input name="etuCodeE" type="text" value='<?php echo isset($_POST['submit']) ? '' :$modInfo[4] ?>' placeholder="Saisir Code.." disabled>
                        <input name="etuCode" class="d-none" value='<?php echo isset($_POST['submit']) ? '' :$modInfo[4] ?>'>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Nom</div>
                    <div class="inp">
                        <input name="etuNom" type="text" value='<?php echo isset($_POST['submit']) ? '' : $modInfo[0] ?>' placeholder="Saisir Nom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Prénom</div>
                    <div class="inp">
                        <input name="etuPrenom" type="text" value='<?php echo isset($_POST['submit']) ? '' :  $modInfo[1] ?>' placeholder="Saisir Prénom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Classe</div>
                    <div class="inp">
                        <input name="etuClasse" type="text" value='<?php echo isset($_POST['submit']) ? '': $modInfo[2] ?>' placeholder="Saisir Classe.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Adresse</div>
                    <div class="inp">
                        <input name="etuAdresse" type="text" value='<?php echo isset($_POST['submit']) ? '' : $modInfo[3] ?>' placeholder="Votre Adresse Ici.." required>
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