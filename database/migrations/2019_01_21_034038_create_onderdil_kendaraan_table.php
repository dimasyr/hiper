<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnderdilKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onderdil_kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_seri')->unique();
            $table->string('merk',30);
            $table->integer('masa_berlaku');
            $table->string('tempat_pembelian',100);
//            $table->string('kategori',15);
            $table->timestamps();

            $table->integer('onderdil_id')->unsigned();
            $table->foreign('onderdil_id')->references('id')->on('onderdil');
            $table->bigInteger('permintaan_id')->unsigned();
            $table->foreign('permintaan_id')->references('id')->on('permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onderdil_kendaraan');
    }
}
