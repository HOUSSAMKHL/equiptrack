<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rapport;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class RapportSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('seeders/data/rapports.xlsx');

        if (!File::exists($filePath)) {
            $this->command->warn("Excel file not found at: $filePath");
            return;
        }

        $this->command->info("Loading Excel file: $filePath");

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        // Extract headers
        $headers = [];
        foreach ($worksheet->getRowIterator(1, 1)->current()->getCellIterator() as $cell) {
            $headers[] = trim($cell->getValue());
        }

        $this->command->info("Headers found: " . implode(", ", $headers));

        $rows = [];

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];
            $isEmptyRow = true;

            foreach ($headers as $col => $header) {
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1);
                $cell = $worksheet->getCell($columnLetter . $row);
                $value = $cell->getValue();

                // Format dates if necessary
                if ($header === 'date_de_generation' && !empty($value)) {
                    $value = Carbon::parse($value);
                }

                $rowData[$header] = $value;

                if (!empty($value)) {
                    $isEmptyRow = false;
                }
            }

            if ($isEmptyRow) {
                $this->command->warn("Row $row is empty, skipping...");
                continue;
            }

            if (empty($rowData['titre'])) {
                $this->command->warn("Row $row skipped: 'titre' is missing.");
                continue;
            }

            $rows[] = $rowData;
        }

        if (empty($rows)) {
            $this->command->warn("No valid data found.");
            return;
        }

        foreach ($rows as $rapport) {
            Rapport::create($rapport);
        }

        $this->command->info(count($rows) . " rapports inserted successfully.");
    }
}