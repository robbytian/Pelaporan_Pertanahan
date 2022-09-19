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
            $table->string('kegiatan', 100);
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('saran')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
