<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;

class AnomalieSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('seeders/data/anomalies.xlsx');
        
        if (!File::exists($filePath)) {
            $this->command->warn("Excel file not found at: $filePath");
            return;
        }

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        $headers = [];
        $headerRow = $worksheet->getRowIterator(1, 1)->current();
        $cellIterator = $headerRow->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        
        foreach ($cellIterator as $cell) {
            $headers[] = trim($cell->getValue());
        }

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
                continue;
            }
            
            if (empty($rowData['cause_anomalie'])) {
                continue;
            }

            // Convert boolean values
            $rowData['anomalie_resolue'] = filter_var($rowData['anomalie_resolue'], FILTER_VALIDATE_BOOLEAN);

            $rows[] = $rowData;
        }

        DB::table('anomalies')->insert($rows);
        $this->command->info(count($rows) . " anomalies inserted successfully.");
    }
}