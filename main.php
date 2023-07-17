<?php
error_reporting(E_ALL & ~E_WARNING);

require_once './Models/TableModel.php';
require_once './Views/TableView.php';
require_once './Controllers/TableController.php';

// Input data
$arr = [
    [
        'Name' => 'Jon Snow',
        'Age' => 23,
        'IsAlive' => true,
        'Titles' => ['Lord Commander', 'King in the North'],
        'Parents' => [
            'Father' => 'Eddard Stark',
            'Mother' => 'Lyanna Stark',
        ],
    ],
    [
        'Name' => 'Daenerys Targaryen',
        'Age' => 29,
        'IsAlive' => true,
        'Titles' => ['Mother of Dragons', 'Breaker of Chains'],
        'Parents' => [
            'Father' => '',
            'Mother' => 'Queen Rhaella Targaryen',
        ],
    ],
];


try
{
    $model = new TableModel($arr);
    $view = new TableView();
    $controller = new TableController($model, $view);
}
catch (Throwable $e)
{
    echo "An error occured: " . $e->getMessage();
    exit();
}

$controller->displayTable();
?>