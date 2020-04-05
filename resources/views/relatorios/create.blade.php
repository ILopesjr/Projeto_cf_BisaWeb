    <div class="container" style="text-align: center; padding-bottom: 20px">
        <h1>Relatório de Movimentações Financeiras</h1>
    </div>
    <table class="table" style="text-align: center; width: 100%">
        <thead>
          <tr>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
            <th scope="col">Tipo de Movimentação</th>
            <th scope="col">Tipo de Conta</th>
            <th scope="col">Data Movimentação</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($movimentacao_financeiras as $movimentacao_financeira)
                <tr>
                    <td>{{$movimentacao_financeira->descricao}}</td>
                    <td>R$ {{$movimentacao_financeira->valor}}</td>
                    <td>
                        @if ( $movimentacao_financeira->tipo_movimentacao == '1')
                            Receita
                        @else
                            Despesa
                        @endif
                    </td>
                    <td>
                        @foreach ($conta_bancarias as $conta_bancaria)
                            @if ( $conta_bancaria->id == $movimentacao_financeira->id_conta_bancaria)
                                {{$conta_bancaria->descricao}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{Carbon\Carbon::parse($movimentacao_financeira->data_movimentacao)->format('d-m-Y')}}
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>