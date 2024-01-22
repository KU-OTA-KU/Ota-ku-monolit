<?php
$query = $_GET['q'];
$results = [
    ['name' => 'Anime 1', 'content' => 'Description for Anime 1'],
    ['name' => 'Anime 2', 'content' => $query],
];

header('Content-Type: application/json');
echo json_encode($results);
