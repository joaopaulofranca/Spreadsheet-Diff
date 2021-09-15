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
            'selectListInfo' => $selectList,
        ]);
    }

    public function store(Request $request)
    {
        $data = str_replace('/', '', $request->data);
        $file = $request->file('file');

        if (!isset($file) || empty($file)) {
            return redirect()->back()->with('error', 'Verifique se o arquivo foi selecionado!');
        }

        $produtos = Excel::toArray(new UsersImport(), $file)[0];

        unset($produtos[0], $produtos[1], $produtos[2]);

        $ar = [];
        foreach ($produtos as $key => $value) {
            if (!self::registroIsValid($value)) {
                continue;
            }

            $ar[] = [
                'hanking' => $value[0] ?? '0',
                'codigo' => $value[1] ?? '0',
                'descricao' => $value[2] ?? 'DESCONHECIDO',
                'variacao' => $value[3] ?? '0',
                'qt_produzido' => $value[4] ?? '0',
                'estoque' => $value[5] ?? '0',
                'data' => $data,
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

        $validate = self::vaildate($codigoAnterior, $codigoAtual);
        if (false == $validate) {
            return redirect()->back()->with('warning', 'Selecione as duas planilhas!');
        }

        $planilhaAnterior = Producao::getProducaoPlanilhaAntiga($codigoAnterior);
        $planilhaAtual = Producao::getProducaoPlanilhaAtual($codigoAtual);

        $arProdutos = [];

        foreach ($planilhaAnterior as $value) {
            $atual = $planilhaAtual[$value->codi_var] ?? null;

            if (empty($atual)) {
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

    public function destroy($codigo)
    {
        $producaoRemove = Producao::getByCodigo($codigo);
        foreach ($producaoRemove as $key => $value) {
            $producaoDeletada = $value->delete();
        }
        $produtoProduzidoRemove = ProdutoProduzido::getByCodigo($codigo);
        foreach ($produtoProduzidoRemove as $key => $value) {
            $produtoDeletado = $value->delete();
        }

        if ($producaoDeletada && $produtoDeletado) {
            return redirect()->back()->with('deletado', 'Deletado com sucesso!');
        }

        return redirect()->back()->with('deleteError', 'Não foi deletado!');
    }

    public static function vaildate($codigoAnterior, $codigoAtual)
    {
        if (Producao::SELECT_PADRAO === $codigoAtual) {
            return false;
        }

        if (Producao::SELECT_PADRAO === $codigoAnterior) {
            return false;
        }

        return true;
    }

    public static function registroIsValid($value)
    {
        if (intval($value[3]) >= Producao::VARIACAO_MAX) {
            return false;
        }

        if (empty($value[3]) || null === $value[3]) {
            return false;
        }

        return true;
    }
}