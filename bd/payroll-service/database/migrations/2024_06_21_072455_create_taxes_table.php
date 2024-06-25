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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id('taxID');
            $table->unsignedBigInteger('employeeID');
            $table->string('taxType');
            $table->decimal('taxRate', 5, 2);
            $table->decimal('taxAmount', 10, 2)->default(0);
            $table->timestamps();

 // Index and foreign key constraint to reference employees
            // No foreign key constraint because it's across different microservices
            // $table->foreign('employeeID')->references('id')->on('employees');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
