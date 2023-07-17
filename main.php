<?php
require_once 'TableModel.php';
require_once 'TableView.php';
require_once 'TableController.php';

// Sample array
$arr = [
    [
        'House' => 'Baratheon',
        'Sigil' => 'A crowned stag',
        'Motto' => 'Ours is the Fury',
        'Words' => 'Ours is the Fury',
        'Location' => 'Storm\'s End',
    ],
    [
        'Leader' => 'Eddard Stark',
        'House' => 'Stark',
        'Motto' => 'Winter is Coming',
        'Sigil' => 'A gray direwolf',
        'Words' => 'Winter is Coming',
        'Location' => 'Winterfell',
    ],
    [
        'House' => 'Lannister',
        'Leader' => 'Tywin Lannister',
        'Sigil' => 'A golden lion',
        'Words' => 'Hear Me Roar!',
        'Location' => 'Casterly Rock',
    ],
    [
        'Q' => 'Z',
    ],
];


$model = new TableModel($arr);
$view = new TableView();
$controller = new TableController($model, $view);

$controller->displayTable();
?>