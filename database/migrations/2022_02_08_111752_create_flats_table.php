<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('flat_type');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('payment_type');
            $table->unsignedBigInteger('region');
            $table->unsignedBigInteger('district');
            $table->integer('status')->default('1');
            $table->string('comment');
            $table->integer('f_storey');
            $table->integer('square');
            $table->integer('storey');
            $table->string('phone');
            $table->integer('num_room');
            $table->integer('price');
            $table->string('url');
            $table->timestamps();

            $table->foreign('flat_type')->references('id')->on('flat_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_type')->references('id')->on('payment_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
