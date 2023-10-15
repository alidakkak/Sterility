<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_data', function (Blueprint $table) {
            $table->id();
            $table->string('weight');
            $table->string('height');
            $table->string('file')->nullable();
            $table->string('do_you_have_children');
            $table->string('do_you_have_an_illness');
            $table->string('are_you_taking_medication');
            $table->string('number_of_years_of_marriage');
            $table->string('have_you_been_treated_before');
            $table->string('what_type_of_treatment');
            $table->string('how_many_times_was_the_treatment_taken');
            $table->string('do_you_have_varicocele');
            $table->string('is_there_a_previous_analysis');
            $table->string('are_there_other_diseases');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_data');
    }
};
