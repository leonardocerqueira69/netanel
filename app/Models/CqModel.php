<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CqModel extends Model
{
    use HasFactory;

    protected $table = 'cq';
    protected $primaryKey = 'id_cq';

    public function checklist()
    {
        return $this->belongsTo(CheckListModel::class, 'checklist', 'id_checklist');
    }

    public function colaboradorUm()
    {
        return $this->belongsTo(ColaboradorModel::class, 'conf_um', 'id_colaborador');
    }

    public function colaboradorDois()
    {
        return $this->belongsTo(ColaboradorModel::class, 'conf_dois', 'id_colaborador');
    }
}

