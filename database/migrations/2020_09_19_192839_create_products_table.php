<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('volume_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image_url');  
            $table->boolean('status'); 
            $table->integer('price')->nullable();        
            $table->foreign('brand_id')->references('id')->on('brands')->ondelete('cascade');
            $table->text('description');
            $table->foreign('category_id')->references('id')->on('categories')->ondelete('cascade');
             $table->foreign('volume_id')->references('id')->on('volumes')->ondelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
