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
                'cnpj' => '00.000.000/0001-00',
                'ddd' => '11', // São Paulo - SP
                'telefone' => '0000-0000',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '00.000.000/0001-01',
                'ddd' => '85', // Fortaleza - CE
                'telefone' => '0000-0000',

            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '00.000.000/0001-02',
                'ddd' => '48', // Imbituba - SC
                'telefone' => '0000-0000',
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
