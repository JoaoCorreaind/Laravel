<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    protected $fillable = [
        'nome',
        'id_categoria',
        'preco'
    ];
    public $timestamps = false;


    public function categoria()
    {
        return $this->hasOne(CategoriaModel::class, 'id_categoria', 'id_categoria');
    }
  
}
