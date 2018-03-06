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
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->integer('price')->defalut(0);
            $table->integer('price_over')->defalut(0);
            $table->integer('number_peces')->defalut(0);
            $table->integer('available')->default(0);
            $table->integer('slider')->default(0);
            $table->integer('home_page')->default(0);
            $table->string('image',225);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
