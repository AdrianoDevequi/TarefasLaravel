@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Excluir Tarefa</div>
        <div class="panel-body">
        <form method="post" action="{{route ('tarefas.destroy', $tarefa->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}  
            <div class="row">
                <div class="col-md-12">
                    <h4>Tem certeza que deseja remover a tarefa?</h4><hr/>
                    <p>Título: {{$tarefa->titulo}}</p>
                    <p>Descrição da tarefa: {{$tarefa->descricao}}</p>
                    <p>Status: {{$tarefa->status}}</p>
                    <p>Criado em: {{$tarefa->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
            
        </div>
    </div>
            <button type="submit" class="btn btn-danger">Remover</button>
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
            </form>
    @endsection