<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transforms', function (Blueprint $table) {
            $table->bigIncrements('id_transforms');
            $table->integer('user_id')->unsigned();
            $table->string("KT_1");
            $table->string("KT_2");
            $table->string("KT_3");
            $table->string("KT_4");
            $table->string("KT_5");
            $table->string("KT_6");
            $table->string("KT_7");
            $table->string("KT_8");
            $table->string("PD_1");
            $table->string("PD_2");
            $table->string("PD_3");
            $table->string("IPK_1");
            $table->string("US_1");
            $table->string("US_2");
            $table->string("US_3");
            $table->string("JK_1");
            $table->string("FG_1");
            $table->string("PL_1");
            $table->string("BS_1");
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
        Schema::dropIfExists('transforms');
    }
}
