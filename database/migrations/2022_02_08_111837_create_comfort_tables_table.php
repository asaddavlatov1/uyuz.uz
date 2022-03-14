<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComfortTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comfort_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comfort_id');
            $table->unsignedBigInteger('flat_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('flat_id')->references('id')->on('flats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('comfort_id')->references('id')->on('comforts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comfort_tables');
    }
}
