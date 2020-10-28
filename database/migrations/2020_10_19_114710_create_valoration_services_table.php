<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoration_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valoration');
            $table->string('comments');
            $table->timestamps();
            $table->bigInteger('codServiceValoration')->unsigned();

            $table->foreign('codServiceValoration')->references('id')->on('services')->odDelete('cascade');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoration_services');
    }
}
