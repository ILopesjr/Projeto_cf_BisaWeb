<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle Financeiro Bisaweb</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <div class="bg-secondary text-white p-5 mb-3" style="text-align: center">
        <a href="{{route('conta_bancarias.create')}}" class="btn btn-secondary">Cadastro Conta Bancaria</a>
        <a href="{{route('movimentacao_financeiras.create')}}" class="btn btn-secondary">Cadastro Movimentação Financeira</a>
        <a href="{{route('conta_bancarias.index')}}" class="btn btn-secondary">Contas Bancarias</a>
        <a href="{{route('movimentacao_financeiras.index')}}" class="btn btn-secondary">Movimentações Financeiras</a>
        <a href="{{route('relatorios.index')}}" class="btn btn-secondary">Relatório</a>
        <a href="{{route('relatorios.create')}}" class="btn btn-secondary">Relatório em PDF</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="bg-dark text-white p-4 text-center">
        All rights reserved Ivanildo Lopes {{date('Y')}}.
    </div>
</body>
</html>