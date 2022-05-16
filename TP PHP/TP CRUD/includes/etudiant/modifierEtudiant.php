<div class="modContainer">
    <div class="modifierInp">
        <!-- to edit tomorrow :) -->
        <form action="includes/etudiant/modifierEtudiant_action.php" method="post">
            <div>Code Etudiant :</div>
            <input type="text" name="codeEtudiantM" required>
            <button type="submit">Modifier</button>

        </form>
    </div>
    <?php 
    include "includes/etudiant/listeEtudiants.php";
    ?>
</div>