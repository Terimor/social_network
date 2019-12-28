<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('actor');
            $table->foreign('actor')->references('id')->on('users');

            $table->unsignedBigInteger('target');
            $table->foreign('target')->references('id')->on('users');

            $table->enum('action', ['subscribe', 'block']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_relations');
    }
}
