<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class TarefasController extends Controller
{
    protected function validarTarefa($request){
        $validator = Validator::make($request->all(),
        [
            "titulo" => "required",
            "descricao" => "required",
            "status" => "required"
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
        $qtd = $request['qtd'] ?: 2;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        $tipo = $request['tipo'];
 
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });


        if($buscar){
            $imoveis = DB::table('tarefas')->where('titulo', '=', $buscar)->paginate($qtd);
        }else{  
            if($tipo){
                $imoveis = DB::table('tarefas')->where('tipo', '=', $tipo)->paginate($qtd);
            }else{
                $imoveis = DB::table('tarefas')->paginate($qtd);
            }
        }


        $tarefas = DB::table('tarefas')->paginate($qtd);
        $tarefas = $tarefas->appends(Request::capture()->except('page'));
 
        return view('tarefas.index', compact('tarefas'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarTarefa($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Tarefa::create($dados);

        return redirect()->route('tarefas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::find($id);

        return view('tarefas.show', compact('tarefa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::find($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = $this->validarTarefa($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
 
        $tarefa = Tarefa::find($id);
        $dados = $request->all();
        $tarefa->update($dados);

        return redirect()->route('tarefas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::find($id)->delete();
        return redirect()->route('tarefas.index');
    }
    public function remover($id){

        $tarefa = Tarefa::find($id);
        return view('tarefas.remove', compact('tarefa'));
    }
}
