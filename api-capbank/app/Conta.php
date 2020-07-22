<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conta extends Model
{
    protected $table = 'Conta';    
    protected $primaryKey = 'id';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'agencia', 'numeroConta', 'tipo', 'cpf', 'rg', 'saldo', 'senha'
    ];        
}
