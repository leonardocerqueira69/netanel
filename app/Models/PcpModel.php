<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcpModel extends Model
{
    use HasFactory;

    protected $table = 'pcp';
    protected $primaryKey = 'id_pcp';

    protected $fillable = [
        'setor', 'texto', 'data_atual', 'finalizado', 'andamento', 'arquivo',
    ];
    
    public function setor()
    {
        return $this->belongsTo(SetorModel::class, 'setor', 'id_setor');
    }
}
