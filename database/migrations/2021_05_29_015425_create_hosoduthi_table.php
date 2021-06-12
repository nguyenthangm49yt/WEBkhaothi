<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosoduthiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosoduthi', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('sbd');
            $table->integer('id_dotthi');
            $table->integer('id_diemthi');
           
            $table->integer('id_baithi');
            $table->integer('id_cathi');
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
        Schema::dropIfExists('hosoduthi');
    }
}
