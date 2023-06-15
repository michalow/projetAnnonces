<h2>Articles récents</h2>
            <ul>
<?php

$annonces=getAnnonces();
var_dump($annonces);
            $index = 0 ;
            foreach($annonces as $annonce)
            {
                ?>
                <li><a href="index.php?p=annonces&id=<?= $index ?>"><?= $annonce ?></a></li>
                <?php
                $index++ ;
            }
    ?>
            </ul>