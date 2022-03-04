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
            $table->string('name', 50);
            $table->date('date_born');
            $table->string('alamat');
            $table->string('phone_number', 15);
            $table->boolean('penyuluhan')->nullable();
            $table->boolean('pemetaan_sosial')->nullable();
            $table->boolean('penyusunan_model')->nullable();
            $table->boolean('pendampingan')->nullable();
            $table->boolean('penyusunan_data')->nullable();
            $table->integer('target')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('kantah_id')->nullable();
            $table->foreignId('kanwil_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kantah_id')->references('id')->on('kantahs')->onDelete('set null');
            $table->foreign('kanwil_id')->references('id')->on('kanwils')->onDelete('set null');
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
        Schema::dropIfExists('fieldstaffs');
    }
}
