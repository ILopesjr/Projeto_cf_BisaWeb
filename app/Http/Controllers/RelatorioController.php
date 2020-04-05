<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movimentacao_financeira;
use App\Conta_Bancaria;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RelatorioController extends Controller
{
    public function index()
    {
        $conta_bancarias = DB::table('conta_bancarias')->orderBy('id', 'desc')->get();
        $movimentacao_financeiras = DB::table('movimentacao_financeiras')
            ->orderBy('tipo_movimentacao', 'desc')
            ->groupBy('tipo_movimentacao', 'data_movimentacao', 'id')
            ->get();
        
        return view('relatorios.index', ['conta_bancarias' => $conta_bancarias], ['movimentacao_financeiras' => $movimentacao_financeiras]);
    }

    public function create()
    {
        $conta_bancarias = DB::table('conta_bancarias')->orderBy('id', 'desc')->get();
        $movimentacao_financeiras = DB::table('movimentacao_financeiras')
            ->groupBy('tipo_movimentacao', 'data_movimentacao', 'id')
            ->get();

        return PDF::loadView('relatorios.create', ['conta_bancarias' => $conta_bancarias], ['movimentacao_financeiras' => $movimentacao_financeiras])
             ->stream();
    }
}
