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
        Schema::create('approvals', function (Blueprint $table) {
            $user_columns = Schema::getColumnListing('users');

            $table->id();
            $table->unsignedBigInteger('requestor_id');
            $table->foreign('requestor_id')->references('id')->on('users');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('users');
            $table->enum('field_to_edit', $user_columns);
            $table->string('original_value');
            $table->string('modified_value');
            $table->string('reason');
            $table->boolean('approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
