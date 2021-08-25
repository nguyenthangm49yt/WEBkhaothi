<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotthiDiemthiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotthi_diemthi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dotthi')->unsigned();
            $table->foreign('id_dotthi')->references('id')->on('dotthi')->onDelete('cascade');

            $table->integer('id_diemthi')->unsigned();
            $table->foreign('id_diemthi')->references('id')->on('diemthi')->onDelete('cascade');
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
        Schema::dropIfExists('dotthi_diemthi');
    }
}
