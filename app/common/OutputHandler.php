<?php

namespace common;
class OutputHandler
{
    private static array $backwardCompatibility = [',', '"', "\\"];

    public static function writeCsv(array $data, string $filename): void
    {
        $file = fopen($filename, 'w');
        fputcsv($file, OutputHandler::generateHeaders($data[0]), ',', '"', "\\");
        foreach ($data as $row) {
            fputcsv($file, $row, ',', '"', "\\");
        }
        fclose($file);
    }

    public static function outputCsv(array $data, string $filename): void
    {
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment;filename=$filename");
        $file = fopen('php://output', 'w');
        if (!empty($data)) {
            fputcsv($file, OutputHandler::generateHeaders($data), ...OutputHandler::$backwardCompatibility);
        }
        foreach ($data as $row) {
            fputcsv($file, $row, ...OutputHandler::$backwardCompatibility);
        }
        fclose($file);
    }

    public static function extractKeysFromNestedArray(array $data, $prefix = ''): array {
        $keys = [];

        foreach ($data as $key => $val) {
            $currentKey = $prefix ? "{$prefix}_{$key}" : $key;
            if (is_array($val)) {
                $keys = array_merge($keys, OutputHandler::extractKeysFromNestedArray($val, $currentKey));
            } else {
                $keys[$currentKey] = true; // Use value as true to ensure uniqueness later
            }
        }

        return $keys;
    }

    public static function generateHeaders(array $data): array {
        $flatKeysMap = [];
        foreach ($data as $item) {
            $flatKeysMap = array_merge($flatKeysMap, OutputHandler::extractKeysFromNestedArray($item));
        }
        return array_keys($flatKeysMap);
    }
}
