<?php
// FICHIER: functions/compteur.php

function ajouter_vue(): void {
    // Compteur total (toutes visites)
    $fichier_total = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    
    // Compteur journalier (visites aujourd'hui)
    $fichier_journalier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . date('Y-m-d');
    
    // Incrémenter les deux compteurs
    incrementerCompteur($fichier_total);
    incrementerCompteur($fichier_journalier);
}

// CORRECTION: Ajout du paramètre $fichier
function incrementerCompteur(string $fichier): void {
    $compteur = 1;
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    
    // Écrire la nouvelle valeur
    file_put_contents($fichier, $compteur);
}

// CORRECTION: Permet de lire n'importe quel compteur
function nombre_vues(string $type = 'total'): int {
    if ($type === 'journalier') {
        $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . date('Y-m-d');
    } else {
        $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    }
    
    if (file_exists($fichier)) {
        return (int)file_get_contents($fichier);
    }
    return 0;
}

function nombre_vues_mois(int $annee, int $mois): int{
    $mois = str_pad($mois, 2, 0, STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = (glob($fichier));
    $total = 0;
    foreach($fichiers as $fichier){
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vues_detail_mois(int $annee, int $mois): array {
    $mois = str_pad($mois, 2, 0, STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = (glob($fichier));
    $total = 0;
    foreach($fichiers as $fichier){
        $visites = [];
        $parties = explode('-', basename($fichier));
        $visites = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'Visites' => file_get_contents($fichier)
        ];
    }
    return $visites;
}
?>