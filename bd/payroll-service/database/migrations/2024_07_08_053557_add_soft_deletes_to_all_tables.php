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
       
        $tables = [
            'pay_periods',
            'earnings',
            'payroll',
            'deductions',

        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->softDeletes(); // Adds the deleted_at column
            });
        } 
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'pay_periods',
            'earnings',
            'payroll',
            'deductions',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropSoftDeletes(); // Drops the deleted_at column
            });
        }
    }
};
