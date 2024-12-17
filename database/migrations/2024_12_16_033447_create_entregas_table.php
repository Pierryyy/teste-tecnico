<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_transportadora');

            $table->foreign('id_transportadora')
                ->references('id')
                ->on('transportadoras')
                ->onDelete('cascade');

            $table->integer('volumes');
            $table->json('remetente');
            $table->json('destinatario');
            $table->json('rastreamento');
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
        Schema::dropIfExists('entregas');
    }
}
