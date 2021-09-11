<?php

namespace App\Http\Controllers;

use App\Models\Producao;
use App\Models\ProdutoProduzido;
use App\Models\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportController extends Controller
{
    public function index()
    {
        $selectList = Producao::getList();

        return view('users.import', [
            'selectList' => $selectList,
            'secondSelectList' => $selectList,
        ]);

        // return view('users.relatorio');
    }

    public function store(Request $request)
    {
        $data = str_replace('/', '', $request->data);
        $file = $request->file('file');

        $produtos = Excel::toArray(new UsersImport(), $file)[0];

        unset($produtos[0], $produtos[1], $produtos[2]);

        $ar = [];
        foreach ($produtos as $key => $value) {
            $ar[$value[1]] = [
                'hanking' => $value[0],
                'codigo' => $value[1],
                'descricao' => $value[2] ?? 'não informado',
                'variacao' => $value[3] ?? 0,
                'qt_produzido' => $value[4] ?? 0,
                'estoque' => $value[5] ?? 0,
            ];
        }
        $list = ProdutoProduzido::insert($ar, $data);

        if ($list) {
            return redirect()->back()->with('success', 'Upload foi realizado com sucesso!');
        }

        return redirect()->back()->with('error', 'Algo de errado não esta certo!');
    }

    public function compare(Request $request)
    {
        $codigoAnterior = str_replace('/', '', $request->codigo_anterior);
        $codigoAtual = str_replace('/', '', $request->codigo_atual);

        $planinhaAnterior = Producao::getProducaoPlanilhaOld($codigoAnterior);
        $planinhaAtual = Producao::getProducaoToCompare($codigoAtual);

        $arProdutos = [];
        foreach ($planinhaAnterior as $key => $value) {
            if ($planinhaAtual[$value->codigo]) {
                $atual = $planinhaAtual[$value->codigo];
                if ($value->variacao != $atual->variacao) {
                    $arProdutos[] = $atual;
                }
            } else {
                $arProdutos[] = $value;
            }
        }

        return view('users.relatorio', [
            'listProdutos' => $arProdutos,
        ]);
    }
}