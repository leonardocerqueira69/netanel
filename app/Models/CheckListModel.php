<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListModel extends Model
{
    use HasFactory;

    protected $table = 'checklist';
    protected $primaryKey = 'id_checklist';

    public function tipoChecklist()
    {
        return $this->belongsTo(TipoCheckListModel::class, 'tipo', 'id_tipo');
    }

    public function listas()
    {
        return $this->hasMany(ListaModel::class, 'checklist', 'id_checklist');
    }

    public function cq()
    {
        return $this->hasOne(CqModel::class, 'checklist', 'id_checklist');
    }
}