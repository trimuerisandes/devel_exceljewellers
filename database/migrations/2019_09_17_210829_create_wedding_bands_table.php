<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_bands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_code');
            $table->string('item_sku');
            $table->string('style');
            $table->string('name');
            $table->string('image');
            $table->string('image_360')->nullable();
            $table->string('currency');
            $table->decimal('price', 65,2);
            $table->decimal('sale_price', 65,2);
            $table->longText('description')->nullable();
            $table->text('collection')->nullable();
            $table->text('metal');
            $table->text('color');
            $table->string('width')->nullable();
            $table->decimal('thickness',65,2)->nullable();
            $table->string('setting_type')->nullable();
            $table->string('carat')->nullable();
            $table->string('brand')->nullable();
            $table->string('item_link')->nullable();
            $table->integer('quantity');
            $table->integer('count');
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
        Schema::dropIfExists('wedding_bands');
    }
}
