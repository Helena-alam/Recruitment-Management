<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'email' => "helena.alam@gmail.com",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'pending',
            'cv' => 'http://localhost:8000/files/applications/default.pdf',
            'job_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('applications')->insert([
            'email' => "helena84.alam@gmail.com",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'pending',
            'cv' => 'http://localhost:8000/files/applications/default.pdf',
            'job_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('applications')->insert([
            'email' => "helena.alam84@gmail.com",
            'slug'=> Str::slug(str::random(20)),
            'status'=>'pending',
            'cv' => 'http://localhost:8000/files/applications/default.pdf',
            'job_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        \App\Models\Application::factory(20)->create();
    }
}
