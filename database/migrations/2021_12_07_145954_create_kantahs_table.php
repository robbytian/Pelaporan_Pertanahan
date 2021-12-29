<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKantahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kantahs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('user_id');
            $table->string('email', 50);
            $table->string('head_name', 50);
            $table->string('nip_head_name', 25);
            $table->foreignId('kanwil_id')->nullable();
            $table->foreign('kanwil_id')->references('id')->on('kanwils')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('kantahs');
    }
}
