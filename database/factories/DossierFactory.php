<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schedule = '[';
        for($i = 0; $i < 5; $i++) {
            $schedule = $schedule.'[';
            for($i = 0; $i < 3; $i++) {
                $fake_time = fake()->time();
                $startH = explode(':', $fake_time)[0];
                $startM = explode(':', $fake_time)[1];
                $fake_time = fake()->time();
                $endH = explode(':', $fake_time)[0];
                $endM = explode(':', $fake_time)[1];
                $title = fake()->randomElement(['Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science', 'English', 'History', 'Geography', 'Polit', 'Sociology']);
                $description = fake()->realTextBetween(20, 30);
                $teacher = fake()->randomElement(['Dr. ', 'Ms. ', 'Mr. ']).fake()->lastName();
                $room = fake()->randomLetter().fake()->numberBetween(100, 500);
                $notes = '['.fake()->realTextBetween(5, 10).', '.fake()->realTextBetween(5, 10).']';
                $fake_json_activity = '{
                    "start-h":"'.$startH.'",
                    "start-m": "'.$startM.'",
                    "end-h": "'.$endH.'",
                    "end-m": "'.$endM.'",
                    "title": "'.$title.'",
                    "description": "'.$description.'",
                    "teacher": "'.$teacher.'",
                    "room": "'.$room.'",
                    "personal-notes": '.$notes.'
                }';
                $schedule = $schedule.$fake_json_activity;
            }
            $schedule = substr($schedule, 0, -1);
            $schedule = $schedule.'],';
        }
        $schedule = substr($schedule, 0, -1);
        $schedule = $schedule.']';

        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phonenumber' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'street' => fake()->streetName(),
            'streetnumber' => fake()->buildingNumber(),
            'city' => fake()->city(),
            'postalcode' => fake()->postcode(),
            'country' => fake()->country(),
            'birthday' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
            'class' => fake()->randomElement(['Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science', 'English', 'History', 'Geography', 'Polit', 'Sociology', 'Other']),
            'level' => fake()->randomElement(['Bachelor', 'Master', 'Doctor']),
            'category' => fake()->randomElement(['1', '2', '3', '4']),
            'avatar_url' => 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png',
            'weekschema' => $schedule
        ];
    }
}
