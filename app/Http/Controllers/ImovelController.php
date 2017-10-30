<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Validator;

class ImovelController extends Controller
{

    protected function validarImovel($request)
    {

        $validator = Validator::make($request->all(), [
            "descricao" => "required",
            "logradouroEndereco" => "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "cidadeEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric",
            "tipo" => "required",
            "finalidade" => "required"
        ]);

        return $validator;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /**
         * Quantidade de paginas a serem exibidas
         */
        $qtd = $request['qtd'] ?: 2;
        /**
         * Para qual pagina se deseja ir
         */
        $page = $request['page'] ?: 1;

        /**
         * Filtro por cidade
         * O valor é armazenado em buscar
         */
        $buscar = $request['buscar'];

        /**
         * Filtro por tipo de imovel do menu
         */
        $tipo = $request['tipo'];


        /**
         * Exibe a pagina que foi passada por parametro, senão retorna para a primeira
         */
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        /**
         * Listagem dos imoveis paginados, passando a quantidade de imoveis que se quer exibir
         *
         * O metodo appends captura da requisição todos os atributos exceto o page, para não zerar o atributo page
         *
         * Se buscar tiver algum valor, inclui na condição de pesquisa dos valores paginados,
         * para manter a paginação.
         */
        if ($buscar ) {
            $imoveis = DB::table('imoveis')->where('cidadeEndereco', '=', $buscar)->paginate($qtd);
        } else {

            if($tipo) {
                $imoveis = DB::table('imoveis')->where('tipo', '=', $tipo)->paginate($qtd);
            } else {
                $imoveis = DB::table('imoveis')->paginate($qtd);
            }

        }

        $imoveis = $imoveis->appends(Request::capture()->except('page'));

        return view('imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validarImovel($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Imovel::create($dados);
        return redirect()->route('imoveis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::find($id);
        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::find($id);
        return view('imoveis.edit', compact('imovel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = $this->validarImovel($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $imovel = Imovel::find($id);
        $dados = $request->all();
        $imovel->update($dados);
        return redirect()->route('imoveis.index');
    }

    public function remover($id)
    {

        $imovel = Imovel::find($id);
        return view('imoveis.remove', compact('imovel'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imovel = Imovel::find($id);
        $imovel->delete();
        return redirect()->route('imoveis.index');
    }
}
