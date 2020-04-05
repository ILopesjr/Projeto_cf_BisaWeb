@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Detalhes da Conta</h1>
        </div>
        <div class="card-header">
            <h2>Descrição: {{$conta_bancaria->descricao}}</h2>
        </div>
        <div class="card-header">
            <h2>Saldo Inicial: R$ {{$conta_bancaria->saldo_inicial}}</h2>
        </div>
    </div>
@stop