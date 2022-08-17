<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // adicionar relacionamento com tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // adicionar relacionamento com tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remover o relacionamento com tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // remover a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            // remover a column
            $table->dropColumn('unidade_id');
        });


        // remover o relacionamento com tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            // remover a fk
            $table->dropForeign('produtos_unidade_id_foreign');
            // remover a column
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
