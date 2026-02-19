<?php
require_once 'functions.php'; 
// Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// Radio
$cornets = [
    'Pot' => 2,
    'cornet' => 3
];
// Checkbox
$supplements = [
    'Pepites de chocolat' => 1,
    'Chantily' => 0.5
];
$title = "Composer votre glace";
$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement', 'cornet'] as $name) {
    if (isset($_GET['$name'])) {
        $liste = $name . 's';
        $choix = $_GET[$name];
        if (is_array($choix)) {
            foreach($choix as $value){
                if(isset($$liste[$value])) {
                    $ingredients[] = $value;
                    $total += $liste[$value];
        }else {
            if(isset($$liste[$value])) {
                $ingredients[] = $value;
                $total += $$liste[$value];
        }
        }
        }            
    }
}
}

require 'elements/header.php'; 
?>

<h1>COMPOSER VOTRE GLACE</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre Glace</h5>
                <ul>
                    <?php foreach($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ;?>
                </ul>
                <p>
                    <strong>Prix : </strong> <?=$total ?> €
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="/jeu.php" method="GET">
    <h2>Choississez vos parfuns</h2>
    <?php foreach($parfums as $parfum => $prix): ?>
        <div class="checkbox">
            <label>
                <?= checkbox('parfum', $parfum, $_GET)?>
                <?= $parfum ?> - <?= $prix ?> €
            </label>
        </div>
        <?php endforeach; ?>

        <h2>Choississez votre cornet</h2>
    <?php foreach($cornets as $cornet => $prix): ?>
        <div class="checkbox">
            <label>
                <?= radio('cornet', $cornet, $_GET)?>
                <?= $cornet ?> - <?= $prix ?> €
            </label>
        </div>
        <?php endforeach; ?>    

            <h2>Choississez vos supplements</h2>
        <?php foreach($supplements as $supplement => $prix): ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('supplement', $supplement, $_GET) ?>
                    <?= $supplement ?> - <?= $prix ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Composer ma glace</button>
</form>
    </div>
</div>

<h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre>

<?php require 'elements/footer.php'; ?>