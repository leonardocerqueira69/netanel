<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorModel extends Model
{
    use HasFactory;

    protected $table = 'setor';
    protected $primaryKey = 'id_setor';

    public function pcp()
    {
        return $this->hasMany(PcpModel::class, 'setor', 'id_setor');
    }
}

