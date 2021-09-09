<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'public.producao';
    protected $primaryKey = 'cd_producao';
    protected $fillable = [
        'cd_producao',
        'data',
        'cd_produto_produzido',
    ];

    public static function insert($arProducao)
    {
        return self::create($arProducao);
    }

    public static function getProducaoToCompare($data)
    {
        $producao = self::selectRaw('pp.*')
            ->join('produto_produzido as pp', 'pp.cd_produto_produzido', '=', 'producao.cd_produto_produzido')
            ->where('producao.data', $data)
            ->get()
        ;

        $ar = [];
        foreach ($producao as $value) {
            $ar[$value->codigo] = $value;
        }

        return $ar;
    }
}