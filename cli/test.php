<?php
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
$resource = fopen($fichier, 'r+');
$k = 0;
while ($line = fgets($resource)) {
    $k++;
    if ($k == 1) {
        fwrite($resource, "Hello dear public");
        break;
    }
}
fclose($resource);


/* $size = @file_put_contents($fichier, ' marc comment ca va ?');
if ($size === false) {
    echo 'Impossible d\'ecrire dans le fichier';
} else {
    echo 'Ecriture reussie';
} */