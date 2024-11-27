<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsSeeder extends Seeder
{
    public function run()
    {
        // تاريخ البداية (23/11/2024)
        $startDate = Carbon::create(2024, 11, 23);

        for ($i = 0; $i < 20; $i++) { // تكرار 20 مرات
            DB::table('reports')->insert([
                'date' => $startDate->copy()->addWeeks($i), // زيادة أسبوع لكل إدخال
            ]);
        }
    }
}
