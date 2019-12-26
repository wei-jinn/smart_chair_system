<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id')->nullable();
            $table->double('happy')->nullable();
            $table->double('sad')->nullable();
            $table->double('fear')->nullable();
            $table->double('calm')->nullable();
            $table->double('angry')->nullable();
            $table->double('confused')->nullable();
            $table->double('disgusted')->nullable();
            $table->double('surprised')->nullable();
            $table->string('most_likely')->nullable();
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
        Schema::dropIfExists('emotions');
    }
}
