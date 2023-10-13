<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     public $fillable=['rut','nombre','apellido'];

        Cliente::factory()->create(['rut'=>'1-2','nombre'=>'john','apellido'=>'doe']);
        Cliente::factory()->create(['rut'=>'2-3','nombre'=>'anna','apellido'=>'smith']);
    }
}
