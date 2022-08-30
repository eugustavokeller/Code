<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'forncedor100.com.br';
        $fornecedor->uf = 'SC';
        $fornecedor->email = 'contato@forncedor100.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor200.com.br',
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor300.com.br',
        ]);
    }
}