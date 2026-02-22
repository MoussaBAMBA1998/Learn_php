<?php
require_once 'functions/compteur.php';
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : (int)$_GET['mois'];
if($annee_selection && $mois_selection) {
    $total = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_detail_mois($annee_selection, $mois_selection);
}else{
    $total = nombre_vues();
}
var_dump($detail);
$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre',
];
require 'elements/header.php';
?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for($i=0; $i<5; $i++):?>
            <a class="list-group-item" <?= $annee - $i === $annee_selection ? 'active' : ' ' ;?> href="dashboard.php?annee=<?= $annee - $i?>"> Annee <?= $annee - $i?></a>
                <?php if($annee - $i === $annee_selection): ?>
            <div class="list-group">
                <?php foreach($mois as $numero => $nom): ?>
                        <a class="list-group-item" <?= $numero === $mois_selection ? 'active' : '' ?> href="dashboard.php?annee=<?= $annee_selection?>&mois=<?= $numero ?>"> <?= $nom ?> </a>
                <?php endforeach; ?>
            </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size: 3em;"><?= $total ?></strong>
                Visite<?= ($total > 1) ? 's' : ' ' ?> total
            </div>
        </div>
        <?php if(isset($detail)): ?>
            <h2>Details des visites pour le mois</h2>
            <table>
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Mois</th>
                        <th>Annee</th>
                        <th>Nombre de visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail as $ligne): ?>
                    <tr>
                        <td><?= $ligne['annee'] ?></td>
                        <td><?= $ligne['mois'] ?></td>
                        <td><?= $ligne['jour'] ?></td>
                        <td><?= $ligne['visites'] ?> visite <?= $ligne['visites'] > 1 ? 's'  : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php require 'elements/footer.php';?>