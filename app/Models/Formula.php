<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;
    
    protected $table = "formulas";
    protected $fillable = ['nombre', 'descripcion', 'fecha', 'id_user'];
}
