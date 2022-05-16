<?php
// Pour les liens du menu ! 
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dashboard=';
?>
<div class="sidebar">
            <ul class="f-ul">
                <li class="f-li<?php echo $active == 0 ? ' active' : ''; ?>"><div><img src="img/home.svg" alt=""></div><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ?>"> Acceuil</a></li>
                <li class="drop-li">
                    <div class="li-title"  onclick="showList(this)"><div class="x"><img src="img/student-fill.svg" class="menu-icon-main" alt=""> Gestion Etudiant</div><img class="menu-icon" src="img/plus.svg" alt=""></div>
                    <ul class="f-ul noactive" style="<?php echo ($active > 0 && $active < 6) ? 'height:270px;' : ''; ?>">
                        <li class="f-li<?php echo $active == 1 ? ' active' : ''; ?>"><div><img src="img/plus.svg" alt=""></div><a href="<?php echo $url.'newEtu' ?>"> Nouveau Etudiant</a></li>
                        <li class="f-li<?php echo $active == 2 ? ' active' : ''; ?>"><div><img src="img/trash.svg" alt=""></div><a href="<?php echo $url.'supEtu' ?>"> Suppression Etudiant</a></li>
                        <li class="f-li<?php echo $active == 3 ? ' active' : ''; ?>"><div><img src="img/edit.svg" alt=""></div><a href="<?php echo $url.'modEtu' ?>"> Modification Etudiant</a></li>
                        <li class="f-li<?php echo $active == 4 ? ' active' : ''; ?>"><div><img src="img/search-1.svg" alt=""></div><a href="<?php echo $url.'rechEtu' ?>"> Recherche Etudiant</a></li>
                        <li class="f-li<?php echo $active == 5 ? ' active' : ''; ?>"><div><img src="img/list.svg" alt=""></div><a href="<?php echo $url.'listEtu' ?>"> Liste Etudiant</a></li>
                    </ul>
                </li>
                <li class="drop-li">
                    <div class="li-title" onclick="showList(this)"><div class="x"><img src="img/books1.svg" class="menu-icon-main" alt=""> Gestion Livre</div><img class="menu-icon" src="img/plus.svg" alt=""></div>
                    <ul class="f-ul noactive" style="<?php echo ($active > 5 && $active < 11) ? 'height:270px;' : ''; ?>">
                        <li class="f-li<?php echo $active == 6 ? ' active' : ''; ?>"><div><img src="img/book.svg" alt=""></div><a href="<?php echo $url.'newLiv' ?>"> Nouveau Livre</a></li>
                        <li class="f-li<?php echo $active == 7 ? ' active' : ''; ?>"><div><img src="img/trash.svg" alt=""></div><a href="<?php echo $url.'supLiv' ?>"> Suppression Livre</a></li>
                        <li class="f-li<?php echo $active == 8 ? ' active' : ''; ?>"><div><img src="img/edit.svg" alt=""></div><a href="<?php echo $url.'modLiv' ?>"> Modification Livre</a></li>
                        <li class="f-li<?php echo $active == 9 ? ' active' : ''; ?>"><div><img src="img/book-search.svg" alt=""></div><a href="<?php echo $url.'rechLiv' ?>"> Recherche Livre</a></li>
                        <li class="f-li<?php echo $active == 10 ? ' active' : ''; ?>"><div><img src="img/books.svg" alt=""></div><a href="<?php echo $url.'listLiv' ?>"> Liste Livre</a></li>
                    </ul>
                </li>
                <li class="drop-li">
                    <div class="li-title" onclick="showList(this)"><div class="x"><img src="img/printer.svg" class="menu-icon-main" alt=""> Gestion des Emprunts </div><img class="menu-icon" src="img/plus.svg" alt=""></div>
                    <ul class="f-ul noactive">
                        <li class="f-li"><div><img src="img/book.svg" alt=""></div><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ?>"> Emprunter un Livre</a></li>
                        <li class="f-li"><div><img src="img/left-return-arrow.svg" alt=""></div><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ?>"> Retour d'un Livre</a></li>
                        <li class="f-li"><div><img src="img/books.svg" alt=""></div><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ?>"> Liste des Livres</a></li>
                    </ul>
                </li>
            </ul>
        </div>