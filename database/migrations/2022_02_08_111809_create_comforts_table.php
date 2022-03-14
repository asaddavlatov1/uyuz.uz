<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComfortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comforts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('flat_type');
            $table->timestamps();

            $table->foreign('flat_type')->references('id')->on('flat_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comforts');
    }
}
