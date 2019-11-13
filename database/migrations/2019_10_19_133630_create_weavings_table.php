<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weavings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cat');
            $table->string('title');
            $table->string('size');
            $table->string('color');
            $table->string('packing');
            $table->string('wiggle');
            $table->string('qty');
            $table->string('invoice');
            $table->string('machine');
            $table->longText('memo');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weavings');
    }
}
