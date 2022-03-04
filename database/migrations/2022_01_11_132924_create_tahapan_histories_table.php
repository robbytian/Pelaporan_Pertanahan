<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapanHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahapan_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fieldstaff_id');
            $table->string('tahapan', 20);
            $table->integer('jumlah');
            $table->string('evidence')->nullable();
            $table->foreign('fieldstaff_id')->references('id')->on('fieldstaffs')->onDelete('cascade');
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
        Schema::dropIfExists('tahapan_histories');
    }
}
