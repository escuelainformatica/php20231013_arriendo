<?php

namespace App\Repo;
use App\Models\Vehiculo;

class VehiculoRepo {
    public function listarCombo() {
        return Vehiculo::where('enuso',0)->get();
    }
}