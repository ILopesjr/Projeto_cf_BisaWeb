@extends('master')

@section('content')
    <h2 class="my-3">Adicionar Movimentação Financeira</h2>

    @if ($errors->all())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    
    <form action="{{route('movimentacao_financeiras.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descrição</span>
                </div>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Ex: Salário">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Valor</span>
                    <span class="input-group-text">R$</span>
                    <span class="input-group-text">0,00</span>
                </div>
                <input type="number" name="valor" id="valor" class="form-control" step="any" min="0.1">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Tipo de Movimentação</span>
                <div class="col-sm-10">
                    <div class="fform-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="1" checked>
                        <label class="form-check-label" for="tipo_movimentacao">Receita</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_movimentacao" id="tipo_movimentacao" value="0">
                        <label class="form-check-label" for="tipo_movimentacao">Despesa</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Data Movimentação</span>
            <input type="date" name="data_movimentacao" id="data_movimentacao" class="form-control w-25 p-2" value="{{ now(-1)->format('Y-m-d') }}">
            </div>
        </div>     
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Tipo de Conta</span>
                <select name="id_conta_bancaria" id="id_conta_bancaria" class="form-control w-25 p-2">
                    @foreach ($conta_bancarias as $conta_bancaria)
                        <option value="{{$conta_bancaria->id}}" selected>{{$conta_bancaria->descricao}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-info">Adicionar Conta</button>
        </div>
    </form>
@endsection