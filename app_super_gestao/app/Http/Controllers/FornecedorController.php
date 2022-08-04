<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
            ]
        ];

        $msg = isset($fornecedores[0]['cnpj']) ? 'CPNJ Informado!!' : 'CNPJ NÃO Informado!!';
        echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
