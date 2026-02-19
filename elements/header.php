<?php  
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <title><?php if (isset($title)): ?>
        <?php echo $title;?>
        <?php else: ?>
            Mon site
        <?php endif ?> 
    </title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Mon site</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?= nav_menu(); ?>

                <!--  -->
            </ul>
        </div>
    </nav>