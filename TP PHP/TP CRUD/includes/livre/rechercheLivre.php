<div class="container">
    <div class="search-container">
        <h1>Recherche :</h1>
        <form class="search" method="post" action="">
            <div>Critiére:</div>
            <select onchange="switchInp(this)" name="critiere" id="">
                <option value="codeLivre">Code</option>
                <option value="titre">Titre</option>
                <option value="auteur">Auteur</option>
                <option value="dateEdition">Date Edition</option>
            </select>
            <input type="text" class="in" name="search-term" placeholder="Saisir Valeur..." required>
            <button type="submit">Recherche</button>
        </form>
    </div>
    <div class="result-container">
        <h1>Resultas :</h1>
        <?php 
        if(isset($_POST['critiere']) && isset($_POST['search-term'])){

            include "rechercheLivre_action.php";
            
            if(count(rechercheLivre()) == 0) {
                echo "<div class='ifNoResult'>Livre cherché n'exist pas dans la base !</div>";
            } else {
                echo "<div class='result'>
                        <table class='etuTable'>
                            <thead>
                                <tr>
                                    <th>Code Livre</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Date Edition</th>
                                </tr>
                            </thead>
                            <tbody>
                
                ";
                $result = rechercheLivre();
                foreach($result as $livre){
                    $code = $livre['codeLivre'];
                    $titre = $livre['titre'];
                    $auteur = $livre['auteur'];
                    $dateEdition = $livre['dateEdition'];
                    echo "<tr><td>$code</td><td>$titre</td><td>$auteur</td><td>$dateEdition</td></tr>";
                }
                echo "</tbody></table></div>";
            }
        }  
            ?>
    </div>
</div>