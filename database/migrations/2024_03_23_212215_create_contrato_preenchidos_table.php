<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoPreenchidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_preenchidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->unsignedBigInteger('id_vendedor')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_moto')->nullable();
            $table->unsignedBigInteger('id_carro')->nullable();
            $table->unsignedBigInteger('id_venda')->nullable();
            $table->timestamps();

            $table->foreign('id_contrato')->references('id')->on('contratos')->onDelete('cascade');
            $table->foreign('id_vendedor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_moto')->references('id')->on('motos')->onDelete('cascade');
            $table->foreign('id_carro')->references('id')->on('carros')->onDelete('cascade');
            $table->foreign('id_venda')->references('id')->on('vendas')->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_preenchidos');
    }
}
