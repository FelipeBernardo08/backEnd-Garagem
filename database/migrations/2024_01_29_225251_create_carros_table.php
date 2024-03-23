<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('potencia_motor');
            $table->string('valvulas_motor');
            $table->string('combustivel');
            $table->string('cambio');
            $table->string('km_atual');
            $table->string('ano_fabricacao');
            $table->string('final_placa')->nullable();
            $table->string('cor');
            $table->string('categoria');
            $table->text('descricao')->nullable();
            $table->string('portas');

            $table->boolean('ar_condicionado')->nullable();
            $table->boolean('ar_quente')->nullable();
            $table->boolean('air_bag_dianteiro')->nullable();
            $table->boolean('air_bag_traseiro')->nullable();
            $table->boolean('vidro_eletrico_dianteiro')->nullable();
            $table->boolean('vidro_eletrico_traseiro')->nullable();
            $table->boolean('multimidea')->nullable();
            $table->boolean('camera_re')->nullable();
            $table->boolean('alarme')->nullable();
            $table->boolean('travas_eletricas')->nullable();
            $table->boolean('computador_bordo')->nullable();
            $table->boolean('regulagem_banco')->nullable();
            $table->boolean('regulagem_volante')->nullable();

            $table->string('placa');
            $table->boolean('ipva_pago')->nullable();
            $table->float('ipva_valor')->nullable();
            $table->float('fipe')->nullable();
            $table->float('valor_pago');
            $table->float('porcentagem_maxima')->nullable();
            $table->float('valor');
            $table->boolean('vendido')->nullable();

            $table->unsignedBigInteger('fotos')->nullable();

            $table->foreign('fotos')->references('id')->on('imagem_carros')->onDelete('cascade');
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('carros');
    }
}
