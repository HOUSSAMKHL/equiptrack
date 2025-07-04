<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('seeders/data/utilisateurs.xlsx');
        
        if (!File::exists($filePath)) {
            $this->command->warn("Excel file not found at: $filePath");
            return;
        }

        $this->command->info("Loading Excel file: $filePath");

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row and column
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        // Get headers from first row
        $headers = [];
        $headerRow = $worksheet->getRowIterator(1, 1)->current();
        $cellIterator = $headerRow->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        
        foreach ($cellIterator as $cell) {
            $headers[] = trim($cell->getValue());
        }
        
        $this->command->info("Headers found: " . implode(", ", $headers));

        $rows = [];
        
        // Start from row 2 to skip headers
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];
            $isEmptyRow = true;
            
            foreach ($headers as $col => $headerName) {
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1);
                $cell = $worksheet->getCell($columnLetter . $row);
                $cellValue = $cell->getValue();
                
                // Convert empty strings to null for nullable fields
                if (in_array($headerName, ['id_complexe', 'id_etablissement', 'id_DR'])) {
                    $cellValue = $cellValue === '' ? null : $cellValue;
                }
                
                $rowData[$headerName] = $cellValue;
                
                if ($cellValue !== null && $cellValue !== '') {
                    $isEmptyRow = false;
                }
            }
            
            if ($isEmptyRow) {
                $this->command->warn("Row $row is empty, skipping...");
                continue;
            }
            
            if (empty($rowData['nom_user'])) {
                $this->command->warn("Row $row skipped: 'nom_user' is missing or empty.");
                continue;
            }

            // Hash password
            $rowData['password'] = !empty($rowData['password']) 
                ? Hash::make($rowData['password']) 
                : Hash::make('password123');

            $rows[] = $rowData;
        }

        if (empty($rows)) {
            $this->command->warn("No valid data found in Excel.");
            return;
        }

        DB::table('utilisateurs')->insert($rows);
        $this->command->info(count($rows) . " utilisateurs inserted successfully.");
    }
}