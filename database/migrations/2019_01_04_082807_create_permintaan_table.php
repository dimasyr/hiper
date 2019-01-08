<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('supir_id')->unsigned();
            $table->foreign('supir_id')->references('id')->on('users');
            $table->integer('teknisi_id')->unsigned();
            $table->foreign('teknisi_id')->references('id')->on('users');
            $table->integer('operator_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('users');
            $table->string('kendaraan_id',15);
            $table->foreign('kendaraan_id')->references('plat_nomor')->on('kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan');
    }
}
