<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarkersImport implements ToCollection, WithHeadingRow
{
    protected $markers = [];
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $this->markers[] = [
                'name' =>  $row['name'],
                'lat' =>  $row['lat'],
                'long' =>  $row['long'],
            ];
        }
    }

    public function getMarkers()
    {
        return $this->markers;
    }
}
