<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('fe_id')->unsigned()->nullable();           
            $table->bigInteger('fr_id')->unsigned()->nullable();           
            $table->bigInteger('ed_id')->unsigned()->nullable();           
            $table->bigInteger('size')->unsigned();
            $table->string('path');
            $table->foreign('fr_id')->references('fr_id')->on('file_roles')->onDelete('cascade');
            $table->foreign('ed_id')->references('id')->on('e_ds')->onDelete('cascade');
            $table->foreign('fe_id')->references('fe_id')->on('file_extensions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
