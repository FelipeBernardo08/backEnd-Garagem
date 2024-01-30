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
            $table->string('final_placa');
            $table->string('cor');
            $table->string('categoria');
            $table->text('descricao')->nullable();

            $table->boolean('ar_condicionado');
            $table->boolean('ar_quente');
            $table->boolean('air_bag_dianteiro');
            $table->boolean('air_bag_traseiro');
            $table->boolean('vidro_eletrico_dianteiro');
            $table->boolean('vidro_eletrico_traseiro');
            $table->boolean('multimidea');
            $table->boolean('camera_re');
            $table->boolean('alarme');
            $table->boolean('travas_eletricas');
            $table->boolean('computador_bordo');
            $table->boolean('regulagem_banco');
            $table->boolean('regulagem_volante');

            $table->string('placa');
            $table->boolean('ipva_pago')->nullable();
            $table->float('ipva_valor')->nullable();
            $table->float('fipe')->nullable();
            $table->float('valor_pago');    
            $table->float('porcentagem_maxima');
            $table->float('valor'); 
            $table->boolean('vendido')->nullable();
            
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
        Schema::dropIfExists('carros');
    }
}
