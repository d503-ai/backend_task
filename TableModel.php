<?php
class TableModel
{
    private $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /*
    * Building table
    */
    public function getTable()
    {
        $keys = $this->getSortedKeys();
        $rows = $this->getRows($keys);
        $table = $this->buildTable($keys, $rows);
        return $table;
    }

    private function getSortedKeys()
    {
        $allKeys = [];
        foreach ($this->data as $row) {
            $allKeys = array_merge($allKeys, array_keys($row));
        }
        $uniqueKeys = array_unique($allKeys);
        sort($uniqueKeys);
        return $uniqueKeys;
    }

    private function getRows($keys)
    {
        $rows = [];
        foreach ($this->data as $row) {
            $rowData = [];
            foreach ($keys as $key) {
                $rowData[$key] = isset($row[$key]) ? $row[$key] : '';
            }
            $rows[] = $rowData;
        }
        return $rows;
    }

private function buildTable($keys, $rows)
{
    $columnWidths = $this->calculateColumnWidths($keys, $rows);

    $table = $this->addHorizontalLine($columnWidths);
    
    // Build the header row
    $headerRow = '|';
    foreach ($keys as $key) {
        $headerRow .= ' ' . str_pad($key, $columnWidths[$key], ' ', STR_PAD_LEFT) . ' |';
    }
    $table .= $headerRow . PHP_EOL;

    // Build the separator row
    $separatorRow = '|';
    foreach ($keys as $key) {
        $separatorRow .= str_repeat('-', $columnWidths[$key] + 2) . '|';
    }
    $table .= $separatorRow . PHP_EOL;

    // Build the data rows
    foreach ($rows as $row) {
        $dataRow = '|';
        foreach ($keys as $key) {
            $value = isset($row[$key]) ? $row[$key] : '';
            $dataRow .= ' ' . str_pad($value, $columnWidths[$key], ' ', STR_PAD_LEFT) . ' |';
        }
        $table .= $dataRow . PHP_EOL;
    }

    $table .= $this->addHorizontalLine($columnWidths);

    return $table;
}

private function addHorizontalLine($columnWidths)
{	
    $table = '';

    // Build the horizontal line
    foreach ($columnWidths as 	$width) {
        $table .= '+' . str_repeat('-', $width + 2);
    }
    $table .= '+' . PHP_EOL;

    return $table;
}

    private function calculateColumnWidths($keys, $rows)
    {
        $columnWidths = [];
        foreach ($keys as $key) {
            $columnWidths[$key] = strlen($key);
        }

        foreach ($rows as $row) {
            foreach ($keys as $key) {
                $value = isset($row[$key]) ? $row[$key] : '';
                $columnWidths[$key] = max($columnWidths[$key], strlen($value));
            }
        }

        return $columnWidths;
    }
}

?>