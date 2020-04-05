@extends('master')

@section('content')
    <h1>Todas as Movimentações Financeiras</h1>
    @foreach ($movimentacao_financeiras as $movimentacao_financeira)
        <div class="card mt-4">
            <div class="card-header">
                <h2>
                    <a href="{{route('movimentacao_financeiras.show', $movimentacao_financeira->id)}}">
                        {{$movimentacao_financeira->descricao}}
                    </a>
                </h2>
                <a href="{{route('movimentacao_financeiras.edit', $movimentacao_financeira->id)}}" class="btn btn-info">Editar</a>
                <form onsubmit="return confirm('Realmente deseja deletar a conta?')" class="d-inline-block" action="{{route('movimentacao_financeiras.destroy', $movimentacao_financeira->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="mt-4">
        {{$movimentacao_financeiras ?? ''->links()}}
    </div>
@endsection
