<?php

//Cryptos et leur variation moyenne en 24 depuis N jours

$periode = $_REQUEST['periode'];

$pdo = new PDO("sqlite:cryptos.db");
$stm = $pdo->query("SELECT  cr.symbole, AVG(c.pct_variation_24_h) pct_variation_24_h
FROM    crypto cr
        JOIN cours c on cr.id = c.crypto_id
WHERE   c.datetime_cours>=DATE('now', '-$periode days')
GROUP BY c.crypto_id");

$liste = $stm->fetchAll();

echo json_encode($liste);

