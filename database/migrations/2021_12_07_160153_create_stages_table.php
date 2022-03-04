<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->integer('penyuluhan');
            $table->integer('pemetaan_sosial');
            $table->integer('penyusunan_model');
            $table->integer('pendampingan');
            $table->integer('penyusunan_data');
            $table->foreignId('fieldstaff_id')->nullable();
            $table->foreign('fieldstaff_id')->references('id')->on('fieldstaffs')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
