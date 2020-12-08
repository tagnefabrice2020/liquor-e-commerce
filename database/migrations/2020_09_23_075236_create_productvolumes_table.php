<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductvolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_volumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('volume_id')->unsigned();
            $table->integer('sh_location_id')->unsigned()->nullable();
            $table->string('units')->nullable();
            $table->integer('price');
            $table->integer('quantity')->nullable();
            $table->enum('stock_status', ['in stock', 'out of stock'])->default('out of stock');
            $table->foreign('product_id')->references('id')->on('products')->ondelete('cascade');
            $table->foreign('sh_location_id')->references('id')->on('sh_locations')->ondelete('cascade');
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
        Schema::dropIfExists('productvolumes');
    }
}
