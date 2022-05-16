<div class="modContainer">
    <div class="modifierInp">
        <!-- to edit tomorrow :) -->
        <form action="includes/livre/modifierLivre_action.php" method="post">
            <div>Code Livre :</div>
            <input type="text" name="codeLivreM" required>
            <button type="submit">Modifier</button>

        </form>
    </div>
    <?php 
    include "includes/livre/listeLivres.php";
    ?>
</div>