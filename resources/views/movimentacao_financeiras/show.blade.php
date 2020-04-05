@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Detalhes da movimentação</h1>
        </div>
        <div class="card-header">
            <h2>Descrição: {{$movimentacao_financeira->descricao}}</h2>
        </div>
        <div class="card-header">            
            <h2>Valor: R$ {{$movimentacao_financeira->valor}}</h2>
        </div>
        <div class="card-header">
            @if ($movimentacao_financeira->tipo_movimentacao == '1')
                <h2>Tipo de Movimentação: Receita</h2>
            @else
                <h2>Tipo de Movimentação: Despesa</h2>
            @endif
        </div>
        <div class="card-header">
            @foreach ($conta_bancarias as $conta_bancaria)
                @if ($conta_bancaria->id == $movimentacao_financeira->id_conta_bancaria)            
                    <h2>Tipo de Conta: {{$conta_bancaria->descricao}}</h2>
                @endif
            @endforeach
        </div>
        <div class="card-header">
            <h2>Data Movimentação: {{$movimentacao_financeira->data_movimentacao->format('d/m/Y')}}</h2>
        </div>
    </div>
@stop