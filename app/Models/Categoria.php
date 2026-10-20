<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Producto;

class Categoria extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        "nombre",
        "descripcion",
        "status"
    ];

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria', 'id');
    }
}
