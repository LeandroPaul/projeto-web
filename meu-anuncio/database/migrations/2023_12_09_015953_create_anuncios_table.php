<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->enum('finalidade',['Aluguel', 'Troca', 'Venda']);
            $table->string('endereco')->nullable();
            $table->string('cep')->nullable();
            $table->decimal('valor', 10,2);
            $table->text('detalhes');
            $table->string('mapa')->nullable();
            $table->integer('visualizacoes')->default(0);
            $table->enum('status',['Rascunho', 'Publicado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
