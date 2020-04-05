<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conta_bancaria extends Model
{
    protected $fillable = ['descricao', 'saldo_inicial'];
    protected $guared = [];
}
