<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Extrato;
use Illuminate\Http\Request;
use NumberFormatter;

class ContaController extends Controller
{  

    /**                    
     * @return info conta
     */

    public function index($idConta = 1)
    {        
        $extrato = Extrato::all();        
        foreach ($extrato as $value) {
            $value->data = date('d/m/Y', strtotime($value->data));
            $value->saldo = number_format($value->saldo, 2, ',', '.');            
        }        
        $conta = Conta::where('id',$idConta)->get();
        foreach ($conta as $value) {
            $value->saldo = number_format($value->saldo, 2, ',', '.');
            $value->senha = "123456";            
        }              
        $response = [
            'extrato' => $extrato,
            'conta' => $conta
        ];

        return json_encode($response);
    } 
    
    /**
     * Create a new operacao.
     *
     * @param  Request  $request
     * @return Message
     */
    public function store(Request $request)
    {
        if($this->autorizarOperacao($request)){
            $conta = Conta::find($request['id'])->get();
            foreach ($conta as $value) {
                $saldoAntigo = $value->saldo;   
                $valor = str_replace('.' , '', $request['valor']);
                $valor = str_replace(',' , '.', $valor);            
                if($request['tipoOperacao'] == 'Saque' && isset($request['valor'])){
                    $novoSaldo = (double) $saldoAntigo - (double) $valor;
                    $acaoExtrato = "Saque";
                }else{
                    $novoSaldo = (double) $saldoAntigo + (double) $valor;
                    $acaoExtrato = "Depósito";
                }
            }
            $item = Conta::find($request['id'])->update(
                [
                    'saldo' => $novoSaldo
                ]
            );
            if ($item) {
                $extrato = [
                    'acao' => $acaoExtrato,
                    'saldo' => $saldoAntigo
                ];
                $this->gerarExtrato($extrato);
                $msg = [
                    'error' => false,
                    'message' => 'Operação efetuada com sucesso!'
                ];
            } else {
                $msg = [
                    'error' => true,
                    'message' => 'Erro ao efetuar a operação, entre em contato com o suporte!'
                ];
            }
        }else{
            $msg = [
                'error' => true,
                'message' => 'Operação não permitida, senha incorreta. Retorne a tela principal e clique em ver senha!'
            ];
        }       
       
        $response = [
            'response' => $msg
        ];
        return $response;
    }

    public function gerarExtrato($extrato)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i:s');
        Extrato::create(
            [
                'acao' => $extrato['acao'],
                'saldo' => $extrato['saldo'],
                'data' => $date
            ]
        );
    }

    public function autorizarOperacao($request)
    {       
        $extrato = Conta::where('senha',md5($request['senha']))
        ->where('id',$request['id'])
        ->get();               
        if(count($extrato) > 0){
            return true;
        }else{
            return false;
        }
    }
}
