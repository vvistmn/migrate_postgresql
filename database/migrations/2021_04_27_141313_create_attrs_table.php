<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attrs', function (Blueprint $table) {
            $table->increments('attr_id');
            $table->bigInteger('parent_attr_id')->unsigned()->nullable();           
            $table->string('attr_name');
            $table->string('attr_code');
            $table->text('attr_descr');
            $table->string('attr_value_type');
            $table->bigInteger('etalon_attr_id')->unsigned()->nullable();           
            $table->string('attr_is_etalon');
            $table->foreign('parent_attr_id')->references('attr_id')->on('attrs')->onDelete('cascade');
            $table->foreign('etalon_attr_id')->references('attr_id')->on('attrs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attrs');
    }
}
