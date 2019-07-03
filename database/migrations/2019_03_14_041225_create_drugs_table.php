
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id'); 
            $table->text('title'); 
            $table->unsignedInteger('provider_id'); 
            $table->unsignedInteger('category_id');
            $table->text('measure'); 
            $table->float('price'); 
            $table->integer('balance');
            $table->float('OrginalPrice');
            $table->date('ExpiredDate');
            $table->date('PurchaseDate');
            $table->integer('limitQTY');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
