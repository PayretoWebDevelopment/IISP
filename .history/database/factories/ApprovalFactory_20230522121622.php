<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Approval>
 */
class ApprovalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $f = $this->faker;
        return [
            
            'user_id'=>$f->randomElement($users),

            // $table->id();
            // $table->unsignedBigInteger('requestor_id');
            // $table->foreign('requestor_id')->references('id')->on('users');
            // $table->unsignedBigInteger('profile_id');
            // $table->foreign('profile_id')->references('id')->on('users');
            // $table->enum('field_to_edit', $user_columns);
            // $table->string('original_value');
            // $table->string('modified_value');
            // $table->string('reason');
            // $table->boolean('approve')->nullable();
            // $table->timestamps();
        ];
    }
}
