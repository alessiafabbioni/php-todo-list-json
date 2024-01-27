<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$todo = ["lavare i piatti", "finire esercizio boolean", "portare fuori il cane", "andare in palestra", "pulire il bagno", "fare lavatrice"];

echo json_encode($todo);

?>
