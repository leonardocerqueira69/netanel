<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCheckListModel extends Model
{
    use HasFactory;

    protected $table = 'tipo_checklist';
    protected $primaryKey = 'id_tipo';



    public function checklists()
    {
        return $this->hasMany(ChecklistModel::class, 'tipo', 'id_tipo');
    }
}

