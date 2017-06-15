<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('panels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->string('name');
            $table->float('width');
            $table->float('height');
            $table->string('image')->nullable();
            $table->integer('panel_type_id')->unsigned();
            $table->integer('units')->unsigned();
            $table->integer('charges')->unsigned();
            $table->integer('actual_charges')->unsigned();
            $table->integer('available')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('panels');
    }
}
