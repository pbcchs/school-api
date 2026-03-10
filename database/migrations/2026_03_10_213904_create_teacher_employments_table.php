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
        Schema::create('teacher_employments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();

            $table->string('designation');

            $table->string('ntrca_number')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('mpo_date')->nullable();

            $table->string('pds_id')->nullable();
            $table->string('index_number')->nullable();

            $table->enum('employment_type',['Permanent','Non-permanent','Guest']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_employments');
    }
};
