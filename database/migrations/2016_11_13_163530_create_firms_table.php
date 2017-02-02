<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->increments('id');
           
            
			
            $table->string('title')->nullable();
            $table->string('city')->nullable();
            $table->string('category')->default('other');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('show_website')->nullable();
            $table->tinyInteger('show_email')->nullable();
            $table->tinyInteger('show_phone')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->default('nologo.jpg');
			$table->timestamps();
			
			
			
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
