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
        Schema::create('survey_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('survey_text');
            $table->timestamps();
        });

        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id')->nullable();
            $table->string('id_card_no');
            $table->string('phone');
            $table->unsignedBigInteger('survey_id');
            $table->enum('user_satisfaction', ['VERY_BAD', 'BAD', 'NORMAL', 'GOOD', 'VERY_GOOD']);
            $table->enum('user_importance', ['NOT_IMPORTANT', 'LESS_IMPORTANT', 'FAIRLY_IMPORTANT', 'IMPORTANT', 'VERY_IMPORTANT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
