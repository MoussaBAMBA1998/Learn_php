<?php

// declare(strict_types=1);

function repondre_oui_non (?string $phrase = null) {
    while (true) {
        $reponse = readline($phrase . " - (o)ui/(n)on :");
        if ($reponse === "o") {
            return true;
        } elseif ($reponse === 'n') {
            return false;
        }
    }
}


function demander_creneau ($phrase = 'Veillez entrer un creneau') {
    echo $phrase . "\n";
    while(true) {
        $ouverture = (int)readline('Heure d\' ouverture :');
        if ($ouverture >= 0 && $ouverture <= 23) {
            break ;
        }
    }
    while (true) {
        $fermeture = (int)readline('Heure de fermeture : ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
            break;
        }
    }
    return [$ouverture, $fermeture];
}

function demander_creneaux ($phrase = "Veillez entrez vos creneaux"): array {
    $creneaux = [];
    $continuer = true ;
    while ($continuer) {
        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non('Voulez vous continuer ? ');
    }
    return $creneaux;
}

