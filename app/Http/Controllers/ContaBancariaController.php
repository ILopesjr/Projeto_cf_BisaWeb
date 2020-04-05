<?php

namespace App\Http\Controllers;

use App\conta_bancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conta_bancarias = Conta_bancaria::orderBy('id', 'desc')->paginate(10);
        return view('conta_bancarias.index', ['conta_bancarias' => $conta_bancarias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conta_bancarias.create');
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
            'descricao.min' => 'É necessário no mínimo 5 caracteres no nome!'
        ];

        $this->validate($request,[
            'descricao' => 'required|min:5',
            'saldo_inicial' => 'required|regex:/\d/m'
        ], $mensagens);
        
        Conta_Bancaria::create([
            'descricao' => $request->descricao,
            'saldo_inicial' => $request->saldo_inicial
        ]);

        session()->flash('message', 'Conta cadastrada com sucesso!');

        return redirect(route('conta_bancarias.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conta_bancaria  $conta_bancaria
     * @return \Illuminate\Http\Response
     */
    public function show(conta_bancaria $conta_bancaria)
    {
        return view('conta_bancarias.show', ['conta_bancaria' => $conta_bancaria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conta_bancaria  $conta_bancaria
     * @return \Illuminate\Http\Response
     */
    public function edit(conta_bancaria $conta_bancaria)
    {
        return view('conta_bancarias.edit', compact('conta_bancaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conta_bancaria  $conta_bancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conta_bancaria $conta_bancaria)
    {
        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'descricao.min' => 'É necessário no mínimo 5 caracteres no nome!'
        ];

        $this->validate($request,[
            'descricao' => 'required|min:5',
            'saldo_inicial' => 'required|regex:/\d/m'
        ], $mensagens);
        
        $conta_bancaria->descricao = $request->descricao;
        $conta_bancaria->saldo_inicial = $request->saldo_inicial;
        $conta_bancaria->save();
        session()->flash('message', 'Conta atualizada com sucesso!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conta_bancaria  $conta_bancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(conta_bancaria $conta_bancaria)
    {
        $conta_bancaria->delete();
        return redirect(route('conta_bancarias.index'));
    }
}
