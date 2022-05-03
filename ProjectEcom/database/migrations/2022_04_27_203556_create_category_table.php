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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique;   

            $table->unsignedInteger('created_by')->index(); 
                     
            $table->unsignedInteger('updated_by')->nullable()->index(); 
            
            $table->timestamps();
        });
        Schema::table('category', function (Blueprint $table) {
            
            $table->foreign('created_by')->references('id')->on('users'); 
            
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
