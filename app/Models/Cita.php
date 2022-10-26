<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "cita";
    protected $primaryKey = 'IdCita';
    protected $fillable = [
        "fec_registro",
        "estado",
        "IdHorario",
        "IdCliente",
        "IdUsuario"
    ];
}
