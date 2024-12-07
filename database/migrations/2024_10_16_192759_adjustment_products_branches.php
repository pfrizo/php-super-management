<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustmentProductsBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table){
            $table->id();
            $table->string('branch'. 30);
            $table->timestamps();
        });

        Schema::create('products_branches', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->float('sell_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('products', function (Blueprint $table){
            $table->dropColumn(['sell_price', 'min_stock', 'max_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->float('sell_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
        });

        Schema::dropIfExists('products_branches');
        Schema::dropIfExists('branches');
    }
}
