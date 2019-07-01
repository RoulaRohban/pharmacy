<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitsTable extends Migration
{
    
    public function up()
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('drug_id');
            $table->date('created_at');
            $table->integer('drugprofit');
            $table->unsignedInteger('saleDrug_id');

            $table->foreign('drug_id') ->references('id')->on('drugs');
            $table->foreign('saleDrug_id') ->references('id')->on('sales_drugs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profits');
    }
}
