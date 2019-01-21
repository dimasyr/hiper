<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->string('plat_nomor',15)->primary();
            $table->string('nomor_rangka',30)->nullable();
            $table->string('nomor_mesin',30)->nullable();
            $table->date('stnk')->nullable();
            $table->date('pajak')->nullable();
            $table->date('kir')->nullable();
            $table->timestamps();

            $table->integer('supir_id')->unsigned()->nullable();
            $table->foreign('supir_id')->references('id')->on('users');
            $table->integer('jenis_kendaraan_id')->unsigned();
            $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraan');
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
        Schema::dropIfExists('kendaraan');
    }
}
