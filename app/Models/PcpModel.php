<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcpModel extends Model
{
    use HasFactory;

    protected $table = 'pcp';
    protected $primaryKey = 'id_pcp';

    public function setor()
    {
        return $this->belongsTo(SetorModel::class, 'setor', 'id_setor');
    }
}

