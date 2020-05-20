<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status');
            $table->string('name');
            $table->string('slug');
            $table->integer('n_rooms');
            $table->integer('n_baths');
            $table->integer('type_id');
            $table->string('image');
            $table->decimal('price',11,2);
            $table->integer('in_discount');
            $table->integer('discount');
            $table->text('content');
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
