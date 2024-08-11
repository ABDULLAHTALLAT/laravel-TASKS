<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['online', 'offline']),
            'total_duration' => $this->faker->numberBetween(10, 100),
            'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            // Assign a random track_id from existing tracks
            'track_id' => Track::inRandomOrder()->first()->id,
        ];
    }
}