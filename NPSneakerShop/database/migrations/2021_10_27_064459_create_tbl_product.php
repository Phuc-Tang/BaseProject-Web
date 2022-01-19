<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->string('product_name');
            $table->string('product_alias');
            $table->string('product_color');
            $table->string('product_choice');
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_sku');
            $table->integer('product_category_id');
            $table->integer('product_brand_id');
            $table->integer('product_sex_id');
            $table->text('product_content');
            $table->integer('product_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
