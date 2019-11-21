<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('brand');
            $table->string('category');
            $table->decimal('price',13,2);
            $table->decimal('initialprice',13,2);
            $table->tinyInteger('save');
            $table->text('description');
            $table->integer('xs');
            $table->integer('s');
            $table->integer('m');
            $table->integer('l');
            $table->integer('xl');
            $table->integer('none');
            $table->string('color'); 
            $table->string('gender');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('sizeguide');
            $table->string('fitguide');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
