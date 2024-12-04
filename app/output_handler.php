<?php
class OutputHandler {
    public static function toCSV($data, $filename) {
        $file = fopen($filename, 'w');
        fputcsv($file, array_keys($data[0]));
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }
}
