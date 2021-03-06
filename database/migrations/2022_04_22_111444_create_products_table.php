<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('product_id');
            $table->integer('group_id');
            $table->integer('distinct_id');
            $table->float('min_price');
            $table->float('min_mrp');
            $table->float('max_price');
            $table->float('max_mrp');
            $table->enum('status', ['active', 'disabled', 'deleted', 'out_of_stock', 'limited_stock', 'coming_soon'])->default('active');
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
