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
            $table->string('names');
            $table->string('image')->nullable();
            $table->string('description');
            $table->text('iframe')->nullable();            
            $table->string('duration');
            $table->double('cost');
            
            $table->string('state');            
            $table->string('longbox');
            $table->string('latbox');

            $table->string('slug')->unique();

            $table->integer('employerId')->nullable();

            $table->bigInteger('codUserServices')->unsigned();            
           
            $table->timestamps();
            $table->foreign('codUserServices')->references('id')->on('users')->onDelete('cascade');

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
