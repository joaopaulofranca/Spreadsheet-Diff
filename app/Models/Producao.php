<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'producao';
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
}