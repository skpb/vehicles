<?php

namespace App\Imports;

use App\Vehicle;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class VehiclesImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vehicle([
            'registration_number' => $row['registration_number'],
            'brand' => $row['brand'],
            'model' => $row['model'],
            'type' => $row['type'],
            'fuel_type' => $row['fuel_type'],
            'year' => (integer) $row['year'],
            'doors' => (integer) $row['doors'],
            'is_active' => ($row['active'] == 'YES') ? 1 : 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'registration_number' => 'unique:vehicles,registration_number|required',
            'brand' => 'required',
        ];
    }
}
