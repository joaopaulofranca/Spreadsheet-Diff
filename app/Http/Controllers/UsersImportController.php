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
        $selectListAtual = Producao::getListAtual();

        return view('users.import', [
            'selectList' => $selectList,
            'secondSelectList' => $selectListAtual,
        ]);
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

        $planilhaAnterior = Producao::getProducaoPlanilhaOld($codigoAnterior);
        $planilhaAtual = Producao::getProducaoToCompare($codigoAtual);

        $arProdutos = [];

        foreach ($planilhaAnterior as $key => $value) {
            if ($planilhaAtual[$value->codigo]) {
                $atual = $planilhaAtual[$value->codigo];
                if ($value->variacao != $atual->variacao) {
                    $arProdutos[] = $atual;
                }
            } else {
                $arProdutos[] = $value;
            }
        }
        if (empty($arProdutos)) {
            return redirect()->back()->with('warning', 'Não há diferença entre as planilhas!');
        }

        return view('users.relatorio', [
            'listProdutos' => $arProdutos,
        ]);
    }

    public function relatorio()
    {
        return view('users.relatorio');
    }
}