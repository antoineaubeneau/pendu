<?php

$mot = Motdebase();
$cache = Motcache($mot);
$tentatives = 0;
$LettreEssai = "";

function Motdebase()
{
    $mots = ["fauteuil", "table"];
    return $mots[1];
}

function Motcache($mot)
{
    return str_repeat("_", strlen($mot));
}

while ($tentatives < 5 && $cache !== $mot) {
    echo "Devine : " . $cache . "\n";
    echo "Essai :" . $LettreEssai . "\n";
    echo "Il te reste  " . (5 - $tentatives) .  " tentatives \n";

    $lettre = "";
    while (strlen($lettre) !== 1 || strpos($LettreEssai, $lettre) !== false) { //strlen différente de 1, pas d'entrée de caractère, et strpos verifie si la lettre est déja presente
        echo "Entrez une lettre : ";
        $input = readline();
        if (strlen($input) === 1 && strpos($LettreEssai, $input) === false) {
            $lettre = $input;
        }
    }

    $LettreEssai .= $lettre; // affecte la valeur $lettre à la variable $lettreessai

    if (strpos($mot, $lettre) === false) {
        $tentatives++;
    } else {
        for ($i = 0; $i < strlen($mot); $i++) {
            if ($mot[$i] === $lettre) {
                $cache[$i] = $lettre;
            }
        }
    }
}

if ($tentatives < 5) {
    echo "Vous avez trouvé le mot : " . $mot . "\n";
} else {
    echo "Vous n'avez pas trouvé le mot : " . $mot . "\n";
}
