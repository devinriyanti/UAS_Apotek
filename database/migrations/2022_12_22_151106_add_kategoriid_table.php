<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obat' , function(Blueprint $table){
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obat' , function (Blueprint $table){
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
}
