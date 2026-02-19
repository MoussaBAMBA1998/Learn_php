<?php
$creneaux = [];

while (true) {
    $debut = readline('L\'heure d\'ouverture :');
    $fin = readline('L\'huere de fermeture :');
    if ($debut >= $fin) {
        echo "Le creneau ne peut pas etre enregistrer, car l'heure de debut $debut est superieur ou egale a l'heur de fin $fin ";
    }else {
        $creneaux[] = [$debut, $fin];
        $action = readline('Entrez un nouveau creneau (n)? : ');
        if ($action === 'n') {
            break;
        }
    }
}

echo 'Le magasin est ouvert de ';
foreach($creneaux as $k => $creneau) {
    if ($k > 0) {
        echo ' et de ';
    }
    echo "{$creneau[0]}h a {$creneau[1]}";
}


// var_dump($creneaux);
/*
My own !
(int)$i = 0;
(int)$j = 1;

foreach($creneaux as $creneau) {
    echo"Le magasin est ouvert de $creneau[$i] a $creneau[$j] ";
    $i += 2;
    $j += 2;
} */
/* $heure = (int)readline("A qu'elle heure voulez vous visitez le magasin ? :");
$creneauTrouve = false;

foreach($creneaux as $creneau) {
    if ($heure >= $creneau[0] && $heure <= $creneau[1]){
        $creneauTrouve = true;
    }
}

if ($creneauTrouve) {
    echo 'Le magasin sera ouvert';
}else {
    echo'Desole, le magasin sera ferme :';
}

print_r($creneau);
 */



/* $notes = [];
$input = null;
while($input !== 'fin') {
    $input = readline("Entrer une note ou taper fin pour afficher le tableau :");
    if ($input !== 'fin'){
        $notes[] = (int)$input;
    }
}
foreach($notes as $note) {
    echo "- $note \n";
} */



/* La classe CM2 :
- Jean
- Mark
 
La classe CM1:
- Emilie */