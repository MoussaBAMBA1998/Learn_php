<?php
$insultes = ['merde', 'con'];
$phrase = readline('Entrez une phrase : ');

foreach($insultes as $insulte) {
    $phrase = str_replace($insulte, '***', $phrase);
}

echo $phrase;

/* $notes = [10, 20, 13];
$sum = array_sum($notes);
$count = count($notes);
echo "Vous avez " . round($sum / $count,2) . " de moyenne";
 */

// var_dump(count($b));

/* $mot = strtolower(readline('entrez le mot a renverse :'));
if (is_string($mot)) {
    $motR = strrev($mot);
    if ($motR === $mot) {
        echo $motR . ' est un palindrome';
    }else{
        echo $motR . ' n\'est pas un palindrome';
    }
}else{
    echo'Veillez entrez une chaine de caractere' . $motR;
} */


/* $mot = strtolower(readline('Veillez entrer un mot :'));
$reverse = strrev($mot);
if ($mot === $reverse) {
    echo 'ce mot est un palinfrome';
}else {
    echo 'Ce mot n\'est pas un palindrome';
} */