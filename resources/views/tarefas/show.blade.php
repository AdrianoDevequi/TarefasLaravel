@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes da Tarefa</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a tarefa</h4>
                    <p>Título: {{$tarefa->titulo}}</p>
                    <p>Descrição da tarefa: {{$tarefa->descricao}}</p>
                    <p>Status: {{$tarefa->status}}</p>
                    <p>Criado em: {{$tarefa->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
    @endsection