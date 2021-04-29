<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesColumnsForeignAttrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attrs', function (Blueprint $table) {
            $table->dropForeign(['etalon_attr_id']);
            $table->dropForeign(['parent_attr_id']);
            $table->foreign('parent_attr_id')->references('attr_id')->on('attrs');
            $table->foreign('etalon_attr_id')->references('attr_id')->on('attrs');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attrs', function (Blueprint $table) {
            $table->dropForeign(['etalon_attr_id']);
            $table->dropForeign(['parent_attr_id']);
            $table->foreign('parent_attr_id')->references('attr_id')->on('attrs')->onDelete('cascade');
            $table->foreign('etalon_attr_id')->references('attr_id')->on('attrs')->onDelete('cascade');
        });
    }
}
