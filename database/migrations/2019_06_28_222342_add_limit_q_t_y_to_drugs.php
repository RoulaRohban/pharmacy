<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLimitQTYToDrugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drugs', function (Blueprint $table) {
            $table->integer('limitQTY');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drugs', function (Blueprint $table) {
             $table->dropColumn('limitQTY');
        });
    }
}
