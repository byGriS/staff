<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('entity')->nullable();
            $table->string('object')->nullable();
            $table->string('post')->nullable();
            $table->string('birthday')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('placeBirth')->nullable();
            $table->string('address')->nullable();
            $table->string('registration')->nullable();
            $table->string('homePhone')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('familyStatus')->nullable();
            $table->string('additionalEducation')->nullable();
            $table->string('sport')->nullable();
            $table->string('computer')->nullable();
            $table->string('army')->nullable();
            $table->string('badHabbits')->nullable();
            $table->string('goodHabbits')->nullable();
            $table->boolean('irregular')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
