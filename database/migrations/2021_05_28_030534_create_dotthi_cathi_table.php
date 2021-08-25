<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotthiCathiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotthi_cathi', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->integer('id_dotthi')->unsigned();
            $table->foreign('id_dotthi')->references('id')->on('dotthi')->onDelete('cascade');

            $table->integer('id_cathi')->unsigned();
            $table->foreign('id_cathi')->references('id')->on('cathi')->onDelete('cascade');
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
        Schema::dropIfExists('dotthi_cathi');
    }
}
