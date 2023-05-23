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
        Schema::create('timesheets', function (Blueprint $table) {
            $projectTypes = [
                ['Attendance', ['Break', 'Login', 'Logout']],
                ['HR General', ['Ad Hoc', 'Email Correspondence', 'Meeting', 'Monthly Assembly', 'Performance Evaluation', 'Team Building', 'Team Tailgate', 'Touchbase', 'Training or Webinar', 'Weekly Huddle']],
                ['Data Analytics', ['Automation', 'Data Analysis', 'Data Cleansing', 'Data Consolidation', 'Meeting', 'Networking Debugging', 'Report Generation', 'Workshop']],
                ['Web Development', ['Deep Dive Session', 'Meeting', 'Debugging', 'Development']],
            ];

            $projectTypeNames = [];
            $validProjectTypes = [];

            foreach ($projectTypes as &$projectType) {
                $typeName = $projectType[0];
                $subtypes = $projectType[1];

                $subtypes = array_unique($subtypes); // Remove duplicate subtypes

                $projectType = [$typeName, $subtypes]; // Update the project type entry

                if (in_array($typeName, $projectTypeNames)) {
                    $typeName .= ' (Duplicate)';
                }

                foreach ($subtypes as $subtype) {
                    $validProjectTypes[] = "$typeName: $subtype";
                }

                $projectTypeNames[] = $typeName;
            }


            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('task_name');
            $table->enum('task_type', ['TASK', 'BREAK', 'LOGIN', 'LOGOUT', 'LUNCH', 'MEETING', 'TRAINING', 'WEBINAR']);
            // $validProjectTypes = array_column($projectTypes, 0);
            $table->enum('project_type', $validProjectTypes);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};
