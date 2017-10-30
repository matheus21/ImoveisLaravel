@extends('shared.base')

@section('content')


    <div class="panel panel-default">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
        @endif
        <div class="panel-heading"><h3>Editar imóvel</h3></div>
        <div class="panel-body">

            <form method="post" action="{{route('imoveis.update', $imovel->id)}}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <h4>Dados do imóvel</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" value="{{$imovel->descricao}}" placeholder="Descrição" name="descricao" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" value="{{$imovel->preco}}" placeholder="Preço" name="preco" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtdQuartos">Quantidade de Quartos</label>
                            <input type="number" class="form-control" value="{{$imovel->qtdQuartos}}" placeholder="Quantidade de Quartos" required
                                   name="qtdQuartos">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo">Tipo do imóvel</label>
                            <select class="form-control" name="tipo" required>
                                <option {{$imovel->tipo == 'apartamento' ? 'selected' : ''}} >Apartamento</option>
                                <option {{$imovel->tipo == 'casa' ? 'selected' : ''}}>Casa</option>
                                <option {{$imovel->tipo == 'kitnet' ? 'selected' : ''}}>Kitnet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtdQuartos">Finalidade do imóvel</label>
                            <select class="form-control" name="finalidade" required>
                                <option {{$imovel->finalidade == 'venda' ? 'selected' : ''}}>Venda</option>
                                <option {{$imovel->finalidade == 'locacao' ? 'selected' : ''}}>Locação</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>Endereço</h4>
                <hr>
                <div class="form-group">
                    <label for="logradouroEndereco">Logradouro</label>
                    <input type="text" class="form-control" value="{{$imovel->logradouroEndereco}}" placeholder="Logradouro" required name="logradouroEndereco">
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="bairroEndereco">Bairro</label>
                            <input type="text" class="form-control" value="{{$imovel->bairroEndereco}}" placeholder="Bairro" required name="bairroEndereco">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numeroEndereco">Número</label>
                            <input type="number" class="form-control" value="{{$imovel->numeroEndereco}}" placeholder="Número" required
                                   name="numeroEndereco">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cidadeEndereco">Cidade</label>
                            <input type="text" class="form-control" value="{{$imovel->cidadeEndereco}}" placeholder="Cidade" required name="cidadeEndereco">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cepEndereco">CEP</label>
                            <input type="text" class="form-control" value="{{$imovel->cepEndereco}}" placeholder="CEP" required name="cepEndereco">
                        </div>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

@endsection