<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefaModel extends Model
{
    use HasFactory;

    public function setor()
    {
        return $this->belongsTo(SetorModel::class, 'setor', 'id_setor');
    }

    public function pcp()
    {
        return $this->belongsTo(PcpModel::class, 'pcp', 'id_pcp');
    }
}
