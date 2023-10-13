<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     public $fillable=['patente','marca','costopordia','enuso'];
        Vehiculo::factory()->create([
            'patente'=>'AA-BB-11',
            'marca'=>'Ford t-150',
            'costopordia'=>'20',
            'enuso'=>0
        ]);
        Vehiculo::factory()->create([
            'patente'=>'AA-BB-22',
            'marca'=>'Suzuki Alto',
            'costopordia'=>'10',
            'enuso'=>0
        ]);
    }
}
