<div class="modContainer">
    <div class="modifierInp">
        <form action="index.php?dashboard=supEtuForm" method="post">
            <div>Code Etudiant :</div>
            <input type="text" name="codeEtudiant" required>
            <button type="submit">Supprimer</button>

        </form>
    </div>
<?php 
    include "includes/etudiant/listeEtudiants.php";
?>
</div>