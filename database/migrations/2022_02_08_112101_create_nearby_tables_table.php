<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearbyTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nearby_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nearby');
            $table->unsignedBigInteger('flat');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('flat')->references('id')->on('flats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nearby')->references('id')->on('nearbies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nearby_tables');
    }
}
