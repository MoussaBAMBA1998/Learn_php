<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';

// Incrémenter le compteur pour cette visite
ajouter_vue();

// Récupérer les statistiques
$visites_total = nombre_vues('total');
$visites_aujourdhui = nombre_vues('journalier');
?>

<div class="row">
    <div class="col-col-4">
        <p>
            Il y a <?= $visites_total ?> visite<?= $visites_total > 1 ? 's' : '' ?> sur le site
        </p>
        <p>
            Visites aujourd'hui: <?= $visites_aujourdhui ?>
        </p>
    </div>
    <div class="col-col-4">
        <form action="/newsletter.php" method="post">
            <!-- Formulaire newsletter -->
        </form>
    </div>
    <div class="col-col-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?= nav_menu() ?>
        </ul>
    </div>
</div>