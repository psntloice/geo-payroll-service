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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id('deductionID');
            $table->unsignedBigInteger('employeeID');
            $table->unsignedBigInteger('payPeriodID');
            $table->string('deductionType');
            $table->decimal('amount', 10, 2)->default(0);
            $table->unsignedBigInteger('taxID')->nullable();
            $table->timestamps();

            // Index and foreign key constraint to reference employees
            // No foreign key constraint because it's across different microservices
            // $table->foreign('employeeID')->references('id')->on('employees');

            $table->foreign('taxID')->references('taxID')->on('taxes')->onDelete('set null');
            $table->foreign('payPeriodID')->references('payPeriodID')->on('pay_periods');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
