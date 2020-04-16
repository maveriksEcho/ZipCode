<?php

namespace App\Imports;

use App\ZipCode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZipCodeImport implements ToCollection, WithHeadingRow, WithChunkReading, ShouldQueue
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            ZipCode::updateOrCreate(['zip' => $row['zip']], [
                'zip' => $row['zip'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'city' => $row['city'],
                'state_id' => $row['state_id'],
                'state_name' => $row['state_name'],
                'zcta' => $row['zcta'] === 'TRUE',
                'parent_zcta' => $row['parent_zcta'],
                'population' => $row['population'],
                'density' => $row['density'],
                'county_fips' => $row['county_fips'],
                'county_name' => $row['county_name'],
                'county_weights' => json_decode(str_replace("'", '"', $row['county_weights']), true),
                'county_names_all' => explode('|', $row['county_names_all']),
                'county_fips_all' => explode('|',$row['county_fips_all']),
                'imprecise' => $row['imprecise'] === 'TRUE',
                'military' => $row['military'] === 'TRUE',
                'timezone' => $row['timezone'],
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 10000;
    }
}
