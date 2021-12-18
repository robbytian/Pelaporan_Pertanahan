<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_laporan');
            $table->string('kegiatan',30);
            $table->string('keterangan');
            $table->string('foto');
            $table->string('keluhan');
            $table->string('saran');
            $table->foreignId('fieldstaff_id')->nullable();
            $table->foreign('fieldstaff_id')->references('id')->on('fieldstaffs')->onDelete('set null');
            $table->string('peserta',100);
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
        Schema::dropIfExists('reports');
    }
}
