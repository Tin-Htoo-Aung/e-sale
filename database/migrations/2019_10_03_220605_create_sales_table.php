<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('photo');
            $table->string('description');
            $table->string('condition');
            $table->bigInteger('price');
            $table->bigInteger('transfer');
            $table->bigInteger('service');
            
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");
            
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
        Schema::dropIfExists('sales');
    }
}
