<?php

namespace Database\Factories;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MainJobDescription>
 */
class MainJobDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3,true),
            'slug'=> fake()->unique->slug,
            'count'=>fake()->numberBetween(0,5),
            'company'=>fake()->randomElement(['Daffodil, Dhaka']),
            'location'=>fake()->address(),
            'email'=>fake()->safeEmail(),
            'tag'=>fake()->randomElement(['Java','HR', 'Engineer', 'Developer', 'Marketing','Researcher', 'Designer']),
            'salary'=>fake()->numberBetween(30000,45000),
            'close_date'=>fake()->dateTimeBetween('+i month(','+2 month'),
            'cat_id'=>fake()->randomElement(Category::where('status','active')->pluck('id')->toArray()),
            'icon'=>fake()->randomElement(['http://localhost:8000/files/jobs/c0.png',
            'http://localhost:8000/files/jobs/c1.png',
            'http://localhost:8000/files/jobs/c2.png',
            'http://localhost:8000/files/jobs/c3.png',
            'http://localhost:8000/files/jobs/c4.png',
            'http://localhost:8000/files/jobs/c8.png',
            'http://localhost:8000/files/jobs/c9.png']),
            'description' => fake()->sentence(300),
            'status'=>fake()->randomElement(['active','inactive']),
            'type'=>fake()->randomElement(['full time','half time','part time']),
            'is_featured'=>fake()->randomElement([true,false]),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
