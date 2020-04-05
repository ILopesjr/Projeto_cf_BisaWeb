@extends('master')

@section('content')
<div class="container">
    <div class="container" style="text-align: center; padding-bottom: 20px">
        <h1>Relatório de Movimentações Financeiras</h1>
    </div>
    <div class="container" style="padding-bottom: 20px">
        <div class="row card-header">
            <div class="col-sm">
            Descrição
            </div>
            <div class="col-sm">
            Valor
            </div>
            <div class="col-sm">
            Tipo de Movimentação
            </div>
            <div class="col-sm">
            Tipo de Conta
            </div>
            <div class="col-sm">
            Data Movimentação
            </div>
        </div>
        </div>
    @foreach ($movimentacao_financeiras as $movimentacao_financeira)
        <div class="container">
        <div class="row">
            <div class="col-sm">
                {{$movimentacao_financeira->descricao}}
            </div>
            <div class="col-sm">
            R$ {{$movimentacao_financeira->valor}}
            </div>
            <div class="col-sm">
                @if ( $movimentacao_financeira->tipo_movimentacao == '1')
                    Receita
                @else
                    Despesa
                @endif
            </div>
            <div class="col-sm">
                @foreach ($conta_bancarias as $conta_bancaria)
                    @if ( $conta_bancaria->id == $movimentacao_financeira->id_conta_bancaria)
                        {{$conta_bancaria->descricao}}
                    @endif
                @endforeach
            </div>
            <div class="col-sm">
                {{Carbon\Carbon::parse($movimentacao_financeira->data_movimentacao)->format('d-m-Y')}}
            </div>
        </div>
        </div>
    @endforeach
</div>
@endsection