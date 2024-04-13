<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('potencia_motor');
            $table->string('combustivel');
            $table->string('freio');
            $table->string('cambio');
            $table->string('km_atual');
            $table->string('ano_fabricacao');
            $table->string('final_placa')->nullable();
            $table->string('cor');
            $table->string('descricao')->nullable();

            $table->boolean('freio_abs');
            $table->boolean('alarme');
            $table->boolean('injecao_eletronica');
            $table->boolean('carregador_12v');
            $table->boolean('partida_eletrica');

            $table->string('placa');
            $table->string('chassis');
            $table->boolean('ipva_pago')->nullable();
            $table->float('ipva_valor')->nullable();
            $table->float('fipe')->nullable();
            $table->float('porcentagem_maxima');
            $table->float('valor_pago');
            $table->float('valor');
            $table->boolean('vendido')->nullable();

            $table->unsignedBigInteger('fotos')->nullable();

            $table->foreign('fotos')->references('id')->on('imagem_motos')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('motos');
    }
}
