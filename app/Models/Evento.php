<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    protected $table = "eventos";
    protected $fillable = ['nombre', 'descripcion', 'responsable', 'fecha', 'hora', 'id_user', 'id_seguimiento'];
}