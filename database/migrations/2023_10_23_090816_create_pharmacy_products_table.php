<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('product_id', false, true);
            $table->integer('pharmacy_id', false, true);
            $table->decimal('product_price', 10);
            $table->integer('product_quantity');

            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_products');
    }
}
