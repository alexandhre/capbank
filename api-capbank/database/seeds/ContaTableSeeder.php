<?php

use App\Conta;
use Illuminate\Database\Seeder;

class ContaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conta::create([
            'id' => 1,
            'nome'=> "João Marcelo",
            'agencia'=> "45678",
            'numeroConta'=> "3456789",
            'tipo'=> "Corrente",
            'cpf'=> "123.456.789-99",
            'rg'=> "1553345287",
            'senha' => md5(123456),
            'saldo'=> 100
        ]); 
    }
}
