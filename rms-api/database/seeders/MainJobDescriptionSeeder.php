<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MainJobDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_job_descriptions')->insert([
            'title'=>'Software Engineer',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>2,
            'company'=>'Daffodil',
            'location'=>'Dhanmondi, Dhaka',
            'email'=>'testEmail@test.com',
            'tag'=>'Software Engineer',
            'salary'=>36000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'1',
            'icon'=>'http://localhost:8000/files/jobs/c7.png',
            'description' => 'Test Description',
            'status'=>'active',
            'type'=>'full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Graphic Designer',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>3,
            'company'=>'BJIT',
            'location'=>'Uttara, Dhaka',
            'email'=>'BJIT@test.com',
            'tag'=>'Graphics Designer',
            'salary'=>41000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'2',
            'icon'=>'http://localhost:8000/files/jobs/c1.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Marketing Analyst',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>4,
            'company'=>'Celcom',
            'location'=>'Gulshan, Dhaka',
            'email'=>'Celcom@test.com',
            'tag'=>'Marketing Analyst',
            'salary'=>40000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'3',
            'icon'=>'http://localhost:8000/files/jobs/c2.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Content Writer',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>2,
            'company'=>'Digital Ocean',
            'location'=>'Gulshan, Dhaka',
            'email'=>'dgOcean@test.com',
            'tag'=>'Writer',
            'salary'=>35000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'4',
            'icon'=>'http://localhost:8000/files/jobs/c3.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Customer Service',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>2,
            'company'=>'HSBC Bank',
            'location'=>'Gulshan, Dhaka',
            'email'=>'hsbc@test.com',
            'tag'=>'Marketing',
            'salary'=>32000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'5',
            'icon'=>'http://localhost:8000/files/jobs/c4.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'Part time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Human Resource Manager',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>1,
            'company'=>'Golf Club Dhaka',
            'location'=>'Uttara, Dhaka',
            'email'=>'gcd@test.com',
            'tag'=>'Human Resource',
            'salary'=>50000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'6',
            'icon'=>'http://localhost:8000/files/jobs/c5.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'Full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('main_job_descriptions')->insert([
            'title'=>'Sales Administration',
            'slug'=>Str::lower(str_replace('','_',Str::random(15))),
            'count'=>1,
            'company'=>'Scholastica School Dhaka',
            'location'=>'Panthapath, Dhaka',
            'email'=>'SSD@test.com',
            'tag'=>'Management',
            'salary'=>40000,
            'close_date'=>'2022-03-03 11:02:45',
            'cat_id'=>'7',
            'icon'=>'http://localhost:8000/files/jobs/c6.png',
            'description' => 'Lorem Ipsum',
            'status'=>'active',
            'type'=>'Full time',
            'is_featured'=>true,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        \App\Models\MainJobDescription::factory(100)->create();
    }
}
