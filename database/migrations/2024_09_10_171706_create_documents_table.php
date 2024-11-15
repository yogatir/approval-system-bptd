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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('approval_id');
            $table->enum('type', ['DOCUMENT_ID_CARD', 'DOCUMENT_NPWP', 'DOCUMENT_REQUEST', 'DOCUMENT_AGREEMENT', 'DOCUMENT_PERMIT', 'DOCUMENT_BILLING'])->default('DOCUMENT_ID_CARD');
            $table->string('title');
            $table->string('path');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approval_id')->references('id')->on('approvals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
