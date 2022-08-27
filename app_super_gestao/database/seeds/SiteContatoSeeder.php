<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SiteContato::class, 100)->create();
        // $contato = new SiteContato();
        // $contato->nome = '';
        // $contato->telefone = '';
        // $contato->email = '';
        // $contato->motivo_contato = '';
        // $contato->mensagem = '';
    }
}
