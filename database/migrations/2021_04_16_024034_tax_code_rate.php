<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaxCodeRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_code_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('state_province');
            $table->decimal('tax_rate', 65,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_code_rates');
    }
}
