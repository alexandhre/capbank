<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Conta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',255);
            $table->string('agencia',255);
            $table->string('numeroConta',255);
            $table->string('tipo',255);
            $table->string('senha',255); 
            $table->string('cpf',30);            
            $table->string('rg',30);
            $table->decimal('saldo',10, 2);                    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Conta');
    }
}
