<?php

namespace App\Http\Controllers;

use App\Models\Arriendo;
use App\Http\Requests\StoreArriendoRequest;
use App\Http\Requests\UpdateArriendoRequest;
use App\Repo\ArriendoRepo;

class ArriendoController extends Controller
{
    public function tabla(ArriendoRepo $arriendoRepo) {
        $arriendos=$arriendoRepo->listarTabla();
        return view("tabla",['arriendos'=>$arriendos]);
    }
}
