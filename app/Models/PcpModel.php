<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcpModel extends Model
{
    use HasFactory;

    protected $table = 'pcp';
    protected $primaryKey = 'id_pcp';

    // Define a relação com o modelo Tarefa
    public function tarefas()
    {
        return $this->hasMany(TarefaModel::class, 'tarefa', 'id_tarefa');
    }
}
