<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_obat', function (Blueprint $table) {
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obat');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->integer('kuantitas');
            $table->double('harga')->nullable();
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
        Schema::dropIfExists('transaksi_obat');
    }
}
