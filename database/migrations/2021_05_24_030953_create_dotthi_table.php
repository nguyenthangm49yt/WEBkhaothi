<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotthiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotthi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma');
            $table->string('name');
           
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->date('han_dang_ki');
            $table->string('status');
            $table->string('mo_ta');
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
        Schema::dropIfExists('dotthi');
    }
}
