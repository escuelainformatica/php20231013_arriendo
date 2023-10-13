<?php

namespace App\Repo;
use App\Models\Arriendo;
use App\Models\Cliente;
use App\Models\Vehiculo;

class ArriendoRepo {
    public function listarTabla() {
        return Arriendo::all();
    }

    public function agregarArriendo(Arriendo $arriendo):Arriendo {
        $arriendo->fecha=date('Y-m-d H:i:s');
        // ver si el vehiculo esta en uso. Si esta en uso, generar un error.
        $vehiculo=Vehiculo::find($arriendo->patentevehiculo);
        if($vehiculo===null) {
            throw new \RuntimeException("El vehiculo no existe");
        }
        if($vehiculo->enuso===1) {
            throw new \RuntimeException("El vehiculo esta en uso y no se puede arrendar");
        }
        // ver si el cliente existe
        $cliente=Cliente::find($arriendo->rutcliente);
        if($cliente===null) {
            throw new \RuntimeException("El cliente no existe");
        }
        // marcar el vehiculo en uso
        $vehiculo->enuso=1;
        $vehiculo->save();
        // guardar el arriendo.
        $arriendo->save();
        return $arriendo;
    }
}