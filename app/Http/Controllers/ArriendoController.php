<?php

namespace App\Http\Controllers;

use App\Models\Arriendo;
use App\Http\Requests\StoreArriendoRequest;
use App\Http\Requests\UpdateArriendoRequest;
use App\Repo\ArriendoRepo;
use App\Repo\ClienteRepo;
use App\Repo\VehiculoRepo;
use Illuminate\Http\Request;

class ArriendoController extends Controller
{
    public function __construct(
        public ArriendoRepo $arriendoRepo
        ,
        public VehiculoRepo $vehiculoRepo
        ,
        public ClienteRepo $clienteRepo
        ,
        public Request $request
    ) {

    }
    public function tabla()
    {
        $arriendos = $this->arriendoRepo->listarTabla();
        return view("tabla", ['arriendos' => $arriendos]);
    }
    public function arriendoGet()
    {
        $arriendo = new Arriendo();
        $vehiculos = $this->vehiculoRepo->listarCombo();
        $clientes = $this->clienteRepo->listarCombo();
        return view("arriendo", [
            'arriendo' => $arriendo,
            'vehiculos' => $vehiculos,
            'clientes' => $clientes,
            'mensaje'=>''
        ]);


    }
    public function arriendoPost()
    {
        $arriendo = new Arriendo($this->request->all());
        try {
            $resultado = $this->arriendoRepo->agregarArriendo($arriendo);
            return redirect('/tabla');

        } catch(\Exception $ex) {
            $mensaje=$ex->getMessage();
        }
        $vehiculos = $this->vehiculoRepo->listarCombo();
        $clientes = $this->clienteRepo->listarCombo();
        return view("arriendo", [
            'arriendo' => $arriendo,
            'vehiculos' => $vehiculos,
            'clientes' => $clientes,
            'mensaje'=>$mensaje
        ]);
    }
    public function devolucionGet() {
        $arriendos=$this->arriendoRepo->listarCombo();
        return view('devolucion',['arriendos'=>$arriendos,'mensaje'=>'']);
    }
    public function devolucionPost() {
        $idarriendo=$this->request->post('idarriendo',0);
        try {
            $resultado=$this->arriendoRepo->devolver($idarriendo);
            return redirect('/tabla');
        } catch(\Exception $ex) {
            $mensaje=$ex->getMessage();
        }
        $arriendos=$this->arriendoRepo->listarCombo();
        return view('devolucion',['arriendos'=>$arriendos,'mensaje'=>$mensaje]);

    }
}