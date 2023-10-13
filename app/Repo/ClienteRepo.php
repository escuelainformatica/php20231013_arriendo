<?php

namespace App\Repo;
use App\Models\Cliente;

class ClienteRepo {
    public function listarCombo() {
        return Cliente::all();
    }
}