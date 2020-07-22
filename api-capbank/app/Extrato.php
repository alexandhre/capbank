<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Extrato extends Model
{
    protected $table = 'Extrato';  
    protected $primaryKey = 'id';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'acao', 'saldo', 'data'
    ];        
}
