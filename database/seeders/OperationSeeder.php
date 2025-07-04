<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;

class OperationSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('seeders/data/operations.xlsx');

        if (!File::exists($filePath)) {
            $this->command->warn("Excel file not found at: $filePath");
            return;
        }

        $this->command->info("Loading Excel file: $filePath");

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        // Get headers from the first row
        $headers = [];
        $headerRow = $worksheet->getRowIterator(1, 1)->current();
        $cellIterator = $headerRow->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        foreach ($cellIterator as $cell) {
            $headers[] = trim($cell->getValue());
        }

        $this->command->info("Headers found: " . implode(", ", $headers));

        $rows = [];

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];
            $isEmptyRow = true;

            foreach ($headers as $col => $headerName) {
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1);
                $cell = $worksheet->getCell($columnLetter . $row);
                $cellValue = $cell->getValue();

                $rowData[$headerName] = $cellValue;

                if ($cellValue !== null && $cellValue !== '') {
                    $isEmptyRow = false;
                }
            }

            if ($isEmptyRow) {
                $this->command->warn("Row $row is empty, skipping...");
                continue;
            }

            if (empty($rowData['nom_operation'])) {
                $this->command->warn("Row $row skipped: 'nom_operation' is missing or empty.");
                continue;
            }

            $rows[] = $rowData;
        }

        if (empty($rows)) {
            $this->command->warn("No valid data found in Excel.");
            return;
        }

        DB::table('operations')->insert($rows);
        $this->command->info(count($rows) . " operations inserted successfully.");
    }
}