<?php

namespace App\Http\Controllers;

use App\Models\ProdutoProduzido;
use App\Models\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportController extends Controller
{
    public function show()
    {
        return view('users.import');
    }

    public function store(Request $request)
    {
        $data = $request->data;
        $file = $request->file('file');

        $produtos = Excel::toArray(new UsersImport(), $file)[0];

        unset($produtos[0], $produtos[1], $produtos[2]);

        $ar = [];
        foreach ($produtos as $key => $value) {
            $ar[$value[1]] = [
                'hanking' => $value[0],
                'codigo' => $value[1],
                'descricao' => $value[2],
                'variacao' => $value[3],
                'qt_produzido' => $value[4],
                'estoque' => $value[5],
            ];
        }
        $list = ProdutoProduzido::insert($ar, $data);

        if (!$list) {
            return response(['mensage' => 'Produção não foi inserida!'], 500);
        }

        return response(['mensage' => 'Produção inserida com sucesso!'], 200);
    }
}