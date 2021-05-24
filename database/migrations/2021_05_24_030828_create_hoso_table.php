<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoso', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name');
            $table->string('gender');
            $table->string('birthday');
            $table->string('place_of_birth');
            $table->string('nation_type');
            $table->string('cmnd');
            $table->string('date_create_cmnd');
            
            $table->string('place_create_cmnd');
            $table->string('hk_tinh');
            $table->string('hk_huyen');
            $table->string('avatar');

            $table->string('email');
            $table->string('phonenumber_dd');
            $table->string('phonenumber_cd');
            $table->string('sent_notice_to_person');
            $table->string('sent_notice_to_address');
            $table->integer('uu_tien_type');
            $table->string('uu_tien_place');

            $table->string('lop10_tinh');
            $table->string('lop10_huyen');
            $table->string('lop10_truong');
            $table->string('lop11_tinh');
            $table->string('lop11_huyen');
            $table->string('lop11_truong');
            $table->string('lop12_tinh');
            $table->string('lop12_huyen');
            $table->string('lop12_truong');

            $table->integer('lop10_diemki1');
            $table->integer('lop10_diemki2');
            $table->integer('lop10_diemtong');
            $table->integer('lop11_diemki1');
            $table->integer('lop11_diemki2');
            $table->integer('lop11_diemtong');
            $table->integer('lop12_diemki1');
            $table->integer('lop12_diemki2');
            $table->integer('lop12_diemtong');
            
            $table->integer('nam_totnghiep');

            $table->integer('dToan');
            $table->integer('dVan');
            $table->integer('dNgoaiNgu');
            $table->integer('dLy');
            $table->integer('dHoa');
            $table->integer('dSinh');
            $table->integer('dSu');
            $table->integer('dDia');
            $table->integer('dGdcd');
          

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
        Schema::dropIfExists('hoso');
    }
}
