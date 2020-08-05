<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id_school');
            $table->integer('user_id')->unsigned();
            $table->string("nama_sekolah");
            $table->string("alamat_sekolah");
            $table->string("gelar");
            $table->string("ipk")->nullable();
            $table->string("bidang_studi")->nullable();
            $table->string("tgl_mulai_kelulusan");
            $table->string("tgl_akhir_kelulusan");
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
        Schema::dropIfExists('schools');
    }
}
