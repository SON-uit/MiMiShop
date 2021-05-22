<?php

namespace App\Imports;

use App\Models\type_product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
class typeproductImport implements ToModel,withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new type_product([
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row ['images'],
            'original' => $row['original'],
            'slug' => $row['slug']
        ]);
    }
}
