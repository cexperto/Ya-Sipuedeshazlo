<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description');
            $table->text('iframe')->nullable();
            $table->string('type');
            $table->string('duration');
            $table->double('cost');
            $table->string('valoration');
            $table->string('status');
            $table->string('address');
            $table->string('longbox');
            $table->string('latbox');
            $table->bigInteger('codUserServices')->unsigned();
           
            $table->timestamps();
            $table->foreign('codUserServices')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
