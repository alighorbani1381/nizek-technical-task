<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockPricesTable extends Migration
{

    public function up()
    {
        Schema::create('stock_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('price');
            $table->date('date');
            $table->index(['date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_prices');
    }
}
