<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug'=> fake()->unique->slug,
            'name' => fake()->sentence(2,true),
            'icon'=>fake()->randomElement(['http://localhost:8000/files/categories/default.png',
            'http://localhost:8000/files/categories/default1.png',
            'http://localhost:8000/files/categories/contentwr.jpg',
            'http://localhost:8000/files/categories/customer_service.jpg',
            'http://localhost:8000/files/categories/categoryIcon.png',
            'http://localhost:8000/files/categories/latestJoblogo.jpg']),
            'status'=>fake()->randomElement(['active','inactive']),
            'job_count'=>fake()->numberBetween(0,10),
            'created_at'=>fake()->dateTimeThisYear(),
            'updated_at'=>fake()->dateTimeThisYear(),
        ];
    }
}
