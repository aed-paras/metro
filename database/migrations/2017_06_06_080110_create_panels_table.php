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
            $table->integer('panel_type_id')->unsigned();
            $table->float('width');
            $table->float('height');
            $table->integer('units')->unsigned();
            $table->integer('available')->unsigned();
            $table->string('description', 4000)->nullable();
            $table->string('image')->nullable();
            $table->float('charges')->unsigned();
            $table->float('actual_charges')->unsigned();
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
