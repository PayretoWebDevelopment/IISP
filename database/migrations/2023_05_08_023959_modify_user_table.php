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
        Schema::table('users', function (Blueprint $table) {
            //not all users require hourly rate and last updated (not all users are interns)
            $table->enum('role', ['admin', 'superadmin', 'intern']);
            $table->string('contact_number');
            $table->string('position');
            $table->date('start_date')->nullable();
            $table->boolean('active')->nullable();
            $table->integer('hourly_rate')->nullable();
            $table->integer('required_hours')->nullable();
            $table->string('bank')->nullable();
            $table->date('hourly_rate_last_updated')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('bank_account_no')->nullable();
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
