<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'registration_number' => 'HPI-24D',
            'brand' => 'Bajaj',
            'model' => 'Discover',
            'type' => 'moto',
            'fuel_type' => 'gasolina',
            'doors' => 0,
            'year' => 2016,
            'is_active' => true,
        ]);

        Vehicle::create([
            'registration_number' => 'INL-298',
            'brand' => 'Renault',
            'model' => 'Logan',
            'type' => 'sedan',
            'fuel_type' => 'gasolina',
            'doors' => 5,
            'year' => 2015,
            'is_active' => false,
        ]);

        Vehicle::create([
            'registration_number' => 'GCQ-251',
            'brand' => 'Marco Polo',
            'model' => 'NHR',
            'type' => 'turbo',
            'fuel_type' => 'diesel',
            'doors' => 3,
            'year' => 2009,
            'is_active' => true,
        ]);

    }
}
