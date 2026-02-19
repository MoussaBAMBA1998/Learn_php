<?php  

$age = null;

if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_POST['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require 'elements/header.php';
?>

<?php if ($age && $age >= 18 ):?>
    <h2>Contenu reserve aux adults</h2>

<?php elseif($age !== null): ?>
    <div class="alert alert-danger"> Vous n'avez pas l'age requis pour voir le contenu</div>
<?php else: ?>
<form action="" method="post">
    <div class="form-group">
        <label for="birthday">Section reserve pour les adultes, Entrez votre anneede naissance</label>
        <select name="birthday" id="birthday" class="form-control">
            <?php for($i = 2010; $i > 1919; $i--): ?>
                <option value="<?= $i ?>" <?= $i ?>></option>
                <?php endfor ?>
        </select>
    </div>
    <button type="submit">Envoyer</button>

</form>
<?php endif; ?>

<?php require 'elements/footer.php'; ?>