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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('enrollment',255);
            $table->string('dob',255);
            $table->string('email',255);
            $table->string('phone',255);
            $table->string('gender',255);
            $table->string('father',255);
            $table->string('mother',255);
            $table->string('status',255);
            $table->integer('total_fee');
            $table->integer('fee_paid')->nullable()->default(0);
            $table->string('ref_agency',255)->nullable();
            $table->string('ref_lead',255)->nullable();
            $table->string('address',1000)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('country',50)->nullable();
            $table->string('course',50);
            $table->string('batch',50);
            $table->string('admission_date',255);
            $table->string('photo',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
