@extends('master')

@section('content')
    <h2 class="my-3">Atualizar Conta</h2>
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

    <form action="{{route('conta_bancarias.update', $conta_bancaria->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descrição</span>
                </div>
                <input type="text" name="descricao" id="descricao" class="form-control" value='{{$conta_bancaria->descricao}}'>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Saldo Inicial</span>
                    <span class="input-group-text">R$</span>
                    <span class="input-group-text">0,00</span>
                </div>
                <input type="number" name="saldo_inicial" id="saldo_inicial" class="form-control" step="any" min="0.1" value='{{$conta_bancaria->saldo_inicial}}'>
              </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-info">Atualizar Conta</button>
        </div>
    </form>
@endsection