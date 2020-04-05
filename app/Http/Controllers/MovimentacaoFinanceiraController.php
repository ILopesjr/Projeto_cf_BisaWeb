<?php

namespace App\Http\Controllers;

use App\movimentacao_financeira;
use App\Conta_Bancaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentacaoFinanceiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentacao_financeiras = Movimentacao_Financeira::orderBy('id', 'desc')->paginate(10);
        return view('movimentacao_financeiras.index', ['movimentacao_financeiras' => $movimentacao_financeiras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conta_bancarias = DB::table('conta_bancarias')->orderBy('id', 'desc')->get();
        $movimentacao_financeiras = DB::table('movimentacao_financeiras')->get();
        return view('movimentacao_financeiras.create', ['conta_bancarias' => $conta_bancarias], ['movimentacao_financeiras' => $movimentacao_financeiras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'descricao.required' =>'A descrição é obrigatória!',
            'descricao.min' => 'É necessário no mínimo 5 caracteres no nome!',
            'data_movimentacao.after' => 'Não é permitida data de movimentação inferior a 03/01/1992!',
            'data_movimentacao.required' =>'A data de movimentação é obrigatória!'
        ];

        $this->validate($request,[
            'descricao' => 'required|min:5',
            'valor' => 'required|regex:/\d/m',
            'tipo_movimentacao' => 'required',
            'data_movimentacao' => 'required|after:03-01-1992',
            'id_conta_bancaria' => 'required'

        ], $mensagens);

        Movimentacao_Financeira::create([
            'descricao' => $request->descricao,            
            'valor' => $request->valor,            
            'tipo_movimentacao' => $request->tipo_movimentacao,            
            'data_movimentacao' => $request->data_movimentacao,            
            'id_conta_bancaria' => $request->id_conta_bancaria            
        ]);
        
        session()->flash('message', 'Movimentação cadastrada com sucesso!');

        return redirect(route('movimentacao_financeiras.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\movimentacao_financeira  $movimentacao_financeira
     * @return \Illuminate\Http\Response
     */
    public function show(movimentacao_financeira $movimentacao_financeira)
    {
        $conta_bancarias = DB::table('conta_bancarias')->get();
        return view('movimentacao_financeiras.show', ['conta_bancarias' => $conta_bancarias], ['movimentacao_financeira' => $movimentacao_financeira]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movimentacao_financeira  $movimentacao_financeira
     * @return \Illuminate\Http\Response
     */
    public function edit(movimentacao_financeira $movimentacao_financeira)
    {
        $conta_bancarias = DB::table('conta_bancarias')->get();
        return view('movimentacao_financeiras.edit', compact('movimentacao_financeira'), ['conta_bancarias' => $conta_bancarias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movimentacao_financeira  $movimentacao_financeira
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movimentacao_financeira $movimentacao_financeira)
    {

        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'descricao.required' =>'A descrição é obrigatória!',
            'descricao.min' => 'É necessário no mínimo 5 caracteres no nome!',
            'data_movimentacao.after' => 'Não é permitida data de movimentação inferior a 03/01/1992!',
            'data_movimentacao.required' =>'A data de movimentação é obrigatória!'
        ];

        $this->validate($request,[
            'descricao' => 'required|min:3',
            'valor' => 'required|regex:/\d/m',
            'tipo_movimentacao' => 'required',
            'data_movimentacao' => 'required|after:03-01-1992',
            'id_conta_bancaria' => 'required'
        ], $mensagens);
        
        $movimentacao_financeira->descricao = $request->descricao;
        $movimentacao_financeira->valor = $request->valor;
        $movimentacao_financeira->tipo_movimentacao = $request->tipo_movimentacao;
        $movimentacao_financeira->data_movimentacao = $request->data_movimentacao;
        $movimentacao_financeira->id_conta_bancaria = $request->id_conta_bancaria;
        $movimentacao_financeira->save();
        session()->flash('message', 'Movimentação atualizada com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movimentacao_financeira  $movimentacao_financeira
     * @return \Illuminate\Http\Response
     */
    public function destroy(movimentacao_financeira $movimentacao_financeira)
    {
        $movimentacao_financeira->delete();
        return redirect(route('movimentacao_financeiras.index'));
    }
}
