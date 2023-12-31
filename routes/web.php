<?php

use App\Http\Controllers\ArriendoController;
use App\Repo\ArriendoRepo;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::controller(ArriendoController::class)->group(function() {
    Route::get("/tabla",'tabla');
    Route::get("/arriendo",'arriendoGet');
    Route::post("/arriendo",'arriendoPost');
    Route::get("/devolucion",'devolucionGet');
    Route::post("/devolucion",'devolucionPost');
});