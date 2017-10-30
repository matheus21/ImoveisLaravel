<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 70px">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('imoveis.index')}}">Início</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('imoveis.index')}}">Todos</a></li>
                <li><a href="{{route('imoveis.index', 'tipo=apartamento')}}">Apartamentos</a></li>
                <li><a href="{{route('imoveis.index', 'tipo=casa')}}">Casas</a></li>
                <li><a href="{{route('imoveis.index', 'tipo=kitnet')}}">Kitnet</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>