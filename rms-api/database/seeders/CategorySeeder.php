<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => "Software Engineer",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/default1.png',
            'job_count'=>2,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Graphic Designer",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/default.png',
            'job_count'=>2,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Java Developer",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/categoryIcon.png',
            'job_count'=>3,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Software Testing",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/categoryIcon.png',
            'job_count'=>6,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Marketing",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/customer_service.jpg',
            'job_count'=>4,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Human Resource",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/customer_service.jpg',
            'job_count'=>6,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Content Writer",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/contentwr.jpg',
            'job_count'=>10,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Management",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/latestJoblogo.jpg',
            'job_count'=>8,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Security Analyst",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/latestJoblogo.jpg',
            'job_count'=>5,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Market Researcher",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/contentwr.jpg',
            'job_count'=>9,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Customer Service",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/customer_service.jpg',
            'job_count'=>12,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('categories')->insert([
            'name' => "Retail & Products",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'active',
            'icon' => 'http://localhost:8000/files/categories/default.png',
            'job_count'=>2,
            'period_start'=>now(),
            'period_end'=>now()->addMonth(3),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        \App\Models\Category::factory(25)->create();
    }
}
