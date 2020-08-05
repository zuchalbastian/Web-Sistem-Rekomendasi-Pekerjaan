<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->bigIncrements('id_biodata');
            $table->integer('user_id')->unsigned();
            $table->string("nama_depan");
            $table->string("nama_belakang");
            $table->string("profesi");
            $table->string("usia");
            $table->string("jenis_kelamin");
            $table->text("alamat_lengkap");
            $table->string("kota");
            $table->string("provinsi");
            $table->string("kode_pos",10);
            $table->string("nomor_hp",15);
            $table->string("alamat_email");
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
        Schema::dropIfExists('biodatas');
    }
}
