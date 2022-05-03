<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name',50)->collate('utf8mb4_unicode_ci')->index();
            $table->decimal('price', $precision = 8, $scale = 2);         
            $table->string('description',150)->index();
            $table->string('gallery',255);
            $table->integer('quantity');
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->string('quantitative',30);           
            $table->timestamps();
            
           

        });
        Schema::create('products_categories', function (Blueprint $table) {
           
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('category_id')->index();          
            $table->foreign('category_id')->references('id')->on('category');  
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');       
            $table->timestamps();
            
        });

   
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');     
            $table->enum('status', ['pending', 'success']);          
            $table->enum('payment_method', ['cash', 'credit cart']);
            $table->enum('payment_status', ['pending', 'paid']);
            $table->string('address',100);
            $table->timestamps();
            
        });
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products','cart','orders','products_categories');
    }
};
