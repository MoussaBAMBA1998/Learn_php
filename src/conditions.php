<?php
$heure = readline('Entrez l\'heure GMT');

if((9 >= $heure && 12 <= $heure ) || (14 <= $heure && 17 >= $heure)){
    echo'Le magasin sera ouvert';
}else {
    echo'Le magasin sera fermee';
} 