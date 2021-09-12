<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;
    public const SELECT_PADRAO = '--- Selecione ---';
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

    public static function getProducaoPlanilhaAntiga($codData)
    {
        $producao = self::selectRaw('pp.*')
            ->join('produto_produzido as pp', 'pp.cd_produto_produzido', '=', 'producao.cd_produto_produzido')
            ->where('producao.data', $codData)
            ->get()
        ;

        $ar = [];
        foreach ($producao as $value) {
            $ar[$value->codigo] = $value;
        }

        return $ar;
    }

    public static function getProducaoPlanilhaAtual($codData)
    {
        $producao = self::selectRaw('pp.*')
            ->join('produto_produzido as pp', 'pp.cd_produto_produzido', '=', 'producao.cd_produto_produzido')
            ->where('producao.data', $codData)
            ->get()
        ;

        $ar = [];
        foreach ($producao as $value) {
            $ar[$value->codigo] = $value;
        }

        return $ar;
    }

    public static function getList()
    {
        return self::selectRaw('data')
            ->groupBy('data')
            ->orderByRaw('data desc')
            ->limit(4)
            ->get()
        ;
    }

    public static function getListAtual()
    {
        return self::selectRaw('data')
            ->groupBy('data')
            ->orderByRaw('data desc')
            ->limit(1)
            ->get()
        ;
    }

    public static function getByCodigo($codigo)
    {
        return self::where('data', $codigo)->get()
        ;
    }
}