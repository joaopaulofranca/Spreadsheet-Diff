<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoProduzido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produto_produzido';
    protected $primaryKey = 'cd_produto_produzido';
    protected $fillable = [
        'cd_produto_produzido',
        'hanking',
        'codigo',
        'descricao',
        'variacao',
        'qt_produzido',
        'estoque',
    ];

    public static function insert($ar)
    {
        return self::create($ar);
    }
}