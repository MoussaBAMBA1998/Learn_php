<?php
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
}
if (!empty($_COOKIE['utilisateur'])){
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
require 'elements/header.php'; 
?>

<?php if($nom):?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="profil.php?action=deconnecter">Se deconnecter</a>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <div class="form-control">
                <input type="text" name="nom" placeholder="Entrez un nom">
            </div>
            <button class="btn btn-primary">Se connecter</button>
        </div>
    </form>
<?php endif ?>
<?php require 'elements/footer.php'; ?>