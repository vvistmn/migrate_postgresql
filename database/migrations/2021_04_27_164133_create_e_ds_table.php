<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_ds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('num');
            $table->date('reg_date');
            $table->bigInteger('ed_type_id')->unsigned()->nullable();           
            $table->bigInteger('source_id')->unsigned()->nullable();           
            $table->bigInteger('dos_id')->unsigned()->nullable();           
            $table->bigInteger('source_ed_id');
            $table->dateTime('save_period');
            $table->foreign('ed_type_id')->references('dt_id')->on('document_types')->onDelete('cascade');
            $table->foreign('source_id')->references('source_id')->on('sources')->onDelete('cascade');
            $table->foreign('dos_id')->references('id')->on('dossiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_ds');
    }
}
