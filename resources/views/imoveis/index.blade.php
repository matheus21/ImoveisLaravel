@extends('shared.base')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Lista de Imóveis</div>
        <form method="get" action="{{route('imoveis.index', 'buscar')}}">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Digite o nome da cidade" name="buscar">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i
                                        class="fa fa-search"></i> Pesquisar</button>
                     </span>
                    </div>
                </div>
            </div>
        </form>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Cidade</th>
                            <th>Preço</th>
                            <th>Finalidade</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($imoveis as $imovel)

                            <tr>
                                <td>{{$imovel->descricao}}</td>
                                <td>{{$imovel->cidadeEndereco}}</td>
                                <td>{{$imovel->preco}}</td>
                                <td>{{$imovel->finalidade}}</td>
                                <td>{{$imovel->tipo}}</td>
                                <td>
                                    <a href="{{route('imoveis.edit', $imovel->id)}}" class="btn btn-sm btn-warning"><i
                                                class="fa fa-pencil"></i></a>
                                    <a href="{{route('imoveis.remove', $imovel->id)}}" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                    <a href="{{route('imoveis.show', $imovel->id)}}" class="btn btn-sm btn-success"><i
                                                class="fa fa-search"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Div da paginação -->
        <div align="center" class="row">
            {{$imoveis->links()}}
        </div>
    </div>
    <a href="{{route('imoveis.create')}}" class="btn btn-primary">Adicionar Imovel</a>

@endsection