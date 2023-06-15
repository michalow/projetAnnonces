<a href="?p=home" class="title">Petites annonces</a>
    <nav>
        <ul>
            <li><a href="?p=home" class="">Home</a></li>
            <!-- <li><a href="?p=annonce" class="">Annonces</a></li> -->
            <!-- <li><a href="elements"  class="">Elements</a></li> -->
            <li><a href="<?php if($logged) : ?>?p=espace<?php else : ?>?p=signup<?php endif ; ?>" class="">Espace Membre</a></li>
            <li><a href="?p=contact" class="">Contact</a></li>
        </ul>
    </nav>

    <!-- class = "
    \<\? =/* str_contains(FULL_URL, "index") || str_contains(FULL_URL, "home") ? "active" : "" */ ?> " -->