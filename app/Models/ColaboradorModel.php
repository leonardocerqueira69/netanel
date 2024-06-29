<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorModel extends Model
{
    use HasFactory;

    protected $table = 'colaborador';
    protected $primaryKey = 'id_colaborador';

    public function cqs()
    {
        return $this->hasMany(CqModel::class, 'colaborador', 'id_colaborador');
    }
}
