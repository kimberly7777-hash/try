<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $file = base_path('data/tbl_locations.csv');
    
    if (!file_exists($file)) {
        echo "CSV file not found at: " . $file;
        return;
    }

    $csv = array_map('str_getcsv', file($file));
    array_shift($csv); // remove header row
   
      
    foreach ($csv as $row) {
        DB::table('tbl_locations')->insert([
            'region'   => $row[1],
            'district' => $row[2],
            'ward'     => $row[3],
            'street'   => $row[4],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }  
    }
    echo "Locations imported successfully.";
}
