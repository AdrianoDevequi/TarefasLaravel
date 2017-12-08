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
 
    <form method="post" action="{{route ('tarefas.update', $tarefa->id)}}">
    <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <h4>Informações da tarefa</h4>
        <hr>
        <div class="form-group">
            <label for="descricao">Título</label>
            <input type="text" class="form-control" placeholder="Título" name="titulo" required value="{{$tarefa->titulo}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" placeholder="Descrição" name="descricao" required>{{$tarefa->descricao}}</textarea>
        </div>
            <div class="form-group">
                <label for="tipo">Status</label>
                <select class="form-control" name="status" required>
                    <option {{($tarefa->status == 'A fazer'  ? 'selected' : '')}}>A fazer</option>
                    <option {{($tarefa->status == 'Em Progresso'  ? 'selected' : '')}}>Em progresso</option>
                    <option {{($tarefa->status == 'Finalizada'  ? 'selected' : '')}}>Finalizada</option>
                </select>
            </div>
                            
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
        </div>
    </div>

@endsection