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
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('file')->nullable();
            $table->string('do_you_have_children')->nullable();
            $table->string('do_you_have_an_illness')->nullable();
            $table->string('are_you_taking_medication')->nullable();
            $table->string('number_of_years_of_marriage')->nullable();
            $table->string('have_you_been_treated_before')->nullable();
            $table->string('what_type_of_treatment')->nullable();
            $table->string('how_many_times_was_the_treatment_taken')->nullable();
            $table->string('do_you_have_varicocele')->nullable();
            $table->string('is_there_a_previous_analysis')->nullable();
            $table->string('are_there_other_diseases')->nullable();
            $table->string('is_the_cycle_regular')->nullable();
            $table->string('ire_there_cysts_on_the_ovary')->nullable();
            $table->string('has_the_T3-T4_thyroid_gland_been_analyzed')->nullable();
            $table->string('is_there_anemia')->nullable();
            $table->string('are_there_gynecological_infections_and_burning_with_urine')->nullable();
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
