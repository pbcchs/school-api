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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('full_name');
            $table->string('full_name_bn')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();

            $table->enum('marital_status', ['Married','Unmarried'])->nullable();
            $table->enum('religion', ['Islam','Christian','Hinduism','Buddhism'])->nullable();
            $table->enum('gender', ['Male','Female','Other'])->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('nid_number')->nullable();
            $table->string('birth_certificate')->nullable();

            $table->string('photo')->nullable();

            $table->string('mobile');
            $table->string('mobile_alt')->nullable();

            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            $table->string('designation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
