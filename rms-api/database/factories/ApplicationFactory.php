<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'slug'=> fake()->unique->slug,
            'status'=>fake()->randomElement(['accepted','rejected','pending']),
            'cv'=>fake()->randomElement(['http://localhost:8000/files/applications/default.pdf',
            'http://localhost:8000/files/categories/default1.png',
            'http://localhost:8000/files/categories/contentwr.jpg',
            'http://localhost:8000/files/categories/customer_service.jpg',
            'http://localhost:8000/files/categories/categoryIcon.png',
            'http://localhost:8000/files/categories/latestJoblogo.jpg']),
            'job_id'=>fake()->randomElement(MainJobDescription::where('status','active')->pluck('id')->toArray()),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
