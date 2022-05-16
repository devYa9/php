<div class="modContainer">
    <div class="modifierInp">
        <form action="index.php?dashboard=supLivForm" method="post">
            <div>Code Livre :</div>
            <input type="text" name="codeLivre" required>
            <button type="submit">Supprimer</button>

        </form>
    </div>
<?php 
    include "includes/livre/listeLivres.php";
?>
</div>