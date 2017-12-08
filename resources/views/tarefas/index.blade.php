@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Tarefas</div>
        <form method="GET" action="">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite o nome da tarefa..." name="buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Pesquisar</button>
                    </span>
                </div>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($tarefas as $tarefa)
                            <tr>
                                <td>{{$tarefa->titulo}}</td>
                                <td>{{$tarefa->descricao}}</td>
                                <td>{{$tarefa->status}}</td>
                                <td>
                                    <a href="{{route('tarefas.edit', $tarefa->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href=""><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('tarefas.show', $tarefa->id)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
            ---
        </div>
    </div>
    <a href="{{route('tarefas.create')}}"><button class="btn btn-primary">Nova Tarefa</button></a>
@endsection