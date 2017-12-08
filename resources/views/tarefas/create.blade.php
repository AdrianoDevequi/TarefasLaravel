@extends('shared.base')
 
@section('content')

    <div class="panel panel-default">
         @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="panel-heading"><h3>Cadastrar a Tarefa</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('tarefas.store')}}">
        {{ csrf_field() }}
        <h4>Informações da tarefa</h4>
        <hr>
        <div class="form-group">
            <label for="descricao">Título</label>
            <input type="text" class="form-control" placeholder="Título" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" placeholder="Descrição" name="descricao" required></textarea>
        </div>
            <div class="form-group">
                <label for="tipo">Status</label>
                <select class="form-control" name="status" required>
                    <option>A fazer</option>
                    <option>Em progresso</option>
                    <option>Finalizada</option>
                </select>
            </div>
        
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>

@endsection