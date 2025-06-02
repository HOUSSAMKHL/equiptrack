<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Effectuer;

class UpdateOperationStatuses extends Command
{
    protected $signature = 'operations:update-statuses';
    protected $description = 'Update operation statuses based on their dates';

    public function handle()
    {
        Effectuer::updateStatuses();
        $this->info('Operation statuses updated successfully.');
    }
}