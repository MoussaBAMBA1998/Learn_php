<?php 
session_start();
$title = 'Nous contacter';
require_once 'data/config.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = ($ouvert) ? 'green': 'red';
//$creneaux = creneaux_html(CRENEAUX);
require 'elements/header.php'; 
?>

<div class="row">
    <div class="col-md-8">
        <h2>Debug</h2>
        <pre>
            <?php var_dump($_SESSION); ?>
        </pre>
        <h2>Nous Contacter</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis numquam tenetur suscipit, voluptates nam ullam doloremque autem, quas error, quia est? Rem provident nostrum est corporis eum magnam similique vero?</p>
    </div>
    <div class="col-md-4">
        <?php if($ouvert): ?>
        <h2>Horaires d'ouvertures</h2>
        
        <div class="alert alert-success">
            Le magasin sera ouvert
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            Le magasin sera Fermé
        </div>
        <?php endif ?>
        <form action="" method="GET">
            <div class="form-control">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>" >
            </div>
            <button class="btn btn-pramary" type="submit">Voir si le magasin est ouvert</button>
        </form>

        
        <?= date('l d F Y'); ?>
        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li><?php if($k + 1 === (int)date('N')): ?> style="color:<?=$color;?>"<?php endif ?>
                    <strong><?= $jour ?></strong>
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require 'elements/footer.php'; ?>