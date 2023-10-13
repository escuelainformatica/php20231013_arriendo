<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    public $primaryKey="patente";
    public $keyType="string";
    public $incrementing=false;

    public $fillable=['patente','marca','costopordia','enuso'];
    public $timestamps=false;
}
