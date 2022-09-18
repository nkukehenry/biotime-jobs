<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OffenceReport;;

class OffenceReportSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        OffenceReport::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
    }
}