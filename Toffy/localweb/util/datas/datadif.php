<?php

$dateStart = new \DateTime('2020-04-22 00:00:00');
$dateNow   = new \DateTime(date('Y-m-d H:i:s'));

$dateDiff = $dateStart->diff($dateNow);
echo $dateDiff->y . ' Anos ' . $dateDiff->m . ' meses ' . $dateDiff->d . ' dias '. $dateDiff->h . ' horas '. $dateDiff->i . ' minutos '. $dateDiff->s . ' segundos <br>';
echo $dateDiff->format('%a days');
?>