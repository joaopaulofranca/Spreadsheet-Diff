<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoProduzido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'public.produto_produzido';
    protected $primaryKey = 'cd_produto_produzido';
    protected $fillable = [
        'cd_produto_produzido',
        'hanking',
        'codigo',
        'descricao',
        'variacao',
        'qt_produzido',
        'estoque',
        'data',
    ];

    public static function insert($ar, $data)
    {
        foreach ($ar as $value) {
            $produto = self::create($value);

            $arProducao = [
                'cd_produto_produzido' => $produto['cd_produto_produzido'],
                'data' => $data,
            ];

            $producao = Producao::insert($arProducao);
        }

        if ($producao) {
            return true;
        }
    }

    public static function getByCodigo($codigo)
    {
        return self::where('data', $codigo)->get()
        ;
    }
}