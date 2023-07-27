<?php
class TableController
{
    private $model;
    private $view;

    public function __construct(TableModel $model, TableView $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    # Retrieving table from TableModel and outputing it in TableView
    public function displayTable()
    {
        $table = $this->model->getTable();
        $this->view->render($table);
    }
}