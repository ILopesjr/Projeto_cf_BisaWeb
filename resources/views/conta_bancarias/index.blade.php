@extends('master')

@section('content')
    <h1>Todas as Contas</h1>
    @foreach ($conta_bancarias as $conta_bancaria)
        <div class="card mt-4">
            <div class="card-header">
                <h2>
                    <a href="{{ route('conta_bancarias.show', $conta_bancaria->id)}}">
                        {{$conta_bancaria->descricao}}
                    </a>
                </h2>
                <a href="{{route('conta_bancarias.edit', $conta_bancaria->id)}}" class="btn btn-info">Editar</a>
                <form onsubmit="return confirm('Realmente deseja deletar a conta?')" class="d-inline-block" action="{{route('conta_bancarias.destroy', $conta_bancaria->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="mt-4">
        {{$conta_bancarias ?? ''->links()}}
    </div>
@endsection
