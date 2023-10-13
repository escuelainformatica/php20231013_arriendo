<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arriendo extends Model
{
    use HasFactory;

    public $fillable=['fecha','patentevehiculo','rutcliente','fechadevolucion'];

    public $timestamps=false;

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class,'patentevehiculo','patente');
    }
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,'rutcliente','rut');
    }
}

