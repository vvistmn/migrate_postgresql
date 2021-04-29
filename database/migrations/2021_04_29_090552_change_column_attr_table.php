<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attrs', function (Blueprint $table) {
            // $table->boolean('attr_is_etalon')->change()->default('false');
            $table->dropColumn('attr_is_etalon');
        });
        Schema::table('attrs', function (Blueprint $table) {
            $table->boolean('attr_is_etalon')->default('false');
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
            $table->dropColumn('attr_is_etalon');
            
        });
        Schema::table('attrs', function (Blueprint $table) {
            $table->string('attr_is_etalon'); 
        });
    }
}
