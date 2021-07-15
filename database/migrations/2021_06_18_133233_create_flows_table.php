<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flows', function (Blueprint $table) {
            $table->id();
            $table->string('text1');
            $table->string('img1-1');
            $table->string('img1-2');
            $table->string('img1-3');
            $table->string('text2');
            $table->string('img2-1');
            $table->string('img2-2');
            $table->string('img2-3');
            $table->string('text3');
            $table->string('img3-1');
            $table->string('img3-2');
            $table->string('img3-3');
            $table->string('text4');
            $table->string('img4-1');
            $table->string('img4-2');
            $table->string('img4-3');
            $table->string('text5');
            $table->string('img5-1');
            $table->string('img5-2');
            $table->string('img5-3');
            $table->string('text6');
            $table->string('img6-1');
            $table->string('img6-2');
            $table->string('img6-3');
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
        Schema::dropIfExists('flows');
    }
}
