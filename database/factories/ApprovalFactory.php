<?php

namespace Database\Factories;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Schema;

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
        try {
            $f = $this->faker;
            $user = User::all()->random();  //User::all()->pluck('id')->toArray();
            $user2 = ($user->isAdmin()) ? User::all()->random() : $user;  //Can be the same as user
            $roles = ['admin', 'intern'];
            $departments = ['Technology', 'People', 'Business Development'];
            //$user_columns = Schema::getColumnListing('users'); //'users' table

            $list_fillable_user = (new User())->getFillable();
            unset($list_fillable_user[2]); //prevents password from being selected as a field to edit
            
            $field = $f->randomElement($list_fillable_user);

            //echo $field."\n";
            //echo $user->{$field}."\n";

            //echo "Checking if numeric...." . "\n";
            switch ($field) {
                case 'name':
                    $modified_val = $f->name();
                    break;

                case 'username': 
                    $modified_val = $f->lastname();
                    break;
                
                case 'email':
                    $modified_val = fake()->unique()->safeEmail();
                    break;

                case 'department':
                    $modified_val = $f->randomElement($departments);
                    break;
                
                case 'role':
                    $modified_val = $f->randomElement($roles);
                    break;

                case 'contact_number':
                    $modified_val = $f->phoneNumber();
                    break;

                case 'position':
                    $modified_val = $f->jobTitle();
                    break;

                case 'start_date':
                    $modified_val = $f->dateTimeBetween(startDate: '-10 days', endDate: 'now')->format('Y-m-d');
                    break;

                case 'active':
                    $modified_val =  $f->randomElement([true, false]);
                    break;

                case 'hourly_rate':
                    $modified_val = $f->numberBetween(25, 60);
                    break;

                case 'required_hours':
                    $modified_val = $f->numberBetween(100, 500);
                    break;

                case 'bank':
                    $modified_val = $f->randomElement(['GCASH', 'BDO', 'DBP']);
                    break;

                case 'bank_account_no':
                    $modified_val = $f->creditCardNumber();
                    break;

                case 'hourly_rate_last_updated':
                    $modified_val = $f->dateTimeBetween(startDate: '-5 days', endDate: 'now')->format('Y/m/d');
                    break;

                case 'supervisor':
                    $modified_val = $f->name();
                    break;

                default:
                    $modified_val = "";
                    break;
            }

            return [
                'requestor_id'=>$user->id,
                'profile_id'=>$user2->id,
                'field_to_edit'=>$field,
                'original_value'=>$user2->{$field},
                'modified_value'=>$modified_val,
                'reason'=>$f->sentence(),
            ];
        } catch (Exception $e) {
            echo $e->getMessage();
            echo $field;
            echo $user->{$field};
        }
    }
}
