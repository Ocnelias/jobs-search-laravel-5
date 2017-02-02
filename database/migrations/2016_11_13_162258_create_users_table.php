<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('contact_email')->nullable();
            $table->string('password');
            $table->string('role')->default('jobseeker');

            $table->string('objective')->nullable();
            $table->string('salary')->nullable();
            $table->string('employment_type')->nullable();


            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('photo')->default('nophoto.png');
            $table->string('city')->nullable();
            $table->date('birth')->default('2000-01-01');
            $table->string('sex')->nullable();
            $table->string('phone')->nullable();

            $table->string('education_qualification')->nullable();
            $table->string('education_occupation')->nullable();
            $table->string('education_university')->nullable();
            $table->string('education_from_month')->nullable();
            $table->string('education_from_year')->nullable();
            $table->string('education_to_month')->nullable();
            $table->string('education_to_year')->nullable();

            $table->string('exp1_title')->nullable();
            $table->string('exp1_company')->nullable();
            $table->string('exp1_from_month')->nullable();
            $table->string('exp1_to_month')->nullable();
            $table->string('exp1_from_year')->nullable();
            $table->string('exp1_to_year')->nullable();
            $table->text('exp1_description')->nullable();

            $table->string('exp2_title')->nullable();
            $table->string('exp2_company')->nullable();
            $table->string('exp2_from_month')->nullable();
            $table->string('exp2_to_month')->nullable();
            $table->string('exp2_from_year')->nullable();
            $table->string('exp2_to_year')->nullable();
            $table->text('exp2_description')->nullable();
            $table->string('exp3_title')->nullable();
            $table->string('exp3_company')->nullable();
            $table->string('exp3_from_month')->nullable();
            $table->string('exp3_to_month')->nullable();
            $table->string('exp3_from_year')->nullable();
            $table->string('exp3_to_year')->nullable();
            $table->text('exp3_description')->nullable();
            $table->string('exp4_title')->nullable();
            $table->string('exp4_company')->nullable();
            $table->string('exp4_from_month')->nullable();
            $table->string('exp4_to_month')->nullable();
            $table->string('exp4_from_year')->nullable();
            $table->string('exp4_to_year')->nullable();
            $table->text('exp4_description')->nullable();
            $table->string('exp5_title')->nullable();
            $table->string('exp5_company')->nullable();
            $table->string('exp5_from_month')->nullable();
            $table->string('exp5_to_month')->nullable();
            $table->string('exp5_from_year')->nullable();
            $table->string('exp5_to_year')->nullable();
            $table->text('exp5_description')->nullable();
            
            $table->tinyInteger('public')->default(1);
 
            $table->text('description')->nullable();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
