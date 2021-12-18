<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldstaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fieldstaffs', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->date('date_born');
            $table->string('alamat');
            $table->string('phone_number');
            $table->boolean('pemetaan');
            $table->boolean('penyuluhan');
            $table->boolean('penyusunan');
            $table->boolean('pendampingan');
            $table->boolean('evaluasi');
            $table->integer('target');
            $table->foreignId('user_id');
            $table->foreignId('kantah_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kantah_id')->references('id')->on('kantahs')->onDelete('set null');
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
        Schema::dropIfExists('fieldstaffs');
    }
}
