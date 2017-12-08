<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        "titulo", "descricao", "status"
    ];
    protected $table = "tarefas";

}
