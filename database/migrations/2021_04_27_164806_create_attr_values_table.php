<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_values', function (Blueprint $table) {
            $table->increments('attr_value_id');
            $table->string('attr_value');
            $table->bigInteger('attr_id')->unsigned()->nullable();           
            $table->bigInteger('ed_id')->unsigned()->nullable();           
            $table->foreign('attr_id')->references('attr_id')->on('attrs')->onDelete('cascade');;
            $table->foreign('ed_id')->references('id')->on('e_ds')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr_values');
    }
}
