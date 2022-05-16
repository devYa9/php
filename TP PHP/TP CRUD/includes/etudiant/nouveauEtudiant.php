<?php
if(isset($_POST['submit'])){
    include "nouveauEtudiant_action.php";
    $etuCode = $_POST['etuCode'];
    $etuNom = ucfirst($_POST['etuNom']); 
    $etuPrenom = ucfirst($_POST['etuPrenom']);
    $etuClasse = strtoupper($_POST['etuClasse']);
    $etuAdresse = ucfirst($_POST['etuAdresse']);

    $resultAjouter = ajouterEtudiant($etuCode, $etuNom, $etuPrenom, $etuClasse, $etuAdresse, $db);

    if($resultAjouter){
        $class = "resultAjouter";
        $msg = "'" . $etuNom ." ". $etuPrenom . "' a été a la base !";
    } else {
        $class = "resultAjouterFalse";
        $msg = "Code etudiant déja existe !";
    }
}
?>
<div class="formContainer">

    <?php echo (isset($_POST['submit'])) ? "<div class='$class'>$msg</div>" : '' ?>

    <form action="" method="post" class="etuForm">
        <div class="inpPlace">
            <div class="inpTitle">Code</div>
                    <div class="inp">
                        <input name="etuCode" type="text" placeholder="Saisir Code.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Nom</div>
                    <div class="inp">
                        <input name="etuNom" type="text" placeholder="Saisir Nom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Prénom</div>
                    <div class="inp">
                        <input name="etuPrenom" type="text" placeholder="Saisir Prénom.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Classe</div>
                    <div class="inp">
                        <input name="etuClasse" type="text" placeholder="Saisir Classe.." required>
                    </div>
                </div>
                <div class="inpPlace">
                    <div class="inpTitle">Adresse</div>
                    <div class="inp">
                        <input name="etuAdresse" type="text" placeholder="Votre Adresse Ici.." required>
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