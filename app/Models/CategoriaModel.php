<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;
    protected $fillable = [
        'nome'   
    ];
    
    public function produtos()
    {
        return $this->hasMany(ProdutoModel::class, 'id_categoria', 'id_categoria');

    }
}
