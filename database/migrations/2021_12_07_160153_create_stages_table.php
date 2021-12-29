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
            $table->integer('pemetaan');
            $table->integer('penyuluhan');
            $table->integer('penyusunan');
            $table->integer('pendampingan');
            $table->integer('evaluasi');
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
