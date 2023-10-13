<?php

namespace App\Repo;
use App\Models\Vehiculo;

class VehiculoRepo {
    public function listarCombo() {
        return Vehiculo::all();
    }
}