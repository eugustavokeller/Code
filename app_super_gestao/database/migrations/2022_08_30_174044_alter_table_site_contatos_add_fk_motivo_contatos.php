<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table)
        {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // executar uma query no banco de dados pegando dados da motivo contato e inserindo na motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // criar a fk de motivo_contatos_id apontando para id da tabela motivo_contato
        // remover a coluna motivo_contato da tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // criar a coluna motivo_contato na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // atribuindo motivo_contatos_id para motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // remover a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table)
        {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
