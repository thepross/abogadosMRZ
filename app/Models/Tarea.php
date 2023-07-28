<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = "tareas";
    protected $fillable = ['descripcion', 'fecha_inicio', 'fecha_fin', 'prioridad', 'estado', 'responsable', 'id_user'];
}
