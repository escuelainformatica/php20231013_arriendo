<?php

namespace App\Repo;
use App\Models\Arriendo;
use App\Models\Cliente;
use App\Models\Vehiculo;

class ArriendoRepo {
    public function listarTabla() {
        return Arriendo::with(['cliente','vehiculo'])->get();
    }
    public function listarCombo() {
        return Arriendo::whereNull('fechadevolucion')->get();
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
    public function devolver($idArriendo) {
        // el arriendo no existe.
        $arriendo=Arriendo::find($idArriendo);
        if($arriendo===null) {
            throw new \RuntimeException("No existe el arriendo");
        }
        // el vehiculo ya fue regresado.
        $vehiculo=Vehiculo::find($arriendo->patentevehiculo);
        if($vehiculo===null) {
            throw new \RuntimeException("No existe el vehiculo");
        }
        if($vehiculo->enuso!=1) {
            throw new \RuntimeException("El vehiculo no esta en uso y por lo tanto no se puede devolver");
        }
        // pendiente: probar el cliente si existe.
        // modificar la fecha devolucion del arriendo
        $arriendo->fechadevolucion=date('Y-m-d H:i:s');
        $arriendo->save();
        // marcar el vehiculo como libre
        $vehiculo->enuso=0;
        $vehiculo->save();
        return $arriendo;

    }
}