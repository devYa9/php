<div class="container">
    <div class="search-container">
        <h1>Recherche :</h1>
        <form class="search" method="post" action="">
            <div>Critiére:</div>
            <select name="critiere" id="">
                <option value="codeEtudiant">Code</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="adresse">Adresse</option>
                <option value="classe">Classe</option>
            </select>
            <input type="text" class="in" name="search-term" placeholder="Saisir Valeur..." required>
            <button type="submit">Recherche</button>
        </form>
    </div>
    <div class="result-container">
        <h1>Resultas :</h1>
        <?php 
        if(isset($_POST['critiere']) && isset($_POST['search-term'])){

            include "rechercheEtudiant_action.php";
            
            if(count(rechercheEtudiant()) == 0) {
                echo "<div class='ifNoResult'>L'etudiant cherché n'exist pas dans la base !</div>";
            } else {
                echo "<div class='result'>
                        <table class='etuTable'>
                            <thead>
                                <tr>
                                    <th>Code Etudiant</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Classe</th>
                                </tr>
                            </thead>
                            <tbody>
                
                ";
                $result = rechercheEtudiant();
                foreach($result as $etudiant){
                    $code = $etudiant['codeEtudiant'];
                    $nom = $etudiant['nom'];
                    $prenom = $etudiant['prenom'];
                    $adresse = $etudiant['adresse'];
                    $classe = $etudiant['classe'];
                    echo "<tr><td>$code</td><td>$nom</td><td>$prenom</td><td>$adresse</td><td>$classe</td></tr>";
                }
                echo "</tbody></table></div>";
            }
        }  
            ?>
    </div>
</div>