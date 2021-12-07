<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bagian_tanamen_id')->references('id')->on("bagian_tanamen")->onDelete('cascade');
            $table->foreignId('unsur_id')->references('id')->on("unsur_haras")->onDelete('cascade');
            $table->foreignId('tanamen_id')->references('id')->on("tanamen")->onDelete('cascade');;
            $table->string('name');
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
        Schema::dropIfExists('gejalas');
    }
}
