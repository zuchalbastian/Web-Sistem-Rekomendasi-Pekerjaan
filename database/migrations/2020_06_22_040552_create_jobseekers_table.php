<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->bigIncrements('id_jobseeker');
            $table->string('predict_id');
            $table->string("kebutuhan");
            $table->string("nama_perusahaan");
            $table->string("kemampuan", 255)->nullable();
            $table->string("pendidikan", 255)->nullable();
            $table->string("usia", 255)->nullable();
            $table->string("jenis_kelamin", 255)->nullable();
            $table->string("pengalaman", 255)->nullable();
            $table->string("bahasa", 255)->nullable();
            $table->string("kemampuan_khusus", 255)->nullable();
            $table->string("domisili", 255)->nullable();
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
        Schema::dropIfExists('jobseekers');
    }
}
