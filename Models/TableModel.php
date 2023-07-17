<?php
class TableModel
{
    private $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // Generating and returning the ASCII table
    public function getTable()
    {
        $keys = $this->getSortedKeys();
        $rows = $this->getRows($keys);
        $table = $this->buildTable($keys, $rows);
        return $table;
    }

    /*
    * Retrieves all the unique keys from the input data,
    * sorts them alphabetically and returns
    */
    private function getSortedKeys()
    {
        $allKeys = [];
        foreach ($this->data as $row) {
            $allKeys = array_merge($allKeys, array_keys($row));
        }
        // delete non-unique keys
        $uniqueKeys = array_unique($allKeys);
        sort($uniqueKeys);
        return $uniqueKeys;
    }

    /*
    * Generates the rows for the ASCII table
    * by selecting the values depending on provided keys
    */
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
            $headerRow .= ' ' . str_pad((string)$key, $columnWidths[$key], ' ', STR_PAD_LEFT) . ' |';
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
                // Retrieves the value corresponding to the current key in the $row array. 
                // If the value is not set, it assigns an empty string to $value.
                $value = is_array($value) ? implode(', ', $value) : (string)$value;
                // Checks if the value is an array. If it is, it uses implode() to convert the array elements into a string representation with a comma and space separator.
                $dataRow .= ' ' . str_pad($value, $columnWidths[$key], ' ', STR_PAD_LEFT) . ' |';
            }
            $table .= $dataRow . PHP_EOL;
        }
    
        $table .= $this->addHorizontalLine($columnWidths);
    
        return $table;
    }
    

    /*
    * Build the horizontal line for the table
    */
    private function addHorizontalLine($columnWidths)
    {	
        $table = '';

        /* 
        * Iterates over the column width and adds appropriate
        * number of dashes 
        */
        foreach ($columnWidths as 	$width) {
            $table .= '+' . str_repeat('-', $width + 2);
        }
        $table .= '+' . PHP_EOL;

        return $table;
    }

    /*
    * Calculates the maximum width required for each column
    *  
    */
    private function calculateColumnWidths($keys, $rows)
    {
        $columnWidths = [];
        foreach ($keys as $key) {
            $columnWidths[$key] = strlen($key);
        }
    
        foreach ($rows as $row) {
            foreach ($keys as $key) {
                $value = isset($row[$key]) ? $row[$key] : '';
                if (is_array($value)) {
                    // If the value is an array, convert it to a string representation
                    $value = implode(', ', $value);
                }
                $columnWidths[$key] = max($columnWidths[$key], strlen($value));
            }
        }
    
        return $columnWidths;
    }    
}

?>