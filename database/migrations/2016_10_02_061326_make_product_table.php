<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price')->default(1);
            $table->string('img_url')->default('https://lh3.googleusercontent.com/-SOF_S0k8u38/VqY5OpxPNLI/AAAAAAAAG_c/ddDqpvfjdF8/generic%2Buser%2Bprofile.png');
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
        Schema::drop('product');
    }
}
