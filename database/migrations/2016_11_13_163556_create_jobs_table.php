<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('public')->default(1);
	    $table->string('position')->nullable();
            $table->string('category')->nullable();
            $table->string('city')->nullable();
            $table->string('salary')->nullable();
            $table->string('education')->default('No matter');
            $table->string('experience')->default('No matter');
            $table->string('employment_type')->default('No matter');
            $table->text('description')->nullable(); 
            $table->integer('firm_id')->unsigned();
            $table->foreign('firm_id')->references('id')->on('firms')
                      ->onDelete('cascade')
                        ->onUpdate('cascade');
            //$table->integer('user_id')->unsigned();
           // $table->foreign('user_id')->references('id')->on('users')
             //           ->onDelete('cascade')
               //         ->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
