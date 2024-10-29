<?php

namespace App\Service;

class HomeownerParser
{
    public function parseCsv($filename): array
    {
        $people = [];
        if (($handle = fopen($filename, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                foreach ($data as $row) {
                    $people = array_merge($people, $this->parsePersonString($row));
                }
            }
            fclose($handle);
        }
        return $people;
    }

    private function parsePersonString($name_str): array
    {
        $title_pattern = "/(Mr|Mrs|Ms|Miss|Dr|Prof|Sir|Lady)\.?/";
        $name_str = preg_replace("/\s+/", " ", trim($name_str));
        $people = [];

        $name_parts = preg_split("/\b(?:and|&)\b/i", $name_str);

        foreach ($name_parts as $part) {
            if (preg_match($title_pattern, $part, $title_match)) {
                $title = $title_match[0];
                $remaining_name = trim(str_replace($title, "", $part));

                if (preg_match("/^([A-Z][a-z]*)\s+([A-Z]\.?)?\s*([A-Z][a-z]*)?$/", $remaining_name, $matches)) {
                    $first_name = isset($matches[1]) && strlen($matches[1]) > 1 ? $matches[1] : null;
                    $initial = isset($matches[2]) && strlen($matches[2]) == 1 ? $matches[2] : null;
                    $last_name = $matches[count($matches) - 1];
                } elseif (preg_match("/^([A-Z]\.?)?\s*([A-Z][a-z]*)$/", $remaining_name, $matches)) {
                    $first_name = null;
                    $initial = $matches[1] ?? null;
                    $last_name = $matches[2];
                } else {
                    continue;
                }

                $people[] = [
                    'title' => $title,
                    'first_name' => $first_name,
                    'initial' => $initial,
                    'last_name' => $last_name
                ];
            }
        }

        return $people;
    }
}
