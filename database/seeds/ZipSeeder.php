<?php

use App\Imports\ZipCodeImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ZipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ZipCodeImport, base_path() . '/uszips.csv');
    }
}
