<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movimentacao_financeira extends Model
{
    protected $fillable = ['descricao', 'valor', 'tipo_movimentacao', 'data_movimentacao', 'id_conta_bancaria'];
    protected $dates = [
        'data_movimentacao'
    ];
    protected $guared = [];
}
