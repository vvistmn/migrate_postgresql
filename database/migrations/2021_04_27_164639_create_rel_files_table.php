<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_files', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('f1_id')->unsigned()->nullable();           
            $table->bigInteger('f2_id')->unsigned()->nullable(); 
            $table->foreign('f1_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('f2_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_files');
    }
}
