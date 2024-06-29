<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaModel extends Model
{
    use HasFactory;

    protected $table = 'lista';
    protected $primaryKey = 'id_lista';

    public function checklist()
    {
        return $this->belongsTo(CheckListModel::class, 'checklist', 'id_checklist');
    }
}

