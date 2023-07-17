<?php
require_once './Models/TableModel.php';
require_once './Views/TableView.php';
require_once './Controllers/TableController.php';

// Input data
$arr = [
    [
        123 => 'Baratheon',
        'Sigil' => 'A crowned stag',
        456 => 'Ours is the Fury',
        'Words' => 'Ours is the Fury',
        'Location' => 'Storm\'s End',
    ],
    [
        'Leader' => 'Eddard Stark',
        '' => 'Stark',
        'Motto' => 'Winter is Coming',
        'Sigil' => 'A gray direwolf',
        'Words' => '',
        'Location' => 12335,
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