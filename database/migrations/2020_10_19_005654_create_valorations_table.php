<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valorations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valoration');
            $table->string('comments');
            $table->integer('evaluator');

            $table->bigInteger('codeUserValoration')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('codeUserValoration')->references('id')->on('users')->odDelete('cascade');            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valorations');
    }
}
